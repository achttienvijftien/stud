<?php

namespace AchttienVijftien\Stud\Structure;

use AchttienVijftien\Stud\Fire\FireableInterface;
use AchttienVijftien\Stud\Structure\Registrar\MetaRegistrar;
use AchttienVijftien\Stud\Structure\Registrar\PostTypeRegistrar;
use AchttienVijftien\Stud\Structure\Registrar\TaxonomyRegistrar;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Class Registrable.
 *
 * @package AchttienVijftien\Stud\Structure
 */
#[AutoconfigureTag( 'stud.fireable', [ 'tag' => 'stud.registrable', 'default_hook' => 'init' ] )]
class Registrable implements FireableInterface {

	/**
	 * Known registrars.
	 */
	private const REGISTRARS = [
		'post_type' => PostTypeRegistrar::class,
		'taxonomy'  => TaxonomyRegistrar::class,
		'meta'      => MetaRegistrar::class,
	];

	/**
	 * All registrables, by type.
	 *
	 * @var array
	 */
	private array $registrables = [];

	/**
	 * @inheritDoc
	 */
	public function fire( object $service ): void {
		if ( ! $service instanceof RegistrableInterface ) {
			return;
		}

		$registrar = $this->get_registrar_by_registrable( $service::class );
		if ( ! $registrar ) {
			return;
		}

		( new $registrar( $service ) )->register();
	}

	/**
	 * Gets registrar by registrable.
	 *
	 * @param string $registrable_class Registrable class.
	 *
	 * @return string|null
	 */
	public function get_registrar_by_registrable( string $registrable_class ): ?string {
		$type = $this->registrables[ $registrable_class ] ?? null;
		if ( null === $type ) {
			return null;
		}

		if ( ! isset( self::REGISTRARS[ $type ] ) ) {
			return null;
		}

		$registrar_class = \apply_filters( "achttienvijftien/{$type}_registrar_class", self::REGISTRARS[ $type ] );
		if ( ! class_implements( $registrar_class, RegisterInterface::class ) ) {
			return null;
		}

		return $registrar_class;
	}

	/**
	 * Adds registrable.
	 *
	 * @param RegistrableInterface $registrable Registrable.
	 * @param string               $type        Registrable type.
	 *
	 * @return void
	 */
	public function add_registrable( RegistrableInterface $registrable, string $type ): void {
		$this->registrables[ $registrable::class ] = $type;
	}
}

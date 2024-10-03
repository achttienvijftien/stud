<?php

namespace AchttienVijftien\Stud\Structure;

use AchttienVijftien\Stud\BootableInterface;
use AchttienVijftien\Stud\Structure\Registrar\MetaRegistrar;
use AchttienVijftien\Stud\Structure\Registrar\PostTypeRegistrar;
use AchttienVijftien\Stud\Structure\Registrar\RegisterInterface;
use AchttienVijftien\Stud\Structure\Registrar\TaxonomyRegistrar;

/**
 * Class Registrable.
 *
 * @package AchttienVijftien\Stud\Structure
 */
class Registrable implements BootableInterface {

	/**
	 * All registrables, by type.
	 *
	 * @var array
	 */
	private array $registrables = [];

	/**
	 * @inheritDoc
	 */
	public function boot(): void {
		$this->register_registrables(
			\apply_filters( 'achttienvijftien/taxonomy_registrar_class', PostTypeRegistrar::class ),
			$this->get_registrables_by_type( 'post_type' )
		);

		$this->register_registrables(
			\apply_filters( 'achttienvijftien/taxonomy_registrar_class', TaxonomyRegistrar::class ),
			$this->get_registrables_by_type( 'taxonomy' )
		);

		$this->register_registrables(
			\apply_filters( 'achttienvijftien/meta_registrar_class', MetaRegistrar::class ),
			$this->get_registrables_by_type( 'meta' )
		);
	}

	/**
	 * Registers registrable using corresponding registrar.
	 *
	 * @param string $registrar_class Registrar class.
	 * @param array $registrables Registrables corresponding to registrar.
	 *
	 * @return void
	 */
	private function register_registrables( string $registrar_class, array $registrables ): void {
		if ( ! class_implements( $registrar_class, RegisterInterface::class ) ) {
			return;
		}

		foreach ( $registrables as $registrable ) {
			( new $registrar_class( $registrable ) )->prepare();
		}
	}

	/**
	 * Adds registrable.
	 *
	 * @param RegistrableInterface $registrable Registrable.
	 * @param string $type Registrable type.
	 *
	 * @return void
	 */
	public function add_registrable( RegistrableInterface $registrable, string $type ): void {
		$this->registrables[ $type ][] = $registrable;
	}

	/**
	 * Gets registrables by type.
	 *
	 * @param string $type Type to get registrables of.
	 *
	 * @return array
	 */
	public function get_registrables_by_type( string $type ): array {
		return $this->registrables[ $type ] ?? [];
	}
}

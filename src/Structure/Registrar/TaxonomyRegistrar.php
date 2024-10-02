<?php

namespace AchttienVijftien\Stud\Structure\Registrar;

use AchttienVijftien\Stud\Structure\RegistrableInterface;
use AchttienVijftien\Stud\Structure\RegistrableTaxonomyInterface;

/**
 * Class TaxonomyRegistrar.
 *
 * @package AchttienVijftien\Stud\Structure\Registrar
 */
class TaxonomyRegistrar implements RegisterInterface {
	/**
	 * @param RegistrableTaxonomyInterface|RegistrableInterface $registrable
	 */
	public function __construct( private RegistrableTaxonomyInterface|RegistrableInterface $registrable ) {
	}

	/**
	 * @inheritDoc
	 */
	public function prepare(): void {
		\add_action( 'init', [ $this, 'register' ] );
	}

	/**
	 * Registers taxonomy.
	 *
	 * @return void
	 */
	public function register(): void {
		\register_taxonomy(
			$this->registrable->get_key(),
			$this->registrable->get_object_type(),
			$this->registrable->get_args(),
		);
	}
}

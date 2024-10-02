<?php

namespace AchttienVijftien\Stud\Structure\Registrar;

use AchttienVijftien\Stud\Structure\RegistrableInterface;
use AchttienVijftien\Stud\Structure\RegistrableMetaInterface;

/**
 * Class MetaRegistrar
 *
 * @package AchttienVijftien\Stud\Structure\Registrar
 */
class MetaRegistrar implements RegisterInterface {
	/**
	 * MetaRegistrar constructor.
	 *
	 * @param RegistrableMetaInterface|RegistrableInterface $registrable
	 */
	public function __construct( private RegistrableMetaInterface|RegistrableInterface $registrable ) {
	}

	/**
	 * @inheritDoc
	 */
	public function prepare(): void {
		\add_action( 'init', [ $this, 'register' ] );
	}

	/**
	 * Registers meta key.
	 *
	 * @return void
	 */
	public function register(): void {
		\register_meta(
			$this->registrable->get_object_type(),
			$this->registrable->get_key(),
			$this->registrable->get_args()
		);
	}
}

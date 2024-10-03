<?php

namespace AchttienVijftien\Stud\Structure\Registrar;

use AchttienVijftien\Stud\Structure\RegistrableInterface;
use AchttienVijftien\Stud\Structure\RegistrablePostTypeInterface;

/**
 * Class PostTypeRegistrar
 *
 * @package AchttienVijftien\Stud\Structure\Registrar
 */
class PostTypeRegistrar implements RegisterInterface {
	/**
	 * @param RegistrablePostTypeInterface|RegistrableInterface $registrable
	 */
	public function __construct( private RegistrablePostTypeInterface|RegistrableInterface $registrable ) {
	}

	/**
	 * @inheritDoc
	 */
	public function prepare(): void {
		\add_action( 'init', [ $this, 'register' ] );
	}

	/**
	 * Registers given post types.
	 *
	 * @param RegistrablePostTypeInterface|RegistrableInterface $registrable
	 *
	 * @return void
	 */
	public function register(): void {
		\register_post_type(
			$this->registrable->get_key(),
			$this->registrable->get_args(),
		);
	}
}

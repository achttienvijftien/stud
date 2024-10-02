<?php

namespace AchttienVijftien\Stud\Structure\Registrar;

use AchttienVijftien\Stud\Structure\RegistrableInterface;

/**
 * Interface RegisterInterface.
 *
 * @package AchttienVijftien\Stud\Structure\Registrar
 */
interface RegisterInterface {
	/**
	 * Constructor.
	 *
	 * @param RegistrableInterface $registrable
	 */
	public function __construct( RegistrableInterface $registrable );

	/**
	 * Prepare registration.
	 *
	 * @return void
	 */
	public function prepare(): void;
}

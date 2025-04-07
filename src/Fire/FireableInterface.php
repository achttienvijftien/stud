<?php

namespace AchttienVijftien\Stud\Fire;

/**
 * Interface FireableInterface
 *
 * @package AchttienVijftien\Stud\Fire
 */
interface FireableInterface {

	/**
	 * Fires the service.
	 *
	 * @param object $service The service to fire.
	 *
	 * @return void
	 */
	public function fire( object $service ): void;

}

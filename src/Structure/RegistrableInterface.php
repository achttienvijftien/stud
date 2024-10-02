<?php

namespace AchttienVijftien\Stud\Structure;

/**
 * Interface RegistrableInterface.
 *
 * @package AchttienVijftien\Stud\Structure
 */
interface RegistrableInterface {
	/**
	 * Gets key.
	 *
	 * @return string
	 */
	public function get_key(): string;

	/**
	 * Gets arguments.
	 *
	 * @return array
	 */
	public function get_args(): array;
}

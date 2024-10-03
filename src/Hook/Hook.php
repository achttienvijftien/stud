<?php

namespace AchttienVijftien\Stud\Hook;

use AchttienVijftien\Stud\BootableInterface;

/**
 * Class Hook.
 *
 * @package AchttienVijftien\Stud\Hook
 */
class Hook implements BootableInterface {

	/**
	 * Hook constructor.
	 *
	 * @param iterable $services The tagged services.
	 */
	public function __construct( private iterable $services ) {
	}

	/**
	 * Calls `add_hooks` method on all tagged services on boot.
	 */
	public function boot(): void {
		foreach ( $this->services as $service ) {
			$service->add_hooks();
		}
	}
}

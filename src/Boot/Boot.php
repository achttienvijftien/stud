<?php

namespace AchttienVijftien\Stud\Boot;

/**
 * Class Boot.
 *
 * @package AchttienVijftien\Stud
 */
class Boot {
	/**
	 * Boot constructor.
	 *
	 * @param iterable $services All services needing to be booted.
	 */
	public function __construct( iterable $services ) {
		/** @var BootableInterface $service */
		foreach ( $services as $service ) {
			$service->boot();
		}
	}
}

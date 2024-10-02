<?php

namespace Achttienvijftien\Stud\Hook;

use AchttienVijftien\Stud\BootableInterface;

class Hook implements BootableInterface {
	public function __construct( private iterable $services ) {
	}

	public function boot(): void {
		foreach ( $this->services as $service ) {
			$service->add_hooks();
		}
	}
}

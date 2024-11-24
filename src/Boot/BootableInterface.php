<?php

namespace AchttienVijftien\Stud\Boot;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Interface BootableInterface.
 *
 * @package AchttienVijftien\Stud
 */
#[AutoconfigureTag( 'stud.bootable' )]
interface BootableInterface {
	/**
	 * Boots service.
	 *
	 * @return void
	 */
	public function boot(): void;
}

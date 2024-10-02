<?php

namespace AchttienVijftien\Stud\Hook;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Interface HookableInterface.
 *
 * @package AchttienVijftien\Stud\Hook
 */
#[AutoconfigureTag( 'stud.hookable' )]
interface HookableInterface {

	/**
	 * Adds hooks.
	 *
	 * @return void
	 */
	public function add_hooks(): void;
}

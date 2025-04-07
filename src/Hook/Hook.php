<?php

namespace AchttienVijftien\Stud\Hook;

use AchttienVijftien\Stud\Fire\FireableInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Class Hook
 *
 * @package AchttienVijftien\Stud\Hook
 */
#[AutoconfigureTag( 'stud.fireable', [ 'tag' => 'stud.hookable' ] )]
class Hook implements FireableInterface {
	/**
	 * Calls `add_hooks` method on all tagged services on boot.
	 */
	public function fire( object $service ): void {
		if ( ! $service instanceof HookableInterface ) {
			return;
		}

		$service->add_hooks();
	}
}

<?php

namespace AchttienVijftien\Stud\Boot;

use AchttienVijftien\Stud\Fire\FireableInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Class Boot.
 *
 * @package AchttienVijftien\Stud
 */
#[AutoconfigureTag( 'stud.fireable', [ 'tag' => 'stud.bootable' ] )]
class Boot implements FireableInterface {

	/**
	 * Boots the service.
	 *
	 * @param object $service
	 *
	 * @return void
	 */
	public function fire( object $service ): void {
		if ( ! $service instanceof BootableInterface ) {
			return;
		}

		$service->boot();
	}
}

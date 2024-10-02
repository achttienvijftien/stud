<?php

namespace AchttienVijftien\Stud\Structure;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Interface RegistrableTaxonomyInterface.
 *
 * @package AchttienVijftien\Stud\Structure
 */
#[AutoconfigureTag( 'stud.registrable', [ 'type' => 'taxonomy' ] )]
interface RegistrableTaxonomyInterface extends RegistrableInterface {
	/**
	 * @return string|array
	 */
	public function get_object_type(): string|array;
}

<?php

namespace AchttienVijftien\Stud\Structure;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Interface RegistrableMetaInterface.
 *
 * @package AchttienVijftien\Stud\Structure
 */
#[AutoconfigureTag( 'stud.registrable', [ 'type' => 'meta' ] )]
interface RegistrableMetaInterface extends RegistrableInterface {
	/**
	 * Gets object type of meta (should be one of: post, comment, term or user).
	 *
	 * @return string
	 */
	public function get_object_type(): string;
}

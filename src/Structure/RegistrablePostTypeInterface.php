<?php

namespace AchttienVijftien\Stud\Structure;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Interface RegistrablePostTypeInterface.
 *
 * @package AchttienVijftien\Stud\Structure
 */
#[AutoconfigureTag( 'stud.registrable', [ 'type' => 'post_type' ] )]
interface RegistrablePostTypeInterface extends RegistrableInterface {
}

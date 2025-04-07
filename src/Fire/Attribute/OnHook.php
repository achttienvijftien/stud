<?php

namespace AchttienVijftien\Stud\Fire\Attribute;

/**
 * Class OnHook
 *
 * @package AchttienVijftien\Stud\Fire\Attribute
 */
#[\Attribute( \Attribute::TARGET_CLASS )]
class OnHook {

	/**
	 * Default hook priority.
	 */
	private const DEFAULT_PRIORITY = 10;

	/**
	 * OnHook constructor.
	 *
	 * @param string $hook
	 * @param int    $priority
	 */
	public function __construct(
		public string $hook,
		public int $priority = self::DEFAULT_PRIORITY,
	) {
	}

	/**
	 * Dumps this instance to an array.
	 *
	 * @return array
	 */
	public function to_array(): array {
		return get_object_vars( $this );
	}

	/**
	 * Creates a new instance from an array.
	 *
	 * @param array $data Data to create the instance from.
	 *
	 * @return self
	 */
	public static function from_array( array $data ): self {
		return new self( $data['hook'], $data['priority'] ?? self::DEFAULT_PRIORITY );
	}
}

<?php

namespace AchttienVijftien\Stud\Fire;

/**
 * Class FireHooks
 *
 * @package AchttienVijftien\Stud\Fire
 */
class FireHooks {

	/**
	 * @var array
	 */
	private array $hooks = [];

	/**
	 * @var array
	 */
	private array $fireables = [];

	/**
	 * Adds service to the hooks array.
	 *
	 * @param string            $hook     The hook this service should be fired on.
	 * @param int               $priority Priority within the hook.
	 * @param FireableInterface $fireable The fireable class.
	 * @param                   $service  The service.
	 *
	 * @return void
	 */
	public function add_service( string $hook, int $priority, FireableInterface $fireable, $service ) {
		if ( ! isset( $this->fireables[ $fireable::class ] ) ) {
			$this->fireables[ $fireable::class ] = $fireable;
		}

		if ( ! isset( $this->hooks[ $fireable::class ][ $hook ][ $priority ] ) ) {
			$this->hooks[ $fireable::class ][ $hook ][ $priority ] = [];
		}

		$this->hooks[ $fireable::class ][ $hook ][ $priority ][] = $service;
	}

	/**
	 * Adds hooks which will fire the services.
	 *
	 * @return void
	 */
	public function add_hooks() {
		foreach ( $this->hooks as $fireable_class => $hooks ) {
			if ( ! isset( $this->fireables[ $fireable_class ] ) ) {
				continue;
			}

			$fireable = $this->fireables[ $fireable_class ];
			foreach ( $hooks as $hook => $priorities ) {
				foreach ( $priorities as $priority => $services ) {
					add_filter( $hook, function () use ( $fireable, $services ) {
						foreach ( $services as $service ) {
							$fireable->fire( $service );
						}
					}, $priority );
				}
			}
		}
	}
}

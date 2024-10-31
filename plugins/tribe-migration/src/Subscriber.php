<?php declare(strict_types=1);

namespace Tribe\Migration;

use Tribe\Libs\Container\Abstract_Subscriber;
use Tribe\Migration\Tasks\Fetch_External_Records;

class Subscriber extends Abstract_Subscriber {

	public function register(): void {
		$this->cli();
		$this->queues();
	}

	public function cli(): void {
		add_action( 'init', function (): void {
			if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
				return;
			}

			$this->container->get( CLI::class )->register();
		}, 0, 0 );
	}

	public function queues(): void {
		// this action is called by our Action Scheduler events to process individual post objects.
		add_action( Fetch_External_Records::HOOK, static function ( $entity, $entityId, $perPage, $page ): void {
			Fetch_External_Records::handle( $entity, $entityId, $perPage, $page );
		}, 10, 4 );
	}

}

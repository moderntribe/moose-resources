<?php declare(strict_types=1);

namespace Tribe\Migration\Tasks;

use Selective\Transformer\ArrayData;
use Tribe\Migration\Request;

class Fetch_External_Records {

	public const HOOK = 'fetch_external_posts';

	/**
	 * @throws \Exception
	 */
	public static function handle( string $entity = 'posts', string $entityId = '', int $perPage = 10, int $pageToken = 1 ): void {
		$query = ( new Request() )
			->fetch( $entity )
			->per_page( $perPage )
			->page( $pageToken );

		if ( ! empty( $entityId ) ) {
			$query->include( explode( ',', $entityId ) );
		}

		$records = $query->get();

		if ( empty( $records->hits() ) ) {
			return;
		}

		// loop through records and process to posts
		foreach ( $records->hits() as $record ) {
			Process_External_Records::handle( new ArrayData( $record ) );
		}

		if ( $entityId > 0 ) {
			return;
		}

		// send to Action Scheduler to fetch our next paginated dataset
		as_schedule_single_action(
			strtotime( "+5 minute" ),
			Fetch_External_Records::HOOK,
			[
				'entity'    => $entity,
				'entityId'  => $entityId,
				'perPage'   => $perPage,
				'pageToken' => $pageToken + 1,
			],
			'migration'
		);
	}

}

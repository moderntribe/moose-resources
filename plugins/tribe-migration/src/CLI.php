<?php declare(strict_types=1);

namespace Tribe\Migration;

use Tribe\Migration\Tasks\Fetch_External_Records;
use WP_CLI;

class CLI {

	public const ARG_PER_PAGE  = 'per_page';
	public const ARG_ENTITY    = 'entity';
	public const ARG_ENTITY_ID = 'id';

	/**
	 * @throws \Exception
	 */
	public function register(): void {
		WP_CLI::add_command(
			$this->command(),
			[ $this, 'run_command' ],
			[
				'shortdesc' => $this->description(),
				'synopsis'  => $this->arguments(),
			]
		);
	}

	/**
	 * wp tribe migrate
	 */
	public function command(): string {
		return 'tribe migrate';
	}

	/**
	 * The command description
	 */
	public function description(): string {
		return __( 'Migration of External WP Rest Api content to associated WordPress data.', 'tribe' );
	}

	/**
	 * The command arguments
	 */
	public function arguments(): array {
		return [
			[
				'type'        => 'positional',
				'name'        => self::ARG_ENTITY,
				'optional'    => false,
				'description' => __( 'Define the post entity endpoint to query. (ie. posts)', 'tribe' ),
				'default'     => 'posts',
			],
			[
				'type'        => 'assoc',
				'name'        => self::ARG_PER_PAGE,
				'optional'    => true,
				'description' => __( 'Limit number of records to import at a time. (ie. --per_page=10)', 'tribe' ),
				'default'     => 1,
			],
			[
				'type'        => 'assoc',
				'name'        => self::ARG_ENTITY_ID,
				'optional'    => true,
				'description' => __( 'Specify which entity ID to filter. (ie. --id=1)', 'tribe' ),
				'default'     => '',
			],
		];
	}

	/**
	 * @param array $args
	 * @param array $assoc_args
	 */
	public function run_command( array $args, array $assoc_args ): void {
		$entity    = reset( $args ) ?? 0;
		$per_page  = $assoc_args[ self::ARG_PER_PAGE ] ?? 10;
		$entity_id = $assoc_args[ self::ARG_ENTITY_ID ] ?? '';
		$params    = [
			'entity'    => $entity,
			'entityId'  => (string) $entity_id,
			'perPage'   => (int) $per_page,
			'pageToken' => 1,
		];

		if ( ! function_exists( 'as_schedule_single_action' ) ) {
			WP_CLI::warning( __( 'Function as_schedule_single_action not found.', 'tribe' ) );

			return;
		}

		// send to Action Scheduler for processing
		as_schedule_single_action(
			time(),
			Fetch_External_Records::HOOK,
			$params,
			'migration'
		);

		WP_CLI::success( sprintf( __( 'Queued: %s for migration.', 'tribe' ), wp_json_encode( $params ) ) );
	}

}

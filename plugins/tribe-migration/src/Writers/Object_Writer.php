<?php declare(strict_types=1);

namespace Tribe\Migration\Writers;

abstract class Object_Writer {

	/**
	 * @param int $post_id
	 */
	public function post_exists( int $post_id, string $post_type ): int {
		$query = new \WP_Query( [
			'post_type'      => [ $post_type ],
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'meta_query'     => [  // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
								   [
									   'key'     => '_migration_post_id',
									   'value'   => $post_id,
									   'compare' => '=',
								   ],
			],
		] );

		if ( $query->found_posts ) {
			return $query->posts[0];
		}

		return 0;
	}

}

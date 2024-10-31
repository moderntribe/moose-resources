<?php declare(strict_types=1);

namespace Tribe\Migration\Writers;

use Selective\Transformer\ArrayData;

class Post_Writer extends Object_Writer {

	/**
	 * @param \Selective\Transformer\ArrayData $post
	 */
	public function write_to_post( ArrayData $post ): ArrayData {
		// set existing post_id or 0 for new post.
		$post->set( 'ID', $this->post_exists(
			post_id: $post->get( 'meta_input._migration_post_id', '' ),
			post_type: $post->get( 'post_type', '' )
		) );

		// insert or update the post
		$post_id = wp_insert_post( $post->all() );

		if ( is_wp_error( $post_id ) ) {
			return $post;
		}

		// update our post data with the new ID
		$post->set( 'ID', $post_id );

		return $post;
	}

	/**
	 * @param \Selective\Transformer\ArrayData $record
	 */
	public function __invoke( ArrayData $record ): ArrayData {
		return $this->write_to_post( $record );
	}

}

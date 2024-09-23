<?php declare(strict_types=1);

namespace Tribe\Migration\Writers;

use Selective\Transformer\ArrayData;
use Tribe\Migration\Request;

class Image_Writer extends Object_Writer {

	protected int $post_id;

	public function fetch( int $attachment_id = 0 ): string {
		$attachments = ( new Request() )
			->fetch( 'media' )
			->include( [ $attachment_id ] )
			->get();

		$results    = $attachments->hits();
		$attachment = reset( $results );
		if ( empty( $attachment['source_url'] ) ) {
			return '';
		}

		return $attachment['source_url'];
	}

	public function set( string $source_url, int $attachment_id ): int {
		$this->require_files();
		$tmp = download_url( $source_url );

		if ( is_wp_error( $tmp ) ) {
			return 0;
		}

		$path = wp_parse_url( $source_url, PHP_URL_PATH );

		$image_id = media_handle_sideload(
			[
				'name'     => basename( $path ),
				'tmp_name' => $tmp,
			],
			$this->post_id
		);

		if ( is_wp_error( $image_id ) ) {
			return 0;
		}

		update_post_meta( $image_id, '_migration_post_id', $attachment_id );
		update_post_meta( $this->post_id, '_thumbnail_id', $image_id );

		return $image_id;
	}

	private function require_files(): void {
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/media.php';
		require_once ABSPATH . 'wp-admin/includes/image.php';
	}

	/**
	 * @param \Selective\Transformer\ArrayData $record
	 */
	public function __invoke( ArrayData $record ): ArrayData {
		$this->post_id = $record->get( 'ID', 0 );

		if ( ! $this->post_exists( post_id: $this->post_id, post_type: 'attachment' ) ) {
			$migration_attachment_id = $record->get( 'meta_input._featured_media', 0 );
			$source_url              = $this->fetch( $migration_attachment_id );

			$this->set( source_url: esc_url( $source_url ), attachment_id: $migration_attachment_id );
		}

		return $record;
	}

}

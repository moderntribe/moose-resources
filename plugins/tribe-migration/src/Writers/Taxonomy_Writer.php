<?php declare(strict_types=1);

namespace Tribe\Migration\Writers;

use Selective\Transformer\ArrayData;
use Tribe\Migration\Request;

class Taxonomy_Writer {

	protected int $post_id;

	/**
	 * Query taxonomy terms from request api and import to defined post id and taxonomy
	 *
	 * @param string $endpoint
	 * @param array $terms
	 *
	 * @throws \Exception
	 */
	public function fetch( string $endpoint, array $terms = [] ): array {
		$terms = ( new Request() )
			->fetch( $endpoint )
			->include( $terms )
			->get();

		$tag_terms = [];
		foreach ( $terms->hits() as $tag ) {
			$tag_terms[] = $tag['name'] ?? '';
		}

		return array_filter( $tag_terms );
	}

	/**
	 * @param int $post_id
	 * @param string $taxonomy
	 * @param array $terms
	 */
	public function set( int $post_id, string $taxonomy, array $terms = [] ): void {
		if ( empty( $terms ) ) {
			return;
		}

		foreach ( $terms as $term ) {
			$exists = term_exists( $term, $taxonomy ); // phpcs:ignore WordPressVIPMinimum.Functions.RestrictedFunctions.term_exists_term_exists
			if ( $exists ) {
				$terms[] = (int) $exists['term_id'];
				continue;
			}

			$term    = wp_insert_term( $term, $taxonomy );
			$terms[] = $term['term_id'];
		}

		wp_set_post_terms( $post_id, $terms, $taxonomy );
	}

	/**
	 * @param \Selective\Transformer\ArrayData $record
	 */
	public function __invoke( ArrayData $record ): ArrayData {
		$this->post_id = $record->get( 'ID', 0 );
		$taxonomies    = $record->get( 'meta_input._taxonomies', [] );

		foreach ( $taxonomies as $endpoint => $term_data ) {
			$terms = $this->fetch( endpoint: $endpoint, terms: $term_data['term_ids'] );
			$this->set( post_id: $this->post_id, taxonomy: $term_data['taxonomy'], terms: $terms );
		}

		return $record;
	}

}

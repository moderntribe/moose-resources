<?php declare(strict_types=1);

namespace Tribe\Migration\Transformers\Types;

use Selective\Transformer\ArrayData;
use Selective\Transformer\ArrayTransformer;
use Tribe\Plugin\Post_Types\Page\Page;

class Page_Transformer extends Global_Transformer {

	public function get_definitions(): ArrayTransformer {
		return parent::get_definitions()->set( 'post_type', Page::NAME )
			->map( 'meta_input._featured_media', 'featured_media', 'integer|required' )
			->map( 'post_content', 'content.rendered', $this->transformer->rule()->callback(
				static function ( $content ) {
					// transform the_content here for any block editor pattern needs.

					return $content;
				}
			)->required() )
			->map( 'meta_input._migration_template', 'template', 'string|required' )
			->map( 'meta_input.acf', 'acf', 'array|required' );
	}

	public function __invoke( ArrayData $record ): ArrayData {
		$post_data = $this->get_definitions()->toArray( $record->all() );

		return apply_filters( 'tribe/migration/page_transformer', new ArrayData( $post_data ) );
	}

}

<?php declare(strict_types=1);

namespace Tribe\Migration\Transformers\Types;

use Selective\Transformer\ArrayData;
use Selective\Transformer\ArrayTransformer;
use Tribe\Plugin\Post_Types\Post\Post;

class Post_Transformer extends Global_Transformer {

	public function get_definitions(): ArrayTransformer {
		return parent::get_definitions()->set( 'post_type', Post::NAME )
			->map( 'post_content', 'content.rendered', $this->transformer->rule()->callback(
				static function ( $content ) {
					// transform the_content here for any block editor pattern needs.

					return sprintf(
						'<!-- wp:group {"metadata":{"name":"Post Header"},"align":"wide","className":"alignwide","layout":{"type":"default"}} -->
								<div class="wp-block-group alignwide">
								<!-- wp:post-title {"textAlign":"center","level":1,"align":"wide","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"70"} /-->
								</div>
								<!-- /wp:group -->
								<!-- wp:post-featured-image {"aspectRatio":"16/9","width":"","align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30","right":"0","left":"0"}}},"className":"alignwide"} /-->
								%s',
						$content
					);
				}
			)->required() )
			->map( 'meta_input._featured_media', 'featured_media', 'integer|required' )
			->map( 'meta_input._author', 'author', 'integer|required' )
			->map( 'meta_input._taxonomies.categories', 'categories', $this->transformer->rule()->callback(
				static function ( $categories ) {
					return [
						'taxonomy' => 'category',
						'term_ids' => $categories ?? [],
					];
				}
			)->required() );
	}

	public function __invoke( ArrayData $record ): ArrayData {
		$post_data = $this->get_definitions()->toArray( $record->all() );

		return apply_filters( 'tribe/migration/post_transformer', new ArrayData( $post_data ) );
	}

}

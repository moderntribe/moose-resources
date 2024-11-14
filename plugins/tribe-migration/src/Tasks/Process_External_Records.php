<?php declare(strict_types=1);

namespace Tribe\Migration\Tasks;

use League\Pipeline\Pipeline;
use Selective\Transformer\ArrayData;
use Tribe\Migration\Transformers\Types\Page_Transformer;
use Tribe\Migration\Transformers\Types\Post_Transformer;
use Tribe\Migration\Writers\Image_Writer;
use Tribe\Migration\Writers\Post_Writer;
use Tribe\Migration\Writers\Taxonomy_Writer;
use Tribe\Plugin\Post_Types\Page\Page;
use Tribe\Plugin\Post_Types\Post\Post;

class Process_External_Records {

	/**
	 * @throws \Exception
	 */
	public static function handle( ArrayData $record ): void {
		// determine the object transformer that we'll be using for this record
		match ( $record->get( 'type' ) ) {
			//Page::NAME => self::page_pipeline( $record ),
			Post::NAME => self::post_pipeline( $record ),
			default => throw new \Exception(
				sprintf(
					__( 'No migration pipeline found for this record type: %s', 'tribe' ),
					$record->get( 'type' )
				)
			),
		};
	}

//	public static function page_pipeline( ArrayData $record ): ArrayData {
//		return ( new Pipeline )
//			->pipe( new Page_Transformer )
//			->pipe( new Post_Writer )
//			->pipe( new Image_Writer )
//			->process( $record );
//	}

	public static function post_pipeline( ArrayData $record ): ArrayData {
		return ( new Pipeline )
			->pipe( new Post_Transformer )
			->pipe( new Post_Writer )
			->pipe( new Image_Writer )
			->pipe( new Taxonomy_Writer )
			->process( $record );
	}

}

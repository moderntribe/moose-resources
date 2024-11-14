<?php declare(strict_types=1);

namespace Tribe\Migration\Transformers\Types;

use Selective\Transformer\ArrayTransformer;
use Tribe\Migration\Transformers\Object_Transformer;

class Global_Transformer extends Object_Transformer {

	public function get_definitions(): ArrayTransformer {
		return $this->transformer->set( 'ID', 0 )
			->map( 'post_status', 'status', 'string|required' )
			->map( 'post_title', 'title.rendered', 'string|required' )
			->map( 'post_name', 'slug', 'string|required' )
			->map( 'post_date', 'date', 'string|required' )
			->map( 'post_date_gmt', 'date_gmt', 'string|required' )
			->map( 'post_excerpt', 'excerpt.rendered', 'string' )
			->map( 'meta_input._migration_permalink', 'link', 'string|required' )
			->map( 'meta_input._migration_post_id', 'id', 'integer|required' );
	}

}

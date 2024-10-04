<?php declare(strict_types=1);

namespace Tribe\Migration\Transformers;

use Selective\Transformer\ArrayTransformer;

abstract class Object_Transformer {

	protected ArrayTransformer $transformer;

	/**
	 * Return the Transformer that contains all the mapping definitions
	 * for the block.
	 */
	abstract public function get_definitions(): ArrayTransformer;

	/**
	 * Object_Mapper constructor.
	 */
	public function __construct() {
		$this->transformer = new ArrayTransformer();
	}

}

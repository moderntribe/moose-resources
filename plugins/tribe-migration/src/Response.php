<?php declare(strict_types=1);

namespace Tribe\Migration;

use Curl\Curl;

class Response {

	public function __construct( public Curl $results ) {
	}

	/**
	 */
	public function hits(): array {
		if ( $this->results->responseHeaders['x-wp-total'] ?? 0 ) {
			return $this->results->response;
		}

		return [];
	}

	public function total_hits(): int {
		return (int) $this->results->responseHeaders['x-wp-total'] ?? 0;
	}

}

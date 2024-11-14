<?php declare(strict_types=1);

namespace Tribe\Migration;

use Curl\Curl;

class Request {

	public array $args; //phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingTraversableTypeHintSpecification
	public string $paged;

	protected Curl $curl;

	public function __construct() {
		$this->curl = new Curl();
	}

	/**
	 * @param string $endpoint
	 *
	 * @return $this
	 *
	 * @throws \Exception
	 */
	public function fetch( string $endpoint ): static {
		if ( ! defined( 'MIGRATION_SOURCE_URL' ) ) {
			throw new \Exception( 'No Source URL is defined for this request/' );
		}

		$this->curl->setUrl( MIGRATION_SOURCE_URL . $endpoint );
		$this->curl->setDefaultJsonDecoder( true );
		$this->curl->setHeader( 'Content-Type', 'application/json' );
		$this->args = [];

		return $this;
	}

	/**
	 * @param int $per_page
	 *
	 * @return $this
	 */
	public function per_page( int $per_page = 10 ): static {
		$this->args['per_page'] = $per_page;

		return $this;
	}

	/**
	 * @param int $page
	 *
	 * @return $this
	 */
	public function page( int $page = 1 ): static {
		$this->args['page'] = $page;

		return $this;
	}

	/**
	 * @param array $includes
	 *
	 * @return $this
	 */
	public function include( array $includes = [] ): static {
		if ( ! empty( $includes ) ) {
			$this->args['include'] = join( ',', $includes );
		}

		return $this;
	}

	/**
	 */
	public function log(): bool|string|null {
		return $this->curl->diagnose();
	}

	/**
	 */
	public function get(): Response {
		$this->curl->get( $this->args );

		return new Response( $this->curl );
	}

}

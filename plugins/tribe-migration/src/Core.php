<?php declare(strict_types=1);

namespace Tribe\Migration;

class Core {

	public const VERSION = '1.0.0';

	/**
	 * @var string[] Names of classes extending Abstract_Subscriber.
	 */
	private array $subscribers = [
		Subscriber::class,
	];

	private static self $instance;

	public static function instance(): self {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function init( string $file ): void {
		foreach ( $this->subscribers as $subscriber_class ) {
			( new $subscriber_class( tribe_project()->container() ) )->register();
		}
	}

}

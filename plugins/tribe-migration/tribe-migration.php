<?php declare(strict_types=1);

/**
 * Plugin Name: Tribe Migration
 * Requires Plugins: core, action-scheduler
 * Description: Migration handler for site redesigns content transfers.
 * Author: Modern Tribe, Inc.
 * Author URI: http://tri.be
 * Version: 1.0.0
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Requires PHP: 8.2
 */

use Tribe\Migration\Core;

include dirname( __FILE__ ) . '/vendor/autoload.php';

add_action( 'plugins_loaded', static function (): void {
	tribe_migration_core()->init( __file__ );
} );

function tribe_migration_core(): Core {
	return Core::instance();
}

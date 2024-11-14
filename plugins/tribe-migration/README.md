# Tribe Migration Plugin

Status: Stable
Version: 1.0
Last Updated: 2024-09
Component Created By: Justin R

## TODOS

- [ ] Add Support configuration for external/non-WP API sources

## What does this plugin do?

This plugin allows us to import any Post Type data from one WordPress site to another WordPress site using the Source Rest API. Individual attributes can be mapped within the plugin settings to ensure the data is imported correctly. This plugin is designed to be used with the Tribe Core Plugin and Action Scheduler Plugin.

## Requirements

- PHP 8.2+
- Tribe Core Plugin
- Action Scheduler Plugin[https://wordpress.org/plugins/action-scheduler/]

## Installation

- Copy the plugin to the `wp-content/plugins` directory of your WordPress installation.
- Run `composer install` in the plugin directory.
- Activate the plugin through the WordPress admin interface.
- Add the following to your environment file:
  ```php
  define( 'MIGRATION_SOURCE_URL', 'https://wordpress-site.com/wp-json/wp/v2/' );
  ```

## CLI

- `tribe migrate {entity}` - Migrate all data from the source site to the destination site.
  - **entity** - The entity to migrate. (ie. posts)
  - **Optional**
    - `--id` - The ID of the entity to migrate.
    - `--per_page` - The number of items to migrate per request.
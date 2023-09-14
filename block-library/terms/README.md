# Terms Block

Status: Alpha
Version: 0.1-alpha
Last Updated: 2023-09
Component Created By: Geoff Dusome

## What does this component do?

The terms block displays chosen taxonomy terms in different formats (regular text links or pill buttons).

## Example Usage

This block is intended to replace the Categories and Tags core blocks within WordPress to provide a more holistic approach to displaying taxonomy terms.

The block can be added to anywhere we would have access to a post object. Post single page, Query block, etc.

### Moose Implementation

1. Copy directory to the `themes/core/blocks/tribe/` directory.
1. Add the `tribe/terms` block to the `self::TYPES` array in `plugins/core/src/Blocks/Blocks_Definer.php`.
1. Run `npm run dist` to build the block.
1. For the purpose of reusability, all styles for the block have been included in the block. It may make sense to break these styles out into mixins if you need them in a global context.

### Attributes

#### `taxonomyToUse`

Polls all available taxonomies on the website to create a dropdown list of taxonomies for the user to select. 

#### `onlyPrimaryTerm`

Allows the user to choose if we should only be grabbing the primary term for the taxonomy, or if we should pull all terms from the taxonomy.

#### `hasLinks`

The `hasLinks` attribute determines if the terms should display as links or if the terms should just display as plain text.

### Block Styles

#### `Default`

The default block style for the Terms block displays terms as plain text.

#### `Pills`

The Pills block style for the Terms block displays terms as pill style buttons (regardless of the value of `hasLinks`).

## Media

- Settings: http://p.tri.be/i/6Qvnk5 (slightly old screenshot, "Term Style" has been moved to block styles instead of a block attribute)
- Demo Video: https://www.loom.com/share/2a30b7c6e5ac47c88500ab6ed0f7ba5e?sid=f82ddc80-8942-434d-813d-ddcbe16f8176 (slightly out of date, but shows off how the block works)
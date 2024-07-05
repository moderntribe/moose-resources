# Terms Block

Status: Alpha
Version: 0.1-alpha
Last Updated: 2024-06
Component Created By: Geoff Dusome

## What does this component do?

The color theme block is intended to be used to apply color themes to specific sets of blocks. Whether that be a card component, or an entire section. This color theme block is intended to be used in place of a simple Group block. This is so that Group blocks can be used for their normal purposes and the color theme block can be used in place of the Group block where a color theme is needed (normally decided by design).

## Example Usage

This block is intended to replace the core Group block within WordPress to provide a better approach to color theming.

### Moose Implementation

Very simple implementation:

1. Copy contents of `block` directory to the `themes/core/blocks/tribe/color-theme` directory. 
2. Add the `tribe/color-theme` block to the `TYPES` array in the `plugins/core/src/Blocks/Blocks_Definer.php` file.
3. Build the block using `npm run dist`.

### Block Styles

#### `Default`

The "Default" block style for the Color Theme block is a white background with black text. A white background will always be applied.

#### `Dark`

The "Dark" block style for the Color Theme block is a black background with white text.
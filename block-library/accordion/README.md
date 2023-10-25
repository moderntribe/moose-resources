## Accordion Block

Status: Published
Version: 1.0
Last Updated: 2023-10
Component Created By: Jason Zinn

## What does this component do?

This is a compound accordion block that displays a main content area along with collapsible accordion items. There are two layout options, stacked or inline.

This block relies on the `core/details` block provided by WordPress to power the collapsible items.

## Attributes

**Layout**

Defines the layout of the block.

* type: `string`
* options: `stacked | inline`
* default: `inline`

## Styling

Styles for this block are limited to the converting the layout from stacked to inline to allow for additional flexibility. Styling of individual accordion items is probably best handled by styling the individual `core/details` block.

The layout attribute adds a class `is-layout-[layout]` to the top level block element.

## Default Template

This block comes with a starter template and placeholder content defined in edit.js. This can be modified to match the design of your specific project.

## Example Usage

Want to display accordion items along side a heading, subtitle, and image? You came to the right place!

### Moose Implementation

1. Copy directory to the `themes/core/blocks/tribe/` directory.
1. Add the `tribe/accordion` block to the `self::TYPES` array in `plugins/core/src/Blocks/Blocks_Definer.php`.
1. Run `npm run dist` to build the blocks.

## Media

- Screenshot: TODO
- Demo Video: TODO
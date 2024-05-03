# Carousel

Status: Alpha
Version: 0.1-alpha
Last Updated: 2024-05
Component Created By: Geoff Dusome

## What does this component do?

This is a set of blocks that includes a parent/child relationship between a "Carousel" block and a "Carousel Slide" block in order to create a carousel block using the [Swiper library](https://swiperjs.com/).

## Example Usage

### Moose Implementation

1. Add `swiper` as a dependency in your project
1. Run `npm install` to install the dependency
1. Copy directory to the `themes/core/blocks/tribe/` directory.
1. Add the `tribe/carousel` and `tribe/carousel-slide` blocks to the `self::TYPES` array in `plugins/core/src/Blocks/Blocks_Definer.php`.
1. Run `npm run dist` to build the blocks.

### Block Usage

1. Add the "Carousel" block to a page.
   - by default, the Carousel block supports all current alignment options that Moose supports for blocks (content, wide, grid widths).
   - by default, the Carousel block has Navigation and (clickable) Pagination settings turned on
   - by default, the Carousel block will use Swiper's built-in A11y library
   - by default, the Carousel block displays three buttons below the slider as part of the block:
       - "Add Slide" adds a new `tribe/carousel-slide` block to the Carousel block and switches focus to the newly added slide.
	   - "Previous Slide" acts as navigation to view the previous slide if the "Navigation" setting is turned off. This button will disable itself if there's no need for it to be functional.
	   - "Next Slide" acts as navigation to view the next slide if the "Navigation" setting is turned off. This button will disable itself if there's no need for it to be functional.
	- by default, the Carousel block ships with default Swiper styling and some additional styling for Navigation and Pagination. Other than that, the block should be a blank canvas for you to override in a pattern partial.
2. Set all the settings you require for setting up your pattern.
3. Add the inner blocks you'd like to use within the slider. This can be the same thing for every slide, or it can be something different on every slide. Up to you. I've found it easiest to create a pattern for each type of slide you'd use within the slider. This makes it easy for content editors to add slides without having to copy/paste. 
4. Save your page, view the FE and ensure your slider is working as intended. Happy testing!

## Media

- Screenshot: http://p.tri.be/i/xENlHo
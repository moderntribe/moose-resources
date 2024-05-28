# Custom Query Loop

Status: Alpha
Version: 0.1-alpha
Last Updated: 2024-05
Component Created By: Geoff Dusome

## What does this component do?

A dynamic block with some supporting components to create the ability to define a custom query loop that gives us more features than that of the core Query block.

## Example Usage

### Moose Implementation

1. Copy contents of the `block` directory to the `themes/core/blocks/tribe/custom-query-loop/` directory.
1. Copy `components` directory to the `themes/core` directory.
1. Add the `tribe/custom-query-loop` block to the `self::TYPES` array in `plugins/core/src/Blocks/Blocks_Definer.php`.
1. Run `npm run dist` to build the block.

### Block Usage

1. Add the "Custom Query Loop" block to your page.
    - By default the block should display the "Post" card. 
	- By default there are only two options for cards. If you plan to use the custom query loop block for more than the two available cards, you'll need to create those cards as components and add the file slug to the "Card Component" control `options` array in the `edit.js` file. Don't forget to increase the block version when you update this!
	- We're only currently supporting a maximum of 4 total columns.
	- The "Post Type" control suggestions pull from all available post types. These results aren't filtered at all, but it wouldn't be too hard to control the output of this (or, even hardcode it). 
	- Setting a Post Type should bring up the "Include Posts" control. This control uses `post__in` in the query to pull specific posts into the query.
	- The block uses very simple pagination to handle pagination. No AJAX or anything, just changing the `paged` variable and reloading the page. 
	- Taxonomy queries should be available for your usage with a pretty straightforward UI. 
	- Meta queries are available for your usage. However, the current limitation in meta queries are that both the `key` and `value` controls expect strings. 
2. Set all the settings you require for setting up your block.
3. Double check results you're getting are expected.
4. Save your page view the FE and ensure results are the same as the results in the editor & are still the expected results. 
5. Happy testing!

## Media

- Demo video: https://www.loom.com/share/5d04ece4f0444b9180f9779e16a92978
- Screenshot: http://p.tri.be/i/MOpLyR
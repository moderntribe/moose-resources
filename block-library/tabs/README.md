# Tabs Block

Status: Alpha
Version: 0.1-alpha
Last Updated: 2024-07
Component Created By: Geoff Dusome

## What does this component do?

The Tabs block is a set of two blocks used in a parent/child relationship. The Tabs block is the container and main driver of the block. The Tabs block contains all of the editor functionality and styling. The Tab block is the holder of the tab content and acts as an InnerBlocks wrapper.

## Example Usage

Both the editor view and FE view have been created fairly opinionated but both are very easily updated to match what would be required of your project. The editor view is different than the FE view in this case due to the difference in FE & Editor experience. 

- When you first add the block to the page (http://p.tri.be/i/SER4TN), the block will be populated with one tab. 
- New tabs can be added via the "Add New Tab" button. 
- Tabs can be removed by clicking the "X" icon within each tab title.
- Clicking each tab title should display the tab content for that tab title.
- Tabs can be reordered ONLY via the block list view at this time. We were not able to come up with a solution where we can click & drag to reorder the tabs within the block.
- Tab content can be entered by clicking each tab title and adding blocks to the tab content for that tab.

### Dependencies

The tabs block has a FE dependency on the `delegate` library (https://www.npmjs.com/package/delegate).

### Moose Implementation

Very simple implementation:

1. Run `npm i delegate` to add the required dependency. 
2. Copy contents of `blocks` directory to the `themes/core/blocks/tribe` directory. 
2. Add the `tribe/tabs` and `tribe/tab` blocks to the `TYPES` array in the `plugins/core/src/Blocks/Blocks_Definer.php` file.
3. Build the blocks using `npm run dist`.
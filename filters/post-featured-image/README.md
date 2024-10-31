# Post Featured Image Placeholder Filter

Status: Alpha
Version: 0.1-alpha
Last Updated: 2024-07
Component Created By: Geoff

## TODOS

- [ ] Support multiple post types with a different image placeholder for each post types.
- [ ] Allow ability to globally set placeholder image(s) via custom meta field. 
- [ ] Support ability for multiple placeholder images set to randomly show one out of an array.

## What does this component do?

This filter targets the post featured image block in order to add a placeholder image if the featured image isn't set. Note that filters only work on the front-end of the website.

## Example Usage

1. Add the filter to the `plugins/core/src/Blocks/Filters/` directory under the name `Post_Featured_Image_Filter.php`. 
2. Add the new filter to the `self::FILTERS` array in the `Blocks_Definer.php` file in the `/Blocks` directory using `DI\get( Post_Featured_Image_Filter::class ),`.
3. Add your placeholder image to the `themes/core/assets/media/` directory and ensure the naming of the file added matches the naming for the image within the `Post_Featured_Image_Filter.php` file.
4. When viewing a Post Featured Image block on the front-end of the website, you should now see your placeholder image, rather than nothing.

## Media

- Screenshot: http://p.tri.be/i/r7cFGc
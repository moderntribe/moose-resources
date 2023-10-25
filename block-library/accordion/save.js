/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';
import { BlockSaveProps } from '@wordpress/blocks';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @param {BlockSaveProps} props
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save( props ) {
	const { attributes } = props;
	const { layout } = attributes;

	const { className, ...blockProps } = useBlockProps.save();

	return (
		<div
			{ ...blockProps }
			className={ `${ className } is-layout-${ layout }` }
		>
			<InnerBlocks.Content />
		</div>
	);
}

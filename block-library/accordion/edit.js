import { __ } from '@wordpress/i18n';
import {
	InnerBlocks,
	useBlockProps,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, RadioControl } from '@wordpress/components';
import { BlockEditProps } from '@wordpress/blocks';

const TEMPLATE = [
	[
		'core/columns',
		{},
		[
			[
				'core/column',
				{},
				[
					[
						'core/paragraph',
						{
							placeholder: __( 'Overline Ipsum', 'tribe' ),
						},
					],
					[
						'core/heading',
						{
							placeholder: __(
								'HEADLINE LOREM IPSUM DOLOR',
								'tribe'
							),
						},
					],
					[
						'core/paragraph',
						{
							placeholder: __(
								'Description lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue risus magna, ac suscipit nisi viverra eu.',
								'tribe'
							),
						},
					],
					[ 'core/image' ],
					[
						'core/buttons',
						{},
						[
							[
								'core/button',
								{
									placeholder: __(
										'Optional secondary CTA',
										'tribe'
									),
								},
							],
						],
					],
				],
			],
			[
				'core/column',
				{},
				[ [ 'core/details' ], [ 'core/details' ], [ 'core/details' ] ],
			],
		],
	],
];

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @param {BlockEditProps} props
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit( props ) {
	const { className, ...blockProps } = useBlockProps();
	const { attributes, setAttributes } = props;
	const { layout } = attributes;

	return (
		<div
			{ ...blockProps }
			className={ `${ className } is-layout-${ layout }` }
		>
			<InnerBlocks template={ TEMPLATE } />
			<InspectorControls>
				<PanelBody title={ __( 'Accordion Features', 'tribe' ) }>
					<RadioControl
						label={ __( 'Select accordion layout', 'tribe' ) }
						selected={ layout }
						options={ [
							{ label: 'Inline', value: 'inline' },
							{ label: 'Stacked', value: 'stacked' },
						] }
						onChange={ ( value ) =>
							setAttributes( {
								layout: value,
							} )
						}
					/>
				</PanelBody>
			</InspectorControls>
		</div>
	);
}

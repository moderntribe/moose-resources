# Block Animations

Status: Stable
Version: 1.0
Last Updated: 2025-01
Component Created By: Geoff Dusome

## What does this component do?

The block animations script is used to add developer defined animations to blocks with settings defined in `theme.json`.

## Example Usage

### Moose Implementation 

`block-animations.js` => `themes/core/assets/js/editor`
`animate-on-scroll.js` => `themes/core/assets/js/theme`
`animation.pcss` => `themes/core/assets/pcss/global`

### `theme.json` Settings

These settings can be overwritten in `theme.json`. If these values don't exist in `theme.json`, the script provides defaults.

#### `animationType`

Used to define the names of the animations the developer would like to include in the project.

```
"animationType": [
	{ "label": "None", "value": "none" },
	{ "label": "Fade In", "value": "fade-in" }
]
```

#### `animationDirection`

Used to define the directions that the animations should run in. This property is an object instead of an array, so that we can pull directions based on the animation type. 

```
"animationDirection": {
 	"fade-in": [
 		{ "label": "Top", "value": "top" },
		{ "label": "Bottom", "value": "bottom" }
	]
}
```

#### `animationDuration`

Used to define the values of how fast animations should run. Note that updating the duration list here would also affect the predefiend `offsetDistance` values. These `offsetDistance` values should be updated to match the durations listed here.

```
"animationDuration": [
	{ "label": "200ms", "value": "0.2s" },
	{ "label": "800ms", "value": "0.8s" }
]
```

#### `offsetDistance`

Directly related to the `animationDuration` values, these values determine how far elements should move based on how long the animation runs for. This help keeps animations smooth. 

```
"offsetDistance": {
	'0.2s': '20px',
	'0.8s': '50px',
}
```

#### `animationDelay`

Used to define the value of how long animations should be delayed before they run.

```
"animationDelay": [
	{ "label": "0", "value": "0s" },
	{ "label": "200ms", "value": "0.2s" }
],
```

#### `animationEasing`

Used to define the easings available to editors when defining animations on blocks.

```
"animationEasings": [
	{ "label": "Ease In", "value": "ease-in" },
	{ "label": "Ease Out", "value": "ease-out" }
],
```

#### `animationIncludes`

Used to define which blocks we want to have animations. If this property is set, only the blocks listed will get the animation settings.

```
"animationIncludes": [
	"core/group",
	"core/heading"
],
```

#### `animationExcludes`

Used to define which blocks we would like to exclude from having animation settings. If this property is set, the blocks listed **will not** have animation settings.

```
"animationExcludes": [
	"core/group",
	"core/heading"
],
```

#### `animationTrigger`

While not available for update in `theme.json`, this is an attribute set on every block that has animation properties set to define if the animation should run once per page load or every time the user scrolls past the element.

#### `animationPosition`

Animation position determines how much of an element should be within the viewport before the animation runs. While the values are available to be updated in `theme.json`, these values would also need to be updated in `animate-on-scroll.js` to match the values added in `theme.json` or updated within the `block-animation.js` script itself.

```
"animationPosition": [
 	{ "label": "25%", "value": "25" },
 	{ "label": "50%", "value": "50" },
],
```

### `animate-on-scroll.js`

An additional script that pairs as the front-end handler for the block animations script. This script works on a class based system with `IntersectionObserver` where, if the element that has an animation defined has scrolled into view, that element will get an additional class the developer can use to apply animations to the block.

The block animation script defines an additional class on blocks with animation for the "style" of animation (`is-animation-on-scroll-{style}`), which uses the `slug` property of the `animation` array's object.

The block animation script defines four style properties on block with animation for the animation speed (`--tribe-animation-speed`), delay (`--tribe-animation-delay`), easing (`--tribe-animation-easing`), and animation offset (`--tribe-animation-offset`), which is set manually by the script based on the distance selected. You should be able to use these CSS custom properties within your animation styles to modify the default animation values.

In this directory, there's a `animation.pcss` style file also included. This can be used as base for creating animations using these scripts.

## Media

- Demo Video: https://www.loom.com/share/13e7c18144f143f8b05960ecd5f135d7
# Block Animations

Status: Alpha
Version: 0.1-alpha
Last Updated: 2023-08
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

#### `animation`

Used to define the names of the animations the developer would like to include in the project.

```
"animation": [
	{ "label": "Test", "value": "test" },
	{ "label": "Test 2", "value": "test-2" }
]
```

#### `animationSpeeds`

Used to define the values of how fast animations should run.

```
"animationSpeeds": [
	{ "label": "Fast", "value": "0.2s" },
	{ "label": "Slow", "value": "0.8s" }
],
```

#### `animationDelays`

Used to define the value of how long animations should be delayed before they run.

```
"animationDelays": [
	{ "label": "Short", "value": "0.2s" },
	{ "label": "Long", "value": "0.8s" }
],
```

#### `animationEasings`

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

While not available for update in `theme.json`, this is an attribute set on every block that has animation properties set to define if animations on the block should run when the element is 25% in the viewport, or if animations should run with 100% of the element is in view. This is a good option to use if you're using animations on a smaller element. Alternatively, you could use the 25% option (default) with a small animation delay.

### `animate-on-scroll.js`

An additional script that pairs as the front-end handler for the block animations script. This script works on a class based system with `IntersectionObserver` where, if the element that has an animation defined has scrolled into view, that element will get an additional class the developer can use to apply animations to the block.

The block animation script defines an additional class on blocks with animation for the "style" of animation (`tribe-animation-style-{style}`), which uses the `slug` property of the `animation` array's object.

The block animation script defines three style properties on block with animation for the animation speed (`--tribe-animation-speed`), delay (`--tribe-animation-delay`), and easing (`--tribe-animation-easing`). You should be able to use these CSS custom properties within your animation styles to modify the default animation values.

In this directory, there's a `animation.pcss` style file also included. This can be used as base for creating animations using these scripts.

## Media

- Demo Video: https://www.loom.com/share/13e7c18144f143f8b05960ecd5f135d7
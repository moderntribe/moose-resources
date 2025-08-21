# Icon Picker block

Status: Alpha
Version: 0.1-alpha
Last Updated: 2025-08
Component Created By: Saulo Padilha

## What does this component do?

This is a set of three variations of a Icon Picker block. Developers can choose the one that best fits their project:
- **IconPicker**: Uses a custom SVG icon library (already included in Moose).
- **IconPicker (FontAwesome)**: Uses Font Awesome icons.
- **IconPicker (MS Fabric)**: Uses Microsoft UI Fabric icons rendered via Unicode values from a custom font (`fabric-icons.woff`).

## Moose Implementation

All versions support:

- Theme or custom color palettes (for background and icon colors)
- Adjustable container size and padding
- Optional rounded shape
- Accessible labels via custom input
- Live preview of selected icon and styles

Developers can choose the appropriate version based on project needs. The MS Fabric version is ideal for Microsoft-branded environments.


### 🛠️ Installation Instructions

#### General setup

1. Copy the block directories you want to use to `themes/core/blocks/tribe/`

Includes:

- `icon-picker`
- `icon-picker-font-awesome`
- `icon-picker-ms-fabric`

2. Register the blocks in `plugins/core/src/Blocks/Blocks_Definer.php`:

```php
self::TYPES => DI\add( [
  'tribe/icon-picker',
  'tribe/icon-picker-font-awesome',
  'tribe/icon-picker-ms-fabric',
] )
```

3. (Optional) In `edit.js`, switch between:
- Option 1: Use `theme.json` color palette (default)
- Option 2: Use a custom color array for icons/background

---

### IconPicker (Custom Icons)

1. Install SVGR CLI package as a dev dependency:  
   `npm install --save-dev @svgr/cli`
2. Add these scripts to your root `package.json`:

```json
"scripts": {
  "icon-picker": "npm run icon-picker:generate-components && rm -f $npm_package_config_coreThemeBlocksDir/tribe/icon-picker/icons/components/index.js && npm run icon-picker:generate-icons-list && npm run icon-picker:strip-react-import && npm run icon-picker:lint",
  "icon-picker:generate-components": "svgr --icon --out-dir=$npm_package_config_coreThemeBlocksDir/tribe/icon-picker/icons/components $npm_package_config_coreThemeBlocksDir/tribe/icon-picker/icons/svg",
  "icon-picker:generate-icons-list": "node $npm_package_config_coreThemeBlocksDir/tribe/icon-picker/scripts/generate-icons-list.js",
  "icon-picker:lint": "wp-scripts lint-js \"$npm_package_config_coreThemeBlocksDir/tribe/icon-picker/**/*.js\" --fix",
  "icon-picker:strip-react-import": "node $npm_package_config_coreThemeBlocksDir/tribe/icon-picker/scripts/strip-react-import.js"
}
```
3. Run `npm install` to install dependencies.
4. Copy the block directory into `themes/core/blocks/tribe/`.
5. Add `tribe/icon-picker` to the `self::TYPES` array in `plugins/core/src/Blocks/Blocks_Definer.php`.
6. Run `npm run dist` to build the blocks.

#### Adding new svg icons

1. Add new SVGs to `icon-picker/icons/svg/`.
2. Ensure each SVG uses `currentColor` for fills and strokes.
3. Run `npm run icon-picker` to generate the icon components.

This will:
- Convert all SVGs from `icons/svg/` into React components in `icons/components/`
- Generate the `icons-list.js` file
- Lint and auto-fix the icons directory
- Strip the `import * as React` line from each generated file. SVGR adds it by default and it is unnecessary for these components and can trigger a linting error unless `react` is listed as a project dependency

### IconPicker (FontAwesome)

1. Install the required packages as a dependency in your project: `npm install @fortawesome/react-fontawesome @fortawesome/free-solid-svg-icons`.
2. Run `npm install` to install the dependency
3. Copy the block directory into `themes/core/blocks/tribe/`.
4. Add `tribe/icon-picker-font-awesome` to the `self::TYPES` array in `plugins/core/src/Blocks/Blocks_Definer.php`.

### Block Usage

1. Add the Icon Picker block to a page.
2. Select an icon.
3. In Colors, adjust the icon and background colors.
4. In Dimensions, set the container size and padding. Use the Rounded Icon toggle to change the wrapper shape.
5. Save and view on the frontend to confirm the icon renders as expected.

## Media

- [[Demo video](https://www.loom.com/share/97c0c1f028084e01941dd618fe2cbb25?sid=e21f9268-2051-486d-ba96-3432a0c590cb)]
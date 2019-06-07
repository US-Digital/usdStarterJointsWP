Currently using Foundation 6.5.1.

## JointsWP Requirements

JointsWP requires [Node.js](https://nodejs.org) v6.9.x or newer. This doesn't mean you need to understand Node (or even Gulp) - it's just the steps we need to take to make sure all of our development tools are installed.

## Getting Started

### Download our Foundation Boilerplate and install dependencies with npm

```bash
$ cd my-wordpress-folder/wp-content/themes/
$ git clone https://github.com/andyUSDigital/usdStarterJointsWP.git
$ cd usdStarterJointsWP
$ npm install
```

At this point the theme should be fully installed and ready to start development.

## Working with JointsWP

### Watching for Changes

```bash
$ npm run watch
```

- Watches for changes in the `assets/styles/scss` directory. When a change is made the SCSS files are compiled, concatenated with Foundation files and saved to the `/styles` directory. Sourcemaps will be created.
- Watches for changes in the `assets/scripts/js` directory. When a change is made the JS files are compiled, concatenated with Foundation JS files and saved to the `/scripts` directory. Sourcemaps will be created.
- Watches for changes in the `assets/images` directory. When a change is made the image files are optimized and saved over the original image.

### Watching for Changes with Browsersync

```bash
$ npm run browsersync
```

This will watch the same files as `npm run watch`, but utilizes browsersync for live reloading and style injection. Be sure to update the `URL` variable in the `gulpfile.js` to your local install URL.

## Compile and Minify All Theme Assets

```bash
$ npm run build
```

Compiles and minifies all scripts and styles.

### Compile Specific Assets

- `$ npm run styles` - to compile all SCSS files in the `assets/styles/scss` directory.
- `$ npm run scripts` - to compile all JS files in the `assets/scripts/js` directory.
- `$ npm run images` - to optimize all image files in the `assets/images` directory.

## File Structure - "Where to Put Stuff"

### Custom Styles

- `style.css` - this file is never actually loaded, however, this is where you set your theme name and is required by WordPress
- `assets/styles/scss/style.scss` - import all of your styles here. If you create an additional SCSS file, be sure to import it here.
- `assets/styles/scss/_main.scss` - place all of your custom styles here.
- `assets/styles/scss/_settings.scss` - adjust Foundation style settings here.
- `assets/styles/scss/login.scss` - place custom login styles here. This will generate it's own stylesheet.

### Custom Scripts

- `assets/scripts/js/` - place your custom scripts here. Each .JS file will be compiled and concatenated when the build process is ran.

### Images

- `assets/images/` - place your theme images here. Each image will be optimized when the build process is ran.

## Theme Installation - WordPress

### Theme Details

Change `style.css` in the root directory to update the theme details which are shown in the WordPress backend.

### Theme Image

Change `screenshot.png` in the root directory to change the image for the theme installation, as shown in the WordPress backend.

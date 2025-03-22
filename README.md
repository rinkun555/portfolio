# Rio Suzuki Portfolio

## SASS Setup

This project uses SASS for styling. The main source file is `styles.scss` which compiles to `styles.css`.

### Installation

1. Make sure you have Node.js installed
2. Run `npm install` to install dependencies

### Development

Run the following command to watch for SASS changes and compile automatically:

```bash
npm run sass
```

### Build for Production

To build minified CSS for production, run:

```bash
npm run build-sass
```

### Structure

The SASS file is organized with:
- Variables at the top for colors and other reusable values
- Mixins for responsive design and common patterns
- Structured nested selectors following the HTML hierarchy
- Components grouped by function

When editing styles, modify the `.scss` file, not the compiled `.css` file directly.
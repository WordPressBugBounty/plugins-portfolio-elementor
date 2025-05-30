# PowerFolio PRO User Guide

This guide explains how to use PowerFolio PRO to create beautiful portfolios and image galleries in WordPress.

## Creating Portfolio Items

PowerFolio PRO creates a custom post type called "Portfolio" that you can use to add your portfolio items.

### Adding a New Portfolio Item

1. In your WordPress dashboard, go to **Portfolio** → **Add New Item**
2. Enter a title for your portfolio item
3. Add content in the editor
4. Set a featured image (this will be displayed in your portfolio grid)
5. Assign the item to a Portfolio Category (for filtering)
6. Publish your portfolio item

### Managing Portfolio Categories

Portfolio categories allow you to organize your portfolio items and provide filtering options:

1. Go to **Portfolio** → **Portfolio Categories**
2. Add new categories as needed
3. Each portfolio item can be assigned to multiple categories

## Creating a Portfolio Display

You can create portfolio displays using Elementor, Gutenberg blocks, or shortcodes.

### Using Elementor

1. Edit a page with Elementor
2. Find the **PowerFolio Portfolio** widget in the Elementor widget panel (under "Powerfolio / Power-Ups for Elementor")
3. Drag and drop the widget into your page
4. Configure the widget settings:
   - **Layout**: Choose columns, spacing, and style
   - **Filter**: Enable/disable category filtering
   - **Hover Effect**: Select from various hover animations
   - **Colors**: Customize colors for text and overlays
   - **Query**: Choose which portfolio items to display

### Using Gutenberg

1. Edit a page with Gutenberg
2. Click the "+" button to add a block
3. Search for "Portfolio" and select the "PowerFolio Portfolio" block
4. Configure the block settings in the sidebar

### Using Shortcodes

Use the `[powerfolio]` shortcode to display your portfolio:

```
[powerfolio columns="3" showfilter="yes" style="masonry"]
```

See the [Shortcodes](shortcodes.md) documentation for all available options.

## Creating an Image Gallery

### Using Elementor

1. Edit a page with Elementor
2. Find the **PowerFolio Image Gallery** widget
3. Drag and drop the widget into your page
4. Upload images or select from your media library
5. Configure layout and display options

### Using Gutenberg

1. Edit a page with Gutenberg
2. Click the "+" button to add a block
3. Search for "Image Gallery" and select the "PowerFolio Image Gallery" block
4. Upload images and configure settings

## Creating a Portfolio Carousel

The Portfolio Carousel widget allows you to display your portfolio items in a carousel/slider format.

1. Edit a page with Elementor
2. Find the **PowerFolio Portfolio Carousel** widget
3. Drag and drop the widget into your page
4. Configure carousel settings like slidesToShow, autoplay, and navigation

## Using Post and Product Grids

PowerFolio PRO also includes widgets for displaying blog posts and WooCommerce products:

### Post Grid Widget

1. Edit a page with Elementor
2. Find the **PowerFolio Post Grid** widget
3. Configure settings to display your blog posts in a grid layout

### Product Grid Widget (requires WooCommerce)

1. Edit a page with Elementor
2. Find the **PowerFolio Product Grid** widget
3. Configure settings to display your products in a grid layout

## Customizing Appearance

Each widget and block provides extensive customization options:

- **Layout**: Adjust columns, spacing, and alignment
- **Filters**: Show/hide category filters
- **Colors**: Customize text, background, and overlay colors
- **Typography**: Change font styles for titles and descriptions
- **Hover Effects**: Choose from various hover animations
- **Lightbox Options**: Configure lightbox behavior for images

## Performance Optimization

For best performance:

1. Optimize your images before uploading
2. Use appropriately sized images
3. Consider enabling lazy loading in the plugin settings

For more advanced options, please see the [Technical Reference](technical-reference.md) documentation.

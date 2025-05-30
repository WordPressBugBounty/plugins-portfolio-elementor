# PowerFolio Technical Reference

This technical reference is designed for developers who want to understand the architecture of PowerFolio, extend its functionality, or integrate it with other plugins and themes. This documentation applies to both the free and PRO versions, with PRO-specific features clearly marked.

## Plugin Architecture

PowerFolio follows an object-oriented architecture with separate classes for different functionality:

```
portfolio-elementor/
├── assets/                    # Frontend assets (CSS, JS, images)
├── build/                     # Compiled Gutenberg blocks
├── classes/                   # Core plugin classes
│   ├── Powerfolio_Portfolio.php         # Portfolio post type and functionality
│   ├── Powerfolio_Image_Gallery.php     # Image gallery functionality
│   ├── Powerfolio_Carousel.php          # Carousel functionality
│   ├── Powerfolio_Post_Grid.php         # Post grid functionality
│   ├── Powerfolio_Product_Grid.php      # WooCommerce product grid functionality
│   ├── Powerfolio_Common_Settings.php   # Shared settings between widgets
│   ├── Powerfolio_Gutenberg.php         # Gutenberg integration
│   ├── Powerfolio_Shortcode_Generator.php # Shortcode generator
│   └── Powerfolio_Feedback_Notice.php   # Admin feedback notices
├── elementor/                 # Elementor integration
│   ├── elementor-widgets/     # Widget definitions
│   ├── load_elementor.php     # Elementor loading logic
│   └── Register_Powerfolio_Elementor_Widgets.php  # Widget registration
├── includes/                  # Additional plugin functionality
│   ├── functions.php          # Helper functions
│   └── panel.php              # Admin panel settings
├── languages/                 # Translation files
├── src/                       # Source files for Gutenberg blocks
├── vendor/                    # Third-party libraries
└── portfolio-elementor.php    # Main plugin file
```

## Core Classes

### Powerfolio_Portfolio

This is the main class for the portfolio functionality. It handles:

- Registration of the portfolio custom post type
- Registration of the portfolio taxonomy
- Portfolio shortcode functionality
- Portfolio grid generation
- Filters for portfolio items
- Portfolio item styling and layout

Key methods:
- `register_portfolio_post_type()` - Registers the portfolio custom post type
- `create_portfolio_taxonomies()` - Creates the portfolio category taxonomy
- `get_portfolio_shortcode_output()` - Generates the portfolio grid output
- `get_grid_filter()` - Generates the category filter

### Powerfolio_Image_Gallery

This class handles the image gallery functionality, allowing users to create galleries directly from the media library without creating portfolio items.

Key methods:
- `process_settings_from_gutenberg_block()` - Processes Gutenberg block settings
- `get_image_gallery_template()` - Generates the image gallery output

### Powerfolio_Carousel

This class provides the carousel/slider functionality for portfolio items.

Key methods:
- `is_carousel_enabled()` - Checks if the carousel feature is enabled
- `get_carousel_shortcode_content()` - Generates the carousel output

### Powerfolio_Common_Settings

This class contains settings and functions used across multiple widgets and features.

Key methods:
- `get_hover_styles()` - Gets the available hover styles
- `get_image_url()` - Gets the URL for an image based on ID or URL

### Register_Powerfolio_Elementor_Widgets

This class handles the registration of all Elementor widgets and loads their required assets.

Key methods:
- `on_widgets_registered()` - Hook callback when Elementor widgets are registered
- `includes()` - Includes the widget definition files
- `register_widget()` - Registers the widgets with Elementor

## Database Schema

### Custom Post Types

**elemenfolio** - The portfolio post type
- Standard WordPress fields (post_title, post_content, etc.)
- Featured image (set as post thumbnail)

### Custom Taxonomies

**elemenfoliocategory** - The portfolio category taxonomy
- Hierarchical taxonomy (like WordPress categories)
- Used for filtering portfolio items

### Options

PowerFolio PRO stores various settings in the WordPress options table:

- `elpt-installDate` - The installation date (used for review notices)

## Front-end Assets

### CSS Files

- `powerfolio_css.css` - Main styles for portfolio and image gallery
- `pwrgrids_css.css` - Styles for post and product grids

### JavaScript Files

- `custom-portfolio.js` - Main portfolio functionality
- `custom-portfolio-elementor.js` - Elementor-specific portfolio functionality
- `custom-portfolio-gutenberg.js` - Gutenberg-specific portfolio functionality
- `custom-portfolio-lightbox.js` - Lightbox functionality
- `custom-carousel-portfolio.js` - Carousel functionality
- `pwrgrids-custom-js.js` - Post and product grid functionality

### Third-party Libraries

- **Isotope/Packery** - Used for masonry and grid layouts
- **SimpleLightbox** - Used for image lightbox functionality
- **Owl Carousel** - Used for carousel/slider functionality

## Integration Points

### Elementor Integration

PowerFolio PRO integrates with Elementor through the following hooks:

- `elementor/widgets/widgets_registered` - Registers custom widgets
- `elementor/frontend/before_register_scripts` - Registers frontend scripts
- `elementor/editor/before_enqueue_scripts` - Registers editor scripts

### Gutenberg Integration

PowerFolio PRO registers custom blocks for the Gutenberg editor:

- Portfolio Block
- Image Gallery Block

Blocks are registered using the WordPress block registration API.

### WooCommerce Integration

The Product Grid widget integrates with WooCommerce to display products. It checks for the existence of the WooCommerce class before loading product-related functionality.

## Extending the Plugin

### Adding Custom Hover Effects

1. Use the `powerfolio_hover_effects` filter to add new hover effects
2. Add the necessary CSS styles for your custom hover effect

Example:
```php
add_filter('powerfolio_hover_effects', function($hover_effects) {
    $hover_effects['custom-hover'] = 'My Custom Hover';
    return $hover_effects;
});
```

### Adding Custom Portfolio Template

1. Create a custom template file in your theme
2. Use the `powerfolio_single_template` filter to specify your template

Example:
```php
add_filter('powerfolio_single_template', function($template) {
    $custom_template = get_stylesheet_directory() . '/custom-portfolio-template.php';
    if (file_exists($custom_template)) {
        return $custom_template;
    }
    return $template;
});
```

### Modifying Query Arguments

Use the `powerfolio_query_args` filter to modify the query arguments for portfolio items:

```php
add_filter('powerfolio_query_args', function($args, $settings) {
    // Modify $args
    $args['posts_per_page'] = 10;
    return $args;
}, 10, 2);
```

## Performance Considerations

1. **Image Optimization**
   - PowerFolio PRO uses WordPress image sizes for thumbnails
   - Recommend users install an image optimization plugin

2. **Script Loading**
   - Scripts are only loaded when needed
   - Isotope and other libraries are loaded with dependency management

3. **Database Queries**
   - Portfolio queries use standard WP_Query with caching
   - Consider adding query caching for high-traffic sites

## Debugging

For debugging PowerFolio PRO:

1. Enable WordPress debug mode in wp-config.php:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

2. Check for JavaScript errors in the browser console

3. Use the `powerfolio_debug` filter to enable additional debug output:
```php
add_filter('powerfolio_debug', '__return_true');
```

## Upgrade Considerations

When upgrading from older versions:

1. Portfolio post type and taxonomy registrations may change
2. Shortcode parameters might be enhanced or deprecated
3. CSS class names might change (though we try to maintain backwards compatibility)

Always test upgrades on a staging environment first.

## Integrating with Other Plugins

### Advanced Custom Fields (ACF)

You can extend portfolio items with custom fields using ACF:

1. Create custom fields for the 'elemenfolio' post type
2. Use the `powerfolio_item_output` filter to include custom field data in the output

Example:
```php
add_filter('powerfolio_item_output', function($output, $post, $settings, $widget) {
    // Get ACF field
    $client = get_field('client', $post['ID']);
    
    if ($client) {
        // Add client info to portfolio item
        $client_html = '<div class="portfolio-item-client">' . esc_html($client) . '</div>';
        $output = str_replace('</div></div>', $client_html . '</div></div>', $output);
    }
    
    return $output;
}, 10, 4);
```

### Yoast SEO

PowerFolio PRO works with Yoast SEO for portfolio items. Yoast will automatically add meta data for portfolio items.

### Caching Plugins

PowerFolio PRO is compatible with most caching plugins. For optimal performance:

1. Enable CSS and JavaScript minification
2. Consider excluding dynamic portfolio pages from cache if using AJAX filtering
3. Purge cache after adding or updating portfolio items

## Localization

PowerFolio PRO is fully translatable:

1. Translation files are located in the `languages/` directory
2. The text domain is 'powerfolio'
3. Translations can be made using standard WordPress localization tools

Example of loading translations:
```php
load_plugin_textdomain('powerfolio', false, dirname(plugin_basename(__FILE__)) . '/languages');
```

## Additional Resources

- [WordPress Plugin API](https://developer.wordpress.org/plugins/)
- [Elementor Developer Resources](https://developers.elementor.com/)
- [WooCommerce Developer Documentation](https://woocommerce.github.io/code-reference/)
- [Gutenberg Block Development](https://developer.wordpress.org/block-editor/)

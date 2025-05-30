# PowerFolio Hooks and Filters

This document outlines the available hooks and filters that developers can use to extend and customize the PowerFolio plugin. These hooks work in both free and PRO versions unless otherwise specified.

## Portfolio Post Type Filters

### `elpt_portfolio_cpt_slug_rewrite`
Customize the URL slug for the portfolio post type.

**Default:** 'portfolio'

**Example:**
```php
add_filter('elpt_portfolio_cpt_slug_rewrite', function($slug) {
    return 'work'; // Changes portfolio URL from /portfolio/ to /work/
});
```

### `elpt_portfolio_cpt_has_archive`
Enable or disable archive page for portfolio post type.

**Default:** false

**Example:**
```php
add_filter('elpt_portfolio_cpt_has_archive', function($has_archive) {
    return true; // Enable archive page for portfolio items
});
```

### `elpt_portfolio_cpt_name`
Customize the portfolio post type name in admin menu.

**Default:** 'Portfolio'

**Example:**
```php
add_filter('elpt_portfolio_cpt_name', function($name) {
    return 'Projects'; // Changes the name from 'Portfolio' to 'Projects'
});
```

### `elpt_elemenfoliocategory_slug_rewrite`
Customize the URL slug for the portfolio category taxonomy.

**Default:** 'portfoliocategory'

**Example:**
```php
add_filter('elpt_elemenfoliocategory_slug_rewrite', function($slug) {
    return 'project-category'; // Changes taxonomy URL slug
});
```

## Portfolio Grid and Filtering Filters

### `elpt_tax_text`
Customize the "All" text in portfolio filters.

**Default:** 'All'

**Example:**
```php
add_filter('elpt_tax_text', function($text) {
    return 'Everything'; // Changes 'All' to 'Everything' in filter buttons
});
```

### `elpt_tax_text_filter`
Customize the data filter attribute for the "All" button.

**Default:** '*'

**Example:**
```php
add_filter('elpt_tax_text_filter', function($filter) {
    return '.all'; // Changes data filter value
});
```

### `elpt_tax_terms_list`
Modify the list of terms used in portfolio filters.

**Example:**
```php
add_filter('elpt_tax_terms_list', function($terms) {
    // $terms is an array of WP_Term objects
    // You can add, remove, or modify terms
    return $terms;
});
```

### `elpt_gallery_terms_list`
Modify the list of terms used in image gallery filters.

**Example:**
```php
add_filter('elpt_gallery_terms_list', function($terms) {
    // $terms is an array of manually defined terms for image galleries
    return $terms;
});
```

## Layout and Style Filters

### `powerfolio_custom_style_class_filter`
Add custom CSS class to the portfolio grid.

**Default:** 'elpt-portfolio-purchased-grid'

**Example:**
```php
add_filter('powerfolio_custom_style_class_filter', function($class) {
    return $class . ' my-custom-portfolio-class';
});
```

### `powerfolio_custom_isotope_class_filter`
Add custom CSS class to the isotope container.

**Default:** 'elpt-portfolio-content-isotope'

**Example:**
```php
add_filter('powerfolio_custom_isotope_class_filter', function($class) {
    return $class . ' my-custom-isotope-class';
});
```

### `powerfolio_custom_cols_class_filter`
Customize the columns class for the portfolio grid.

**Default:** 'elpt-portfolio-columns-3'

**Example:**
```php
add_filter('powerfolio_custom_cols_class_filter', function($class) {
    return 'elpt-portfolio-columns-4'; // Changes default to 4 columns
});
```

## Image Processing Filters

### `powerfolio_filter_image_url`
Modify the URL of images used in portfolio items and galleries.

**Example:**
```php
add_filter('powerfolio_filter_image_url', function($image_url, $img_identifier, $img_size) {
    // $image_url: The original image URL
    // $img_identifier: Image ID or URL
    // $img_size: The requested image size
    
    // You can modify the URL, apply CDN, etc.
    return $image_url;
}, 10, 3);
```

## Lightbox Filters

### `elpt-enable-simple-lightbox`
Enable or disable the built-in lightbox functionality.

**Default:** true

**Example:**
```php
add_filter('elpt-enable-simple-lightbox', function($enabled) {
    return false; // Disable the default lightbox
});
```

## Post and Product Grid Filters

### `pwgd_posts_all_button_data_filter`
Customize the data filter attribute for the "All" button in post and product grids.

**Default:** '*'

**Example:**
```php
add_filter('pwgd_posts_all_button_data_filter', function($filter) {
    return '.all-posts';
});
```

### `pwgd_posts_tax_text`
Customize the "All" text in post and product grid filters.

**Default:** 'All'

**Example:**
```php
add_filter('pwgd_posts_tax_text', function($text) {
    return 'All Posts';
});
```

## Shortcode Generator Filters

### `powerfolio_shortcode_generator_enabled`
Enable or disable the shortcode generator in the TinyMCE editor.

**Default:** false

**Example:**
```php
add_filter('powerfolio_shortcode_generator_enabled', function($enabled) {
    return true; // Enable the shortcode generator
});
```

### `powerfolio_allowed_tinymce_hooks`
Control which admin pages the shortcode generator appears on.

**Default:** ['post.php', 'post-new.php']

**Example:**
```php
add_filter('powerfolio_allowed_tinymce_hooks', function($hooks) {
    return array_merge($hooks, ['page.php', 'page-new.php']); // Add to page editor too
});
```

## Actions

### `pe_fs_loaded`
Action fired after the Freemius SDK is loaded.

**Example:**
```php
add_action('pe_fs_loaded', function() {
    // Do something after Freemius is loaded
});
```

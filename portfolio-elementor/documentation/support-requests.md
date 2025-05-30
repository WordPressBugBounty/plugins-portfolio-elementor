# PowerFolio PRO - Common Support Requests and Solutions

This document contains common support requests for the PowerFolio plugin and their solutions. It serves as a reference for the support team to provide consistent answers.

## Table of Contents

1. [Random Order of Portfolio Items](#random-order-of-portfolio-items)
2. [Custom Portfolio Category Pages](#custom-portfolio-category-pages)
3. [Pagination Not Working on Mobile](#pagination-not-working-on-mobile)
4. [Undefined Array Key Pagination_postsperpage Error](#undefined-array-key-pagination_postsperpage-error)
5. [Custom Order for Portfolio Category Filters](#custom-order-for-portfolio-category-filters)
6. [Adding Website Links to Portfolio Images](#adding-website-links-to-portfolio-images)
7. [Creating Custom Project Pages with Elementor](#creating-custom-project-pages-with-elementor)
8. [Hiding Featured Images on Single Portfolio Pages](#hiding-featured-images-on-single-portfolio-pages)

---

## Random Order of Portfolio Items

### Request
> Hi! I'd like the order of the images in the "ALL" section to be random, rather than in order of upload. Is it possible to do that, please?

### Solution

```php
add_filter('pre_get_posts', function($query) {
    // Check if we're dealing with PowerFolio's portfolio post type
    if (!is_admin() && isset($query->query['post_type']) && $query->query['post_type'] == 'elemenfolio') {
        // Set random ordering
        $query->set('orderby', 'rand');
    }
    return $query;
});
```

This code will modify the WordPress query for portfolio items to display them in random order. Every time someone visits the page, the items will appear in a different random arrangement.

To make this solution more specific to certain pages only, the condition can be adjusted to check for specific page IDs as well.

**Technical Analysis:**
The PowerFolio plugin uses the standard WordPress `get_posts()` function to retrieve portfolio items, but doesn't provide a built-in filter for modifying the query arguments. Using the WordPress core `pre_get_posts` filter is the most reliable solution to intercept and modify the query before it's executed.

## Custom Portfolio Category Pages

### Request
> Hi i want to make a custom overview page when you click on a category.
>
> I use breadcrums, where you can click on a category and then you go to an overview page of that particular category: /portfoliocategory
> I would like to make this page custom, is this possible?

### Solution

Yes, you can definitely create a custom page for your portfolio categories! The easiest way to do this is using Elementor Theme Builder, which lets you design these pages visually without any coding.

Here's how to do it:

1. First, make sure you have Elementor Pro installed (Theme Builder is a Pro feature).

2. Go to Templates → Theme Builder in your WordPress dashboard.

3. Click "Add New" and select "Archive" template.

4. Give your template a name (like "Portfolio Category Template").

5. Click "Create Template".

6. Use Elementor to design your template however you want. You can add:
   - The Archive Title element to show the category name
   - The Portfolio widget from PowerFolio to display items from that category
   - Any other elements you'd like (headings, text, images, etc.)

7. When you're done designing, click "Publish".

8. In the display conditions popup, select "Portfolio Categories" under the "Include" section.

9. Click "Save & Close".

Now when someone clicks on a portfolio category in your breadcrumbs, they'll see your custom-designed page instead of the default one!

**Technical Analysis:**
The PowerFolio plugin registers a custom taxonomy `elemenfoliocategory` with the slug `portfoliocategory`. When using Elementor Theme Builder, it automatically detects this custom taxonomy and allows targeting archive templates to it specifically through the display conditions interface. This approach doesn't require any coding knowledge and leverages the visual editing capabilities of Elementor.

## Pagination Not Working on Mobile

### Request
> Hello, I'm using the Elementor Portfolio widget. In desktop it works well. But in mobile it does not work. Can you give me support? If you visit the link, there is pagination, but all the projects are the same. It seems that there is a break and the pagination isn't working. On the computer, everything is fine, but on mobile, the pagination doesn't work. If you click on one of the numbers, you'll see that the projects are always the same.

### Solution

This issue typically occurs due to a JavaScript conflict or cache problem on mobile devices. Here's how to fix it:

1. **Clear Cache**: First, clear both your browser cache and any caching plugin you might be using.

2. **Check for Plugin Conflicts**: Temporarily disable other plugins that might affect JavaScript execution (like optimization plugins) to see if that resolves the issue.

3. **Update to Latest Version**: Make sure you're using the latest version of PowerFolio, as pagination issues have been addressed in recent updates.

4. **Add Custom CSS**: Sometimes adding this CSS fix can help with mobile pagination issues:

```css
@media (max-width: 767px) {
    .elpt-portfolio-pagination a {
        display: inline-block;
        min-width: 40px;
        margin: 0 3px;
        padding: 8px 5px;
    }
}
```

5. **Try Increasing Touch Target Size**: If the pagination buttons are too small on mobile, users might not be able to tap them correctly. The CSS above helps increase the touch target size.

**Technical Analysis:**
Mobile pagination issues often stem from either JavaScript conflicts, improper event handling on touch devices, or CSS issues that make pagination controls difficult to interact with on smaller screens. The solution addresses all these potential causes.



## Undefined Array Key Pagination_postsperpage Error

### Request
> I get the following error: Warning: Undefined array key "pagination_postsperpage" in /var/www/vhosts/39799043.servicio-online.net/construccionesyreformasunidas.es/wp-content/plugins/portfolio-elementor/elementor/elementor-widgets/portfolio_widget.php on line 530. How can I remove it?

### Solution

This error occurs because the plugin is trying to access a setting that hasn't been defined. There are two ways to fix this:

1. **Update to Latest Version**: This error has been fixed in PowerFolio version 3.1.2 and later. Updating to the latest version of the plugin should resolve the issue automatically.

2. **Quick Fix for Older Versions**: If you can't update for some reason, you can add this code to your theme's functions.php file or in a code snippets plugin:

```php
add_filter('powerfolio_shortcode_settings', function($settings) {
    if (!isset($settings['pagination_postsperpage'])) {
        $settings['pagination_postsperpage'] = 10; // Default value
    }
    return $settings;
});
```

3. **Hide PHP Errors**: If you prefer to just hide the error (not recommended as a permanent solution), you can add this to wp-config.php:

```php
// Hide all PHP errors
error_reporting(0);
@ini_set('display_errors', 0);
```

**Technical Analysis:**
The error occurs in the portfolio widget when pagination is enabled but the posts per page setting for pagination isn't properly initialized. The latest version of the plugin includes proper validation to prevent this error.

## Custom Order for Portfolio Category Filters

### Request
> I am working on portfolio page with filters. I am using this plugin with elementor page builder. I want to set custom order for portfolio categories in the filter. How can I achieve this functionality? Like "All | Category 1 | Category 2 | Category 3...."

### Solution

By default, PowerFolio displays categories in alphabetical order. To customize the order of categories in the filter, you can use the "Category Order and Taxonomy Terms Order" plugin:

1. Install and activate the [Category Order and Taxonomy Terms Order](https://wordpress.org/plugins/taxonomy-terms-order/) plugin.

2. After installation, go to Settings → Taxonomy Terms Order in your WordPress admin.

3. Select "Portfolio Categories" (elemenfoliocategory) from the dropdown menu.

4. Now you can drag and drop categories to set your preferred order.

5. Save your changes.

The PowerFolio filter will now display categories in the custom order you've set.

Alternatively, if you prefer a code solution, you can add this to your theme's functions.php file or in a code snippets plugin:

```php
add_filter('elpt_tax_terms_list', function($terms) {
    // Define your custom order by term slugs
    $custom_order = array('category-2', 'category-1', 'category-3');
    
    // Reorder terms
    $ordered_terms = array();
    foreach ($custom_order as $slug) {
        foreach ($terms as $term) {
            if ($term->slug === $slug) {
                $ordered_terms[] = $term;
            }
        }
    }
    
    // Add any remaining terms
    foreach ($terms as $term) {
        if (!in_array($term, $ordered_terms)) {
            $ordered_terms[] = $term;
        }
    }
    
    return $ordered_terms;
});
```

**Technical Analysis:**
PowerFolio uses the WordPress `get_terms()` function to retrieve taxonomy terms and displays them in the default order. The plugin provides the `elpt_tax_terms_list` filter hook that allows for modification of the terms array before it's used to generate the filter buttons.

---

## Adding Website Links to Portfolio Images

### Request
> I am trying to add a site link to my images. I have the paid pro version but I'm not seeing anywhere to add a link to the website when clicked.

### Solution

To add custom links to your images in PowerFolio PRO, you need to use the **Image Gallery (Powerfolio)** widget, not the Portfolio widget. Here's how to do it:

1. **Add the Image Gallery Widget**: Add the "Image Gallery (Powerfolio)" widget to your page (not to be confused with Elementor's default Image Gallery widget)

2. **Add Images to Your Gallery**: Upload or select the images you want to include in your gallery

3. **Configure Links for Each Image**: For each image in your gallery:
   - Expand the image settings by clicking on it
   - Find the "Image links to" dropdown menu
   - Change it from "Image (with Elementor default lightbox)" to "Custom URL"
   - In the URL field that appears, enter the full website address you want to link to

4. **Configure Additional Settings**: Set up other options like filters, layout, and styling as needed

5. **Save Your Changes**: Update your page to apply the changes

If you specifically need to use the Portfolio Widget instead, you would need to create individual portfolio item detail pages, and then add links to external sites on those pages.

**Technical Analysis:**
The Image Gallery widget in PowerFolio PRO includes a repeater field that allows custom URL configuration for each image individually. This functionality is not available in the main Portfolio widget, which only offers options to link to the image itself or to a project details page. The Image Gallery widget stores these custom URLs within the Elementor data structure and applies them when rendering the gallery.

---

## Creating Custom Project Pages with Elementor

### Request
> Hello,
> I would like to build a portfolio in which each item is a project page built in elementor. is this possible?

### Solution

Yes, this is definitely possible with PowerFolio! In fact, this is one of the core features of the plugin. Here's how you can build a portfolio where each item links to a custom project page built with Elementor:

1. **Create your portfolio items**: 
   - Go to PowerFolio → Add New
   - Add a title, featured image, and any other content for each portfolio item
   - Publish each item

2. **Build your project detail pages with Elementor**:
   - After creating the portfolio item, you can edit its single page with Elementor
   - Click on "Edit with Elementor" when viewing the portfolio item
   - Design your project page however you like with full Elementor capabilities
   - Add images, galleries, text, videos, or any other Elementor elements

3. **Configure your portfolio grid to link to these pages**:
   - Add the Portfolio widget to any page using Elementor
   - In the widget settings, under "Hover Effect Settings", set "Each project links to" option to "Project Details Page"
   - This will make each portfolio item in the grid link to its individual project page

The PowerFolio plugin uses a custom post type (elemenfolio) for portfolio items, which means each item automatically gets its own single page that you can fully customize with Elementor.

**Technical Analysis:**
PowerFolio creates a custom post type called 'elemenfolio' that integrates with Elementor. Each portfolio item is a full WordPress post with its own single view template that can be edited with Elementor. The portfolio grid widget can be configured to link directly to these single post pages by setting the 'Each project links to' option to 'Project Details Page', which creates internal links to the WordPress permalink structure for the custom post type.

---

## Hiding Featured Images on Single Portfolio Pages

### Request
> Featured Image problem
> how to use featured image without showing it on the top of its respective page

### Solution

The featured image appearing at the top of portfolio item pages is controlled by your theme, not directly by the PowerFolio plugin. Here's how to use featured images in your portfolio grid without displaying them at the top of individual project pages:

#### Method 1: Using CSS (Easiest Method)

Add this CSS code to your theme's Additional CSS section or a custom CSS plugin:

```css
.single-elemenfolio .entry-header img,
.single-elemenfolio .post-thumbnail {
    display: none !important;
}
```

This targets only the portfolio item pages and hides the featured image while keeping it visible in the portfolio grid.

#### Method 2: Using a Filter in functions.php

Add this code to your theme's functions.php file:

```php
function remove_featured_image_from_portfolio($html, $post_id) {
    if (get_post_type($post_id) === 'elemenfolio') {
        return '';
    }
    return $html;
}
add_filter('post_thumbnail_html', 'remove_featured_image_from_portfolio', 10, 2);
```

This approach removes the featured image HTML only for the portfolio post type.

#### Method 3: Using Elementor Theme Builder (Recommended)

1. Go to Templates → Theme Builder → Single
2. Create a new template for "Portfolio Items"
3. Set the conditions to apply to "Portfolio Items" (elemenfolio)
4. Design your custom single portfolio layout without including the featured image
5. Publish the template

This gives you complete control over how portfolio item pages appear and is the recommended approach for users who are already using Elementor.

#### Method 4: Using Theme Settings

Many themes have options to disable featured images on specific post types. Check your theme's settings panel for options like "Disable Featured Image" or "Post Type Settings."

**Technical Analysis:**
The PowerFolio plugin uses WordPress's featured image functionality for the portfolio grid, but the display of featured images on single post pages is controlled by the theme's single.php or singular.php template. The solutions above either override this template (Elementor Theme Builder), filter the HTML output (filter method), or use CSS to hide the featured image while preserving its presence in the template.


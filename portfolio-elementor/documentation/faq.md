# PowerFolio - Frequently Asked Questions

## General Questions

### What is PowerFolio?
PowerFolio is a WordPress plugin that allows you to create beautiful portfolios and image galleries using Elementor, Gutenberg blocks, or any page builder through shortcodes. It provides a custom portfolio post type, responsive grid layouts, filtering capabilities, and various display options. The plugin comes in both free and PRO versions, with the PRO version offering additional advanced features.

### What are the main features of PowerFolio?
- Custom portfolio post type with categories
- Responsive portfolio grid layouts
- Image gallery creation from media library
- Elementor widgets
- Gutenberg blocks
- Shortcodes
- Lightbox integration
- Category/tag filtering
- Hover effects
- Customizable colors and styling

Additional PRO features include:
- Portfolio carousel/slider
- Post and product grid displays
- Advanced hover effects
- Grid builder for custom layouts

### What's the difference between PowerFolio and PowerFolio PRO?
PowerFolio PRO includes all the features of the free version plus additional premium features such as:
- Portfolio carousel
- Post grid widget
- Product grid widget (for WooCommerce)
- Advanced filter options
- Additional hover effects
- More layout options
- Priority support

### Does PowerFolio work with my theme?
Yes, PowerFolio is designed to work with any properly coded WordPress theme. The plugin adds its own styling for portfolios and galleries, which should integrate seamlessly with your theme's design.

### Is PowerFolio compatible with page builders other than Elementor?
Yes. While PowerFolio offers dedicated Elementor widgets, you can use the plugin with any page builder through:
- Gutenberg blocks (for the WordPress block editor)
- Shortcodes (for any page builder that supports shortcodes)

## Installation & Setup

### How do I install PowerFolio?
1. For the free version, search for "PowerFolio" in the WordPress plugin repository or download from wordpress.org
2. For the PRO version, download the plugin from your account or purchase email
3. In your WordPress admin, go to Plugins → Add New → Upload Plugin
4. Choose the PowerFolio zip file and click "Install Now"
5. After installation completes, click "Activate Plugin"

### Why don't I see the PowerFolio widgets in Elementor?
If you don't see the PowerFolio widgets in Elementor, check the following:
1. Make sure both PowerFolio PRO and Elementor are activated
2. Check that you're using a compatible version of Elementor (minimum version 3.0)
3. Try deactivating and reactivating both plugins
4. Clear your browser cache and WordPress cache if using a caching plugin

### How do I create my first portfolio?
1. Go to Portfolio → Add New Item
2. Add a title and description
3. Set a featured image
4. Assign the item to a Portfolio Category
5. Publish the item
6. Create more portfolio items as needed
7. Use an Elementor widget, Gutenberg block, or shortcode to display your portfolio on a page

## Usage Questions

### How do I display my portfolio items on a page?
You can display your portfolio items using:
1. **Elementor**: Add the PowerFolio Portfolio widget to your page
2. **Gutenberg**: Add the PowerFolio Portfolio block to your page
3. **Shortcode**: Add the `[powerfolio]` shortcode to any page or post

### How do I create an image gallery without portfolio items?
You can create an image gallery directly from your media library using:
1. **Elementor**: Add the PowerFolio Image Gallery widget to your page
2. **Gutenberg**: Add the PowerFolio Image Gallery block to your page
3. Select images from your media library
4. Configure the layout and display options

### How do I enable filtering by category?
1. Make sure you've created multiple Portfolio Categories
2. Assign your portfolio items to these categories
3. When adding the portfolio grid to your page, enable the "Show Filter" option
4. Users will now be able to filter portfolio items by category

### Can I customize the "All" text in the filter?
Yes, you can customize the "All" text in the filter by:
1. In Elementor: Change the "All Button Text" setting
2. In Gutenberg: Change the "All Button Text" setting
3. With shortcode: Use the `tax_text` parameter (`[powerfolio tax_text="Everything"]`)
4. Using a filter hook: `add_filter('elpt_tax_text', function($text) { return 'Everything'; });`

### How do I create a masonry layout?
To create a masonry layout:
1. In Elementor: Set the "Layout" option to "Masonry"
2. In Gutenberg: Set the "Layout Style" to "Masonry"
3. With shortcode: Use the `style` parameter (`[powerfolio style="masonry"]`)

### How do I link portfolio items to lightbox instead of single pages?
To link portfolio items to a lightbox:
1. In Elementor: Set the "Link To" option to "Lightbox"
2. In Gutenberg: Set the "Link To" option to "Lightbox"
3. With shortcode: Use the `linkto` parameter (`[powerfolio linkto="image"]`)

### Can I display blog posts in a grid layout?
Yes, you can display blog posts in a grid layout using the PowerFolio Post Grid widget in Elementor. This widget allows you to select specific categories, set the number of posts, and customize the display of post elements like featured image, title, excerpt, etc.

### Does PowerFolio work with WooCommerce?
Yes, PowerFolio PRO includes a Product Grid widget that works with WooCommerce. This widget allows you to display your products in a grid layout with options for filtering by product category, showing sale badges, prices, ratings, and add-to-cart buttons.

## Styling & Customization

### Can I change the number of columns in the grid?
Yes, you can set the number of columns:
1. In Elementor: Use the "Columns" setting
2. In Gutenberg: Use the "Columns" setting
3. With shortcode: Use the `columns` parameter (`[powerfolio columns="4"]`)

### How do I customize the hover effect?
PowerFolio PRO includes multiple hover effects that you can select:
1. In Elementor: Choose from the "Hover Effect" dropdown
2. In Gutenberg: Select from the "Hover Effect" options
3. With shortcode: Use the `hover` parameter (`[powerfolio hover="hover3"]`)

You can also create custom hover effects using CSS and the hooks provided.

### Can I change the colors of the portfolio items?
Yes, you can customize colors:
1. In Elementor: Use the Style tab to set overlay color, title color, and category color
2. In Gutenberg: Use the color settings in the sidebar
3. With custom CSS: Target the PowerFolio CSS classes to override colors

### How do I make the portfolio responsive for mobile devices?
PowerFolio is responsive by default, but you can customize mobile behavior:
1. In Elementor: Use the "Columns (Mobile)" setting
2. In Gutenberg: Use the "Columns on Mobile" setting
3. With custom CSS: Add your own media queries

## Troubleshooting

### The filter buttons don't work
If filter buttons aren't working:
1. Make sure you've assigned categories to your portfolio items
2. Check for JavaScript errors in your browser console
3. Check if another plugin is conflicting with the Isotope library
4. Try a different browser to rule out browser issues
5. Disable other plugins one by one to identify conflicts

### Images don't load properly or look distorted
If images don't display correctly:
1. Make sure you've set featured images for your portfolio items
2. Check that your images are properly sized (recommended minimum: 800×600 pixels)
3. Try regenerating thumbnails using a plugin like "Regenerate Thumbnails"
4. Check if your theme is overriding image sizes

### The layout looks broken on mobile
If the layout doesn't look right on mobile:
1. Adjust the "Columns (Mobile)" setting to a lower value (1 or 2)
2. Check if your theme has conflicting responsive styles
3. Make sure you're not using too many columns for mobile
4. Test with a simpler hover effect that works better on touch devices

### The lightbox doesn't open
If the lightbox doesn't work:
1. Make sure "Link To" is set to "Lightbox"
2. Check for JavaScript errors in the browser console
3. Check if another plugin is already adding a lightbox that might conflict
4. Try disabling other plugins one by one to identify conflicts

## Advanced Questions

### Can I add custom fields to portfolio items?
Yes, you can add custom fields to portfolio items using:
1. Advanced Custom Fields (ACF) plugin
2. Custom code to display the fields (see Technical Reference)
3. Custom templates for single portfolio items

### How do I customize the single portfolio item template?
To customize the single portfolio item template:
1. Create a file named `single-elemenfolio.php` in your theme
2. Copy the structure from your theme's `single.php` file
3. Customize it as needed
4. For more advanced customization, use the `powerfolio_single_template` filter

### Can I use PowerFolio with custom post types?
The core PowerFolio functionality is designed for its own portfolio post type, but you can:
1. Use the Post Grid widget to display any post type
2. Use filter hooks to modify the post type query
3. Create custom integration using the technical documentation

### Is PowerFolio compatible with WPML/Polylang for multilingual sites?
Yes, PowerFolio PRO is compatible with multilingual plugins:
1. The portfolio post type and taxonomy can be translated
2. All strings in the plugin are translatable
3. The plugin uses WordPress localization standards

### How do I optimize PowerFolio for performance?
To optimize performance:
1. Optimize your images before uploading
2. Limit the number of items per page (20-30 max)
3. Use pagination for large portfolios
4. Enable lazy loading if your theme supports it
5. Use a caching plugin for your WordPress site

## Support & Updates

### How do I get support?
Support is available through:
1. The documentation (you're reading it now)
2. Email support: support@pwrplugins.com
3. Our support portal: https://powerfoliowp.com/support/

### How often is PowerFolio PRO updated?
PowerFolio PRO receives regular updates:
1. Major updates: 2-3 times per year with new features
2. Minor updates: Monthly for improvements and bug fixes
3. Compatibility updates: As needed for WordPress, Elementor, and WooCommerce updates

### How do I update PowerFolio PRO?
You can update PowerFolio PRO:
1. Through WordPress admin (Plugins → Installed Plugins)
2. By downloading the latest version from your account and installing manually

### My license has expired. What happens now?
If your license expires:
1. The plugin will continue to work
2. You won't receive updates or support
3. You can renew your license at any time to restore updates and support

# PowerFolio Gutenberg Blocks

PowerFolio includes Gutenberg blocks that allow you to add portfolios and image galleries to your content using the WordPress block editor. These blocks are available in both the free and PRO versions, with some features exclusive to the PRO version.

## Available Blocks

PowerFolio provides the following Gutenberg blocks:

1. **PowerFolio Portfolio Block** - Display your portfolio items in a responsive grid
2. **PowerFolio Image Gallery Block** - Create image galleries from your media library

## Using the Portfolio Block

### Adding the Portfolio Block

1. Edit a page or post with the Gutenberg editor
2. Click the "+" button to add a new block
3. Search for "portfolio" or navigate to the "PowerFolio" category
4. Select the "PowerFolio Portfolio" block

### Block Settings

The Portfolio Block offers the following settings in the sidebar panel:

#### Layout Settings
- **Layout Style**: Choose between Masonry, Grid, or Special layout
- **Columns**: Select the number of columns (1-6)
- **Columns on Mobile**: Select the number of columns on mobile devices
- **Margin Between Items**: Enable/disable margin between portfolio items

#### Filter Settings
- **Show Filter**: Enable/disable category filtering
- **All Button Text**: Customize the text for the "All" filter button

#### Query Settings
- **Categories**: Select specific portfolio categories to display
- **Posts Per Page**: Set the number of items to display
- **Pagination**: Enable/disable pagination (PRO only)
- **Posts Per Page (Pagination)**: Set the number of items per page when pagination is enabled (PRO only)

#### Item Settings
- **Link To**: Choose where clicking an item leads (Project Page, Lightbox, or Custom URL)
- **Open in New Tab**: Enable/disable opening links in a new browser tab
- **Hover Effect**: Select from hover animation effects (limited selection in free version, expanded in PRO)
- **Zoom Effect**: Enable/disable zoom effect on hover (PRO only)
- **Hide Title**: Show/hide the item title (PRO only)
- **Hide Category**: Show/hide the item category (PRO only)

### Appearance Customization

You can customize the appearance of the Portfolio Block using the following settings:

- **Item Overlay Color**: Set the background color of the overlay on hover
- **Title Color**: Set the color for item titles
- **Category Color**: Set the color for category text
- **Filter Buttons Style**: Customize the style of filter buttons

## Using the Image Gallery Block

### Adding the Image Gallery Block

1. Edit a page or post with the Gutenberg editor
2. Click the "+" button to add a new block
3. Search for "image gallery" or navigate to the "PowerFolio" category
4. Select the "PowerFolio Image Gallery" block

### Block Settings

The Image Gallery Block offers the following settings in the sidebar panel:

#### General Settings
- **Images**: Select multiple images from your media library
- **Layout Style**: Choose between Masonry, Grid, or Special layout
- **Columns**: Select the number of columns (1-6)
- **Columns on Mobile**: Select the number of columns on mobile devices
- **Margin Between Items**: Enable/disable margin between gallery items

#### Gallery Item Settings
For each image, you can configure:
- **Title**: Add a title for the image (shown on hover)
- **Description**: Add a short description (shown on hover)
- **Tags/Categories**: Add tags for filtering (comma-separated)
- **Link To**: Choose where clicking leads (Lightbox, Media File, Custom URL, or None)
- **Custom URL**: Specify a custom URL (if Link To is set to "Custom URL")

#### Filter Settings
- **Show Filter**: Enable/disable tag filtering
- **All Button Text**: Customize the text for the "All" filter button

#### Item Settings
- **Open in New Tab**: Enable/disable opening links in a new browser tab
- **Hover Effect**: Select from various hover animation effects
- **Zoom Effect**: Enable/disable zoom effect on hover
- **Hide Title**: Show/hide the item title
- **Hide Category**: Show/hide the item category

### Appearance Customization

You can customize the appearance of the Image Gallery Block using the following settings:

- **Item Overlay Color**: Set the background color of the overlay on hover
- **Title Color**: Set the color for image titles
- **Category Color**: Set the color for tag/category text
- **Filter Buttons Style**: Customize the style of filter buttons

## Block vs. Widget Comparison

### Advantages of Gutenberg Blocks

1. **Native Integration**: Blocks integrate seamlessly with the WordPress block editor
2. **Content Flow**: Blocks can be placed anywhere within your content, mixed with other blocks
3. **No Page Builder Required**: You don't need Elementor to use blocks
4. **Reusable Blocks**: You can save blocks as reusable blocks for use across your site

### Differences from Elementor Widgets

While the Gutenberg blocks share most functionality with their Elementor widget counterparts, there are some differences:

1. **Styling Options**: Blocks have fewer styling options compared to Elementor widgets
2. **Real-time Preview**: Changes may require you to update the block to see the preview
3. **Interface**: The settings are displayed in the sidebar rather than a popup panel

## Performance Considerations

For optimal performance with PowerFolio blocks:

1. Optimize your images before uploading them
2. Set a reasonable Posts Per Page value
3. Enable pagination for large portfolios
4. Consider using a caching plugin for your WordPress site

## Troubleshooting

**Issue**: Block editor becomes slow with many images
**Solution**: Reduce the number of images in a single gallery or split into multiple blocks

**Issue**: Blocks not appearing in the block inserter
**Solution**: Make sure the plugin is properly activated and try refreshing the page

**Issue**: Filters not working correctly
**Solution**: Ensure portfolio items have categories assigned or gallery images have tags

## Advanced Customization

Advanced users can customize the blocks further using:

1. **Block Styles**: Add custom block styles via theme.json
2. **Custom CSS**: Add custom CSS to target specific block elements
3. **Hooks and Filters**: Use the available hooks to modify block behavior

See the [Hooks and Filters](hooks-and-filters.md) documentation for ways to customize blocks programmatically.

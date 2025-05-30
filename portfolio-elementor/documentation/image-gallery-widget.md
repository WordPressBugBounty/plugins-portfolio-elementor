# PowerFolio Image Gallery Widget

The Image Gallery Widget allows you to create beautiful, filterable image galleries from your media library without having to create portfolio items first. This widget is available in both the free and PRO versions, with some advanced features exclusive to the PRO version.

## Adding the Widget in Elementor

1. Edit a page with Elementor
2. In the Elementor panel, search for "Image Gallery" or navigate to the "Powerfolio / Power-Ups for Elementor" section
3. Drag and drop the "PowerFolio Image Gallery" widget into your page

## Widget Settings

The Image Gallery Widget offers the following settings sections:

### Content Settings

| Setting | Description |
|---------|-------------|
| **Images** | Select multiple images from your media library |
| **Layout** | Choose between Masonry, Grid, or Special layout |
| **Columns** | Select the number of columns (1-6) |
| **Columns (Mobile)** | Select the number of columns on mobile devices |
| **Show/Hide Margin** | Toggle margin between gallery items |

### Gallery Item Settings

For each image in your gallery, you can configure:

| Setting | Description |
|---------|-------------|
| **Title** | Add a title for the image (shown on hover) |
| **Description** | Add a short description (shown on hover) |
| **Tags/Categories** | Add tags for filtering (comma-separated) |
| **Link To** | Choose where clicking leads (Lightbox, Media File, Custom URL, Video Lightbox, or None) |
| **Custom URL** | Specify a custom URL (if Link To is set to "Custom URL") |
| **Video URL** | Specify a YouTube or Vimeo URL (if Link To is set to "Video Lightbox") |

### Filter Settings

| Setting | Description |
|---------|-------------|
| **Show Filter** | Enable/disable tag filtering |
| **Filter Alignment** | Choose left, center, or right alignment for filter buttons |
| **All Button Text** | Customize the text for the "All" filter button |
| **Filter Style** | Choose between different filter button styles |

### Item Settings

| Setting | Description |
|---------|-------------|
| **Open in New Tab** | Enable/disable opening links in a new browser tab |
| **Hover Effect** | Select from 10 different hover animation effects |
| **Zoom Effect** | Enable/disable zoom effect on hover |
| **Hide Title** | Show/hide the item title |
| **Hide Category** | Show/hide the item category |

### Style Settings

#### General Style

| Setting | Description |
|---------|-------------|
| **Item Padding** | Adjust the padding around each item |
| **Border Radius** | Adjust the border radius of gallery items |
| **Item Overlay Color** | Set the background color of the overlay on hover |
| **Item Overlay Opacity** | Adjust the opacity of the overlay |

#### Filter Style

| Setting | Description |
|---------|-------------|
| **Margin** | Adjust the margin around filter buttons |
| **Padding** | Adjust the padding within filter buttons |
| **Typography** | Customize the font settings for filter buttons |
| **Normal/Hover/Active Colors** | Set colors for different button states |

#### Title Style

| Setting | Description |
|---------|-------------|
| **Typography** | Customize the font settings for item titles |
| **Text Color** | Set the color for item titles |
| **Margin** | Adjust the margin around item titles |

#### Description Style

| Setting | Description |
|---------|-------------|
| **Typography** | Customize the font settings for description text |
| **Text Color** | Set the color for description text |
| **Margin** | Adjust the margin around descriptions |

## Differences from Portfolio Widget

While the Image Gallery Widget shares many features with the Portfolio Widget, there are key differences:

1. **Source of Images**: The Image Gallery uses images directly from your media library, while the Portfolio Widget uses featured images from portfolio post types.

2. **Individual Image Settings**: Each image in the gallery can have its own title, description, tags, and link settings.

3. **Filtering by Tags**: Image Gallery filtering is based on manually assigned tags rather than portfolio categories.

4. **Faster Setup**: For simple image galleries, this widget is quicker to set up as it doesn't require creating portfolio items first.

## Examples

### Basic Image Gallery with Lightbox

1. Drag the Image Gallery Widget to your page
2. Select multiple images from your media library
3. Set Layout to "Masonry"
4. Set Link To to "Lightbox"
5. Choose a Hover Effect (e.g., "Hover 2")

### Filterable Photo Gallery

1. Drag the Image Gallery Widget to your page
2. Select multiple images from your media library
3. For each image, add relevant tags (e.g., "nature,landscape" or "portrait,people")
4. Enable Show Filter
5. Customize the Filter Style and All Button Text

### Portfolio with External Links

1. Drag the Image Gallery Widget to your page
2. Select multiple images from your media library
3. For each image, add a title and description
4. Set Link To to "Custom URL" and enter the URL for each image
5. Enable "Open in New Tab"

## Responsive Behavior

The Image Gallery Widget is fully responsive:

- **Desktop**: Shows the number of columns you set in the Columns setting
- **Tablet**: Automatically adjusts based on screen size
- **Mobile**: Shows the number of columns you set in the Columns (Mobile) setting

## Performance Tips

For optimal performance with the Image Gallery Widget:

1. Optimize your images before uploading them to the media library
2. Use appropriately sized images (avoid using very large images)
3. Limit the number of images per gallery (use pagination or multiple galleries for large collections)
4. Consider enabling lazy loading if available

## Troubleshooting

**Issue**: Images appear pixelated or low quality
**Solution**: Upload higher resolution images or check if WordPress is generating proper image sizes.

**Issue**: Filter doesn't show all tags
**Solution**: Make sure you've consistently applied tags to your images. Tags are case-sensitive.

**Issue**: Lightbox doesn't open
**Solution**: Check for JavaScript conflicts with other plugins or themes. Try a different hover effect.

## Advanced Usage

See the [Hooks and Filters](hooks-and-filters.md) documentation for ways to customize the Image Gallery Widget programmatically.

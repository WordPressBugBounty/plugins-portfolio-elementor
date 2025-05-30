# PowerFolio Portfolio Widget

The Portfolio Widget is the main component of PowerFolio, allowing you to display your portfolio items in a responsive grid layout with filtering capabilities. This widget is available in both the free and PRO versions, with some advanced features exclusive to the PRO version.

## Adding the Widget in Elementor

1. Edit a page with Elementor
2. In the Elementor panel, search for "Portfolio" or navigate to the "Powerfolio / Power-Ups for Elementor" section
3. Drag and drop the "PowerFolio Portfolio" widget into your page

## Widget Settings

The Portfolio Widget is highly customizable with the following settings sections:

### Content Settings

| Setting | Description |
|---------|-------------|
| **Layout** | Choose between Masonry, Grid, or Special layout |
| **Columns** | Select the number of columns (1-6) |
| **Columns (Mobile)** | Select the number of columns on mobile devices |
| **Show/Hide Margin** | Toggle margin between portfolio items |

### Filter Settings

| Setting | Description |
|---------|-------------|
| **Show Filter** | Enable/disable category filtering |
| **Filter Alignment** | Choose left, center, or right alignment for filter buttons |
| **All Button Text** | Customize the text for the "All" filter button |
| **Filter Style** | Choose between different filter button styles |

### Query Settings

| Setting | Description |
|---------|-------------|
| **Categories** | Select specific portfolio categories to display |
| **Posts Per Page** | Set the number of items to display |
| **Pagination** | Enable/disable pagination |
| **Posts Per Page (Pagination)** | Set the number of items per page when pagination is enabled |

### Item Settings

| Setting | Description |
|---------|-------------|
| **Link To** | Choose where clicking an item leads (Project Page, Lightbox, or Custom URL) |
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
| **Border Radius** | Adjust the border radius of portfolio items |
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

#### Category Style

| Setting | Description |
|---------|-------------|
| **Typography** | Customize the font settings for category text |
| **Text Color** | Set the color for category text |
| **Separator** | Customize the separator between multiple categories |

## Examples

### Basic Portfolio Grid

1. Drag the Portfolio Widget to your page
2. Set Columns to 3
3. Enable Show Filter
4. Set Link To to "Project Page"
5. Choose a Hover Effect (e.g., "Hover 1")

### Image Gallery with Lightbox

1. Drag the Portfolio Widget to your page
2. Set Layout to "Masonry"
3. Set Link To to "Lightbox"
4. Choose a Hover Effect with transparent background (e.g., "Hover 3")
5. Adjust the Item Overlay Opacity to around 0.7

### Filtered Portfolio for Specific Categories

1. Drag the Portfolio Widget to your page
2. Enable Show Filter
3. Under Query Settings, select specific Categories
4. Customize the Filter Style
5. Set the All Button Text (e.g., "View All Projects")

## Responsive Behavior

The Portfolio Widget is fully responsive and adapts to different screen sizes:

- **Desktop**: Shows the number of columns you set in the Columns setting
- **Tablet**: Automatically adjusts based on screen size
- **Mobile**: Shows the number of columns you set in the Columns (Mobile) setting

## Performance Tips

For optimal performance with the Portfolio Widget:

1. Optimize your images before uploading them
2. Set a reasonable Posts Per Page value (20-30 items max)
3. Enable pagination for large portfolios
4. Use a CDN for image delivery if possible

## Troubleshooting

**Issue**: Filter doesn't work correctly
**Solution**: Make sure you have assigned categories to your portfolio items and that the Isotope JavaScript is not conflicting with other plugins.

**Issue**: Images don't load or appear distorted
**Solution**: Check that your images are properly sized and optimized. Use the WordPress Media Library to ensure images have proper thumbnails.

**Issue**: Layout appears broken on mobile
**Solution**: Adjust the Columns (Mobile) setting and test on different devices. Consider simplifying hover effects for mobile.

## Advanced Usage

See the [Hooks and Filters](hooks-and-filters.md) documentation for ways to customize the Portfolio Widget programmatically.

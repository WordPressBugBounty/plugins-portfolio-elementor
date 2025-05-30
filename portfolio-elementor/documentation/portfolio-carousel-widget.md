# PowerFolio Portfolio Carousel Widget (PRO Feature)

The Portfolio Carousel Widget is an exclusive PRO feature that allows you to display your portfolio items in an interactive, responsive carousel/slider format.

## Adding the Widget in Elementor

1. Edit a page with Elementor
2. In the Elementor panel, search for "Portfolio Carousel" or navigate to the "Powerfolio / Power-Ups for Elementor" section
3. Drag and drop the "PowerFolio Portfolio Carousel" widget into your page

## Widget Settings

The Portfolio Carousel Widget offers the following settings sections:

### Content Settings

| Setting | Description |
|---------|-------------|
| **Categories** | Select specific portfolio categories to display |
| **Posts Per Page** | Set the number of items to display in the carousel |
| **Hover Effect** | Select from 10 different hover animation effects |
| **Link To** | Choose where clicking leads (Project Page, Lightbox, or Custom URL) |
| **Open in New Tab** | Enable/disable opening links in a new browser tab |
| **Zoom Effect** | Enable/disable zoom effect on hover |

### Carousel Settings

| Setting | Description |
|---------|-------------|
| **Items to Show** | Number of items to show at once in the carousel |
| **Items to Scroll** | Number of items to scroll at a time |
| **Autoplay** | Enable/disable automatic sliding |
| **Autoplay Speed** | Set the speed of autoplay in milliseconds |
| **Infinite Loop** | Enable/disable infinite carousel looping |
| **Pause on Hover** | Pause autoplay when user hovers over the carousel |
| **Show Navigation Arrows** | Enable/disable navigation arrows |
| **Show Dots Navigation** | Enable/disable navigation dots |
| **Center Mode** | Enable/disable centering the active slide |

### Responsive Settings

| Setting | Description |
|---------|-------------|
| **Items to Show (Tablet)** | Number of items to show on tablet devices |
| **Items to Show (Mobile)** | Number of items to show on mobile devices |
| **Items to Scroll (Tablet)** | Number of items to scroll on tablet devices |
| **Items to Scroll (Mobile)** | Number of items to scroll on mobile devices |

### Style Settings

#### Carousel Style

| Setting | Description |
|---------|-------------|
| **Item Spacing** | Adjust the spacing between carousel items |
| **Item Padding** | Adjust the padding around each item |
| **Border Radius** | Adjust the border radius of carousel items |

#### Navigation Style

| Setting | Description |
|---------|-------------|
| **Arrows Size** | Adjust the size of navigation arrows |
| **Arrows Color** | Set the color of navigation arrows |
| **Arrows Background** | Set the background color of navigation arrows |
| **Arrows Border Radius** | Adjust the border radius of navigation arrows |
| **Dots Size** | Adjust the size of navigation dots |
| **Dots Color** | Set the color of navigation dots |
| **Dots Active Color** | Set the color of the active navigation dot |

#### Item Style

| Setting | Description |
|---------|-------------|
| **Item Overlay Color** | Set the background color of the overlay on hover |
| **Item Overlay Opacity** | Adjust the opacity of the overlay |
| **Title Typography** | Customize the font settings for item titles |
| **Title Color** | Set the color for item titles |
| **Category Typography** | Customize the font settings for category text |
| **Category Color** | Set the color for category text |

## Examples

### Basic Portfolio Carousel

1. Drag the Portfolio Carousel Widget to your page
2. Set Items to Show to 3
3. Enable Autoplay
4. Set Link To to "Project Page"
5. Choose a Hover Effect (e.g., "Hover 1")

### Image Slider with Lightbox

1. Drag the Portfolio Carousel Widget to your page
2. Set Items to Show to 1
3. Set Link To to "Lightbox"
4. Enable Show Navigation Arrows and Show Dots Navigation
5. Choose a minimalist Hover Effect (e.g., "Hover 3")

### Category Showcase

1. Drag the Portfolio Carousel Widget to your page
2. Under Content Settings, select specific Categories
3. Set Items to Show to 3
4. Enable Center Mode
5. Set Items to Scroll to 1
6. Enable Infinite Loop

## Responsive Behavior

The Portfolio Carousel Widget is fully responsive and adapts to different screen sizes automatically:

- **Desktop**: Shows the number of items set in the Items to Show setting
- **Tablet**: Shows the number of items set in the Items to Show (Tablet) setting
- **Mobile**: Shows the number of items set in the Items to Show (Mobile) setting

By default, the widget will automatically adjust to show fewer items on smaller screens, but you can customize this behavior using the responsive settings.

## Performance Tips

For optimal performance with the Portfolio Carousel Widget:

1. Optimize your portfolio images before uploading them
2. Set a reasonable Posts Per Page value (10-20 items max)
3. For large carousels, consider disabling autoplay to reduce resource usage
4. Use appropriately sized images for the carousel dimensions

## Differences from Regular Portfolio Widget

While the Portfolio Carousel shares many features with the standard Portfolio Widget, there are key differences:

1. **Display Format**: Items are shown in a sliding carousel instead of a static grid
2. **Navigation Options**: Includes carousel-specific settings like arrows, dots, and autoplay
3. **No Filtering**: The carousel format doesn't support category filtering
4. **Different Responsive Behavior**: Uses Items to Show instead of Columns for responsive layouts

## Troubleshooting

**Issue**: Carousel not sliding smoothly
**Solution**: Reduce the number of items shown, optimize images, or adjust the autoplay speed.

**Issue**: Navigation arrows not appearing
**Solution**: Make sure Show Navigation Arrows is enabled and check for CSS conflicts in your theme.

**Issue**: Carousel looks different on mobile
**Solution**: Adjust the Items to Show (Mobile) and Items to Scroll (Mobile) settings to ensure proper display on small screens.

## Advanced Usage

See the [Hooks and Filters](hooks-and-filters.md) documentation for ways to customize the Portfolio Carousel Widget programmatically.

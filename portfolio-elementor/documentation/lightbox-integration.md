# Lightbox Integration with PowerFolio

PowerFolio allows you to display your images, videos, and portfolio items in an elegant lightbox when users click on an item. This documentation explains how to configure and customize the lightbox functionality. The basic lightbox feature is available in both free and PRO versions, with advanced customization options in PRO.

## Activating the Lightbox for Portfolio

### In the Elementor Portfolio Widget

1. Edit a page with Elementor
2. Add the "PowerFolio Portfolio" widget to your page
3. In the "Item Settings" section, find the "Link To" option
4. Select "Lightbox" instead of "Project Page"
5. Save your settings

### In the Elementor Image Gallery Widget

1. Edit a page with Elementor
2. Add the "PowerFolio Image Gallery" widget to your page
3. For each image, set "Link To" as either:
   - "Lightbox" to display the image in a lightbox
   - "Video Lightbox" to display a video in a lightbox (PRO feature)
4. When selecting "Video Lightbox", enter the YouTube or Vimeo URL in the "Video URL" field that appears
5. Save your settings

### Using Shortcodes

Use the `linkto` parameter to activate the lightbox:

```
[powerfolio linkto="image"]
```

## Global Lightbox Settings in Elementor

PowerFolio uses Elementor's built-in lightbox functionality. To customize the global settings:

1. Edit a page with Elementor
2. Click on the Settings icon (hamburger icon in the top left corner)
3. Go to "Global Settings"
4. Select the "Lightbox" tab
5. Here you can configure:
   - **Enable Lightbox** - Enable or disable globally
   - **Enable in Editor** - Whether you want the lightbox to work while editing
   - **UI Color** - Customize the color of the lightbox controls
   - **Background Color** - Customize the lightbox background color
   - **Lightbox Width** - Adjust the size of the lightbox
   - **Animation Speed** - Control the animation speed

![Lightbox Settings](https://powerfoliowp.com/wp-content/uploads/2021/04/lightbox-settings.jpg)

## Lightbox Navigation

When a user opens an image in the lightbox, they can:

1. **Navigate between images** - Use the left/right arrows or swipe on touch devices
2. **Zoom** - Use the zoom buttons or pinch on touch devices
3. **Fullscreen Mode** - Click the fullscreen button
4. **Close** - Press ESC or click the close button

## Integrating with Other Media Types

### Embedding Vimeo/YouTube Videos in Lightbox (PRO)

You can display Vimeo or YouTube videos directly in the lightbox when a user clicks on a portfolio item or gallery image:

#### For Image Gallery Widget:
1. Edit a page with Elementor
2. Add the "PowerFolio Image Gallery" widget to your page
3. For the image that should display a video, set "Link To" as "Video Lightbox"
4. In the "Video URL" field, paste the YouTube or Vimeo URL (e.g., https://www.youtube.com/watch?v=Jc27Fd6qnA8)
5. Save your settings

#### For Portfolio Items:
1. Create a new portfolio item as normal
2. Add a video URL to the portfolio item settings under the "Video URL" field
3. In the PowerFolio widget settings, set "Link To" as "Video" for the items you want to display videos

#### Supported Video Platforms:
- YouTube (both youtube.com and youtu.be formats)
- Vimeo

### Embedding Videos on Project Page

Alternatively, you can still embed videos on the project page:

1. Create a new portfolio item as normal
2. In the content area, add an Elementor "Video" widget
3. Paste the Vimeo or YouTube URL
4. Configure the desired options (autoplay, controls, etc.)
5. For the video to be accessible when clicking on the portfolio item, set "Link To" as "Project Page"

### Embedding Custom Content

For more complex content that should be displayed when a user clicks on a portfolio item:

1. Create a new portfolio item with the desired content using Elementor
2. In the PowerFolio widget, set "Link To" as "Project Page"

## Troubleshooting Lightbox Issues

**Lightbox doesn't open:**
- Check if "Link To" is set to "Lightbox", "Image", or "Video Lightbox"
- Check for conflicts with other lightbox plugins
- Verify the lightbox is enabled in Elementor's global settings

**Videos don't play in lightbox:**
- Ensure you've selected "Video Lightbox" as the link type
- Verify the video URL is correctly entered and is from YouTube or Vimeo
- Check if the video is publicly available (not private or restricted)

**Images don't appear correctly in the lightbox:**
- Check if your images have sufficient resolution
- Try regenerating image thumbnails using a plugin like "Regenerate Thumbnails"

**Lightbox navigation issues:**
- Update to the latest version of Elementor
- Temporarily deactivate other plugins to check for conflicts

## Advanced Lightbox Customization

For developers who want to further customize the lightbox behavior, PowerFolio offers filters such as:

```php
add_filter('elpt-enable-simple-lightbox', function($enabled) {
    return false; // Disables the native lightbox and allows use of custom lightbox
});
```

You can also use custom CSS to style the lightbox:

```css
/* Exemplo: Mudar a cor do ícone de fechar do lightbox */
.elementor-lightbox .dialog-lightbox-close-button {
    color: red;
}
```

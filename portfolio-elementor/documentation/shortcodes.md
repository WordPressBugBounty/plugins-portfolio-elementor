# PowerFolio Shortcodes

PowerFolio provides several shortcodes that you can use to display portfolios and image galleries without using Elementor or Gutenberg. These shortcodes work with both the free and PRO versions, with some parameters exclusive to the PRO version as noted below.

## Portfolio Shortcode

Use the `[powerfolio]` shortcode to display a portfolio grid.

### Basic Usage

```
[powerfolio]
```

This will display all portfolio items in a 3-column grid with default settings.

### Available Parameters

| Parameter | Description | Default | Options |
|-----------|-------------|---------|---------|
| `columns` | Number of columns | `3` | `1`, `2`, `3`, `4`, `5`, `6` |
| `showfilter` | Show category filter | `yes` | `yes`, `no` |
| `style` | Layout style | `masonry` | `masonry`, `box`, `special` |
| `margin` | Margin between items | `yes` | `yes`, `no` |
| `tax_text` | Text for "All" filter | `All` | Any text |
| `taxonomy` | Show only specific category | empty | Category ID |
| `postsperpage` | Number of items to show | `24` | Any number |
| `type` | Use taxonomy filter | `no` | `yes`, `no` |
| `linkto` | Where to link items | `project` | `project`, `image`, `custom` |
| `custom_url` | Custom URL (if linkto=custom) | empty | URL |
| `zoom_effect` | Add zoom effect on hover (PRO only) | empty | `zoom` |
| `hide_item_category` | Hide category in item (PRO only) | `no` | `yes`, `no` |
| `hide_item_title` | Hide title in item (PRO only) | `no` | `yes`, `no` |
| `hover` | Hover effect style | `hover1` | `hover1` to `hover3` (free), `hover1` to `hover10` (PRO) |
| `pagination` | Enable pagination (PRO only) | `false` | `true`, `false` |
| `pagination_postsperpage` | Posts per page (pagination) (PRO only) | `8` | Any number |

### Examples

**Portfolio with 4 columns and no filter:**
```
[powerfolio columns="4" showfilter="no"]
```

**Portfolio with specific category:**
```
[powerfolio taxonomy="5" type="yes"]
```

**Portfolio with image lightbox:**
```
[powerfolio linkto="image" hover="hover3"]
```

**Complete example with all common parameters:**
```
[powerfolio postsperpage="12" type="no" showfilter="yes" style="masonry" linkto="image" columns="4" margin="no"]
```

**Portfolio with pagination:**
```
[powerfolio pagination="true" pagination_postsperpage="12"]
```

## Portfolio Carousel Shortcode

Use the `[portfolio-carousel]` shortcode to display a carousel/slider of portfolio items.

### Basic Usage

```
[portfolio-carousel]
```

### Available Parameters

| Parameter | Description | Default | Options |
|-----------|-------------|---------|---------|
| `postsperpage` | Number of items to show | `24` | Any number |
| `showfilter` | Show category filter | `no` | `yes`, `no` |
| `taxonomy` | Show only specific category | empty | Category ID |
| `type` | Use taxonomy filter | empty | `yes` to enable |
| `hover` | Hover effect style | `hover5` | `hover1` to `hover10` |
| `linkto` | Where to link items | `project` | `project`, `image` |
| `zoom_effect` | Add zoom effect on hover | empty | `zoom` |
| `post_type` | Custom post type to use | `elemenfolio` | Any post type name |

### Examples

**Portfolio carousel with lightbox:**
```
[portfolio-carousel linkto="image" hover="hover3"]
```

**Portfolio carousel for specific category:**
```
[portfolio-carousel taxonomy="3" type="yes"]
```

## Backwards Compatibility

For backwards compatibility, the plugin also supports the `[elemenfolio]` shortcode, which works exactly the same as the `[powerfolio]` shortcode.

## Using Shortcodes in Templates

You can also use these shortcodes in your theme's template files by using the `do_shortcode()` function:

```php
<?php echo do_shortcode('[powerfolio postsperpage="12" type="no" showfilter="yes" style="masonry" linkto="image" columns="4" margin="no"]'); ?>
```

## Combining with CSS

You can add custom CSS to style the shortcode output. For example:

```css
/* Custom styles for portfolio grid */
.elpt-portfolio .portfolio-item-title {
    font-size: 18px;
    font-weight: bold;
}

.elpt-portfolio .portfolio-item-category {
    font-style: italic;
}
```

## Performance Considerations

When using shortcodes, keep these tips in mind:

1. Limit the number of items displayed with the `postsperpage` parameter
2. Use optimized images to reduce page load time
3. Consider using lazy loading for images

For more advanced customization options, see the [Hooks and Filters](hooks-and-filters.md) documentation.

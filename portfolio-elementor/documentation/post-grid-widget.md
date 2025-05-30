# PowerFolio Post Grid Widget (PRO Feature)

The Post Grid Widget is an exclusive PRO feature that allows you to display your WordPress blog posts in a responsive, filterable grid layout similar to the portfolio display.

## Adding the Widget in Elementor

1. Edit a page with Elementor
2. In the Elementor panel, search for "Post Grid" or navigate to the "Powerfolio / Power-Ups for Elementor" section
3. Drag and drop the "PowerFolio Post Grid" widget into your page

## Widget Settings

The Post Grid Widget offers the following settings sections:

### Content Settings

| Setting | Description |
|---------|-------------|
| **Layout** | Choose between Masonry or Grid layout |
| **Columns** | Select the number of columns (1-6) |
| **Columns (Mobile)** | Select the number of columns on mobile devices |
| **Show/Hide Margin** | Toggle margin between post items |

### Query Settings

| Setting | Description |
|---------|-------------|
| **Source** | Choose to display posts from specific categories or recent posts |
| **Categories** | Select specific blog categories to display (if Source is set to "Categories") |
| **Posts Per Page** | Set the number of posts to display |
| **Offset** | Skip a number of posts (useful for multiple grids on the same page) |
| **Order By** | Sort posts by Date, Title, or Random |
| **Order** | Choose Ascending or Descending order |
| **Exclude Current Post** | Enable to exclude the current post from the grid |

### Filter Settings

| Setting | Description |
|---------|-------------|
| **Show Filter** | Enable/disable category filtering |
| **Filter Alignment** | Choose left, center, or right alignment for filter buttons |
| **All Button Text** | Customize the text for the "All" filter button |
| **Filter Style** | Choose between different filter button styles |

### Item Settings

| Setting | Description |
|---------|-------------|
| **Show Featured Image** | Enable/disable displaying the post featured image |
| **Image Size** | Select the image size to use (thumbnail, medium, large, etc.) |
| **Show Title** | Enable/disable displaying the post title |
| **Title HTML Tag** | Choose the HTML tag for the title (H1-H6, p, div, span) |
| **Show Excerpt** | Enable/disable displaying the post excerpt |
| **Excerpt Length** | Set the number of words to show in the excerpt |
| **Show Read More** | Enable/disable displaying a read more button |
| **Read More Text** | Customize the text for the read more button |
| **Show Category** | Enable/disable displaying the post category |
| **Show Date** | Enable/disable displaying the post date |
| **Show Author** | Enable/disable displaying the post author |
| **Open in New Tab** | Enable/disable opening links in a new browser tab |

### Style Settings

#### General Style

| Setting | Description |
|---------|-------------|
| **Item Background** | Set the background color of post items |
| **Item Padding** | Adjust the padding around each item |
| **Border Radius** | Adjust the border radius of post items |
| **Box Shadow** | Add and customize box shadow for post items |

#### Image Style

| Setting | Description |
|---------|-------------|
| **Border Radius** | Adjust the border radius of post images |
| **Spacing** | Set the spacing between the image and other elements |

#### Title Style

| Setting | Description |
|---------|-------------|
| **Typography** | Customize the font settings for post titles |
| **Color** | Set the color for post titles |
| **Hover Color** | Set the hover color for post titles |
| **Spacing** | Set the spacing around the title |

#### Meta Style

| Setting | Description |
|---------|-------------|
| **Typography** | Customize the font settings for post meta (category, date, author) |
| **Color** | Set the color for post meta |
| **Icon Color** | Set the color for meta icons |
| **Spacing** | Set the spacing around meta elements |

#### Excerpt Style

| Setting | Description |
|---------|-------------|
| **Typography** | Customize the font settings for post excerpts |
| **Color** | Set the color for post excerpts |
| **Spacing** | Set the spacing around the excerpt |

#### Read More Style

| Setting | Description |
|---------|-------------|
| **Typography** | Customize the font settings for the read more button |
| **Normal/Hover Colors** | Set colors for different button states |
| **Button Padding** | Adjust the padding within the read more button |
| **Button Margin** | Adjust the margin around the read more button |

## Examples

### Recent Posts Grid

1. Drag the Post Grid Widget to your page
2. Set Source to "Recent Posts"
3. Set Layout to "Masonry"
4. Enable Show Featured Image, Show Title, Show Excerpt, and Show Read More
5. Style as desired

### Category-Based News Section

1. Drag the Post Grid Widget to your page
2. Set Source to "Categories"
3. Select specific news-related Categories
4. Enable Show Filter to allow users to filter by category
5. Customize Filter Style and All Button Text

### Minimal Blog Archive

1. Drag the Post Grid Widget to your page
2. Set Columns to 1 or 2
3. Enable Show Featured Image, Show Title, Show Excerpt, Show Date, and Show Author
4. Disable Show Category and Show Read More
5. Style with minimal colors and clean typography

## Differences from Portfolio Widget

While the Post Grid Widget shares many features with the Portfolio Widget, there are key differences:

1. **Content Source**: The Post Grid uses regular WordPress blog posts instead of portfolio items.

2. **Post Elements**: Includes options for post-specific elements like excerpt, date, author, and read more button.

3. **Filtering by Categories**: Uses standard WordPress categories instead of portfolio categories.

4. **No Hover Effects**: Post items typically don't use hover effects, showing information directly in the grid.

## Responsive Behavior

The Post Grid Widget is fully responsive:

- **Desktop**: Shows the number of columns set in the Columns setting
- **Tablet**: Automatically adjusts based on screen size
- **Mobile**: Shows the number of columns set in the Columns (Mobile) setting

## Performance Tips

For optimal performance with the Post Grid Widget:

1. Limit the Posts Per Page to a reasonable number (10-20)
2. Use appropriately sized images
3. Keep excerpt length moderate
4. Consider using pagination for large post collections

## Troubleshooting

**Issue**: Featured images not displaying correctly
**Solution**: Ensure posts have featured images set and try different Image Size settings.

**Issue**: Excerpts too long or cut off
**Solution**: Adjust the Excerpt Length setting or manually create excerpts in your posts.

**Issue**: Filter not showing all categories
**Solution**: Make sure posts in the selected categories have featured images set.

## Advanced Usage

See the [Hooks and Filters](hooks-and-filters.md) documentation for ways to customize the Post Grid Widget programmatically.

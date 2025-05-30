# PowerFolio Product Grid Widget (PRO Feature)

The Product Grid Widget is an exclusive PRO feature that allows you to display your WooCommerce products in a responsive, filterable grid layout. This widget is only available when WooCommerce is installed and activated.

## Adding the Widget in Elementor

1. Edit a page with Elementor
2. In the Elementor panel, search for "Product Grid" or navigate to the "Powerfolio / Power-Ups for Elementor" section
3. Drag and drop the "PowerFolio Product Grid" widget into your page

## Widget Settings

The Product Grid Widget offers the following settings sections:

### Content Settings

| Setting | Description |
|---------|-------------|
| **Layout** | Choose between Masonry or Grid layout |
| **Columns** | Select the number of columns (1-6) |
| **Columns (Mobile)** | Select the number of columns on mobile devices |
| **Show/Hide Margin** | Toggle margin between product items |

### Query Settings

| Setting | Description |
|---------|-------------|
| **Source** | Choose to display products from specific categories or recent products |
| **Categories** | Select specific product categories to display (if Source is set to "Categories") |
| **Products Per Page** | Set the number of products to display |
| **Offset** | Skip a number of products (useful for multiple grids on the same page) |
| **Order By** | Sort products by Date, Title, Price, Sales, or Random |
| **Order** | Choose Ascending or Descending order |
| **Show Only Sale Products** | Enable to display only products that are on sale |
| **Show Only Featured Products** | Enable to display only featured products |
| **Hide Out of Stock Products** | Enable to hide products that are out of stock |

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
| **Show Product Image** | Enable/disable displaying the product image |
| **Image Size** | Select the image size to use (thumbnail, medium, large, etc.) |
| **Show Title** | Enable/disable displaying the product title |
| **Title HTML Tag** | Choose the HTML tag for the title (H1-H6, p, div, span) |
| **Show Price** | Enable/disable displaying the product price |
| **Show Rating** | Enable/disable displaying the product rating stars |
| **Show Sale Badge** | Enable/disable displaying the sale badge on sale products |
| **Show Add to Cart** | Enable/disable displaying the add to cart button |
| **Add to Cart Text** | Customize the text for the add to cart button |
| **Show Category** | Enable/disable displaying the product category |
| **Open in New Tab** | Enable/disable opening links in a new browser tab |

### Style Settings

#### General Style

| Setting | Description |
|---------|-------------|
| **Item Background** | Set the background color of product items |
| **Item Padding** | Adjust the padding around each item |
| **Border Radius** | Adjust the border radius of product items |
| **Box Shadow** | Add and customize box shadow for product items |

#### Image Style

| Setting | Description |
|---------|-------------|
| **Border Radius** | Adjust the border radius of product images |
| **Spacing** | Set the spacing between the image and other elements |

#### Title Style

| Setting | Description |
|---------|-------------|
| **Typography** | Customize the font settings for product titles |
| **Color** | Set the color for product titles |
| **Hover Color** | Set the hover color for product titles |
| **Spacing** | Set the spacing around the title |

#### Price Style

| Setting | Description |
|---------|-------------|
| **Typography** | Customize the font settings for product prices |
| **Regular Price Color** | Set the color for regular prices |
| **Sale Price Color** | Set the color for sale prices |
| **Spacing** | Set the spacing around price elements |

#### Rating Style

| Setting | Description |
|---------|-------------|
| **Star Size** | Adjust the size of rating stars |
| **Star Color** | Set the color for filled stars |
| **Empty Star Color** | Set the color for empty stars |
| **Spacing** | Set the spacing around the rating stars |

#### Sale Badge Style

| Setting | Description |
|---------|-------------|
| **Typography** | Customize the font settings for the sale badge |
| **Background Color** | Set the background color of the sale badge |
| **Text Color** | Set the text color of the sale badge |
| **Padding** | Adjust the padding within the sale badge |
| **Border Radius** | Adjust the border radius of the sale badge |

#### Add to Cart Button Style

| Setting | Description |
|---------|-------------|
| **Typography** | Customize the font settings for the add to cart button |
| **Normal/Hover Colors** | Set colors for different button states |
| **Button Padding** | Adjust the padding within the add to cart button |
| **Button Margin** | Adjust the margin around the add to cart button |
| **Border Radius** | Adjust the border radius of the add to cart button |

## Examples

### Featured Products Showcase

1. Drag the Product Grid Widget to your page
2. Set Source to "Recent Products"
3. Enable Show Only Featured Products
4. Set Layout to "Grid"
5. Enable Show Product Image, Show Title, Show Price, and Show Add to Cart

### Sale Products Grid

1. Drag the Product Grid Widget to your page
2. Set Source to "Recent Products"
3. Enable Show Only Sale Products
4. Set Layout to "Masonry"
5. Enable Show Sale Badge
6. Customize the Sale Badge Style with eye-catching colors

### Category-Based Product Display

1. Drag the Product Grid Widget to your page
2. Set Source to "Categories"
3. Select specific product Categories
4. Enable Show Filter to allow users to filter by category
5. Customize Filter Style and All Button Text

## Ajax Add to Cart

The Product Grid Widget supports Ajax add to cart functionality, allowing customers to add products to their cart without page reload. This feature requires:

1. WooCommerce Ajax Add to Cart functionality to be enabled
2. Compatible theme that supports WooCommerce Ajax

To ensure compatibility:

1. Go to WooCommerce → Settings → Products → General
2. Make sure "Enable AJAX add to cart buttons on archives" is checked

## Differences from Post Grid Widget

While the Product Grid Widget shares many features with the Post Grid Widget, there are key differences:

1. **Content Source**: The Product Grid uses WooCommerce products instead of blog posts.

2. **Product-Specific Elements**: Includes options for product-specific elements like price, rating stars, sale badge, and add to cart button.

3. **Filtering by Product Categories**: Uses WooCommerce product categories instead of post categories.

4. **E-commerce Functionality**: Includes WooCommerce shopping features like add to cart.

## Responsive Behavior

The Product Grid Widget is fully responsive:

- **Desktop**: Shows the number of columns set in the Columns setting
- **Tablet**: Automatically adjusts based on screen size
- **Mobile**: Shows the number of columns set in the Columns (Mobile) setting

## Performance Tips

For optimal performance with the Product Grid Widget:

1. Limit the Products Per Page to a reasonable number (10-20)
2. Use appropriately sized product images
3. Consider enabling lazy loading for images if your theme supports it
4. For stores with many products, use category filtering rather than loading all products

## Troubleshooting

**Issue**: Add to Cart button not working with Ajax
**Solution**: Ensure WooCommerce Ajax add to cart is enabled and your theme is compatible.

**Issue**: Product images not displaying correctly
**Solution**: Check that products have featured images set and try different Image Size settings.

**Issue**: Sale badges not showing on sale products
**Solution**: Verify that products are properly configured with sale prices in WooCommerce.

**Issue**: Filter not showing all product categories
**Solution**: Make sure products in the selected categories have images set.

## Advanced Usage

See the [Hooks and Filters](hooks-and-filters.md) documentation for ways to customize the Product Grid Widget programmatically.

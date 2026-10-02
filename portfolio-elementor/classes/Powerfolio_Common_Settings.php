<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Portfolio: Customization Options
 *
 */
class Powerfolio_Common_Settings {
    public function __construct() {
    }

    public static function get_yes_no_options() {
        return [
            'yes' => __( 'Yes', 'portfolio-elementor' ),
            'no'  => __( 'No', 'portfolio-elementor' ),
        ];
    }

    public static function get_column_options() {
        $column_array = array(
            '2' => __( 'Two Columns', 'portfolio-elementor' ),
            '3' => __( 'Three Columns', 'portfolio-elementor' ),
            '4' => __( 'Four Columns', 'portfolio-elementor' ),
            '5' => __( 'Five Columns', 'portfolio-elementor' ),
            '6' => __( 'Six Columns', 'portfolio-elementor' ),
        );
        return $column_array;
    }

    public static function get_column_mobile_options() {
        $column_mobile_array = array(
            'custom' => __( 'Custom (Grid Builder)', 'portfolio-elementor' ),
            '1'      => __( 'One Column', 'portfolio-elementor' ),
            '2'      => __( 'Two Columns', 'portfolio-elementor' ),
            '3'      => __( 'Three Columns', 'portfolio-elementor' ),
        );
        return $column_mobile_array;
    }

    public static function get_grid_options() {
        $grid_options = array(
            'masonry'       => __( 'Masonry', 'portfolio-elementor' ),
            'box'           => __( 'Boxes', 'portfolio-elementor' ),
            'purchasedgrid' => __( 'Customized Grid Service', 'portfolio-elementor' ),
        );
        return $grid_options;
    }

    public static function get_hover_options() {
        $grid_options = array();
        $grid_options = array(
            'simple'  => __( 'Style 0: Simple', 'portfolio-elementor' ),
            'hover1'  => __( 'Style 1: From Bottom', 'portfolio-elementor' ),
            'hover2'  => __( 'Style 2: From Top', 'portfolio-elementor' ),
            'hover16' => __( 'Style 16: Content Visible 2', 'portfolio-elementor' ),
            'hover17' => __( 'Style 17: Content Visible 1', 'portfolio-elementor' ),
        );
        return $grid_options;
    }

    public static function get_lightbox_options( $source = '' ) {
        $options = array(
            'image'   => __( 'Image (with the Powerfolio lightbox)', 'portfolio-elementor' ),
            'project' => __( 'Project Details Page', 'portfolio-elementor' ),
        );
        if ( $source == 'elementor' ) {
            $options['image_elementor'] = __( 'Image (with Elementor default lightbox)', 'portfolio-elementor' );
        }
        return $options;
    }

    public static function get_post_types( $args = array() ) {
        if ( empty( $args ) ) {
            $args = array(
                'public' => true,
            );
        }
        return get_post_types( $args );
    }

    public static function get_portfolio_taxonomy_terms() {
        $terms = get_terms( array(
            'taxonomy'   => 'elemenfoliocategory',
            'fields'     => 'id=>name',
            'hide_empty' => false,
        ) );
        return $terms;
    }

    public static function generate_element_id( $key = 'elpt_powerfolio' ) {
        return $key . '_' . wp_rand( 0, 99999 );
    }

    public static function get_upgrade_message( $source = '' ) {
        $raw = '';
        $raw .= '<div style="border: 1px solid #d5d8dc; padding: 10px; background: #eee; border-radius: 6px; color: #1e1e1e;">';
        $raw .= '<h3 style="font-weight: bold; font-size: 14px; margin-bottom: 10px; text-transform: uppercase; color: #1e1e1e;">' . __( 'ENABLE ALL FEATURES', 'portfolio-elementor' ) . '</h3>';
        $raw .= '<p style="margin-bottom: 10px; font-size: 12px; line-height: 22px; color: #1e1e1e;">' . __( 'Upgrade your plugin to PRO version and unlock all features!', 'portfolio-elementor' ) . '</p>';
        $raw .= '<a href="' . pe_fs()->get_upgrade_url() . '" style="background: #ea0e59; color: #fff; font-weight: bold; padding: 5px 10px; border-radius: 3px; display: inline-block; font-size: 14px; text-transform: uppercase;">' . __( 'Click here to Upgrade', 'portfolio-elementor' ) . '</a>';
        //$raw .='<hr style="margin-top: 20px; margin-bottom: 20px;">';
        if ( $source == 'elementor' ) {
            $raw .= '<p style="margin-bottom: 10px; font-size: 12px; font-style: italic; margin-top: 5px; color: #1e1e1e;">' . __( 'Get access to the Paginated Grid (NEW), Special Grids, Grid Builder, extra CSS effects, several customization options and much more!', 'portfolio-elementor' ) . '</p>';
        } else {
            $raw .= '<p style="margin-bottom: 10px; font-size: 12px; font-style: italic; margin-top: 5px; color: #1e1e1e;">' . __( 'Get access to the Paginated Grid (NEW), Special Grids, extra CSS effects, several customization options and much more!', 'portfolio-elementor' ) . '</p>';
        }
        /*$raw .='<ul style="list-style-type: circle; list-style-position: outside; font-style: italic;">';
        			$raw .='<li style="margin-bottom: 5px;">'.__('- Grid Builder', 'portfolio-elementor').'</li>';
        			$raw .='<li style="margin-bottom: 5px;">'.__('- All customization options enabled for both widgets (portfolio and image gallery)', 'portfolio-elementor').'</li>';
        			$raw .='<li style="margin-bottom: 5px;">'.__('- 15+ hover effects', 'portfolio-elementor').'</li>';
        			$raw .='<li style="margin-bottom: 5px;">'.__('- 8 grid styles', 'portfolio-elementor').'</li>';						
        			$raw .='<li style="margin-bottom: 5px;">'.__('- Extra CSS effects', 'portfolio-elementor').'</li>';
        			$raw .='<li style="margin-bottom: 5px;">'.__('- Option to display a specific portfolio category', 'portfolio-elementor').'</li>';
        			$raw .='<li style="margin-bottom: 5px;">'.__('- Option to display content from any post type to the grid', 'portfolio-elementor').'</li>';
        			$raw .='<li style="margin-bottom: 5px;">'.__('- Extra customization options', 'portfolio-elementor').'</li>';
        		$raw .='</ul>';*/
        $raw .= '</div>';
        return $raw;
    }

    /**
     * Get hover styles that use "content-below" layout structure.
     * These styles render the info wrapper OUTSIDE the link element,
     * allowing the description to appear below the image without overlay.
     *
     * @return array List of hover style keys that use content-below layout
     */
    public static function get_content_below_hover_styles() {
        return array('hover22');
    }

    /**
     * Check if a hover style uses the content-below layout structure.
     *
     * @param string $hover_style The hover style key (e.g., 'hover22', 'simple')
     * @return bool True if the style uses content-below layout
     */
    public static function is_content_below_style( $hover_style ) {
        return in_array( $hover_style, self::get_content_below_hover_styles(), true );
    }

    /*
     * get_image_url_for_gallery
     */
    public static function get_image_url( $img_identifier, $img_size = "" ) {
        $image_url = '';
        // Check if $img_identifier is an image ID
        if ( is_numeric( $img_identifier ) ) {
            $image_url = wp_get_attachment_url( $img_identifier );
        } else {
            if ( filter_var( $img_identifier, FILTER_VALIDATE_URL ) ) {
                $image_url = $img_identifier;
            }
        }
        // Apply filter to the image URL if needed
        return apply_filters(
            'powerfolio_filter_image_url',
            $image_url,
            $img_identifier,
            $img_size
        );
    }

    /**
     * Sanitize a CSS color value.
     * Accepts hex colors (3, 4, 6, or 8 digits), rgb(), rgba(), hsl(), hsla(), 
     * CSS named colors, and special values like 'transparent' and 'inherit'.
     *
     * @param string $color The color value to sanitize.
     * @param string $default Default value if sanitization fails.
     * @return string Sanitized color or default value.
     */
    public static function sanitize_css_color( $color, $default = '' ) {
        if ( empty( $color ) || !is_string( $color ) ) {
            return $default;
        }
        $color = trim( $color );
        // Check for hex color (3, 4, 6, or 8 digits)
        if ( preg_match( '/^#([A-Fa-f0-9]{3}|[A-Fa-f0-9]{4}|[A-Fa-f0-9]{6}|[A-Fa-f0-9]{8})$/', $color ) ) {
            return $color;
        }
        // Check for rgb() or rgba() - allow integers 0-255 and percentages
        if ( preg_match( '/^rgba?\\(\\s*(\\d{1,3}%?\\s*,\\s*){2}\\d{1,3}%?\\s*(,\\s*(0|1|0?\\.\\d+))?\\s*\\)$/i', $color ) ) {
            return $color;
        }
        // Check for hsl() or hsla()
        if ( preg_match( '/^hsla?\\(\\s*\\d{1,3}\\s*,\\s*\\d{1,3}%\\s*,\\s*\\d{1,3}%\\s*(,\\s*(0|1|0?\\.\\d+))?\\s*\\)$/i', $color ) ) {
            return $color;
        }
        // CSS named colors allowlist (common colors)
        $named_colors = array(
            'transparent',
            'inherit',
            'initial',
            'unset',
            'currentcolor',
            'aliceblue',
            'antiquewhite',
            'aqua',
            'aquamarine',
            'azure',
            'beige',
            'bisque',
            'black',
            'blanchedalmond',
            'blue',
            'blueviolet',
            'brown',
            'burlywood',
            'cadetblue',
            'chartreuse',
            'chocolate',
            'coral',
            'cornflowerblue',
            'cornsilk',
            'crimson',
            'cyan',
            'darkblue',
            'darkcyan',
            'darkgoldenrod',
            'darkgray',
            'darkgrey',
            'darkgreen',
            'darkkhaki',
            'darkmagenta',
            'darkolivegreen',
            'darkorange',
            'darkorchid',
            'darkred',
            'darksalmon',
            'darkseagreen',
            'darkslateblue',
            'darkslategray',
            'darkslategrey',
            'darkturquoise',
            'darkviolet',
            'deeppink',
            'deepskyblue',
            'dimgray',
            'dimgrey',
            'dodgerblue',
            'firebrick',
            'floralwhite',
            'forestgreen',
            'fuchsia',
            'gainsboro',
            'ghostwhite',
            'gold',
            'goldenrod',
            'gray',
            'grey',
            'green',
            'greenyellow',
            'honeydew',
            'hotpink',
            'indianred',
            'indigo',
            'ivory',
            'khaki',
            'lavender',
            'lavenderblush',
            'lawngreen',
            'lemonchiffon',
            'lightblue',
            'lightcoral',
            'lightcyan',
            'lightgoldenrodyellow',
            'lightgray',
            'lightgrey',
            'lightgreen',
            'lightpink',
            'lightsalmon',
            'lightseagreen',
            'lightskyblue',
            'lightslategray',
            'lightslategrey',
            'lightsteelblue',
            'lightyellow',
            'lime',
            'limegreen',
            'linen',
            'magenta',
            'maroon',
            'mediumaquamarine',
            'mediumblue',
            'mediumorchid',
            'mediumpurple',
            'mediumseagreen',
            'mediumslateblue',
            'mediumspringgreen',
            'mediumturquoise',
            'mediumvioletred',
            'midnightblue',
            'mintcream',
            'mistyrose',
            'moccasin',
            'navajowhite',
            'navy',
            'oldlace',
            'olive',
            'olivedrab',
            'orange',
            'orangered',
            'orchid',
            'palegoldenrod',
            'palegreen',
            'paleturquoise',
            'palevioletred',
            'papayawhip',
            'peachpuff',
            'peru',
            'pink',
            'plum',
            'powderblue',
            'purple',
            'rebeccapurple',
            'red',
            'rosybrown',
            'royalblue',
            'saddlebrown',
            'salmon',
            'sandybrown',
            'seagreen',
            'seashell',
            'sienna',
            'silver',
            'skyblue',
            'slateblue',
            'slategray',
            'slategrey',
            'snow',
            'springgreen',
            'steelblue',
            'tan',
            'teal',
            'thistle',
            'tomato',
            'turquoise',
            'violet',
            'wheat',
            'white',
            'whitesmoke',
            'yellow',
            'yellowgreen'
        );
        if ( in_array( strtolower( $color ), $named_colors, true ) ) {
            return strtolower( $color );
        }
        return $default;
    }

    /**
     * Sanitize CSS text-transform property value.
     *
     * @param string $value The text-transform value to sanitize.
     * @param string $default Default value if sanitization fails.
     * @return string Sanitized value or default.
     */
    public static function sanitize_css_text_transform( $value, $default = '' ) {
        if ( empty( $value ) || !is_string( $value ) ) {
            return $default;
        }
        $allowed = array(
            'none',
            'capitalize',
            'uppercase',
            'lowercase',
            'full-width',
            'full-size-kana',
            'inherit',
            'initial',
            'revert',
            'revert-layer',
            'unset'
        );
        $value = strtolower( trim( $value ) );
        if ( in_array( $value, $allowed, true ) ) {
            return $value;
        }
        return $default;
    }

    /**
     * Sanitize CSS text-align property value.
     *
     * @param string $value The text-align value to sanitize.
     * @param string $default Default value if sanitization fails.
     * @return string Sanitized value or default.
     */
    public static function sanitize_css_text_align( $value, $default = '' ) {
        if ( empty( $value ) || !is_string( $value ) ) {
            return $default;
        }
        $allowed = array(
            'left',
            'right',
            'center',
            'justify',
            'start',
            'end',
            'inherit',
            'initial',
            'revert',
            'revert-layer',
            'unset'
        );
        $value = strtolower( trim( $value ) );
        if ( in_array( $value, $allowed, true ) ) {
            return $value;
        }
        return $default;
    }

    /**
     * Sanitize an element ID or CSS class name.
     * Only allows alphanumeric characters, underscores, and hyphens.
     *
     * @param string $id The element ID to sanitize.
     * @param string $default Default value if sanitization fails.
     * @return string Sanitized ID or default.
     */
    public static function sanitize_element_id( $id, $default = '' ) {
        if ( empty( $id ) || !is_string( $id ) ) {
            return $default;
        }
        // Only allow alphanumeric, underscore, and hyphen
        $sanitized = preg_replace( '/[^a-zA-Z0-9_-]/', '', $id );
        // Must start with a letter or underscore (valid CSS identifier)
        if ( empty( $sanitized ) || !preg_match( '/^[a-zA-Z_]/', $sanitized ) ) {
            return $default;
        }
        return $sanitized;
    }

    /**
     * Sanitize a numeric value for CSS (integers only).
     * Returns the integer value or default if not numeric.
     *
     * @param mixed $value The value to sanitize.
     * @param int $default Default value if sanitization fails.
     * @param int $min Minimum allowed value (optional).
     * @param int $max Maximum allowed value (optional).
     * @return int Sanitized integer value.
     */
    public static function sanitize_css_number(
        $value,
        $default = 0,
        $min = null,
        $max = null
    ) {
        if ( !is_numeric( $value ) ) {
            return $default;
        }
        $number = intval( $value );
        if ( $min !== null && $number < $min ) {
            return $default;
        }
        if ( $max !== null && $number > $max ) {
            return $default;
        }
        return $number;
    }

}

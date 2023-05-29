<?php
if ( ! class_exists( 'MAKCustomizer_Customizer' ) && defined( 'ABSPATH' ) ) {

/**
 * mmc loader class.
 * https://developer.wordpress.org/themes/customize-api/
 */
class MAKCustomizer_Customizer {

    function __construct() {
        self::set_filters();
    }

    function set_filters() {
        add_action( 'customize_register', array($this, 'mmc_customize_option') );
    }

    function mmc_customize_option( $wp_customize ) {

        $panel = 'Customizer Option Tree';
        $panel_key = 'mmc_' . str_replace(' ','_',strtolower($panel));
        
        $customizer = get_option('mmc_fields');
        if(is_array($customizer) && count($customizer)) {
            foreach($customizer as $k=>$c) {
                $section_key = MAKCustomizer_slug($k);
                foreach($c as $control) {
                    $options[$panel_key][$section_key][$control['slug']] = ['name'=>$control['label'],'description'=>$control['description'],'type'=>$control['type'],'choices'=>$control['choices'],'default'=>''];
                }
            }
        }


        // Theme Options Panel
        if(is_array($options)) {
            foreach($options as $key=>$option) {
                $wp_customize->add_panel( $key, 
                    array(
                        'title'            => __( $panel, 'mmc' ),
                        'description'      => __( 'Theme Modifications like color scheme, theme texts and layout preferences can be done here.', 'mmc' ),
                        'priority'         => 1,
                        'capability'       => 'edit_theme_options'
                    ) 
                );
                if(is_array($option)) {
                    foreach($option as $subkey=>$opt) {
                        // Text Options Section Inside Theme
                        $wp_customize->add_section( $subkey, 
                            array(
                                'title'         => __( MAKCustomizer_unslug($subkey), 'mmc' ),
                                'priority'      => 1,
                                'panel'         => $key
                            ) 
                        );

                        if(is_array($opt)) {
                            foreach($opt as $sub_key=>$o) {
                                // Setting for Copyright text.
                                $wp_customize->add_setting( $sub_key,
                                    array(
                                        'default'           => __( $o['default'], 'mmc' ),
                                        'type'              => 'option', //Is this an 'option' or a 'theme_mod'?
                                        'sanitize_callback' => 'sanitize_text_field',
                                        'transport'         => 'refresh',
                                    )
                                );
                                switch($o['type']) {
                                    case 'media':
                                                // Control for media
                                                $wp_customize->add_control(
                                                    new WP_Customize_Media_Control(
                                                        $wp_customize,
                                                        $sub_key,
                                                        array(
                                                            'label'     => __( $o['name'], 'mmc' ),
                                                            'section'   => $subkey,
                                                            'settings'  => $sub_key,
                                                            'description'   => $o['description'],
                                                            'context'   => $o['description'],
                                                        )
                                                    )
                                                );
                                                break;
                                    case 'image':
                                                // Control for image
                                                $wp_customize->add_control(
                                                    new WP_Customize_Image_Control(
                                                        $wp_customize,
                                                        $sub_key,
                                                        array(
                                                            'label'     => __( $o['name'], 'mmc' ),
                                                            'section'   => $subkey,
                                                            'settings'  => $sub_key,
                                                            'description'   => $o['description'],
                                                            'context'   => $o['description'],
                                                        )
                                                    )
                                                );
                                                break;
                                    case 'upload':
                                                // Control for upload
                                                $wp_customize->add_control( 
                                                    new WP_Customize_Upload_Control( 
                                                        $wp_customize, 
                                                        $sub_key,
                                                        array(
                                                            'label'     => __( $o['name'], 'mmc' ),
                                                            'section'   => $subkey,
                                                            'settings'  => $sub_key,
                                                        ) 
                                                    ) 
                                                );
                                                break;
                                    case 'color':
                                                // Control for color
                                                $wp_customize->add_control(
                                                    new WP_Customize_Color_Control(
                                                        $wp_customize,
                                                        $sub_key,
                                                        array(
                                                            'label'     => __( $o['name'], 'mmc' ),
                                                            'section'   => $subkey,
                                                            'settings'  => $sub_key,
                                                            'description'   => $o['description'],
                                                            'context'   => $o['description'],
                                                        )
                                                    )
                                                );
                                                break;
                                    case 'menu':

                                                break;
                                    case 'dropdown-pages':
                                            // Control for text
                                            $wp_customize->add_control( $sub_key, 
                                                array(
                                                    'type'        => $o['type'],
                                                    'priority'    => 10,
                                                    'section'     => $subkey,
                                                    'label'       => $o['name'],
                                                    'description' => $o['description'],
                                                    'allow_addition' => true,
                                                ) 
                                            );
                                            break;
                                    default:
                                            // Control for text
                                            $wp_customize->add_control( $sub_key, 
                                                array(
                                                    'type'        => $o['type'],
                                                    'priority'    => 10,
                                                    'section'     => $subkey,
                                                    'label'       => $o['name'],
                                                    'description' => $o['description'],
                                                    'choices' => array_merge([''=>'— Select —'],explode('|',$o['choices'])),
                                                    'input_attrs' => array(
                                                        'placeholder' => __( $o['default'], 'mmc' ),
                                                    )
                                                ) 
                                            );
                                            break;
                                }
                            }
                        }
                    }
                }
            }
        }

    }

}

/**
 * Instantiate loader class.
 *
 * @since 2.0
 */
new MAKCustomizer_Customizer();
}
?>
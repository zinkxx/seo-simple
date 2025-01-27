<?php
/**
 * Plugin Name: SEO Simple
 * Plugin URI: https://devtechnic.online
 * Description: Basit SEO ayarları yapmanızı sağlar.
 * Version: 1.0
 * Author: DevTechnic
 * Author URI: https://devtechnic.online
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Direct access not allowed.
}

// SEO ayarları için dosyayı dahil et
require_once plugin_dir_path( __FILE__ ) . 'includes/seo-functions.php';

// Admin paneline ayar sayfası ekleyin
function seo_simple_menu() {
    add_options_page(
        'SEO Simple Settings', 
        'SEO Simple', 
        'manage_options', 
        'seo-simple', 
        'seo_simple_settings_page'
    );
}
add_action('admin_menu', 'seo_simple_menu');

// Ayar sayfası içeriği
function seo_simple_settings_page() {
    ?>
    <div class="wrap">
        <h1>SEO Simple Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('seo_simple_options_group');
            do_settings_sections('seo-simple');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Site Başlık</th>
                    <td><input type="text" name="seo_simple_site_title" value="<?php echo esc_attr( get_option('seo_simple_site_title') ); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Meta Açıklama</th>
                    <td><textarea name="seo_simple_meta_description"><?php echo esc_textarea( get_option('seo_simple_meta_description') ); ?></textarea></td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Ayarları kaydedin
function seo_simple_register_settings() {
    register_setting('seo_simple_options_group', 'seo_simple_site_title');
    register_setting('seo_simple_options_group', 'seo_simple_meta_description');
}
add_action('admin_init', 'seo_simple_register_settings');

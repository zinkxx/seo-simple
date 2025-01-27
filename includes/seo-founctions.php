<?php

// Başlık ve açıklama ayarlarını ekleyin
function seo_simple_meta_tags() {
    if (is_singular()) {
        $site_title = get_option('seo_simple_site_title');
        $meta_description = get_option('seo_simple_meta_description');

        echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . PHP_EOL;
        echo '<title>' . esc_html($site_title) . ' | ' . get_the_title() . '</title>' . PHP_EOL;
    }
}
add_action('wp_head', 'seo_simple_meta_tags');

<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public function options() {
        $options = (object)[
            'location' => get_field('location', 'option'),
            'contactEmail' => get_field('contact_email', 'option'),
            'links' => get_field('links', 'option'),
            'newsletter_text' => get_field('newsletter_text', 'option'),
        ];

        return $options;
	}
}

<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\PostType;
use Themosis\Support\Facades\Taxonomy;

class Post extends Hookable
{
    /**
     * Alter the "Post" post type.
     */
    public function register()
    {
      add_action( 'init', [$this, 'disable_post_tag'] );
    }
    
    function disable_post_tag()
    {
      // Disable the post_tag taxonomy for the post type
      register_taxonomy( 'post_tag', [] );
    }
}
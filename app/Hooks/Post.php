<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\PostType;
use Themosis\Support\Facades\Metabox;
use Themosis\Support\Facades\Field;
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
      register_taxonomy( 'post_tag', array( 'my_post_type_here' ) );
    }
}
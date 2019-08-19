<?php

namespace App\Http\Controllers;

use View;

class PageController extends Controller
{
  /**
   * Show the home page.
   */
  public function front($post)
  {        
    $references = get_posts( array(
      'post_type' => 'reference',
      'posts_per_page' => 3,
      'order' => 'DESC',
      'orderby' => 'date'
    ));

    $posts = get_posts( array(
      'post_type' => 'post',
      'posts_per_page' => 3,
      'order' => 'DESC',
      'orderby' => 'date'
    ));

    return view('page-front', ['post' => $post, 'references' => $references, 'posts' => $posts]);
  }

  public function single($post)
  {        
    return view('page-single', ['post' => $post]);
  }

  public function notreObjectif($post)
  {        
    return view('page-notre-objectif', ['post' => $post]);
  }
  
}

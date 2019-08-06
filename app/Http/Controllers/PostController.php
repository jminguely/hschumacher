<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;

class PostController extends Controller
{
  /**
   * Show the single post
   */
  public function single($post, $query)
  {
    return view('post-single', ['post' => $post]);
  }

  public function archive($post, $query) {
    $posts = $query->get_posts();

    $categories = get_terms('category');

    if (isset(get_queried_object()->term_id)) {
      $currentCategory = get_queried_object()->term_id;
    } else {
      $currentCategory = NULL;
    }

    return view('post-archive', ['post' => $post, 'posts' => $posts, 'categories' => $categories, 'currentCategory' => $currentCategory]);
  }
}

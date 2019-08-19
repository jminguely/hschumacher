<?php

namespace App\Http\Controllers;

use App\Providers\FpdfServiceProvider;


use View;

class ReferenceController extends Controller
{
  /**
   * Show the single reference post
   */
  public function single($post, $query)
  {
    return view('reference-single', ['post' => $post]);
  }

  /**
   * Generate the pdf
   */
  public function pdf($name)
  {
    $post = get_page_by_path($name,OBJECT,'reference');
    $output = FpdfServiceProvider::generate($post);
    
    return response($output, 200)->header('Content-Type', 'application/pdf');
  }

  public function archive($post, $query) {
    if (isset(get_queried_object()->term_id)) {
      $currentType = get_term(get_queried_object()->term_id);
    } else {
      $currentType = NULL;
    }

    $posts = $query->get_posts();

    $types = get_terms('type');

    return view('reference-archive', ['post' => $post, 'posts' => $posts, 'types' => $types, 'currentType' => $currentType]);
  }
}

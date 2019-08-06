<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;

class PageController extends Controller
{
  /**
   * Show the home page.
   */
  public function front($post)
  {        
    return view('page-front', ['post' => $post]);
  }

  public function single($post)
  {        
    return view('page-single', ['post' => $post]);
  }
  
}

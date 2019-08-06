<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Themosis\Core\Forms\FormHelper;
use Themosis\Core\Validation\ValidatesRequests;

use View;

class Controller extends BaseController
{
  use FormHelper, ValidatesRequests;

  /**
   * Constructor
   * -----------
   * Adds the menu to all page
   */
  public function __construct()
  {
    $menu_name = 'main-nav';
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
    $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

    View::share([
      'mainNav'  => $menuitems,
    ]);    
  }
}

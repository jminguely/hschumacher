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
    $locations = get_nav_menu_locations();
    
    $mainmenu = wp_get_nav_menu_object( $locations[ 'main-nav' ] );
    $mainmenuitems = wp_get_nav_menu_items( $mainmenu->term_id, array( 'order' => 'DESC' ) );
    
    $topmenu = wp_get_nav_menu_object( $locations[ 'top-nav' ] );
    $topmenuitems = wp_get_nav_menu_items( $topmenu->term_id, array( 'order' => 'DESC' ) );

    View::share([
      'mainNav'  => $mainmenuitems,
      'topNav'  => $topmenuitems,
    ]);    
  }
}

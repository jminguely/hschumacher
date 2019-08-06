<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Metabox;
use Themosis\Support\Facades\Field;

class Homepage extends Hookable
{
    /**
     * Register the "Homepage" as a custom post type.
     */
    public function register()
    {
        $this->registerCustomFields();
    }

    protected function registerCustomFields()
    {
      Metabox::make('homepage', 'page')
        ->setTemplate('homepage')
        ->add(Field::collection('gallery'))
        ->set();
    }
}
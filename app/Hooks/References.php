<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\PostType;
use Themosis\Support\Facades\Metabox;
use Themosis\Support\Facades\Field;
use Themosis\Support\Facades\TaxonomyField;
use Themosis\Support\Facades\Taxonomy;

class References extends Hookable
{
    /**
     * Register the "References" as a custom post type.
     */
    public function register()
    {
        $reference = $this->registerPostType();
        $type = $this->registerTaxonomy();

        Metabox::make('properties', 'reference')
            ->add(Field::editor('description'))
            ->add(Field::editor('entreprise'))
            ->add(Field::editor('realisation'))
            ->add(Field::editor('prestation'))
            ->add(Field::editor('couts'))
            ->add(Field::editor('divers'))
            ->add(Field::collection('galerie'))
            ->set();

        // Not working for now
        // TaxonomyField::make($type)
        //     ->add(Field::media('image'))
        //     ->set();
    }

    /**
     * Register a custom post type in order to handle
     * a collection of references within the WordPress administration.
     *
     * @return PostTypeInterface
     */
    protected function registerPostType()
    {
        return PostType::make('reference', 'Références', 'Référence')
            ->setArguments([
                'public' => true,
                'menu_position' => 5,
                'rewrite' => [
                    'slug' => 'references'
                ],
                'has_archive' => "references",
                'taxonomies' => ['type'],
                'supports' => [
                    'title',
                    'thumbnail'
                ],
                'menu_icon' => 'dashicons-clipboard'
            ])
            ->setLabels([
                'menu_name' => 'Références'
            ])
            ->set();
    }

    protected function registerTaxonomy()
    {
        return Taxonomy::make('type', 'reference', 'Types', 'Type')
            ->setArguments([
                'public' => true,
                'show_in_nav_menus'  => false,
                'hierarchical' => true,
                'show_tagcloud' => false,
                'show_in_quick_edit' => true,
                'capabilities'      => array(
					'edit_terms'   => 'manage_options',
					'manage_terms' => 'manage_options',
				),
            ])
            ->set();
    }
}
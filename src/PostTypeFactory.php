<?php

namespace JoshTaylor;

use Illuminate\Support\Str;

class PostTypeFactory
{
    protected $name;

    protected $arguments;

    protected $labels;

    public static function create($name, $arguments = [], $labels = [])
    {
        return (new static($name, $arguments, $labels))->make();
    }

    public function __construct($name, $arguments = [], $labels = [])
    {
        $this->name = $name;
        $this->arguments = $arguments;
        $this->labels = $labels;
    }

    public function make()
    {
        return new PostType(
            $this->name, $this->arguments(), $this->labels()
        );
    }

    public function arguments()
    {
        return array_merge([
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
        ], $this->arguments);
    }

    public function labels()
    {
        $singular = Str::title(str_replace('_', ' ', $this->name));
        $plural = Str::plural($singular);

        return array_merge([
            'name' => $plural,
            'singular_name' => $singular,
            'add_new' => 'Add New',
            'add_new_item' => "Add New {$singular}",
            'new_item' => "New {$singular}",
            'edit_item' => "Edit {$singular}",
            'view_item' => "View {$singular}",
            'all_items' => "All {$plural}",
            'search_items' => "Search {$plural}",
            'not_found' => "No {$plural} found.",
            'not_found_in_trash' => "No {$plural} found in Trash.",
            'featured_image' => "{$singular} Cover Image",
            'set_featured_image' => 'Set cover image',
            'remove_featured_image' => 'Remove cover image',
            'use_featured_image' => 'Use as cover image',
            'archives' => "{$singular} archives",
            'insert_into_item' => "Insert into {$singular}",
            'uploaded_to_this_item' => "Uploaded to this {$singular}",
            'filter_items_list' => "Filter {$singular} list",
            'items_list_navigation' => "{$singular} list navigation",
            'items_list' => "{$singular} list",
        ], $this->labels);
    }
}

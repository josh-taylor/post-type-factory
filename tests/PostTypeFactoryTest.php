<?php

use JoshTaylor\PostTypeFactory;
use PHPUnit\Framework\TestCase;

class PostTypeFactoryTest extends TestCase
{
    /** @test */
    function creating_a_post_type_with_no_params_sets_some_sane_defaults()
    {
        $postType = PostTypeFactory::create('testimonial');

        $this->assertEquals([
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
        ], $postType->arguments());

        $this->assertEquals('Testimonials', $postType->labels('name'));
        $this->assertEquals('Testimonial', $postType->labels('singular_name'));
        $this->assertEquals('Add New Testimonial', $postType->labels('add_new_item'));
    }

    /** @test */
    function register_a_new_post_type()
    {
        $postType = PostTypeFactory::create('testimonial');

        $result = $postType->register();

        $this->assertEquals('testimonial', $result['postType']);
        $this->assertEquals(array_merge([
            'labels' => $postType->labels(),
        ], $postType->arguments()), $result['args']);
    }

    /** @test */
    function arguments_can_be_overridden()
    {
        $postType = PostTypeFactory::create('testimonial', [
            'public' => false,
        ]);

        $this->assertArraySubset([
            'public' => false,
        ], $postType->arguments());
    }

    /** @test */
    function labels_can_be_overridden()
    {
        $postType = PostTypeFactory::create('testimonial', [], [
            'name' => 'My Testimonials',
            'singular_name' => 'My Testimonial',
        ]);

        $this->assertEquals('My Testimonials', $postType->labels('name'));
        $this->assertEquals('My Testimonial', $postType->labels('singular_name'));
    }
}

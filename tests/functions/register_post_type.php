<?php

/**
 * Our mock version of WordPress' register_post_type() function.
 *
 * @param string $postType
 * @param array $args
 * @return array
 */
function register_post_type($postType, $args)
{
    return [
        'postType' => $postType,
        'args' => $args,
    ];
}

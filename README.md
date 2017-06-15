# Post Type Factory

Born out of frustration from registering post types in WordPress. Easily register new post types without having to
specify every option.

## Installation

You can install the package through composer.

```sh
composer require josh-taylor/post-type-factory
```

## Usage

Full documentation isn't yet available, but you can check out the tests for more use cases. 

In general, anything that you can pass through to the `register_post_type()` function you can pass through to the 
`create()` method.

```php
use JoshTaylor\PostTypeFactory;

PostTypeFactory::create('testimonial')->register();
```

## Development

Please submit pull requests for new features or bug fixes, any contributions are welcome.

## License

This package is licensed under the MIT license. See the LICENSE file for more details.


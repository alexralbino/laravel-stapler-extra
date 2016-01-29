# Laravel Stapler Extra

This package add some features that [laravel-stapler](https://github.com/CodeSleeve/laravel-stapler) doesn't have

## Requirements
This package currently requires Laravel >= 5.1.

## Installation
Laravel-Stapler-Extra is distributed as a composer package, which is how it should be used in your app.

Install the package using Composer.  Edit your project's `composer.json` file to require `mixdinternet/laravel-stapler-extra`.

```js
  "require": {
    "mixdinternet/laravel-stapler-extra": "0.1.*"
  }
```

or

```js
  composer require mixdinternet/laravel-stapler-extra
```

Once this operation completes, the final step is to change to your custom class

Open `/config/laravel-stapler/bindings.php`

Change:
```php
  'interpolator' => '\Codesleeve\Stapler\Interpolator',
```
to
```php
  'interpolator' => '\Mixdinternet\LaravelStaplerExtra\Interpolator',
```

## Custom Interpolations
*   **:filename_slugify**  - Apply `str_slug()` on file attachment name, e.g atenção.jpg -> atencao.jpg.
*   **:class_lower**  - The class name (lowercase) of the model containing the file attachment, e.g user. This will include the class namespace.
*   **:class_name_lower** - The class name (lowercase) of the model, without its namespace.
*   **:namespace_lower**  - The namespace (lowercase) of the model containing the file attachment, e.g mixdinternet/user.

# Nova Shift Index Links

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pavloniym/nova-shift-index-links.svg?style=flat-square)](https://packagist.org/packages/pavloniym/nova-shift-index-links)

This [Laravel Nova](https://nova.laravel.com) package adds new resource field to shift index links and move them to
custom position.

![Nova Shift Index Links](https://raw.githubusercontent.com/pavloniym/nova-shift-index-links/main/.github/assets/screenshot1.png)

## Requirements

- `php: >=8.0`
- `laravel/nova: ^4.1`

## Installation

Install the package in a Laravel Nova project via Composer:

```bash
composer require pavloniym/nova-shift-index-links
```

## Usage

Just add `ShiftIndexLinks::make()` field to your resource fields section.  
By default field will move shift index links to 1 index position (after checkboxes).  
You can set custom position inside row using `setPosition(int $position)` method.

```php
use Pavloniym\ShiftIndexLinks\ShiftIndexLinks;

public function fields(Request $request)
{
    return [
      
        // ... Nova default fields
      
        // Move links after checkboxes
        ShiftIndexLinks::make(),
        
        // OR set custom position
        ShiftIndexLinks::make()->setPosition(4),
      
        // ... Nova default fields
    ];
}
```

## License

This project is open-sourced software licensed under the [MIT license](LICENSE.md).

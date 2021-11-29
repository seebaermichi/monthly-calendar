# A package which provides a monthly calendar with days and events depending on given months and events.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/seebaermichi/monthly-calendar.svg?style=flat-square)](https://packagist.org/packages/seebaermichi/monthly-calendar)
[![Tests](https://github.com/seebaermichi/monthly-calendar/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/seebaermichi/monthly-calendar/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/seebaermichi/monthly-calendar.svg?style=flat-square)](https://packagist.org/packages/seebaermichi/monthly-calendar)

This is where your description should go. Try and limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require seebaermichi/monthly-calendar
```

## Usage

```php
// Will return an array with the given months and their weeks and days
// weeks will start with Monday
$monthlyCalendar = new Seebaermichi\MonthlyCalendar(['December 2021', 'January 2022']);
$calendar = $monthlyCalendar->getCalendar();

// Will return an array with the given months and their weeks and days
// weeks will start with Sunday
$monthlyCalendar = new Seebaermichi\MonthlyCalendar(['February 1989', 'March 1989'], 'Sun');
$calendar = $monthlyCalendar->getCalendar();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Michael Becker](https://github.com/seebaermichi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

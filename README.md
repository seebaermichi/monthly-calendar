# A package which provides a monthly calendar with days and events depending on given months and events.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/seebaermichi/monthly-calendar.svg?style=flat-square)](https://packagist.org/packages/seebaermichi/monthly-calendar)
[![Tests](https://github.com/seebaermichi/monthly-calendar/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/seebaermichi/monthly-calendar/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/seebaermichi/monthly-calendar.svg?style=flat-square)](https://packagist.org/packages/seebaermichi/monthly-calendar)

This package returns a simple array with months, weeks and events depending on the months and events you provide. You can find a simple example here:  [https://monthly-calendar.michael-becker-berlin.de/api/v1/months/?months=December 2021,January 2022](https://monthly-calendar.michael-becker-berlin.de/api/v1/months/?months=December%202021,January%202022)

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

// Provide simple array of events and event label to get related days labeled
// First of December will have an event attribute 'birthday'
$monthlyCalendar = new Seebaermichi\MonthlyCalendar(['December 2021']);
$calendar = $monthlyCalendar->getCalendar(['2021-12-01'], 'birthday');
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

<?php

it('can return an array of given months with weeks and days', function () {
    $monthlyCalendar = new Seebaermichi\MonthlyCalendar\MonthlyCalendar(
        ['December 2021', 'January 2022']
    );

    $calendar = $monthlyCalendar->getCalendar();
    $weeksOfDecember = count($calendar['December 2021']);
    $weeksOfJanuary = count($calendar['January 2022']);

    expect($calendar)->toBeArray();
    expect(count($calendar))->toBe(2);
    expect($weeksOfDecember)->toBe(5);
    expect($weeksOfJanuary)->toBe(6);
});

it('can change the start day of the week', function () {
    $monthlyCalendar = new Seebaermichi\MonthlyCalendar\MonthlyCalendar(
        ['April 2000'],
        'Fri'
    );
    $weekdays = $monthlyCalendar->getWeekdays();
    $firstWeekDay = $weekdays[0];

    expect($firstWeekDay)->toBe('Fri');
});

it('can have month with weeks with given start day', function () {
    $monthlyCalendar = new Seebaermichi\MonthlyCalendar\MonthlyCalendar(
        ['March 2023'],
        'Fri'
    );
    $calendar = $monthlyCalendar->getCalendar();
    $firstWeekDay = $calendar['March 2023'][0][0]['day'];

    expect($firstWeekDay)->toBe('Fri');
});

it('can use default weekdays if weekday is not valid', function () {
    $monthlyCalendar = new Seebaermichi\MonthlyCalendar\MonthlyCalendar(
        ['January 2017'],
        'Bla'
    );
    $weekdays = $monthlyCalendar->getWeekdays();
    $firstWeekDay = $weekdays[0];

    expect($firstWeekDay)->toBe('Mon');
});

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

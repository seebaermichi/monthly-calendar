<?php

namespace Seebaermichi\MonthlyCalendar;

class MonthlyCalendar
{
    private const WEEK_DAYS = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    private const DEFAULT_WEEK_START = 'Mon';

    public function __construct(
        private array $months,
        private string $weekStartsWith = self::DEFAULT_WEEK_START
    ) {
    }

    public function getCalendar($events = [], $eventInfo = '', $eventFormat = 'Y-m-d'): array
    {
        $calendar = [];
        $weekdays = $this->getWeekdays();

        foreach ($this->months as $month) {
            $calendar[$month] = [];
            $counter = 1;
            $timestamp = strtotime($month);
            $firstDay = date('D', $timestamp);
            $amountOfDays = date('t', $timestamp);
            $week = 0;

            while ($counter <= $amountOfDays) {
                $calendar[$month][$week] = [];

                foreach ($weekdays as $weekday) {
                    $timestring = null;
                    $date = null;
                    $event = null;

                    if (
                        ($firstDay === $weekday && $counter === 1)
                        || ($counter > 1 && $counter <= $amountOfDays)
                    ) {
                        $timestring = strtotime($counter . '. ' . $month);
                        $date = new \DateTimeImmutable(date('Y-m-d', strtotime($counter . '. ' . $month)));
                        $event = in_array($date->format($eventFormat), $events) ? $eventInfo : '';

                        $counter++;
                    }

                    $dayData = $this->getDayData($weekday, $timestring, $date, $event);
                    $calendar[$month][$week][] = $dayData;
                }

                $week++;
            }
        }

        return $calendar;
    }

    public function getWeekdays(): array
    {
        if ($this->weekStartsWith === self::DEFAULT_WEEK_START) {
            return self::WEEK_DAYS;
        }

        if (! in_array($this->weekStartsWith, self::WEEK_DAYS)) {
            return self::WEEK_DAYS;
        }

        $key = array_search($this->weekStartsWith, self::WEEK_DAYS);
        $firstPart = array_slice(self::WEEK_DAYS, $key);
        $lastPart = array_slice(self::WEEK_DAYS, 0, $key);

        return array_merge($firstPart, $lastPart);
    }

    private function getDayData($weekday, $timestring = null, $date = null, $event = null): array
    {
        return [
            'day' => $weekday,
            'timestring' => $timestring,
            'date' => $date,
            'event' => $event,
        ];
    }
}

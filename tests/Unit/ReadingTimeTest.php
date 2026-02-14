<?php

namespace JordJD\ReadingTime\Tests;

use JordJD\ReadingTime\ReadingTime;
use PHPUnit\Framework\TestCase;

class ReadingTimeTest extends TestCase
{
    public function testLargeTextReadingTimeMinutes()
    {
        $text = file_get_contents(__DIR__.'/data/large.txt');

        $this->assertEquals(9.7699999999999996, (new ReadingTime($text))->minutes());
    }

    public function testLargeTextReadingTimeSeconds()
    {
        $text = file_get_contents(__DIR__.'/data/large.txt');

        $this->assertEquals(586.19999999999993, (new ReadingTime($text))->seconds());
    }

    public function testSmallTextReadingTimeMinutes()
    {
        $text = file_get_contents(__DIR__.'/data/small.txt');

        $this->assertEquals(0.40999999999999998, (new ReadingTime($text))->minutes());
    }

    public function testSmallTextReadingTimeSeconds()
    {
        $text = file_get_contents(__DIR__.'/data/small.txt');

        $this->assertEquals(24.599999999999998, (new ReadingTime($text))->seconds());
    }

    public function testSmallTextReadingTimeSecondsDifferentWordPerMinute()
    {
        $wordPerMinute = 240;
        $text = file_get_contents(__DIR__.'/data/small.txt');

        $this->assertEquals(20.5, (new ReadingTime($text))->setWordsPerMinute($wordPerMinute)->seconds());
    }
}

<?php

namespace JordJD\ReadingTime\Tests;

use JordJD\ReadingTime\ReadingTime;
use PHPUnit\Framework\TestCase;

class ReadingTimeTest extends TestCase
{
    public function testLargeTextReadingTimeMinutes()
    {
        $text = file_get_contents(__DIR__.'/data/large.txt');

        $this->assertSame(10, (new ReadingTime($text))->minutes());
    }

    public function testLargeTextReadingTimeSeconds()
    {
        $text = file_get_contents(__DIR__.'/data/large.txt');

        $this->assertSame(587, (new ReadingTime($text))->seconds());
    }

    public function testSmallTextReadingTimeMinutes()
    {
        $text = file_get_contents(__DIR__.'/data/small.txt');

        $this->assertSame(1, (new ReadingTime($text))->minutes());
    }

    public function testSmallTextReadingTimeSeconds()
    {
        $text = file_get_contents(__DIR__.'/data/small.txt');

        $this->assertSame(25, (new ReadingTime($text))->seconds());
    }

    public function testSmallTextReadingTimeSecondsDifferentWordPerMinute()
    {
        $wordPerMinute = 240;
        $text = file_get_contents(__DIR__.'/data/small.txt');

        $this->assertSame(21, (new ReadingTime($text))->setWordsPerMinute($wordPerMinute)->seconds());
    }

    public function testWordsPerMinuteMustBePositive()
    {
        $this->expectException(\InvalidArgumentException::class);

        (new ReadingTime('Some text'))->setWordsPerMinute(0);
    }
}

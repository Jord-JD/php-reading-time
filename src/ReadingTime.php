<?php

namespace JordJD\ReadingTime;

class ReadingTime
{
    private $content;
    private $wordsPerMinute = 200;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function setWordsPerMinute($wordsPerMinute)
    {
        $this->wordsPerMinute = $wordsPerMinute;

        return $this;
    }

    public function minutes()
    {
        return str_word_count($this->content) / $this->wordsPerMinute;
    }

    public function seconds()
    {
        return $this->minutes() * 60;
    }
}

<?php

namespace JordJD\ReadingTime;

class ReadingTime
{
    private $content;
    private $wordsPerMinute = 200;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function setWordsPerMinute(int $wordsPerMinute): self
    {
        $this->wordsPerMinute = $wordsPerMinute;

        return $this;
    }

    public function minutes(): float
    {
        return str_word_count($this->content) / $this->wordsPerMinute;
    }

    public function seconds(): float
    {
        return $this->minutes() * 60;
    }
}

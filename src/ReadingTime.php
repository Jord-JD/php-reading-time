<?php

namespace JordJD\ReadingTime;

use InvalidArgumentException;

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
        if ($wordsPerMinute <= 0) {
            throw new InvalidArgumentException('Words per minute must be greater than zero.');
        }

        $this->wordsPerMinute = $wordsPerMinute;

        return $this;
    }

    public function minutes(): int
    {
        return (int) ceil(str_word_count($this->content) / $this->wordsPerMinute);
    }

    public function seconds(): int
    {
        return (int) ceil((str_word_count($this->content) / $this->wordsPerMinute) * 60);
    }
}

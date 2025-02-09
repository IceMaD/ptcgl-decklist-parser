<?php

namespace Icemad\TcglDecklistParser\Formatter;

use Icemad\TcglDecklistParser\Model\LineInterface;

interface DecklistFormatterInterface
{
    /**
     * @param LineInterface[] $lines
     */
    public function format(array $lines): string;
}

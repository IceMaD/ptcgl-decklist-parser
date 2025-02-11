<?php

namespace Icemad\PtcglDecklistParser\Formatter;

use Icemad\PtcglDecklistParser\Model\LineInterface;

interface DecklistFormatterInterface
{
    /**
     * @param LineInterface[] $lines
     */
    public function format(array $lines): string;
}

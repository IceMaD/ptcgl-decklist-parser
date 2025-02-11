<?php

namespace Icemad\PtcglDecklistParser\Parser;

use Icemad\PtcglDecklistParser\Model\LineInterface;

interface LineParserInterface
{
    public function parse(string $line): ?LineInterface;
}

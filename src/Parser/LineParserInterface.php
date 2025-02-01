<?php

namespace Icemad\TcglDecklistParser\Parser;

use Icemad\TcglDecklistParser\Model\LineInterface;

interface LineParserInterface
{
    public function parse(string $line): ?LineInterface;
}
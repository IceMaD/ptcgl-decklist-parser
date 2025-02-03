<?php

namespace Icemad\TcglDecklistParser\Parser;

use Icemad\TcglDecklistParser\Model\ParsingResult;

interface DecklistParserInterface
{
    public function parse(string $deckList): ParsingResult;
}
<?php

namespace Icemad\PtcglDecklistParser\Parser;

use Icemad\PtcglDecklistParser\Model\ParsingResult;

interface DecklistParserInterface
{
    public function parse(string $deckList): ParsingResult;
}

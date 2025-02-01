<?php

namespace Icemad\TcglDecklistParser\Parser;

use Icemad\TcglDecklistParser\Model\CardLine;

final class CardLineParser implements LineParserInterface
{
    private const string LINE_REGEXP = '/^(?P<count>\d+)\b.*\b(?P<set>[A-Z]+) (?P<card>\d+)\b.*$/';

    public function parse(string $line): ?CardLine
    {
        if (!preg_match(self::LINE_REGEXP, $line, $matches)) {
            return null;
        }

        return new CardLine(
            $line,
            (int)$matches['count'],
            $matches['set'],
            (int)$matches['card'],
        );
    }
}
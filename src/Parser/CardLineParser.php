<?php

namespace Icemad\TcglDecklistParser\Parser;

use Icemad\TcglDecklistParser\Model\CardLine;

final readonly class CardLineParser implements LineParserInterface
{
    private const string LINE_REGEXP = '/^(?P<count>\d+)\b (?P<name>.+) \b(?P<set>[A-Z]+) (?P<number>\d+)\b.*$/';

    public function parse(string $line): ?CardLine
    {
        if (!preg_match(self::LINE_REGEXP, $line, $matches)) {
            return null;
        }

        return new CardLine(
            $line,
            (int)$matches['count'],
            $matches['name'],
            $matches['set'],
            (int)$matches['number'],
        );
    }
}

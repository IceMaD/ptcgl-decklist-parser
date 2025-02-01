<?php

namespace Icemad\TcglDecklistParser\Parser;

use Icemad\TcglDecklistParser\Model\CategoryLine;

final readonly class CategoryLineParser implements LineParserInterface
{
    private const string LINE_REGEXP = '/^(?P<category>.+) : (?P<count>\d+)$/';

    public function parse(string $line): ?CategoryLine
    {
        if (!preg_match(self::LINE_REGEXP, $line, $matches)) {
            return null;
        }

        return new CategoryLine(
            $line,
            (int) $matches['count'],
            $matches['category'],
        );
    }
}
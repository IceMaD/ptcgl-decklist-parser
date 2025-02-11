<?php

namespace Icemad\PtcglDecklistParser\Parser;

use Icemad\PtcglDecklistParser\Model\LineInterface;
use Icemad\PtcglDecklistParser\Model\ParsingResult;

final readonly class DecklistParser implements DecklistParserInterface
{
    public function __construct(
        /** @var LineParserInterface[] */
        private array $parsers,
    ) {
    }

    public function parse(string $deckList): ParsingResult
    {
        $lines = explode("\n", $deckList);

        $parsedLines = [];
        $parsingFailures = [];

        foreach ($lines as $line) {
            $line = trim($line);

            if (empty($line)) {
                continue;
            }

            $parsedLine = array_reduce(
                $this->parsers,
                function (?LineInterface $parsedLine, LineParserInterface $parser) use ($line) {
                    if (null !== $parsedLine) {
                        return $parsedLine;
                    }

                    return $parser->parse($line);
                },
            );

            if (is_null($parsedLine)) {
                $parsingFailures[] = $line;
            } else {
                $parsedLines[] = $parsedLine;
            }
        }

        return new ParsingResult($parsedLines, $parsingFailures);
    }
}

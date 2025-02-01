<?php

namespace Icemad\TcglDecklistParser\Model;

final readonly class ParsingResult
{
    public function __construct(
        /** @var LineInterface[] */
        private array $parsedLines,
        /** @var string[] */
        private array $parsingFailures,
    ) {
    }

    /**
     * @return LineInterface[]
     */
    public function getParsedLines(): array
    {
        return $this->parsedLines;
    }

    /**
     * @return string[]
     */
    public function getParsingFailures(): array
    {
        return $this->parsingFailures;
    }
}

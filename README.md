# tcgl-decklist-parser

A parser for decklists in the Trading Card Game Live (TCGL) format.

## Features

- **Decklist Parsing**: Convert TCGL decklists into structured data for analysis or transformation.

## Installation

To include this parser in your project, you can install it via Composer:

```bash
composer require icemad/tcgl-decklist-parser
```

Then to use it:

```php
$parser = new DecklistParser([
    new CardLineParser(),
    new CategoryLineParser(),
]);
$result = $parser->parse($deckList) // string containing decklist
```

You can convert the result back to a string like this:

```php
$string = new DecklistFormatter()->format($result->getParsedLines());
```


The output is an instance of `Icemad\TcglDecklistParser\Model\ParsingResult`.
It the parsing is successful, `ParsingResult::getParsingFailures` should return an empty array.

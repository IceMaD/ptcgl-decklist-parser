<?php

namespace Icemad\TcglDecklistParser\Formatter;

use Icemad\TcglDecklistParser\Model\CardLine;
use Icemad\TcglDecklistParser\Model\CategoryLine;
use Icemad\TcglDecklistParser\Model\LineInterface;

class DecklistFormatter implements DecklistFormatterInterface
{
    /**
     * @param LineInterface[] $lines
     *
     * @return string
     */
    public function format(array $lines): string
    {
        $output = '';

        foreach ($lines as $line) {
            if ($line instanceof CategoryLine) {
                if ($output !== '') {
                    $output .= "\r\n";
                }
                $output .= "{$line->getCategory()} : {$line->getCount()}\r\n";
            }

            if ($line instanceof CardLine) {
                $output .= "{$line->getCount()} {$line->getName()} {$line->getSet()} {$line->getCardNumber()}\r\n";
            }
        }

        return trim($output);
    }
}

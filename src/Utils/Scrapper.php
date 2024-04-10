<?php

namespace AfyScrapper\Utils;

use AfyScrapper\Exceptions\InternalServerErrorException;
use AfyScrapper\Exceptions\PageNotFoundException;
use DOMDocument;
use Exception;

libxml_use_internal_errors(true);

readonly class Scrapper
{

    public function readFlipUrlFromPagestead($url): ?string
    {
        set_error_handler(fn() => throw new InternalServerErrorException());

        try {
            $content = file_get_contents($url);
        } catch (Exception $e) {
            throw new PageNotFoundException($e->getMessage());
        }

        restore_error_handler();

        $dom = new DOMDocument();
        $dom->loadHTML($content);
        // use dom element to get #flipbook
        $element = $dom->getElementById('flipping-book');
        if (is_null($element)) {
            throw new Exception('Element with id flipping-books not found');
        }

        return $element->attributes->getNamedItem('href')->nodeValue;
    }
}
<?php

use Leandro47\ConverterResponse\Converter;
use Leandro47\ConverterResponse\Format\Xml;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    public function testDecodeXml()
    {
        $xml = file_get_contents('https://economia.awesomeapi.com.br/xml/last/USD-BRL');

        $converter =  new Converter($xml);
        $object = $converter->from(new Xml());

        self::assertInstanceOf(Converter::class, $object);
    }
}

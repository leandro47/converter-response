<?php

namespace Leandro47\ConverterResponse\Format;

use Leandro47\ConverterResponse\Interfaces\TypeInterface;
use Spatie\ArrayToXml\ArrayToXml;

class Xml implements TypeInterface
{
    public function decode(string $content): object
    {
        $object = simplexml_load_string($content);

        return json_decode(json_encode($object));
    }

    public function encode(object $decoded)
    {
        $data = json_decode(json_encode($decoded), true);

        return ArrayToXml::convert($data);
    }
}

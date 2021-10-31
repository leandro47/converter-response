<?php

namespace Leandro47\ConverterResponse\Format;

use Leandro47\ConverterResponse\Interfaces\TypeInterface;

class Json implements TypeInterface
{
    public function decode(string $content): object
    {
        return json_decode($content);
    }

    public function encode(object $decoded)
    {
        return json_encode($decoded);
    }
}

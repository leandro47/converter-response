<?php

namespace Leandro47\ConverterResponse\Interfaces;

interface TypeInterface
{
    public function decode(string $content): object;
    
    public function encode(object $decoded);
}

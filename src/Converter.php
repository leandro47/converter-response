<?php

namespace Leandro47\ConverterResponse;

use Leandro47\ConverterResponse\Interfaces\TypeInterface;

class Converter
{
    private string $content;
    private ?object $decoded;
    private ?string $encoded;

    public function __construct(string $content)
    {
        $this->content = $content;
        $this->decoded = null;
        $this->encoded = null;
    }

    public function from(TypeInterface $typeInterface): self
    {
        $this->decoded = $typeInterface->decode($this->content);

        return $this;
    }

    public function to(TypeInterface $typeInterface): self
    {
        $this->encoded = $typeInterface->encode($this->decoded);

        return $this;
    }

    public function get(): ? string
    {
        return $this->encoded;
    }
}

<?php

namespace AppBundle\Converter;

class ConvertToObject implements ConverterInterface
{
    public function supports(string $format)
    {
        return $format === 'object';
    }

    public function convert(array $data)
    {
        return (object) $data;
    }
}
<?php

namespace AppBundle\Converter;

class ConvertToObject implements ConverterInterface
{
    public function convert(array $data)
    {
        return (object) $data;
    }
}
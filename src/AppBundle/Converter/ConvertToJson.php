<?php

namespace AppBundle\Converter;

class ConvertToJson implements ConverterInterface
{
    public function supports(string $format)
    {
        return $format === 'json';
    }

    public function convert(array $data)
    {
        return json_encode($data);
    }
}
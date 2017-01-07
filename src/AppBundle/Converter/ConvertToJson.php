<?php

namespace AppBundle\Converter;

class ConvertToJson implements ConverterInterface
{
    public function convert(array $data)
    {
        return json_encode($data);
    }
}
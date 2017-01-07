<?php

namespace AppBundle\Converter;

use Symfony\Component\Yaml\Yaml;

class ConvertToYaml implements ConverterInterface
{
    public function convert(array $data)
    {
        return Yaml::dump($data);
    }
}
<?php

namespace AppBundle\Converter;

use Symfony\Component\Yaml\Yaml;

class ConvertToYaml implements ConverterInterface
{
    public function supports(string $format)
    {
        return $format === 'yml';
    }

    public function convert(array $data)
    {
        return Yaml::dump($data);
    }
}
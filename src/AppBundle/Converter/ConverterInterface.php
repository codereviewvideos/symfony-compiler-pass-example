<?php

namespace AppBundle\Converter;

interface ConverterInterface
{
    public function convert(array $data);

    public function supports(string $format);
}
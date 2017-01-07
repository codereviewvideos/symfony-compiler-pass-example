<?php

namespace AppBundle\Converter;

use Symfony\Component\Serializer\Serializer;

class ConvertToXml implements ConverterInterface
{
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    public function supports(string $format)
    {
        return $format === 'xml';
    }

    public function convert(array $data)
    {
        return $this->serializer->encode($data, 'xml');
    }
}
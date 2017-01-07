<?php

namespace AppBundle\Service;

use AppBundle\Converter\ConverterInterface;
use Psr\Log\LoggerInterface;

class Conversion
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var array
     */
    private $converters;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->converters = [];

        $this->logger->debug('Conversion service constructed...');
    }

    public function addConverter(ConverterInterface $converter)
    {
        $this->logger->debug(sprintf(
            'Adding %s to chain of Converters',
            get_class($converter)
        ));

        $this->converters[] = $converter;

        return $this->converters;
    }

    public function convert(array $data, $format)
    {
        $this->logger->debug(sprintf(
            'Trying to convert from %s',
            $format
        ));

        foreach ($this->converters as $converter) {
            if ($converter->supports($format)) {
                return $converter->convert($data);
            }
        }

        throw new \RuntimeException('No supported Converters found in chain.');
    }
}
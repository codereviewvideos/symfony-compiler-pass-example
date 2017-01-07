<?php

namespace AppBundle\Service;

use AppBundle\Converter\ConvertToCsv;
use AppBundle\Converter\ConvertToJson;
use AppBundle\Converter\ConvertToObject;
use AppBundle\Converter\ConvertToXml;
use AppBundle\Converter\ConvertToYaml;
use Monolog\Logger;

class Conversion
{
    /**
     * @var Logger
     */
    private $logger;
    /**
     * @var ConvertToXml
     */
    private $convertToXml;

    public function __construct(
        Logger $logger,
        ConvertToXml $convertToXml
    )
    {
        $this->logger = $logger;
        $this->convertToXml = $convertToXml;
    }

    public function convert($data, $format)
    {
        switch ($format) {
            case 'json':
                $converter = new ConvertToJson();
                break;
            case 'csv':
                $converter = new ConvertToCsv();
                break;
            case 'yml':
                $converter = new ConvertToYaml();
                break;
            case 'xml':
                $converter = $this->convertToXml;
                break;
            case 'object':
                $converter = new ConvertToObject();
                break;
            default:
                throw new \DomainException('no matching converter');
        }

        return $converter->convert($data);
    }
}
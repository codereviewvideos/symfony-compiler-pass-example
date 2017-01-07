<?php

namespace AppBundle\Controller;

use AppBundle\Converter\ConvertToCsv;
use AppBundle\Converter\ConvertToJson;
use AppBundle\Converter\ConvertToYaml;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $data = [
            'abc'   => 123,
            'hello' => 'world',
            'qwe'   => [
                'key' => 'value'
            ],
            'xyz'   => 'alphabet'
        ];

        $format = $request->query->get('format', 'json');

        if ($format === 'json') {
            $converter = new ConvertToJson();
        } elseif ($format === 'csv') {
            $converter = new ConvertToCsv();
        } elseif ($format === 'yml') {
            $converter = new ConvertToYaml();
        } elseif ($format === 'xml') {
            $converter = $this->get('crv.converter.convert_to_xml');
        }

        $output = $converter->convert($data);

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'output' => $output
        ]);
    }
}

<?php

namespace AppBundle\Controller;

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

        $output = $this->get('crv.conversion')->convert($data, $format);

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'output' => $output
        ]);
    }
}

<?php

namespace AppBundle\Controller\FrontEnd;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\FrontEndBaseController;

class DefaultController extends FrontEndBaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $templateVars = array_merge(
            [
                'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
            ],
            $this->getCommonTemplateVariables()
        );
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', $templateVars);
    }
}

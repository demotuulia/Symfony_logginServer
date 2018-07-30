<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Manager\Manager\Bootstrap;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\FrontEndBaseController;

class SystemsController extends FrontEndBaseController
{
    /**
     *  Mail Alert List Action
     *
     * @Route("/systems/", name="systems")
     */
    public function  systemsListAction(Request $request)
    {
        $templateVars = array_merge(
            [
                'list' => $this->get('AppBundle.SystemsControllerManager')->getList(),
                'tableTypeClass' => Bootstrap::$TABLE_TYPE_STRIPED
            ],
            $this->getCommonTemplateVariables()
        );
        
        return $this->render('frontEnd/systemlist.html.twig', $templateVars);
    }
    
    
    /**
     * editSystemAction
     *
     * @Route("/editsystem/{systemid}", name="editsystem")
     */
    public function editSystemAction($systemid)
    {
        
        $systemsControllerManager =  $this->get('AppBundle.SystemsControllerManager');

        $result  = $systemsControllerManager->postForm();

        if (isset($result['saved'])) {
            return $this->redirectToRoute('systems');
        }

        $templateVars = array_merge(
            [
                'errors' => isset($result['errors']) ? $result['errors'] : [],
                'form' => $systemsControllerManager->getEditForm($systemid),
                'formClass' => Bootstrap::$FORM_FIELD_STANDARD
            ],
            $this->getCommonTemplateVariables()
        );
        return $this->render('frontEnd/editsystem.html.twig', $templateVars);
    }

    
    /**
     *  Mail Alert List Action
     *
     * @Route("/deletesystem/{systemid}", name="deletesystem")
     */
    public function deletSystemAction($systemid)
    {
        $systemsControllerManager =  $this->get('AppBundle.ClientSystemsManager');
        $systemsControllerManager ->delete($systemid);
        return $this->redirectToRoute('systems');
    }

}

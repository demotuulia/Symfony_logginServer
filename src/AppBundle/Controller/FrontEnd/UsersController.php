<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Manager\Manager\Bootstrap;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\FrontEndBaseController;

class UsersController extends FrontEndBaseController
{
    /**
     *  Mail Alert List Action
     *
     * @Route("/users/", name="users")
     */
    public function  usersListAction(Request $request)
    {
        $templateVars = array_merge(
            [
                'list' => $this->get('AppBundle.UsersControllerManager')->getList(),
                'tableTypeClass' => Bootstrap::$TABLE_TYPE_STRIPED
            ],
            $this->getCommonTemplateVariables()
        );
        
        return $this->render('frontEnd/userlist.html.twig', $templateVars);
    }
    
    
    /**
     *  Mail Alert List Action
     *
     * @Route("/edituser/{userid}", name="edituser")
     */
    public function editUserAction($userid)
    {
        $usersControllerManager =  $this->get('AppBundle.UsersControllerManager');

        $result  = $usersControllerManager->postForm();

        if (isset($result['saved'])) {
            return $this->redirectToRoute('users');
        }

        $templateVars = array_merge(
            [
                'errors' => isset($result['errors']) ? $result['errors'] : [],
                'form' => $usersControllerManager->getEditForm($userid),
                'formClass' => Bootstrap::$FORM_FIELD_STANDARD
            ],
            $this->getCommonTemplateVariables()
        );
        return $this->render('frontEnd/edituser.html.twig', $templateVars);
    }

    
    /**
     *  Mail Alert List Action
     *
     * @Route("/deleteuser/{userid}", name="deleteuser")
     */
    public function deletUserAction($userid)
    {
        $usersControllerManager =  $this->get('AppBundle.UsersControllerManager');
        $usersControllerManager ->delete($userid);
        return $this->redirectToRoute('users');
    }

}

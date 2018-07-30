<?php
/**
 * List controller
 */
namespace AppBundle\Controller\FrontEnd;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\FrontEndBaseController;

use AppBundle\Manager\Manager\Bootstrap;

class LoginController extends FrontEndBaseController {



    /**
     * @Route("/login/", name="login")
     */
    public function loginAction(Request $request)
    {

        $loginControllerManager = $this->get('AppBundle.LoginController');
        $templateVars = array_merge(
            [
                'last_username' => $loginControllerManager->getLastUserName(),
                'error'         => $loginControllerManager->getLoginError(),
                'form'          => $loginControllerManager->getForm(),
                'formClass'     => Bootstrap::$FORM_FIELD_STANDARD
            ],
            $this->getCommonTemplateVariables()
        );

        return $this->render(
            'frontEnd/login.html.twig', $templateVars
        );
    }

    /**
     * @Route("/logout/", name="logout")
     */
    public function logoutAction(Request $request)
    {

        $this->get('security.token_storage')->setToken(null);
        $request->getSession()->invalidate();

        $templateVars = array_merge(
            [],
            $this->getCommonTemplateVariables()
        );

        return $this->redirectToRoute('login');
    }




}
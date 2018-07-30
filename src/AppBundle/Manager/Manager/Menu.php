<?php
/**
 * A generic class manage menus
 * 
 *
 */
namespace AppBundle\Manager\Manager;

use AppBundle\Manager\Manager;


class Menu extends Manager {

   
    /**
     * Get menu items for the current user
     * 
     * @param array $unitTestParams           Test params for unit tests because we cannot define current user
     *                                        route in the tests.
     *                                          $unitTestParams [
     *                                              'role' => See options in app/config/parameters.yml , main_navgation
     *                                              'route' => See options in app/config/parameters.yml , main_navgation
     *                                          ]
     * @return array
     */
    public function getMainNavigation($unitTestParams = []) {

        $menu = $this->getContainer()->getParameter('main_navgation');

        if (empty($unitTestParams)) {
            // Normal case, front end
            $role =  $this->getContainer()->get('AppBundle.UserManager')->getCurrentUser()->role ;
            $route = '/' . $this->getRequest()->get('_route') . '/';
        } else {
            // Case unit tests
            list($role, $route) = array_values($unitTestParams);
        }
        
        // Filter visible items for the current user
        $menu  = array_filter (
            $menu,
            function (&$menuItem)  use ($role, $route) {
                return  in_array($role, $menuItem['allowed_roles']) ;
            }
        );

        // define active menu
        foreach ($menu as &$menuItem) {
            $menuItem['activeClass'] = $menuItem['route'] == $route ? 'active' : ' ';
        }

        return $menu;
    }
}
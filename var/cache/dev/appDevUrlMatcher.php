<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/api')) {
            if (0 === strpos($pathinfo, '/api/test')) {
                // app_api_test
                if ($pathinfo === '/api/test') {
                    return array (  '_controller' => 'AppBundle\\Controller\\ApiController::testAction',  '_route' => 'app_api_test',);
                }

                // app_api_testauthorization
                if (rtrim($pathinfo, '/') === '/api/testauthorize') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'app_api_testauthorization');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ApiController::testAuthorizationAction',  '_route' => 'app_api_testauthorization',);
                }

            }

            // app_api_insertlog
            if (rtrim($pathinfo, '/') === '/api/insertlog') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'app_api_insertlog');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\ApiController::insertLogAction',  '_route' => 'app_api_insertlog',);
            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            // login
            if (rtrim($pathinfo, '/') === '/login') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'login');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\LoginController::loginAction',  '_route' => 'login',);
            }

            // logout
            if (rtrim($pathinfo, '/') === '/logout') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'logout');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\LoginController::logoutAction',  '_route' => 'logout',);
            }

            // logslevels
            if (rtrim($pathinfo, '/') === '/logslevels') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'logslevels');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\LogsLevelsController::systemsListAction',  '_route' => 'logslevels',);
            }

        }

        // editLogLevel
        if (0 === strpos($pathinfo, '/editLogLevel') && preg_match('#^/editLogLevel/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'editLogLevel')), array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\LogsLevelsController::editSystemAction',));
        }

        // deleteLogLevel
        if (0 === strpos($pathinfo, '/deleteLogLevel') && preg_match('#^/deleteLogLevel/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deleteLogLevel')), array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\LogsLevelsController::deletLogLevelAction',));
        }

        // list
        if (rtrim($pathinfo, '/') === '/list') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'list');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\LogsListController::listAction',  '_route' => 'list',);
        }

        // mailalerts
        if (rtrim($pathinfo, '/') === '/mailalerts') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'mailalerts');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\MailAlertsController::mailAlertListAction',  '_route' => 'mailalerts',);
        }

        // editmailalert
        if (0 === strpos($pathinfo, '/editmailalert') && preg_match('#^/editmailalert/(?P<mailAlertId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'editmailalert')), array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\MailAlertsController::editMailAlertAction',));
        }

        // deletemailalert
        if (0 === strpos($pathinfo, '/deletemailalert') && preg_match('#^/deletemailalert/(?P<mailAlertId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deletemailalert')), array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\MailAlertsController::deleteMailAlertAction',));
        }

        // systems
        if (rtrim($pathinfo, '/') === '/systems') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'systems');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\SystemsController::systemsListAction',  '_route' => 'systems',);
        }

        // editsystem
        if (0 === strpos($pathinfo, '/editsystem') && preg_match('#^/editsystem/(?P<systemid>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'editsystem')), array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\SystemsController::editSystemAction',));
        }

        // deletesystem
        if (0 === strpos($pathinfo, '/deletesystem') && preg_match('#^/deletesystem/(?P<systemid>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deletesystem')), array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\SystemsController::deletSystemAction',));
        }

        // users
        if (rtrim($pathinfo, '/') === '/users') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'users');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\UsersController::usersListAction',  '_route' => 'users',);
        }

        // edituser
        if (0 === strpos($pathinfo, '/edituser') && preg_match('#^/edituser/(?P<userid>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'edituser')), array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\UsersController::editUserAction',));
        }

        // deleteuser
        if (0 === strpos($pathinfo, '/deleteuser') && preg_match('#^/deleteuser/(?P<userid>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deleteuser')), array (  '_controller' => 'AppBundle\\Controller\\FrontEnd\\UsersController::deletUserAction',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevDebugProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
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

        if (0 === strpos($pathinfo, '/reparation')) {
            // reparations
            if (0 === strpos($pathinfo, '/reparations') && preg_match('#^/reparations/(?P<idV>[^/]++)/(?P<idO>[^/]++)/list$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_reparations;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reparations')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::reparationsAction',));
            }
            not_reparations:

            // reparation_last
            if (preg_match('#^/reparation/(?P<idV>[^/]++)/(?P<idO>[^/]++)/last$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_reparation_last;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reparation_last')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::lastReparationAction',));
            }
            not_reparation_last:

        }

        // police_last
        if (0 === strpos($pathinfo, '/police') && preg_match('#^/police/(?P<idV>[^/]++)/last$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_police_last;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'police_last')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::lastPoliceAction',));
        }
        not_police_last:

        // visite_last
        if (0 === strpos($pathinfo, '/visite') && preg_match('#^/visite/(?P<idV>[^/]++)/last$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_visite_last;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'visite_last')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::lastVisiteAction',));
        }
        not_visite_last:

        // releve_last
        if (0 === strpos($pathinfo, '/releve') && preg_match('#^/releve/(?P<idV>[^/]++)/last$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_releve_last;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'releve_last')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::lastReleveAction',));
        }
        not_releve_last:

        // couts
        if (0 === strpos($pathinfo, '/couts') && preg_match('#^/couts/(?P<idV>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_couts;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'couts')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::coutsAction',));
        }
        not_couts:

        // maintenances
        if (0 === strpos($pathinfo, '/maintenances') && preg_match('#^/maintenances/(?P<idV>[^/]++)/(?P<idS>[^/]++)/list$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_maintenances;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'maintenances')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::maintenancesAction',));
        }
        not_maintenances:

        // reparation_create
        if ($pathinfo === '/reparation/create') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_reparation_create;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\ReparationController::createReparationAction',  '_route' => 'reparation_create',);
        }
        not_reparation_create:

        // maintenance_create
        if ($pathinfo === '/maintenance/create') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_maintenance_create;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\ReparationController::createMaintenanceAction',  '_route' => 'maintenance_create',);
        }
        not_maintenance_create:

        // releve_create
        if ($pathinfo === '/releve/create') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_releve_create;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\ReparationController::createReleveAction',  '_route' => 'releve_create',);
        }
        not_releve_create:

        // police_create
        if ($pathinfo === '/police/create') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_police_create;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\ReparationController::createPoliceAction',  '_route' => 'police_create',);
        }
        not_police_create:

        // visite_create
        if ($pathinfo === '/visite/create') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_visite_create;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\ReparationController::createVisiteAction',  '_route' => 'visite_create',);
        }
        not_visite_create:

        // reparation_update
        if (0 === strpos($pathinfo, '/reparation') && preg_match('#^/reparation/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_reparation_update;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'reparation_update')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::updateReparationAction',));
        }
        not_reparation_update:

        // visite_update
        if (0 === strpos($pathinfo, '/visite') && preg_match('#^/visite/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_visite_update;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'visite_update')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::updateVisiteAction',));
        }
        not_visite_update:

        // police_update
        if (0 === strpos($pathinfo, '/police') && preg_match('#^/police/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_police_update;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'police_update')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::updatePoliceAction',));
        }
        not_police_update:

        // reparation_delete
        if (0 === strpos($pathinfo, '/reparation') && preg_match('#^/reparation/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'DELETE') {
                $allow[] = 'DELETE';
                goto not_reparation_delete;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'reparation_delete')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::deleteReparationAction',));
        }
        not_reparation_delete:

        // maintance_delete
        if (0 === strpos($pathinfo, '/maintenance') && preg_match('#^/maintenance/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'DELETE') {
                $allow[] = 'DELETE';
                goto not_maintance_delete;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'maintance_delete')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::deleteMaintenanceAction',));
        }
        not_maintance_delete:

        // police_delete
        if (0 === strpos($pathinfo, '/police') && preg_match('#^/police/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'DELETE') {
                $allow[] = 'DELETE';
                goto not_police_delete;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'police_delete')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::deletePoliceAction',));
        }
        not_police_delete:

        if (0 === strpos($pathinfo, '/v')) {
            // visite_delete
            if (0 === strpos($pathinfo, '/visite') && preg_match('#^/visite/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_visite_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'visite_delete')), array (  '_controller' => 'AppBundle\\Controller\\ReparationController::deleteVisiteAction',));
            }
            not_visite_delete:

            if (0 === strpos($pathinfo, '/vehicule')) {
                // vehicule_index
                if (rtrim($pathinfo, '/') === '/vehicule') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_vehicule_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'vehicule_index');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\VehiculeController::indexAction',  '_route' => 'vehicule_index',);
                }
                not_vehicule_index:

                // vehicule_create
                if ($pathinfo === '/vehicule/create') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_vehicule_create;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\VehiculeController::createVehiculeAction',  '_route' => 'vehicule_create',);
                }
                not_vehicule_create:

                // vehicule_update
                if (preg_match('#^/vehicule/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_vehicule_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicule_update')), array (  '_controller' => 'AppBundle\\Controller\\VehiculeController::updateVehiculeAction',));
                }
                not_vehicule_update:

                // vehicule_delete
                if (0 === strpos($pathinfo, '/vehicule/vehicule') && preg_match('#^/vehicule/vehicule/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('DELETE', 'GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('DELETE', 'GET', 'HEAD'));
                        goto not_vehicule_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicule_delete')), array (  '_controller' => 'AppBundle\\Controller\\VehiculeController::deleteVehiculeAction',));
                }
                not_vehicule_delete:

            }

        }

        if (0 === strpos($pathinfo, '/u')) {
            if (0 === strpos($pathinfo, '/utils')) {
                // entities_index
                if (preg_match('#^/utils/(?P<entityName>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_entities_index;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'entities_index')), array (  '_controller' => 'AppBundle\\Controller\\UtilsController::indexAction',));
                }
                not_entities_index:

                // marque_create
                if ($pathinfo === '/utils/marque/create') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_marque_create;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\UtilsController::createMarqueAction',  '_route' => 'marque_create',);
                }
                not_marque_create:

                // systeme_create
                if ($pathinfo === '/utils/systeme/create') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_systeme_create;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\UtilsController::createSystemeAction',  '_route' => 'systeme_create',);
                }
                not_systeme_create:

                // operation_create
                if ($pathinfo === '/utils/operation/create') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_operation_create;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\UtilsController::createOperationAction',  '_route' => 'operation_create',);
                }
                not_operation_create:

            }

            if (0 === strpos($pathinfo, '/user')) {
                // user
                if (rtrim($pathinfo, '/') === '/user') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'user');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\UserController::indexAction',  '_route' => 'user',);
                }

                // user_show
                if ($pathinfo === '/user/show') {
                    return array (  '_controller' => 'AppBundle\\Controller\\UserController::showAction',  '_route' => 'user_show',);
                }

                // user_new
                if ($pathinfo === '/user/new') {
                    return array (  '_controller' => 'AppBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
                }

                // user_create
                if ($pathinfo === '/user/register') {
                    return array (  '_controller' => 'AppBundle\\Controller\\UserController::createAction',  '_route' => 'user_create',);
                }

                // user_update
                if ($pathinfo === '/user/update') {
                    return array (  '_controller' => 'AppBundle\\Controller\\UserController::updateAction',  '_route' => 'user_update',);
                }

                // user_change_password
                if ($pathinfo === '/user/change/password') {
                    return array (  '_controller' => 'AppBundle\\Controller\\UserController::chagePasswordAction',  '_route' => 'user_change_password',);
                }

                // user_delete
                if (preg_match('#^/user/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE', 'GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE', 'GET', 'HEAD'));
                        goto not_user_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'AppBundle\\Controller\\UserController::deleteAction',));
                }
                not_user_delete:

            }

        }

        // auth-tokens
        if ($pathinfo === '/login') {
            if (!in_array($this->context->getMethod(), array('POST', 'OPTIONS', 'GET', 'HEAD'))) {
                $allow = array_merge($allow, array('POST', 'OPTIONS', 'GET', 'HEAD'));
                goto not_authtokens;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\AuthTokenController::postAuthTokensAction',  '_route' => 'auth-tokens',);
        }
        not_authtokens:

        // auth-tokens_delete
        if ($pathinfo === '/token/delete') {
            return array (  '_controller' => 'AppBundle\\Controller\\AuthTokenController::removeAuthTokensAction',  '_route' => 'auth-tokens_delete',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

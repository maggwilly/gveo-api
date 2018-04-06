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

        if (0 === strpos($pathinfo, '/v1')) {
            if (0 === strpos($pathinfo, '/v1/pub')) {
                // pub_index
                if (rtrim($pathinfo, '/') === '/v1/pub') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_pub_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'pub_index');
                    }

                    return array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\PubController::indexAction',  '_route' => 'pub_index',);
                }
                not_pub_index:

                // pub_show
                if (preg_match('#^/v1/pub/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_pub_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pub_show')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\PubController::showAction',));
                }
                not_pub_show:

                // pub_new
                if ($pathinfo === '/v1/pub/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_pub_new;
                    }

                    return array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\PubController::newAction',  '_route' => 'pub_new',);
                }
                not_pub_new:

                // pub_edit
                if (preg_match('#^/v1/pub/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_pub_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pub_edit')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\PubController::editAction',));
                }
                not_pub_edit:

                // pub_delete
                if (preg_match('#^/v1/pub/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_pub_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pub_delete')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\PubController::deleteAction',));
                }
                not_pub_delete:

            }

            if (0 === strpos($pathinfo, '/v1/notification')) {
                // notification_index
                if (rtrim($pathinfo, '/') === '/v1/notification') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_notification_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'notification_index');
                    }

                    return array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\NotificationController::indexAction',  '_route' => 'notification_index',);
                }
                not_notification_index:

                // notification_show
                if (preg_match('#^/v1/notification/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_notification_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_show')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\NotificationController::showAction',));
                }
                not_notification_show:

                // notification_send
                if (preg_match('#^/v1/notification/(?P<id>[^/]++)/send$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_notification_send;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_send')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\NotificationController::sendAction',));
                }
                not_notification_send:

                // notification_resent
                if ($pathinfo === '/v1/notification/resent') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_notification_resent;
                    }

                    return array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\NotificationController::resentAction',  '_route' => 'notification_resent',);
                }
                not_notification_resent:

                // notification_rate
                if (preg_match('#^/v1/notification/(?P<id>[^/]++)/rate$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_notification_rate;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_rate')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\NotificationController::getRateAction',));
                }
                not_notification_rate:

                // notification_reading
                if (preg_match('#^/v1/notification/(?P<id>[^/]++)/reading$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_notification_reading;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_reading')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\NotificationController::getReadingAction',));
                }
                not_notification_reading:

                // notification_number_dest
                if (preg_match('#^/v1/notification/(?P<id>[^/]++)/number/dest$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_notification_number_dest;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_number_dest')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\NotificationController::getDestNumberAction',));
                }
                not_notification_number_dest:

                // notification_new
                if (0 === strpos($pathinfo, '/v1/notification/new') && preg_match('#^/v1/notification/new(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_notification_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_new')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\NotificationController::newAction',  'id' => 0,));
                }
                not_notification_new:

                // notification_edit
                if (preg_match('#^/v1/notification/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_notification_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_edit')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\NotificationController::editAction',));
                }
                not_notification_edit:

                // notification_delete
                if (preg_match('#^/v1/notification/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_notification_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_delete')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\NotificationController::deleteAction',));
                }
                not_notification_delete:

            }

            if (0 === strpos($pathinfo, '/v1/sending')) {
                // sending_index
                if (rtrim($pathinfo, '/') === '/v1/sending') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sending_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'sending_index');
                    }

                    return array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\SendingController::indexAction',  '_route' => 'sending_index',);
                }
                not_sending_index:

                // sending_show
                if (preg_match('#^/v1/sending/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sending_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sending_show')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\SendingController::showAction',));
                }
                not_sending_show:

                // sending_new
                if ($pathinfo === '/v1/sending/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_sending_new;
                    }

                    return array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\SendingController::newAction',  '_route' => 'sending_new',);
                }
                not_sending_new:

                // sending_edit
                if (preg_match('#^/v1/sending/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_sending_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sending_edit')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\SendingController::editAction',));
                }
                not_sending_edit:

                // sending_delete
                if (preg_match('#^/v1/sending/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sending_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sending_delete')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\SendingController::deleteAction',));
                }
                not_sending_delete:

            }

            if (0 === strpos($pathinfo, '/v1/formated')) {
                // pub_index_json
                if ($pathinfo === '/v1/formated/pub/json') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_pub_index_json;
                    }

                    return array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\PubController::jsonIndexAction',  '_route' => 'pub_index_json',);
                }
                not_pub_index_json:

                if (0 === strpos($pathinfo, '/v1/formated/sending')) {
                    // sending_index_json
                    if ($pathinfo === '/v1/formated/sending/json') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sending_index_json;
                        }

                        return array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\SendingController::jsonIndexAction',  '_route' => 'sending_index_json',);
                    }
                    not_sending_index_json:

                    // sending_edit_json
                    if (0 === strpos($pathinfo, '/v1/formated/sending/edit/message') && preg_match('#^/v1/formated/sending/edit/message/(?P<id>[^/]++)/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_sending_edit_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sending_edit_json')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\SendingController::editJsonAction',));
                    }
                    not_sending_edit_json:

                }

                // sending_new_json
                if (0 === strpos($pathinfo, '/v1/formated/registration') && preg_match('#^/v1/formated/registration/(?P<registrationId>[^/]++)/new/json$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_sending_new_json;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sending_new_json')), array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\SendingController::newJsonAction',));
                }
                not_sending_new_json:

            }

            // messager_homepage
            if ($pathinfo === '/v1/messager') {
                return array (  '_controller' => 'Pwm\\MessagerBundle\\Controller\\DefaultController::indexAction',  '_route' => 'messager_homepage',);
            }

            // admin_homepage
            if ($pathinfo === '/v1/admin') {
                return array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\DefaultController::indexAction',  '_route' => 'admin_homepage',);
            }

            if (0 === strpos($pathinfo, '/v1/formated')) {
                // abonnement_index_json
                if (0 === strpos($pathinfo, '/v1/formated/abonnement') && preg_match('#^/v1/formated/abonnement/(?P<info>[^/]++)/json$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_abonnement_index_json;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'abonnement_index_json')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AbonnementController::indexJsonAction',));
                }
                not_abonnement_index_json:

                if (0 === strpos($pathinfo, '/v1/formated/commende')) {
                    // get_token_json
                    if ($pathinfo === '/v1/formated/commende/token') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_get_token_json;
                        }

                        return array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AbonnementController::tokenAction',  '_route' => 'get_token_json',);
                    }
                    not_get_token_json:

                    // commende_start_json
                    if (preg_match('#^/v1/formated/commende/(?P<info>[^/]++)/(?P<session>[^/]++)/(?P<package>[^/]++)/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_commende_start_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'commende_start_json')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AbonnementController::startCommandeAction',));
                    }
                    not_commende_start_json:

                    // commende_confirm_json
                    if (preg_match('#^/v1/formated/commende/(?P<id>[^/]++)/confirm/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_commende_confirm_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'commende_confirm_json')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AbonnementController::confirmCommandeAction',));
                    }
                    not_commende_confirm_json:

                    // commende_cancel_json
                    if (preg_match('#^/v1/formated/commende/(?P<id>[^/]++)/cancel/json$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_commende_cancel_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'commende_cancel_json')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AbonnementController::cancelCommandeAction',));
                    }
                    not_commende_cancel_json:

                }

                if (0 === strpos($pathinfo, '/v1/formated/abonnement')) {
                    // abonnent_show_json
                    if (preg_match('#^/v1/formated/abonnement/(?P<info>[^/]++)/(?P<id>[^/]++)/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_abonnent_show_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'abonnent_show_json')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AbonnementController::showJsonAction',));
                    }
                    not_abonnent_show_json:

                    // abonnent_show_one_json
                    if (preg_match('#^/v1/formated/abonnement/(?P<abonnement>[^/]++)/show/one/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_abonnent_show_one_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'abonnent_show_one_json')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AbonnementController::showOneJsonAction',));
                    }
                    not_abonnent_show_one_json:

                }

                if (0 === strpos($pathinfo, '/v1/formated/info')) {
                    // info_edit_json
                    if (preg_match('#^/v1/formated/info/(?P<id>[^/]++)/edit/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_info_edit_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'info_edit_json')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\InfoController::editJsonAction',));
                    }
                    not_info_edit_json:

                    // info_show_json
                    if (preg_match('#^/v1/formated/info/(?P<uid>[^/]++)/show/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_info_show_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'info_show_json')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\InfoController::showJsonAction',));
                    }
                    not_info_show_json:

                }

                if (0 === strpos($pathinfo, '/v1/formated/ressource')) {
                    // ressource_index_json
                    if (preg_match('#^/v1/formated/ressource/(?P<session>[^/]++)/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_ressource_index_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ressource_index_json')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\RessourceController::indexJsonAction',));
                    }
                    not_ressource_index_json:

                    // ressource_show_json
                    if (preg_match('#^/v1/formated/ressource/(?P<id>[^/]++)/show/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_ressource_show_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ressource_show_json')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\RessourceController::showJsonAction',));
                    }
                    not_ressource_show_json:

                }

                // info_show_ambassador
                if (0 === strpos($pathinfo, '/v1/formated/info') && preg_match('#^/v1/formated/info/(?P<uid>[^/]++)/ambassador/json$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_info_show_ambassador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'info_show_ambassador')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\InfoController::getAmbassadorJsonAction',));
                }
                not_info_show_ambassador:

                if (0 === strpos($pathinfo, '/v1/formated/analyse')) {
                    // analyse_new_json
                    if (preg_match('#^/v1/formated/analyse/(?P<studentId>[^/]++)/(?P<session>[^/]++)/(?P<matiere>[^/]++)/(?P<partie>[^/]++)/new/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_analyse_new_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'analyse_new_json')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AnalyseController::newJsonAction',  'matiere' => 0,  'partie' => 0,));
                    }
                    not_analyse_new_json:

                    // analyse_show_json
                    if (preg_match('#^/v1/formated/analyse/(?P<studentId>[^/]++)/(?P<session>[^/]++)/(?P<matiere>[^/]++)/(?P<partie>[^/]++)/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_analyse_show_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'analyse_show_json')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AnalyseController::showJsonAction',  'matiere' => 0,  'partie' => 0,));
                    }
                    not_analyse_show_json:

                }

            }

            if (0 === strpos($pathinfo, '/v1/abonnement')) {
                // abonnement_index
                if (rtrim($pathinfo, '/') === '/v1/abonnement') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_abonnement_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'abonnement_index');
                    }

                    return array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AbonnementController::indexAction',  '_route' => 'abonnement_index',);
                }
                not_abonnement_index:

                // abonnement_show
                if (preg_match('#^/v1/abonnement/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_abonnement_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'abonnement_show')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AbonnementController::showAction',));
                }
                not_abonnement_show:

                // abonnement_new
                if ($pathinfo === '/v1/abonnement/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_abonnement_new;
                    }

                    return array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AbonnementController::newAction',  '_route' => 'abonnement_new',);
                }
                not_abonnement_new:

                // abonnement_edit
                if (preg_match('#^/v1/abonnement/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_abonnement_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'abonnement_edit')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AbonnementController::editAction',));
                }
                not_abonnement_edit:

                // abonnement_delete
                if (preg_match('#^/v1/abonnement/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_abonnement_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'abonnement_delete')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AbonnementController::deleteAction',));
                }
                not_abonnement_delete:

            }

            if (0 === strpos($pathinfo, '/v1/price')) {
                // price_index
                if (rtrim($pathinfo, '/') === '/v1/price') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_price_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'price_index');
                    }

                    return array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\PriceController::indexAction',  '_route' => 'price_index',);
                }
                not_price_index:

                // price_show
                if (preg_match('#^/v1/price/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_price_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'price_show')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\PriceController::showAction',));
                }
                not_price_show:

                // price_new
                if ($pathinfo === '/v1/price/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_price_new;
                    }

                    return array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\PriceController::newAction',  '_route' => 'price_new',);
                }
                not_price_new:

                // price_edit
                if (preg_match('#^/v1/price/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_price_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'price_edit')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\PriceController::editAction',));
                }
                not_price_edit:

                // price_delete
                if (preg_match('#^/v1/price/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_price_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'price_delete')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\PriceController::deleteAction',));
                }
                not_price_delete:

            }

            if (0 === strpos($pathinfo, '/v1/info')) {
                // info_index
                if (rtrim($pathinfo, '/') === '/v1/info') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_info_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'info_index');
                    }

                    return array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\InfoController::indexAction',  '_route' => 'info_index',);
                }
                not_info_index:

                // info_show
                if (preg_match('#^/v1/info/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_info_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'info_show')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\InfoController::showAction',));
                }
                not_info_show:

                // info_edit
                if (preg_match('#^/v1/info/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_info_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'info_edit')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\InfoController::editAction',));
                }
                not_info_edit:

                // info_delete
                if (preg_match('#^/v1/info/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_info_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'info_delete')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\InfoController::deleteAction',));
                }
                not_info_delete:

            }

            if (0 === strpos($pathinfo, '/v1/ambassador')) {
                // ambassador_index
                if (rtrim($pathinfo, '/') === '/v1/ambassador') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ambassador_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'ambassador_index');
                    }

                    return array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AmbassadorController::indexAction',  '_route' => 'ambassador_index',);
                }
                not_ambassador_index:

                // ambassador_show
                if (preg_match('#^/v1/ambassador/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ambassador_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ambassador_show')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AmbassadorController::showAction',));
                }
                not_ambassador_show:

                // ambassador_new
                if ($pathinfo === '/v1/ambassador/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_ambassador_new;
                    }

                    return array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AmbassadorController::newAction',  '_route' => 'ambassador_new',);
                }
                not_ambassador_new:

                // ambassador_edit
                if (preg_match('#^/v1/ambassador/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_ambassador_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ambassador_edit')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AmbassadorController::editAction',));
                }
                not_ambassador_edit:

                // ambassador_delete
                if (preg_match('#^/v1/ambassador/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_ambassador_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ambassador_delete')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\AmbassadorController::deleteAction',));
                }
                not_ambassador_delete:

            }

            if (0 === strpos($pathinfo, '/v1/ressource')) {
                // ressource_index
                if (preg_match('#^/v1/ressource/(?P<session>[^/]++)/list$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ressource_index;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ressource_index')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\RessourceController::indexAction',  'session' => 0,));
                }
                not_ressource_index:

                // ressource_show
                if (preg_match('#^/v1/ressource/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ressource_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ressource_show')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\RessourceController::showAction',));
                }
                not_ressource_show:

                // ressource_new
                if (0 === strpos($pathinfo, '/v1/ressource/new') && preg_match('#^/v1/ressource/new(?:/(?P<session>[^/]++))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_ressource_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ressource_new')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\RessourceController::newAction',  'session' => 0,));
                }
                not_ressource_new:

                // ressource_edit
                if (preg_match('#^/v1/ressource/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_ressource_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ressource_edit')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\RessourceController::editAction',));
                }
                not_ressource_edit:

                // ressource_delete
                if (preg_match('#^/v1/ressource/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_ressource_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ressource_delete')), array (  '_controller' => 'Pwm\\AdminBundle\\Controller\\RessourceController::deleteAction',));
                }
                not_ressource_delete:

            }

            if (0 === strpos($pathinfo, '/v1/user')) {
                // user_index
                if (rtrim($pathinfo, '/') === '/v1/user') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_user_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'user_index');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\UserController::indexAction',  '_route' => 'user_index',);
                }
                not_user_index:

                // user_toggle
                if (preg_match('#^/v1/user/(?P<id>[^/]++)/toggle$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_user_toggle;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_toggle')), array (  '_controller' => 'AppBundle\\Controller\\UserController::toggleUserAction',));
                }
                not_user_toggle:

                // user_edit
                if (preg_match('#^/v1/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_user_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit')), array (  '_controller' => 'AppBundle\\Controller\\UserController::editAction',));
                }
                not_user_edit:

            }

            if (0 === strpos($pathinfo, '/v1/resultat')) {
                // resultat_index
                if (rtrim($pathinfo, '/') === '/v1/resultat') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_resultat_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'resultat_index');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ResultatController::indexAction',  '_route' => 'resultat_index',);
                }
                not_resultat_index:

                // resultat_show
                if (preg_match('#^/v1/resultat/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_resultat_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'resultat_show')), array (  '_controller' => 'AppBundle\\Controller\\ResultatController::showAction',));
                }
                not_resultat_show:

                // resultat_get
                if (preg_match('#^/v1/resultat/(?P<id>[^/]++)/get/mobile$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_resultat_get;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'resultat_get')), array (  '_controller' => 'AppBundle\\Controller\\ResultatController::getAction',));
                }
                not_resultat_get:

                // resultat_new
                if ($pathinfo === '/v1/resultat/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_resultat_new;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ResultatController::newAction',  '_route' => 'resultat_new',);
                }
                not_resultat_new:

                // resultat_edit
                if (preg_match('#^/v1/resultat/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_resultat_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'resultat_edit')), array (  '_controller' => 'AppBundle\\Controller\\ResultatController::editAction',));
                }
                not_resultat_edit:

                // resultat_delete
                if (preg_match('#^/v1/resultat/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_resultat_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'resultat_delete')), array (  '_controller' => 'AppBundle\\Controller\\ResultatController::deleteAction',));
                }
                not_resultat_delete:

            }

            if (0 === strpos($pathinfo, '/v1/article')) {
                // article_index
                if (rtrim($pathinfo, '/') === '/v1/article') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_article_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'article_index');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ArticleController::indexAction',  '_route' => 'article_index',);
                }
                not_article_index:

                // article_valid
                if (preg_match('#^/v1/article/(?P<id>[^/]++)/valid$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_article_valid;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'article_valid')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::valideAction',));
                }
                not_article_valid:

                // article_show
                if (preg_match('#^/v1/article/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_article_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'article_show')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::showAction',));
                }
                not_article_show:

                // article_difucult
                if (preg_match('#^/v1/article/(?P<id>[^/]++)/dificult/contents$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_article_difucult;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'article_difucult')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::getDificultContentsAction',));
                }
                not_article_difucult:

                // article_show_from_mobile
                if (preg_match('#^/v1/article/(?P<id>[^/]++)/show/from/mobile$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_article_show_from_mobile;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'article_show_from_mobile')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::showFromMobileAction',));
                }
                not_article_show_from_mobile:

                // article_new
                if (0 === strpos($pathinfo, '/v1/article/new') && preg_match('#^/v1/article/new/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_article_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'article_new')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::newAction',));
                }
                not_article_new:

                // article_edit
                if (preg_match('#^/v1/article/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_article_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'article_edit')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::editAction',));
                }
                not_article_edit:

                // article_delete
                if (preg_match('#^/v1/article/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_article_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'article_delete')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::deleteAction',));
                }
                not_article_delete:

            }

            if (0 === strpos($pathinfo, '/v1/programme')) {
                // programme_index
                if (rtrim($pathinfo, '/') === '/v1/programme') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_programme_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'programme_index');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ProgrammeController::indexAction',  '_route' => 'programme_index',);
                }
                not_programme_index:

                // programme_show
                if (preg_match('#^/v1/programme/(?P<id>[^/]++)/show(?:/(?P<session>[^/]++))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_programme_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'programme_show')), array (  '_controller' => 'AppBundle\\Controller\\ProgrammeController::showAction',  'session' => 0,));
                }
                not_programme_show:

                // programme_new
                if (0 === strpos($pathinfo, '/v1/programme/new') && preg_match('#^/v1/programme/new(?:/(?P<session>[^/]++))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_programme_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'programme_new')), array (  '_controller' => 'AppBundle\\Controller\\ProgrammeController::newAction',  'session' => 0,));
                }
                not_programme_new:

                // programme_edit
                if (preg_match('#^/v1/programme/(?P<id>[^/]++)/edit(?:/(?P<session>[^/]++))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_programme_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'programme_edit')), array (  '_controller' => 'AppBundle\\Controller\\ProgrammeController::editAction',  'session' => 0,));
                }
                not_programme_edit:

                // programme_delete
                if (preg_match('#^/v1/programme/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_programme_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'programme_delete')), array (  '_controller' => 'AppBundle\\Controller\\ProgrammeController::deleteAction',));
                }
                not_programme_delete:

            }

            if (0 === strpos($pathinfo, '/v1/session')) {
                // session_index
                if (preg_match('#^/v1/session/(?P<id>[^/]++)/(?P<all>[^/]++)/list$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_session_index;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'session_index')), array (  '_controller' => 'AppBundle\\Controller\\SessionController::indexAction',  'id' => 0,  'all' => 0,));
                }
                not_session_index:

                // session_show
                if (preg_match('#^/v1/session/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_session_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'session_show')), array (  '_controller' => 'AppBundle\\Controller\\SessionController::showAction',));
                }
                not_session_show:

                // session_new
                if (preg_match('#^/v1/session/(?P<id>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_session_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'session_new')), array (  '_controller' => 'AppBundle\\Controller\\SessionController::newAction',));
                }
                not_session_new:

                // session_attr
                if (preg_match('#^/v1/session/(?P<id>[^/]++)/attr$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_session_attr;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'session_attr')), array (  '_controller' => 'AppBundle\\Controller\\SessionController::attrAction',));
                }
                not_session_attr:

                // session_edit
                if (preg_match('#^/v1/session/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_session_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'session_edit')), array (  '_controller' => 'AppBundle\\Controller\\SessionController::editAction',));
                }
                not_session_edit:

                // session_decrire
                if (preg_match('#^/v1/session/(?P<id>[^/]++)/decrire$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_session_decrire;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'session_decrire')), array (  '_controller' => 'AppBundle\\Controller\\SessionController::decrireAction',));
                }
                not_session_decrire:

                // session_delete
                if (preg_match('#^/v1/session/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_session_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'session_delete')), array (  '_controller' => 'AppBundle\\Controller\\SessionController::deleteAction',));
                }
                not_session_delete:

                // session_show_from_mobile
                if (preg_match('#^/v1/session/(?P<id>[^/]++)/show/from/mobile$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_session_show_from_mobile;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'session_show_from_mobile')), array (  '_controller' => 'AppBundle\\Controller\\SessionController::showFromMobileAction',));
                }
                not_session_show_from_mobile:

            }

            if (0 === strpos($pathinfo, '/v1/concours')) {
                // concours_index
                if (rtrim($pathinfo, '/') === '/v1/concours') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_concours_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'concours_index');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ConcoursController::indexAction',  '_route' => 'concours_index',);
                }
                not_concours_index:

                // concours_show
                if (preg_match('#^/v1/concours/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_concours_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'concours_show')), array (  '_controller' => 'AppBundle\\Controller\\ConcoursController::showAction',));
                }
                not_concours_show:

                if (0 === strpos($pathinfo, '/v1/concours/new')) {
                    // concours_new_from
                    if ($pathinfo === '/v1/concours/new/from/programme') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_concours_new_from;
                        }

                        return array (  '_controller' => 'AppBundle\\Controller\\ConcoursController::newFromProgrmmeAction',  '_route' => 'concours_new_from',);
                    }
                    not_concours_new_from:

                    // concours_new
                    if ($pathinfo === '/v1/concours/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_concours_new;
                        }

                        return array (  '_controller' => 'AppBundle\\Controller\\ConcoursController::newAction',  '_route' => 'concours_new',);
                    }
                    not_concours_new:

                }

                // concours_edit
                if (preg_match('#^/v1/concours/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_concours_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'concours_edit')), array (  '_controller' => 'AppBundle\\Controller\\ConcoursController::editAction',));
                }
                not_concours_edit:

                // concours_delete
                if (preg_match('#^/v1/concours/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_concours_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'concours_delete')), array (  '_controller' => 'AppBundle\\Controller\\ConcoursController::deleteAction',));
                }
                not_concours_delete:

            }

            if (0 === strpos($pathinfo, '/v1/formated')) {
                // resultat_index_json
                if ($pathinfo === '/v1/formated/resultat/json') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_resultat_index_json;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ResultatController::jsonIndexAction',  '_route' => 'resultat_index_json',);
                }
                not_resultat_index_json:

                if (0 === strpos($pathinfo, '/v1/formated/session')) {
                    // session_index_json
                    if ($pathinfo === '/v1/formated/session/json') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_session_index_json;
                        }

                        return array (  '_controller' => 'AppBundle\\Controller\\SessionController::jsonIndexAction',  '_route' => 'session_index_json',);
                    }
                    not_session_index_json:

                    // session_recents_json
                    if ($pathinfo === '/v1/formated/session/recentment/lances/json') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_session_recents_json;
                        }

                        return array (  '_controller' => 'AppBundle\\Controller\\SessionController::jsonRecentsAction',  '_route' => 'session_recents_json',);
                    }
                    not_session_recents_json:

                    // session_owards_json
                    if ($pathinfo === '/v1/formated/session/owards/json') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_session_owards_json;
                        }

                        return array (  '_controller' => 'AppBundle\\Controller\\SessionController::jsonOwardsAction',  '_route' => 'session_owards_json',);
                    }
                    not_session_owards_json:

                    // session_envus_json
                    if ($pathinfo === '/v1/formated/session/plus/en/vus/json') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_session_envus_json;
                        }

                        return array (  '_controller' => 'AppBundle\\Controller\\SessionController::jsonEnVusAction',  '_route' => 'session_envus_json',);
                    }
                    not_session_envus_json:

                    // session_for_user_json
                    if (0 === strpos($pathinfo, '/v1/formated/session/for/user') && preg_match('#^/v1/formated/session/for/user/(?P<id>[^/]++)/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_session_for_user_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'session_for_user_json')), array (  '_controller' => 'AppBundle\\Controller\\SessionController::jsonForUserAction',));
                    }
                    not_session_for_user_json:

                    // session_show_json
                    if (preg_match('#^/v1/formated/session/(?P<id>[^/]++)/show/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_session_show_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'session_show_json')), array (  '_controller' => 'AppBundle\\Controller\\SessionController::showJsonAction',));
                    }
                    not_session_show_json:

                    // session_follow_json
                    if (preg_match('#^/v1/formated/session/(?P<session>[^/]++)/(?P<info>[^/]++)/follows/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_session_follow_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'session_follow_json')), array (  '_controller' => 'AppBundle\\Controller\\SessionController::followsAction',));
                    }
                    not_session_follow_json:

                }

                // article_show_json
                if (0 === strpos($pathinfo, '/v1/formated/article') && preg_match('#^/v1/formated/article/(?P<id>[^/]++)/show/json$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_article_show_json;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'article_show_json')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::showJsonAction',));
                }
                not_article_show_json:

                // articlefollow_json
                if (0 === strpos($pathinfo, '/v1/formated/session') && preg_match('#^/v1/formated/session/(?P<article>[^/]++)/(?P<info>[^/]++)/lire/cours/json$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_articlefollow_json;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'articlefollow_json')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::lireCoursAction',));
                }
                not_articlefollow_json:

                // matiere_index_json
                if (0 === strpos($pathinfo, '/v1/formated/matiere') && preg_match('#^/v1/formated/matiere/(?P<id>[^/]++)/json$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_matiere_index_json;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'matiere_index_json')), array (  '_controller' => 'AppBundle\\Controller\\MatiereController::jsonIndexAction',  'id' => 0,));
                }
                not_matiere_index_json:

                if (0 === strpos($pathinfo, '/v1/formated/partie')) {
                    // partie_index_json
                    if (preg_match('#^/v1/formated/partie/(?P<id>[^/]++)/json$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_partie_index_json;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'partie_index_json')), array (  '_controller' => 'AppBundle\\Controller\\PartieController::jsonIndexAction',  'id' => 0,));
                    }
                    not_partie_index_json:

                    // partie_is_avalable_json
                    if ($pathinfo === '/v1/formated/partie/is/avalable/json') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_partie_is_avalable_json;
                        }

                        return array (  '_controller' => 'AppBundle\\Controller\\PartieController::isAvalableAction',  '_route' => 'partie_is_avalable_json',);
                    }
                    not_partie_is_avalable_json:

                }

                // question_index_json
                if (0 === strpos($pathinfo, '/v1/formated/question') && preg_match('#^/v1/formated/question/(?P<id>[^/]++)/json$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_question_index_json;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'question_index_json')), array (  '_controller' => 'AppBundle\\Controller\\QuestionController::jsonIndexAction',));
                }
                not_question_index_json:

            }

            if (0 === strpos($pathinfo, '/v1/matiere')) {
                // matiere_index
                if (preg_match('#^/v1/matiere/(?P<id>[^/]++)/list(?:/(?P<session>[^/]++))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_matiere_index;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'matiere_index')), array (  '_controller' => 'AppBundle\\Controller\\MatiereController::indexAction',  'session' => 0,));
                }
                not_matiere_index:

                // matiere_show_from_mobile
                if (preg_match('#^/v1/matiere/(?P<id>[^/]++)/show/from/mobile$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_matiere_show_from_mobile;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'matiere_show_from_mobile')), array (  '_controller' => 'AppBundle\\Controller\\ObjectifController::indexAction',));
                }
                not_matiere_show_from_mobile:

                // matiere_show_from_mobile2
                if (preg_match('#^/v1/matiere/(?P<id>[^/]++)/ressources$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_matiere_show_from_mobile2;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'matiere_show_from_mobile2')), array (  '_controller' => 'AppBundle\\Controller\\ObjectifController::indexAction',));
                }
                not_matiere_show_from_mobile2:

                // matiere_show
                if (preg_match('#^/v1/matiere/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_matiere_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'matiere_show')), array (  '_controller' => 'AppBundle\\Controller\\MatiereController::showAction',));
                }
                not_matiere_show:

                // matiere_new
                if (preg_match('#^/v1/matiere/(?P<id>[^/]++)/new(?:/(?P<session>[^/]++))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_matiere_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'matiere_new')), array (  '_controller' => 'AppBundle\\Controller\\MatiereController::newAction',  'session' => 0,));
                }
                not_matiere_new:

                // matiere_reindex
                if ($pathinfo === '/v1/matiere/reindex') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_matiere_reindex;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\MatiereController::reindexAction',  '_route' => 'matiere_reindex',);
                }
                not_matiere_reindex:

                // matiere_edit
                if (preg_match('#^/v1/matiere/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_matiere_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'matiere_edit')), array (  '_controller' => 'AppBundle\\Controller\\MatiereController::editAction',));
                }
                not_matiere_edit:

                // matiere_copy
                if (preg_match('#^/v1/matiere/(?P<id>[^/]++)/copy$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_matiere_copy;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'matiere_copy')), array (  '_controller' => 'AppBundle\\Controller\\MatiereController::copyAction',));
                }
                not_matiere_copy:

                // matiere_delete
                if (preg_match('#^/v1/matiere/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_matiere_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'matiere_delete')), array (  '_controller' => 'AppBundle\\Controller\\MatiereController::deleteAction',));
                }
                not_matiere_delete:

            }

            if (0 === strpos($pathinfo, '/v1/partie')) {
                // partie_index
                if (preg_match('#^/v1/partie/(?P<id>[^/]++)/list$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_partie_index;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partie_index')), array (  '_controller' => 'AppBundle\\Controller\\PartieController::indexAction',  'id' => 0,));
                }
                not_partie_index:

                // partie_show
                if (preg_match('#^/v1/partie/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_partie_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partie_show')), array (  '_controller' => 'AppBundle\\Controller\\PartieController::showAction',));
                }
                not_partie_show:

                // partie_difucult
                if (preg_match('#^/v1/partie/(?P<id>[^/]++)/dificult/questions$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_partie_difucult;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partie_difucult')), array (  '_controller' => 'AppBundle\\Controller\\PartieController::getDificultQuestionsAction',));
                }
                not_partie_difucult:

                // partie_attr
                if (preg_match('#^/v1/partie/(?P<id>[^/]++)/attr$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_partie_attr;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partie_attr')), array (  '_controller' => 'AppBundle\\Controller\\PartieController::attrAction',));
                }
                not_partie_attr:

                // partie_enable
                if (preg_match('#^/v1/partie/(?P<id>[^/]++)/enable$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_partie_enable;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partie_enable')), array (  '_controller' => 'AppBundle\\Controller\\PartieController::enableAction',));
                }
                not_partie_enable:

                // partie_new
                if (preg_match('#^/v1/partie/(?P<id>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_partie_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partie_new')), array (  '_controller' => 'AppBundle\\Controller\\PartieController::newAction',));
                }
                not_partie_new:

                // partie_edit
                if (preg_match('#^/v1/partie/(?P<id>[^/]++)/edit/(?P<matiere>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_partie_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partie_edit')), array (  '_controller' => 'AppBundle\\Controller\\PartieController::editAction',));
                }
                not_partie_edit:

                // partie_delete
                if (preg_match('#^/v1/partie/(?P<id>[^/]++)/delete/(?P<matiere>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_partie_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partie_delete')), array (  '_controller' => 'AppBundle\\Controller\\PartieController::deleteAction',));
                }
                not_partie_delete:

                // partie_is_avalable
                if (preg_match('#^/v1/partie/(?P<id>[^/]++)/is/avalable$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_partie_is_avalable;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partie_is_avalable')), array (  '_controller' => 'AppBundle\\Controller\\PartieController::isAvalableAction',));
                }
                not_partie_is_avalable:

            }

            if (0 === strpos($pathinfo, '/v1/objectif')) {
                // objectif_index
                if (preg_match('#^/v1/objectif/(?P<id>[^/]++)/list$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_objectif_index;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'objectif_index')), array (  '_controller' => 'AppBundle\\Controller\\ObjectifController::indexAction',));
                }
                not_objectif_index:

                // objectif_show
                if (preg_match('#^/v1/objectif/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_objectif_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'objectif_show')), array (  '_controller' => 'AppBundle\\Controller\\ObjectifController::showAction',));
                }
                not_objectif_show:

                // objectif_new
                if (preg_match('#^/v1/objectif/(?P<id>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_objectif_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'objectif_new')), array (  '_controller' => 'AppBundle\\Controller\\ObjectifController::newAction',  'id' => 0,));
                }
                not_objectif_new:

                // objectif_edit
                if (preg_match('#^/v1/objectif/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_objectif_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'objectif_edit')), array (  '_controller' => 'AppBundle\\Controller\\ObjectifController::editAction',));
                }
                not_objectif_edit:

                // objectif_delete
                if (preg_match('#^/v1/objectif/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_objectif_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'objectif_delete')), array (  '_controller' => 'AppBundle\\Controller\\ObjectifController::deleteAction',));
                }
                not_objectif_delete:

            }

            if (0 === strpos($pathinfo, '/v1/question')) {
                // question_index
                if (preg_match('#^/v1/question/(?P<id>[^/]++)/list$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_question_index;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'question_index')), array (  '_controller' => 'AppBundle\\Controller\\QuestionController::indexAction',));
                }
                not_question_index:

                // question_show
                if (preg_match('#^/v1/question/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_question_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'question_show')), array (  '_controller' => 'AppBundle\\Controller\\QuestionController::showAction',));
                }
                not_question_show:

                // question_show_from_mobile
                if (preg_match('#^/v1/question/(?P<id>[^/]++)/show/from/mobile$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_question_show_from_mobile;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'question_show_from_mobile')), array (  '_controller' => 'AppBundle\\Controller\\QuestionController::showFromMobileAction',));
                }
                not_question_show_from_mobile:

                // question_blocked
                if (preg_match('#^/v1/question/(?P<id>[^/]++)/blocked/persons$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_question_blocked;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'question_blocked')), array (  '_controller' => 'AppBundle\\Controller\\QuestionController::getBlockedPersonsAction',));
                }
                not_question_blocked:

                // question_valid
                if (preg_match('#^/v1/question/(?P<id>[^/]++)/valid$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_question_valid;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'question_valid')), array (  '_controller' => 'AppBundle\\Controller\\QuestionController::valideAction',));
                }
                not_question_valid:

                // question_new
                if (preg_match('#^/v1/question/(?P<id>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_question_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'question_new')), array (  '_controller' => 'AppBundle\\Controller\\QuestionController::newAction',));
                }
                not_question_new:

                // question_edit
                if (preg_match('#^/v1/question/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_question_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'question_edit')), array (  '_controller' => 'AppBundle\\Controller\\QuestionController::editAction',));
                }
                not_question_edit:

                // question_delete
                if (preg_match('#^/v1/question/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_question_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'question_delete')), array (  '_controller' => 'AppBundle\\Controller\\QuestionController::deleteAction',));
                }
                not_question_delete:

            }

            if (0 === strpos($pathinfo, '/v1/content')) {
                // content_index
                if (preg_match('#^/v1/content/(?P<id>[^/]++)/list$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_content_index;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'content_index')), array (  '_controller' => 'AppBundle\\Controller\\ContentController::indexAction',));
                }
                not_content_index:

                // content_show
                if (preg_match('#^/v1/content/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_content_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'content_show')), array (  '_controller' => 'AppBundle\\Controller\\ContentController::showAction',));
                }
                not_content_show:

                // content_new
                if (preg_match('#^/v1/content/(?P<id>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_content_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'content_new')), array (  '_controller' => 'AppBundle\\Controller\\ContentController::newAction',));
                }
                not_content_new:

                // content_blocked
                if (preg_match('#^/v1/content/(?P<id>[^/]++)/blocked/persons$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_content_blocked;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'content_blocked')), array (  '_controller' => 'AppBundle\\Controller\\ContentController::getBlockedPersonsAction',));
                }
                not_content_blocked:

                // content_edit
                if (preg_match('#^/v1/content/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_content_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'content_edit')), array (  '_controller' => 'AppBundle\\Controller\\ContentController::editAction',));
                }
                not_content_edit:

                // content_toggle
                if (preg_match('#^/v1/content/(?P<id>[^/]++)/toggle$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_content_toggle;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'content_toggle')), array (  '_controller' => 'AppBundle\\Controller\\ContentController::toggleAction',));
                }
                not_content_toggle:

                // content_delete
                if (preg_match('#^/v1/content/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_content_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'content_delete')), array (  '_controller' => 'AppBundle\\Controller\\ContentController::deleteAction',));
                }
                not_content_delete:

            }

            if (0 === strpos($pathinfo, '/v1/explication')) {
                // explication_index
                if (rtrim($pathinfo, '/') === '/v1/explication') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_explication_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'explication_index');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\ExplicationController::indexAction',  '_route' => 'explication_index',);
                }
                not_explication_index:

                // explication_show
                if (preg_match('#^/v1/explication/(?P<id>[^/]++)/show(?:/(?P<question>[^/]++)(?:/(?P<content>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_explication_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'explication_show')), array (  '_controller' => 'AppBundle\\Controller\\ExplicationController::showAction',  'question' => 0,  'content' => 0,));
                }
                not_explication_show:

                // explication_new
                if (0 === strpos($pathinfo, '/v1/explication/new') && preg_match('#^/v1/explication/new(?:/(?P<question>[^/]++)(?:/(?P<content>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_explication_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'explication_new')), array (  '_controller' => 'AppBundle\\Controller\\ExplicationController::newAction',  'question' => 0,  'content' => 0,));
                }
                not_explication_new:

                // explication_edit
                if (preg_match('#^/v1/explication/(?P<id>[^/]++)/edit(?:/(?P<question>[^/]++)(?:/(?P<content>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_explication_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'explication_edit')), array (  '_controller' => 'AppBundle\\Controller\\ExplicationController::editAction',  'question' => 0,  'content' => 0,));
                }
                not_explication_edit:

                // explication_delete
                if (preg_match('#^/v1/explication/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_explication_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'explication_delete')), array (  '_controller' => 'AppBundle\\Controller\\ExplicationController::deleteAction',));
                }
                not_explication_delete:

            }

            // create_token
            if ($pathinfo === '/v1/mobile/create/auth-token') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_create_token;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\MobileController::postAuthTokensAction',  '_route' => 'create_token',);
            }
            not_create_token:

        }

        // user_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_user_homepage;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'user_homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\AppController::indexAction',  '_route' => 'user_homepage',);
        }
        not_user_homepage:

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_homepage;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\AppController::indexAction',  '_route' => 'homepage',);
        }
        not_homepage:

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_security_login;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }
                not_fos_user_security_login:

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_security_logout;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }
            not_fos_user_security_logout:

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_profile_edit;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }
            not_fos_user_profile_edit:

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_registration_register;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }
                not_fos_user_registration_register:

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'AppBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'AppBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'AppBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

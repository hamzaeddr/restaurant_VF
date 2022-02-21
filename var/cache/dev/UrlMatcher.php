<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'carte', '_controller' => 'App\\Controller\\CarteController::index'], null, null, null, false, false, null]],
        '/addcarte' => [[['_route' => 'addcarte', '_controller' => 'App\\Controller\\CarteController::addcarte'], null, null, null, false, false, null]],
        '/modifiercarte' => [[['_route' => 'modifiercarte', '_controller' => 'App\\Controller\\CarteController::modifiercarte'], null, null, null, false, false, null]],
        '/supprimercarte' => [[['_route' => 'supprimercarte', '_controller' => 'App\\Controller\\CarteController::supprimercarte'], null, null, null, false, false, null]],
        '/remplirpopupajouterprod' => [[['_route' => 'remplirpopupajouterprod', '_controller' => 'App\\Controller\\ProduitController::remplirpopupajouterprod'], null, null, null, false, false, null]],
        '/addproduitcarte' => [[['_route' => 'addproduitcarte', '_controller' => 'App\\Controller\\ProduitController::addproduitcarte'], null, null, null, false, false, null]],
        '/deleteproduitrepartition' => [[['_route' => 'deleteproduitrepartition', '_controller' => 'App\\Controller\\ProduitController::deleteproduitrepartition'], null, null, null, false, false, null]],
        '/remplirpopupsupprimerpro' => [[['_route' => 'remplirpopupsupprimerpro', '_controller' => 'App\\Controller\\ProduitController::remplirpopupsupprimerpro'], null, null, null, false, false, null]],
        '/updateqteproduit' => [[['_route' => 'updateqteproduit', '_controller' => 'App\\Controller\\ProduitController::updateqteproduit'], null, null, null, false, false, null]],
        '/addrapartition' => [[['_route' => 'addrapartition', '_controller' => 'App\\Controller\\RepartitionController::addrapartition'], null, null, null, false, false, null]],
        '/modifierrapartition' => [[['_route' => 'modifierrapartition', '_controller' => 'App\\Controller\\RepartitionController::modifierrapartition'], null, null, null, false, false, null]],
        '/deleterapartition' => [[['_route' => 'deleterapartition', '_controller' => 'App\\Controller\\RepartitionController::deleterapartition'], null, null, null, false, false, null]],
        '/updatepaxrep' => [[['_route' => 'updatepaxrep', '_controller' => 'App\\Controller\\RepartitionController::updatepaxrep'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/remp(?'
                    .'|table(?'
                        .'|bydate/([^/]++)(*:200)'
                        .'|/([^/]++)/([^/]++)(*:226)'
                    .')'
                    .'|select(?'
                        .'|/([^/]++)(*:253)'
                        .'|add/([^/]++)(*:273)'
                        .'|tarif(?'
                            .'|add/([^/]++)(*:301)'
                            .'|modif/([^/]++)(*:323)'
                        .')'
                        .'|modif/([^/]++)(*:346)'
                        .'|beneffact/([^/]++)(*:372)'
                    .')'
                    .'|lir(?'
                        .'|table(?'
                            .'|pro/([^/]++)(*:407)'
                            .'|repar/([^/]++)(*:429)'
                        .')'
                        .'|popup(?'
                            .'|calcul/([^/]++)(*:461)'
                            .'|ajouterrepar/([^/]++)(*:490)'
                            .'|modifierrepar/([^/]++)(*:520)'
                            .'|supprimerrepar/([^/]++)(*:551)'
                        .')'
                        .'|infoproduct/([^/]++)(*:580)'
                    .')'
                .')'
                .'|/filtretablecarte/([^/]++)(*:616)'
                .'|/modifmodalcarte/([^/]++)(*:649)'
                .'|/suppmodalcarte/([^/]++)(*:681)'
                .'|/testb2c/([^/]++)(*:706)'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        200 => [[['_route' => 'remptablebydate', '_controller' => 'App\\Controller\\CarteController::remptablebydate'], ['date'], null, null, false, true, null]],
        226 => [[['_route' => 'remptable', '_controller' => 'App\\Controller\\CarteController::remptable'], ['id', 'id2'], null, null, false, true, null]],
        253 => [[['_route' => 'rempselect', '_controller' => 'App\\Controller\\CarteController::rempselect'], ['id'], null, null, false, true, null]],
        273 => [[['_route' => 'rempselectadd', '_controller' => 'App\\Controller\\CarteController::rempselectadd'], ['id'], null, null, false, true, null]],
        301 => [[['_route' => 'rempselecttarifadd', '_controller' => 'App\\Controller\\CarteController::rempselecttarifadd'], ['id'], null, null, false, true, null]],
        323 => [[['_route' => 'rempselecttarifmodif', '_controller' => 'App\\Controller\\CarteController::rempselecttarifmodif'], ['id'], null, null, false, true, null]],
        346 => [[['_route' => 'rempselectmodif', '_controller' => 'App\\Controller\\CarteController::rempselectmodif'], ['id'], null, null, false, true, null]],
        372 => [[['_route' => 'rempselectbeneffact', '_controller' => 'App\\Controller\\CarteController::rempselectbeneffact'], ['id'], null, null, false, true, null]],
        407 => [[['_route' => 'remplirtablepro', '_controller' => 'App\\Controller\\ProduitController::remplirtablepro'], ['id'], null, null, false, true, null]],
        429 => [[['_route' => 'remplirtablerepar', '_controller' => 'App\\Controller\\RepartitionController::remplirtablerepar'], ['id'], null, null, false, true, null]],
        461 => [[['_route' => 'remplirpopupcalcul', '_controller' => 'App\\Controller\\ProduitController::remplirpopupcalcul'], ['id'], null, null, false, true, null]],
        490 => [[['_route' => 'remplirpopupajouterrepar', '_controller' => 'App\\Controller\\RepartitionController::remplirpopupajouterrepar'], ['id'], null, null, false, true, null]],
        520 => [[['_route' => 'remplirpopupmodifierrepar', '_controller' => 'App\\Controller\\RepartitionController::remplirpopupmodifierrepar'], ['id'], null, null, false, true, null]],
        551 => [[['_route' => 'remplirpopupsupprimerrepar', '_controller' => 'App\\Controller\\RepartitionController::remplirpopupsupprimerrepar'], ['id'], null, null, false, true, null]],
        580 => [[['_route' => 'remplirinfoproduct', '_controller' => 'App\\Controller\\ProduitController::remplirinfoproduct'], ['id'], null, null, false, true, null]],
        616 => [[['_route' => 'filtretablecarte', '_controller' => 'App\\Controller\\CarteController::filtretablecarte'], ['date'], null, null, false, true, null]],
        649 => [[['_route' => 'modifmodalcarte', '_controller' => 'App\\Controller\\CarteController::modifmodalcarte'], ['id'], null, null, false, true, null]],
        681 => [[['_route' => 'suppmodalcarte', '_controller' => 'App\\Controller\\CarteController::suppmodalcarte'], ['id'], null, null, false, true, null]],
        706 => [
            [['_route' => 'testb2c', '_controller' => 'App\\Controller\\CarteController::testb2c'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];

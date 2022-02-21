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
        '/home' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/addrapartition' => [[['_route' => 'addrapartition', '_controller' => 'App\\Controller\\HomeController::addrapartition'], null, null, null, false, false, null]],
        '/modifierrapartition' => [[['_route' => 'modifierrapartition', '_controller' => 'App\\Controller\\HomeController::modifierrapartition'], null, null, null, false, false, null]],
        '/deleterapartition' => [[['_route' => 'deleterapartition', '_controller' => 'App\\Controller\\HomeController::deleterapartition'], null, null, null, false, false, null]],
        '/addcarte' => [[['_route' => 'addcarte', '_controller' => 'App\\Controller\\HomeController::addcarte'], null, null, null, false, false, null]],
        '/modifiercarte' => [[['_route' => 'modifiercarte', '_controller' => 'App\\Controller\\HomeController::modifiercarte'], null, null, null, false, false, null]],
        '/supprimercarte' => [[['_route' => 'supprimercarte', '_controller' => 'App\\Controller\\HomeController::supprimercarte'], null, null, null, false, false, null]],
        '/remplirpopupajouterprod' => [[['_route' => 'remplirpopupajouterprod', '_controller' => 'App\\Controller\\HomeController::remplirpopupajouterprod'], null, null, null, false, false, null]],
        '/addproduitcarte' => [[['_route' => 'addproduitcarte', '_controller' => 'App\\Controller\\HomeController::addproduitcarte'], null, null, null, false, false, null]],
        '/deleteproduitrepartition' => [[['_route' => 'deleteproduitrepartition', '_controller' => 'App\\Controller\\HomeController::deleteproduitrepartition'], null, null, null, false, false, null]],
        '/remplirpopupsupprimerpro' => [[['_route' => 'remplirpopupsupprimerpro', '_controller' => 'App\\Controller\\HomeController::remplirpopupsupprimerpro'], null, null, null, false, false, null]],
        '/updateqteproduit' => [[['_route' => 'updateqteproduit', '_controller' => 'App\\Controller\\HomeController::updateqteproduit'], null, null, null, false, false, null]],
        '/updatepaxrep' => [[['_route' => 'updatepaxrep', '_controller' => 'App\\Controller\\HomeController::updatepaxrep'], null, null, null, false, false, null]],
        '/product' => [[['_route' => 'product', '_controller' => 'App\\Controller\\ProduitController::product'], null, null, null, false, false, null]],
        '/product/compo' => [[['_route' => 'Cproduct', '_controller' => 'App\\Controller\\ProduitController::CompProduct'], null, null, null, false, false, null]],
        '/modiffamille' => [[['_route' => 'modiffamille', '_controller' => 'App\\Controller\\ProduitController::modiffamille'], null, null, null, false, false, null]],
        '/addfamille' => [[['_route' => 'addfamille', '_controller' => 'App\\Controller\\ProduitController::addfamille'], null, null, null, false, false, null]],
        '/addSousFamille' => [[['_route' => 'addSousFamille', '_controller' => 'App\\Controller\\ProduitController::addSousFamille'], null, null, null, false, false, null]],
        '/addproduitproduct' => [[['_route' => 'addproduitproduct', '_controller' => 'App\\Controller\\ProduitController::addproduitproduct'], null, null, null, false, false, null]],
        '/addproduittatif' => [[['_route' => 'addproduittatif', '_controller' => 'App\\Controller\\ProduitController::addproduittatif'], null, null, null, false, false, null]],
        '/modsousfamille' => [[['_route' => 'modsousfamille', '_controller' => 'App\\Controller\\ProduitController::modsousfamille'], null, null, null, false, false, null]],
        '/rechercheCarte' => [[['_route' => 'rechercheCarte', '_controller' => 'App\\Controller\\TraitementController::rechercheCarte'], null, null, null, false, false, null]],
        '/ajouterfacture' => [[['_route' => 'ajouterfacture', '_controller' => 'App\\Controller\\TraitementController::ajouterfacture'], null, null, null, false, false, null]],
        '/facturation' => [[['_route' => 'facturation', '_controller' => 'App\\Controller\\TraitementController::facturation'], null, null, null, false, false, null]],
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
                .'|/re(?'
                    .'|mp(?'
                        .'|table(?'
                            .'|bydate/([^/]++)(*:203)'
                            .'|/([^/]++)/([^/]++)(*:229)'
                        .')'
                        .'|lir(?'
                            .'|table(?'
                                .'|repar/([^/]++)(*:266)'
                                .'|pro/([^/]++)(*:286)'
                                .'|S(?'
                                    .'|FP/([^/]++)(*:309)'
                                    .'|ousFamille/([^/]++)(*:336)'
                                .')'
                                .'|P(?'
                                    .'|roduit/([^/]++)(*:364)'
                                    .'|P/([^/]++)(*:382)'
                                .')'
                            .')'
                            .'|popup(?'
                                .'|ajouterrepar/([^/]++)(*:421)'
                                .'|modifierrepar/([^/]++)(*:451)'
                                .'|supprimerrepar/([^/]++)(*:482)'
                                .'|calcul/([^/]++)(*:505)'
                            .')'
                            .'|infoproduct/([^/]++)(*:534)'
                            .'|NavSousFamille/([^/]++)(*:565)'
                        .')'
                        .'|select(?'
                            .'|/([^/]++)(*:592)'
                            .'|add/([^/]++)(*:612)'
                            .'|tarif(?'
                                .'|add/([^/]++)(*:640)'
                                .'|modif/([^/]++)(*:662)'
                                .'|facturer/([^/]++)(*:687)'
                            .')'
                            .'|modif/([^/]++)(*:710)'
                            .'|beneffact/([^/]++)(*:736)'
                        .')'
                        .'|modal(?'
                            .'|famille/([^/]++)(*:769)'
                            .'|supprimer(?'
                                .'|SF/([^/]++)(*:800)'
                                .'|PP/([^/]++)(*:819)'
                            .')'
                            .'|modif(?'
                                .'|PP/([^/]++)(*:847)'
                                .'|SF/([^/]++)(*:866)'
                            .')'
                        .')'
                    .')'
                    .'|partition/([^/]++)/([^/]++)(*:904)'
                .')'
                .'|/f(?'
                    .'|iltretablecarte/([^/]++)(*:942)'
                    .'|acturer/([^/]++)(*:966)'
                .')'
                .'|/mod(?'
                    .'|ifmodal(?'
                        .'|carte/([^/]++)(*:1006)'
                        .'|famille/([^/]++)(*:1031)'
                    .')'
                    .'|pro/([^/]++)(*:1053)'
                .')'
                .'|/suppmodalcarte/([^/]++)(*:1087)'
                .'|/testb2c/([^/]++)(*:1113)'
                .'|/Supp(?'
                    .'|famille/([^/]++)(*:1146)'
                    .'|SousFamille/([^/]++)(*:1175)'
                    .'|pro/([^/]++)(*:1196)'
                .')'
                .'|/valider/([^/]++)(*:1223)'
                .'|/B2C/([^/]++)(*:1245)'
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
        203 => [[['_route' => 'remptablebydate', '_controller' => 'App\\Controller\\HomeController::remptablebydate'], ['date'], null, null, false, true, null]],
        229 => [[['_route' => 'remptable', '_controller' => 'App\\Controller\\HomeController::remptable'], ['id', 'id2'], null, null, false, true, null]],
        266 => [[['_route' => 'remplirtablerepar', '_controller' => 'App\\Controller\\HomeController::remplirtablerepar'], ['id'], null, null, false, true, null]],
        286 => [[['_route' => 'remplirtablepro', '_controller' => 'App\\Controller\\HomeController::remplirtablepro'], ['id'], null, null, false, true, null]],
        309 => [[['_route' => 'remplirtableSFP', '_controller' => 'App\\Controller\\ProduitController::remplirtableSFP'], ['id'], null, null, false, true, null]],
        336 => [[['_route' => 'remplirtableSousFamille', '_controller' => 'App\\Controller\\ProduitController::remplirtableSousFamille'], ['id'], null, null, false, true, null]],
        364 => [[['_route' => 'remplirtableProduit', '_controller' => 'App\\Controller\\ProduitController::remplirtableProduit'], ['id'], null, null, false, true, null]],
        382 => [[['_route' => 'remplirtablePP', '_controller' => 'App\\Controller\\ProduitController::remplirtablePP'], ['id'], null, null, false, true, null]],
        421 => [[['_route' => 'remplirpopupajouterrepar', '_controller' => 'App\\Controller\\HomeController::remplirpopupajouterrepar'], ['id'], null, null, false, true, null]],
        451 => [[['_route' => 'remplirpopupmodifierrepar', '_controller' => 'App\\Controller\\HomeController::remplirpopupmodifierrepar'], ['id'], null, null, false, true, null]],
        482 => [[['_route' => 'remplirpopupsupprimerrepar', '_controller' => 'App\\Controller\\HomeController::remplirpopupsupprimerrepar'], ['id'], null, null, false, true, null]],
        505 => [[['_route' => 'remplirpopupcalcul', '_controller' => 'App\\Controller\\HomeController::remplirpopupcalcul'], ['id'], null, null, false, true, null]],
        534 => [[['_route' => 'remplirinfoproduct', '_controller' => 'App\\Controller\\HomeController::remplirinfoproduct'], ['id'], null, null, false, true, null]],
        565 => [[['_route' => 'remplirNavSousFamille', '_controller' => 'App\\Controller\\ProduitController::remplirNavSousFamille'], ['id'], null, null, false, true, null]],
        592 => [[['_route' => 'rempselect', '_controller' => 'App\\Controller\\HomeController::rempselect'], ['id'], null, null, false, true, null]],
        612 => [[['_route' => 'rempselectadd', '_controller' => 'App\\Controller\\HomeController::rempselectadd'], ['id'], null, null, false, true, null]],
        640 => [[['_route' => 'rempselecttarifadd', '_controller' => 'App\\Controller\\HomeController::rempselecttarifadd'], ['id'], null, null, false, true, null]],
        662 => [[['_route' => 'rempselecttarifmodif', '_controller' => 'App\\Controller\\HomeController::rempselecttarifmodif'], ['id'], null, null, false, true, null]],
        687 => [[['_route' => 'rempselecttariffacturer', '_controller' => 'App\\Controller\\TraitementController::rempselecttariffacturer'], ['id'], null, null, false, true, null]],
        710 => [[['_route' => 'rempselectmodif', '_controller' => 'App\\Controller\\HomeController::rempselectmodif'], ['id'], null, null, false, true, null]],
        736 => [[['_route' => 'rempselectbeneffact', '_controller' => 'App\\Controller\\HomeController::rempselectbeneffact'], ['id'], null, null, false, true, null]],
        769 => [[['_route' => 'rempmodalfamille', '_controller' => 'App\\Controller\\ProduitController::rempmodalfamille'], ['id'], null, null, false, true, null]],
        800 => [[['_route' => 'rempmodalsupprimerSF', '_controller' => 'App\\Controller\\ProduitController::rempmodalsupprimerSF'], ['id'], null, null, false, true, null]],
        819 => [[['_route' => 'rempmodalsupprimerPP', '_controller' => 'App\\Controller\\ProduitController::rempmodalsupprimerPP'], ['id'], null, null, false, true, null]],
        847 => [[['_route' => 'rempmodalmodifPP', '_controller' => 'App\\Controller\\ProduitController::rempmodalmodifPP'], ['id'], null, null, false, true, null]],
        866 => [[['_route' => 'rempmodalmodifSF', '_controller' => 'App\\Controller\\ProduitController::rempmodalmodifSF'], ['id'], null, null, false, true, null]],
        904 => [[['_route' => 'repartition', '_controller' => 'App\\Controller\\TraitementController::repartition'], ['id', 'id2'], null, null, false, true, null]],
        942 => [[['_route' => 'filtretablecarte', '_controller' => 'App\\Controller\\HomeController::filtretablecarte'], ['date'], null, null, false, true, null]],
        966 => [[['_route' => 'facturer', '_controller' => 'App\\Controller\\TraitementController::facturer'], ['id'], null, null, false, true, null]],
        1006 => [[['_route' => 'modifmodalcarte', '_controller' => 'App\\Controller\\HomeController::modifmodalcarte'], ['id'], null, null, false, true, null]],
        1031 => [[['_route' => 'modifmodalfamille', '_controller' => 'App\\Controller\\ProduitController::modifmodalfamille'], ['id'], null, null, false, true, null]],
        1053 => [[['_route' => 'modpro', '_controller' => 'App\\Controller\\ProduitController::modpro'], ['id'], null, null, false, true, null]],
        1087 => [[['_route' => 'suppmodalcarte', '_controller' => 'App\\Controller\\HomeController::suppmodalcarte'], ['id'], null, null, false, true, null]],
        1113 => [[['_route' => 'testb2c', '_controller' => 'App\\Controller\\HomeController::testb2c'], ['id'], null, null, false, true, null]],
        1146 => [[['_route' => 'Suppfamille', '_controller' => 'App\\Controller\\ProduitController::Suppfamille'], ['id'], null, null, false, true, null]],
        1175 => [[['_route' => 'SuppSousFamille', '_controller' => 'App\\Controller\\ProduitController::SuppSousFamille'], ['id'], null, null, false, true, null]],
        1196 => [[['_route' => 'Supppro', '_controller' => 'App\\Controller\\ProduitController::Supppro'], ['id'], null, null, false, true, null]],
        1223 => [[['_route' => 'valider', '_controller' => 'App\\Controller\\TraitementController::index'], ['id'], null, null, false, true, null]],
        1245 => [
            [['_route' => 'B2C', '_controller' => 'App\\Controller\\TraitementController::B2C'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];

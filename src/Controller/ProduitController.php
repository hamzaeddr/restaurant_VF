<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
   
    

    // ================ Route remplissage table produit par repartition =================
    // ==================================================================================

    /**
     * @Route("/remplirtablepro/{id}", name="remplirtablepro")
     */
    public function remplirtablepro($id)
    {   
        $con = $this->getDoctrine()->getConnection();
        $req="select pp.ID_Produit,pp.produit,pfsc.familleSousC,pcl.Stock_Carte,pcl.ID_Repartition from pcarte_lg pcl
        inner join pproduits pp on pcl.ID_Produit=pp.ID_Produit 
        inner join pfamillessous_carte pfsc on pp.ID_FamilleSousC = pfsc.ID_FamilleSousC
         where ID_Repartition ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstFamille= $stm->fetchAll();
        $tbody2 = $this->render('inc/tbodyPro.html.twig',[
            'lstPro'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody2));
        return $response;
      
    }
    

    
    // ================ Route remplissage popup calcul par repartition =================
    // ==================================================================================

    /**
     * @Route("/remplirpopupcalcul/{id}", name="remplirpopupcalcul")
     */
    public function remplirpopupcalcul($id)
    {   
        $con = $this->getDoctrine()->getConnection();
        $req="select pcl.ID_Produit,pcl.Unité,pcl.stock_cmd,pcl.stock_reste,pp.produit,pcl.Stock_Carte,pcl.ID_Repartition from pcarte_lg pcl
        inner join pproduits pp on pcl.ID_Produit=pp.ID_Produit 
         where ID_Repartition ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstFamille= $stm->fetchAll();
        $tbody2 = $this->render('inc/tbodycalcul.html.twig',[
            'lstPro'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody2));
        return $response;
      
    }
    
    
    // ================ Route popup ajouter produit =================
    // ===============================================================

    /**
     * @Route("/remplirpopupajouterprod", name="remplirpopupajouterprod")
     */
    public function remplirpopupajouterprod(Request $request): Response
    {
        // dd($request);
         $idcarte = $request->get('idcarte');
        $idrepartition = $request->get('idrepartition');
        $con = $this->getDoctrine()->getConnection();
       
        $req="select * from pfamilles_carte";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();
        $lstF= $stm->fetchAll();

        
        $html = $this->render('inc/popupajouterproduit.html.twig', [
            'lstfamille' => $lstF,
            'idcarte' => $idcarte,
            'idrepartition' => $idrepartition
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($html));
        return $response;
    }
    
    
    // ================ Route remplissage table product add=================
    // ===============================================================

    /**
     * @Route("/remplirinfoproduct/{id}", name="remplirinfoproduct")
     */
    public function remplirinfoproduct($id): Response
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pproduit
        where ID_Produit  ='".$id."' ";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();
        $lstF= $stm->fetch();

        
        $html = $this->render('inc/popupsuppcarte.html.twig', [
            'list' => $lstF,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($html));
        return $response;
    }
    


     // ================ Route ajouter produit par reparttiton =================
    // ===============================================================

    /**
     * @Route("/addproduitcarte", name="addproduitcarte")
     */
    public function addproduitcarte(Request $request): Response
    {   
        // dd($request);
        $idproduit = $request->get('idproduit');
        $idcarte = $request->get('idcarte');
        $idrepartition = $request->get('idrepartition');
        $qtep=$request->get('qtep');
        $con = $this->getDoctrine()->getConnection();
    
        $req="insert into pcarte_lg (ID_Repartition,ID_Carte,ID_Produit,Stock_Carte,Stock_Cmd,Stock_Reste) values(?,?,?,?,?,?)";
        $stm=$con->prepare($req);
        $stm->execute([ $idrepartition,$idcarte, $idproduit,$qtep,'0',$qtep]);

        $req2="select pp.ID_Produit,pp.produit,pfsc.familleSousC,pcl.Stock_Carte,pcl.ID_Repartition from pcarte_lg pcl
        inner join pproduits pp on pcl.ID_Produit=pp.ID_Produit 
        inner join pfamillessous_carte pfsc on pp.ID_FamilleSousC = pfsc.ID_FamilleSousC
         where ID_Repartition ='".$idrepartition."'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $lstFamille= $stm2->fetchAll();
        $tbody2 = $this->render('inc/tbodyPro.html.twig',[
            'lstPro'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody2));
        return $response;
    }
    
    
    // ================ Route supprimer produit par carte =================
    // ===============================================================

    /**
     * @Route("/deleteproduitrepartition", name="deleteproduitrepartition")
     */
    public function deleteproduitrepartition(Request $request)
    {   
        // dd($request);
        $idrepartition = $request->get('idrepartition');
        $idproduit = $request->get('idproduit');
        $con = $this->getDoctrine()->getConnection();
        $req="delete from pcarte_lg where ID_Repartition   ='".$idrepartition."' and ID_Produit  ='".$idproduit."'";
        $stm=$con->prepare($req);
        $stm->execute();

        $req2="select pp.ID_Produit,pp.produit,pfsc.familleSousC,pcl.Stock_Carte,pcl.ID_Repartition from pcarte_lg pcl
        inner join pproduits pp on pcl.ID_Produit=pp.ID_Produit 
        inner join pfamillessous_carte pfsc on pp.ID_FamilleSousC = pfsc.ID_FamilleSousC
         where ID_Repartition ='".$idrepartition."'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $lstFamille= $stm2->fetchAll();
        $tbody2 = $this->render('inc/tbodyPro.html.twig',[
            'lstPro'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody2));
        return $response;

    }

    

    // ================ Route remplissage table popup supprimer produit par repartition =================
    // ======================================================================

    /**
     * @Route("/remplirpopupsupprimerpro", name="remplirpopupsupprimerpro")
     */
    public function remplirpopupsupprimerpro(Request $request)
    {   
        // dd($request);
        $idrepartition = $request->get('idrepartition');
        $idproduit = $request->get('idproduit');
        $con = $this->getDoctrine()->getConnection();
        $req="select pp.ID_Produit,pp.produit,pfsc.familleSousC,pcl.Stock_Carte,pcl.ID_Repartition from pcarte_lg pcl
        inner join pproduits pp on pcl.ID_Produit=pp.ID_Produit 
        inner join pfamillessous_carte pfsc on pp.ID_FamilleSousC = pfsc.ID_FamilleSousC where pcl.ID_Repartition ='".$idrepartition."' and pcl.ID_Produit='".$idproduit."'   limit 1";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstFamille= $stm->fetch();
        $tbody = $this->render('inc/popupsuppproduit.html.twig',[
            'lstRep'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody));
        return $response;
      
    }
    
    
    
     // ================ Route modifier qte produit par repartition =================
    // ===============================================================

    /**
     * @Route("/updateqteproduit", name="updateqteproduit")
     */
    public function updateqteproduit(Request $request)
    {   
        // dd($request);   
        $qtec = $request->get('qtec');
        $qtes = $request->get('qtes');
        $idproduit = $request->get('idproduit');
        $qter = $request->get('qter');
        $idrepartition = $request->get('idrepartition');
        $con = $this->getDoctrine()->getConnection();
        $req="UPDATE pcarte_lg SET Stock_Cmd='".$qtec."',Stock_Reste='".$qter. "', Stock_Carte='".$qtes. "'WHERE ID_Repartition='".$idrepartition. "'AND ID_Produit='".$idproduit."'";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();

        $req2="select pp.ID_Produit,pp.produit,pfsc.familleSousC,pcl.Stock_Carte,pcl.ID_Repartition from pcarte_lg pcl
        inner join pproduits pp on pcl.ID_Produit=pp.ID_Produit 
        inner join pfamillessous_carte pfsc on pp.ID_FamilleSousC = pfsc.ID_FamilleSousC
         where ID_Repartition ='".$idrepartition."'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $lstFamille= $stm2->fetchAll();
        $tbody2 = $this->render('inc/tbodyPro.html.twig',[
            'lstPro'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody2));
        return $response;

    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use \Datetime;


class HomeController extends AbstractController
{

    // ================ Route Home =================
    // =============================================

    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {   
        $current_day= new DateTime('now');
        $current_day = $current_day->format('Y-m-d');
        $con = $this->getDoctrine()->getConnection();
        $req="select pc.ID_Carte, pc.Date_Création , pc.Date_Validité , pcl.Client , pb.Bénéficiaire , pc.Type_Client ,pc.Obs ,pc.Générer,pc.Facturer from pcarte pc
         inner join pclients pcl on pc.ID_Client=pcl.ID_Client
         inner join pclients_bénéficiaire pb on pb.ID_Bénéficiaire=pc.ID_Bénéficiaire 
         where  pc.Date_Validité = '".$current_day." 00:00:00' limit 200 ";

        $stm=$con->prepare($req);
        $stm->execute();
        $data= $stm->fetchAll();
 
        // ======================================================

        $req2="select * from pclients ";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $data2= $stm2->fetchAll();

        // ======================================================

        return $this->render('home/index.html.twig', [
            'list' => $data,
            'listClient' => $data2,
        ]);
    }


    // ================ Route remplir table by date precis =================
    // =============================================

    /**
     * @Route("/remptablebydate/{date}", name="remptablebydate")
     */
    public function remptablebydate($date): Response
    {   $date2=new DateTime($date);
        $date2=$date2->format('Y-m-d');
       
        $con = $this->getDoctrine()->getConnection();
        $req="select pc.ID_Carte, pc.Date_Création , pc.Date_Validité , pcl.Client , pb.Bénéficiaire , pc.Type_Client ,pc.Obs ,pc.Générer,pc.Facturer from pcarte pc
        inner join pclients pcl on pc.ID_Client=pcl.ID_Client
        inner join pclients_bénéficiaire pb on pb.ID_Bénéficiaire=pc.ID_Bénéficiaire 
          where  pc.Date_Validité = '".$date2." 00:00:00'  limit 200";
        // dd($req);  
        $stm=$con->prepare($req);
        $stm->execute();
        $data= $stm->fetchAll();
 
        // ======================================================

        return $this->render('inc/tbodybydate.html.twig', [
            'list' => $data,
        ]);
    }


    // ================ Route Home =================
    // =============================================

    /**
     * @Route("/filtretablecarte/{date}", name="filtretablecarte")
     */
    public function filtretablecarte($date): Response
    {   
        $aujourdhui= new DateTime('now');
        $aujourdhui = $aujourdhui->format('Y-m-d');
        $demain= new DateTime('tomorrow');
        $demain = $demain->format('Y-m-d');
        $con = $this->getDoctrine()->getConnection();
        $req="select pc.ID_Carte, pc.Date_Création , pc.Date_Validité , pcl.Client , pb.Bénéficiaire , pc.Type_Client ,pc.Obs ,pc.Générer,pc.Facturer from pcarte pc 
        inner join pclients pcl on pc.ID_Client=pcl.ID_Client
         inner join pclients_bénéficiaire pb on pb.ID_Bénéficiaire=pc.ID_Bénéficiaire ";
        if ($date == "aujourdhui") { 
            $req .= " where  pc.Date_Validité = '".$aujourdhui." 00:00:00'";
        }
        else if ($date == "demain") { 
            $req .= " where  pc.Date_Validité = '".$demain." 00:00:00' ";
        }
        else if ($date == "prochainement") { 
            $req .= " where  pc.Date_Validité > '".$demain." 00:00:00' ";
        }
        else if ($date == "tous") { 
            $req .= "  ";
        }
       
        $req .= "limit 200";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();
        $data= $stm->fetchAll();
        
        return $this->render('inc/tbodycartefiltre.html.twig', [
            'lstCarteF' => $data,
        ]);
    }

    // ================ Route remplissage table repartition =================
    // ======================================================================

    /**
     * @Route("/remplirtablerepar/{id}", name="remplirtablerepar")
     */
    public function remplirtablerepar($id)
    {   
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pcarte_repartition where ID_Carte ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstFamille= $stm->fetchAll();
        $tbody = $this->render('inc/tbodyRep.html.twig',[
            'lstRep'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody));
        return $response;
      
    }



    // ================ Route remplissage table popup ajouter repartition par carte =================
    // ======================================================================

    /**
     * @Route("/remplirpopupajouterrepar/{id}", name="remplirpopupajouterrepar")
     */
    public function remplirpopupajouterrepar($id)
    {   
        $con = $this->getDoctrine()->getConnection();
        $req="select * from prepartition";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstFamille= $stm->fetchAll();
        $tbody = $this->render('inc/popupajoutercarterepartition.html.twig',[
            'lstRep'=>$id,
            'listrepar' => $lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody));
        return $response;
      
    }

    
     // ================ Route ajouter repartition =================
    // ===============================================================

    /**
     * @Route("/addrapartition", name="addrapartition")
     */
    public function addrapartition(Request $request)
    {   
         $idcarte = $request->get('idcarte');
        $libelle = $request->get('libelle');
        $i=$request->get('i');
        $con = $this->getDoctrine()->getConnection();
             $reqrep="SELECT ID_Repartition FROM pcarte_repartition ORDER BY Auto DESC LIMIT 1";
        $stm3=$con->prepare($reqrep);
        $stm3->execute();
        $idrepartition=$stm3->fetch();
       $split = str_split($idrepartition['ID_Repartition'],3);
       $slipt2=strstr($idrepartition['ID_Repartition'], 'RPT');
       $CODE = $split[1].$split[2];
       $CODE = (int)$CODE;
       $CODE=$CODE+1;
        $idrep='RPT'.$CODE; 
        $req="insert into pcarte_repartition (ID_Repartition,ID_Carte,Repartition) values(?,?,?)";
        $stm=$con->prepare($req);
        $stm->execute([ $idrep,$idcarte, $libelle]);
           
        $req2="select * from pcarte_repartition where ID_Carte ='".$idcarte."'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $lstFamille= $stm2->fetchAll();
        $tbody = $this->render('inc/tbodyRep.html.twig',[
            'lstRep'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody));
        return $response;

    }

    

    // ================ Route remplissage table popup modifier repartition par carte =================
    // ======================================================================

    /**
     * @Route("/remplirpopupmodifierrepar/{id}", name="remplirpopupmodifierrepar")
     */
    public function remplirpopupmodifierrepar($id)
    {   
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pcarte_repartition where ID_Repartition ='".$id."' limit 1";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstFamille= $stm->fetch();
        $tbody = $this->render('inc/popupmodifierrepartition.html.twig',[
            'lstRep'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody));
        return $response;
      
    }

    

    // ================ Route remplissage table popup supprimer repartition par carte =================
    // ======================================================================

    /**
     * @Route("/remplirpopupsupprimerrepar/{id}", name="remplirpopupsupprimerrepar")
     */
    public function remplirpopupsupprimerrepar($id)
    {   
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pcarte_repartition where ID_Repartition ='".$id."' limit 1";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstFamille= $stm->fetch();
        $tbody = $this->render('inc/popupsupprimerrepartion.html.twig',[
            'lstRep'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody));
        return $response;
      
    }
    
    
     // ================ Route modifier repartition =================
    // ===============================================================

    /**
     * @Route("/modifierrapartition", name="modifierrapartition")
     */
    public function modifierrapartition(Request $request)
    {   
        // dd($request);
        $idcarte = $request->get('idcarte');
        $idrepartition = $request->get('idrepartition');
        $libelle = $request->get('libelle');
        $pax = $request->get('pax');
        $heure = $request->get('heure');
        $con = $this->getDoctrine()->getConnection();
        $req="UPDATE pcarte_repartition SET Repartition=?,Pax=? , Heure=? WHERE ID_Repartition=? AND ID_Carte= ?";
        $stm=$con->prepare($req);
        $stm->execute([$libelle,$pax,$heure ,$idrepartition,$idcarte]);

        $req2="select * from pcarte_repartition where ID_Carte ='".$idcarte."'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $lstFamille= $stm2->fetchAll();
        $tbody = $this->render('inc/tbodyRep.html.twig',[
            'lstRep'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody));
        return $response;

    }

    
    
    
     // ================ Route supprimer repartition =================
    // ===============================================================

    /**
     * @Route("/deleterapartition", name="deleterapartition")
     */
    public function deleterapartition(Request $request)
    {   
        // dd($request);
        $idrepartition = $request->get('idrepartition');
        $idcarte = $request->get('idcarte');
        $con = $this->getDoctrine()->getConnection();
        $req="delete from pcarte_repartition where ID_Repartition   ='".$idrepartition."'";
        $stm=$con->prepare($req);
        $stm->execute();

        $req2="select * from pcarte_repartition where ID_Carte ='".$idcarte."'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $lstFamille= $stm2->fetchAll();
        $tbody = $this->render('inc/tbodyRep.html.twig',[
            'lstRep'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody));
        return $response;

    }

    
    
    

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
    

     /**
     * @Route("/rempselect/{id}", name="rempselect")
     */
    public function rempselect($id)
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pclients_bénéficiaire where ID_Client ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstbenef= $stm->fetchAll();
        $DDLbenef = $this->render('inc/DDLbenef.html.twig',[
            'lstbenef' => $lstbenef,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($DDLbenef));
        return $response;
    }


     /**
     * @Route("/rempselectadd/{id}", name="rempselectadd")
     */
    public function rempselectadd($id)
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pclients_bénéficiaire where ID_Client ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstbenef= $stm->fetchAll();
        $DDLbenef = $this->render('inc/DDLbenefadd.html.twig',[
            'lstbenef' => $lstbenef,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($DDLbenef));
        return $response;
    }

    

     /**
     * @Route("/rempselecttarifadd/{id}", name="rempselecttarifadd")
     */
    public function rempselecttarifadd($id)
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pType_Tarif ptf inner join pclients_bénéficiaire pb on ptf.ID_tarif=pb.ID_Tarif where ID_Bénéficiaire ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lsttarif= $stm->fetchAll();
        $DDLtarif = $this->render('inc/DDLtarifadd.html.twig',[
            'lsttarif' => $lsttarif,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($DDLtarif));
        return $response;
    }


     /**
     * @Route("/remptable/{id}/{id2}", name="remptable")
     */
    public function remptable($id, $id2)
    { 
        //   $id2 = "";
        $con = $this->getDoctrine()->getConnection();
        $req2="select pc.ID_Carte, pc.Date_Création , pc.Date_Validité , pcl.ID_Client , pcl.Client , pb.Bénéficiaire , pc.Type_Client ,pc.Obs,pc.Générer,pc.Facturer
         from pcarte pc 
            inner join pclients pcl on pc.ID_Client=pcl.ID_Client 
            inner join pclients_bénéficiaire pb on pcl.ID_Client=pb.ID_Client 
            where pc.ID_Client  ='".$id."' ";
            if ($id2 !== "a") {
                $req2 .= "AND  pb.ID_Bénéficiaire  ='".$id2."' ";
            }
            $req2 .= "limit 10";
            $stm2=$con->prepare($req2);
            $stm2->execute();
            $data2= $stm2->fetchAll();
    
            // ===============================
            $DDLbenef = $this->render('inc/tbodycarte.html.twig',[
              'lstCarte' => $data2,
            ])->getContent();
            $response = new Response();
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent(json_encode($DDLbenef));
            return $response;
    }

     // ================ Route ajouter carte =================
    // ===============================================================

    /**
     * @Route("/addcarte", name="addcarte")
     */
    public function addcarte(Request $request): Response
    {   
        // dd($request->get('datevalidite'));
        $idcarte = $request->get('idcarte');
        $client = $request->get('client');
        $beneficiaire = $request->get('beneficiaire');
        $tarif = $request->get('tarif');
        $date = $request->get('datevalidite');
        $obs = $request->get('obs');
        // dd($date);
        $con = $this->getDoctrine()->getConnection();
        $req="insert into pcarte (ID_Carte,ID_Client,ID_Bénéficiaire,ID_Tarif,Date_validité,Obs) values(?,?,?,?,?,?)";
        $stm=$con->prepare($req);
        $stm->execute([$idcarte, $client, $beneficiaire,$tarif,$date,$obs]);
        return $this->redirectToRoute('home');;
    }

    
    // ================ Route popup modifier carte =================
    // ===============================================================

    /**
     * @Route("/modifmodalcarte/{id}", name="modifmodalcarte")
     */
    public function modifmodalcarte($id): Response
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pcarte where ID_Carte  ='".$id."' limit 1";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();
        $lstF= $stm->fetch();

        // ==========================================

        $req2="select * from pclients ";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $data2= $stm2->fetchAll();

        // ======================================================


        // dd($lstF);
        $html = $this->render('inc/popupmodifcarte.html.twig', [
            'list' => $lstF,
            'lst' => $data2,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($html));
        return $response;
    }


     /**
     * @Route("/rempselectmodif/{id}", name="rempselectmodif")
     */
    public function rempselectmodif($id)
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pclients_bénéficiaire where ID_Client ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstbenef= $stm->fetchAll();
        $DDLbenef = $this->render('inc/DDLbenefmodif.html.twig',[
            'lstbenef' => $lstbenef,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($DDLbenef));
        return $response;
    }

    
    

     /**
     * @Route("/rempselecttarifmodif/{id}", name="rempselecttarifmodif")
     */
    public function rempselecttarifmodif($id)
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pType_Tarif ptf inner join pclients_bénéficiaire pb on ptf.ID_tarif=pb.ID_Tarif where ID_Bénéficiaire ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lsttarif= $stm->fetchAll();
        $DDLtarif = $this->render('inc/DDLtarifmodif.html.twig',[
            'lsttarif' => $lsttarif,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($DDLtarif));
        return $response;
    }

    
    
     // ================ Route modifier carte =================
    // ===============================================================

    /**
     * @Route("/modifiercarte", name="modifiercarte")
     */
    public function modifiercarte(Request $request): Response
    {   
        // dd($request);
        $idcarte = $request->get('idcartem');
        $client = $request->get('clientm');
        $beneficiaire = $request->get('beneficiairem');
        $tarif = $request->get('tarifm');
        $date = $request->get('datevaliditem');
        $obs = $request->get('obsm');
        // dd($date);
        $con = $this->getDoctrine()->getConnection();
        $req="UPDATE pcarte SET ID_Client=?, ID_Bénéficiaire=? , ID_Tarif=? , Date_Validité= ? , Obs=? WHERE ID_Carte=?";
        $stm=$con->prepare($req);
        $stm->execute([ $client, $beneficiaire,$tarif,$date,$obs,$idcarte]);
        return $this->redirectToRoute('home');;
    }

    
    // ================ Route popup supprimer carte =================
    // ===============================================================

    /**
     * @Route("/suppmodalcarte/{id}", name="suppmodalcarte")
     */
    public function suppmodalcarte($id): Response
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select pc.ID_Carte, pc.Date_Création , pc.Date_Validité , pt.Tarif , pcl.Client , pb.Bénéficiaire , pc.Type_Client ,pc.Obs from pcarte pc
        inner join pclients pcl on pc.ID_Client=pcl.ID_Client inner join 
        pclients_bénéficiaire pb on pcl.ID_Client=pb.ID_Client 
        inner join pType_Tarif pt on pb.ID_Tarif=pt.ID_Tarif
        where ID_Carte  ='".$id."' limit 1";
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
    
    // ================ Route supprimer carte =========================
    // ===============================================================

    /**
     * @Route("/supprimercarte", name="supprimercarte")
     */
    public function supprimercarte(Request $request): Response
    {   
        // dd($request);
        $idcarte = $request->get('idcartem');
        // dd($date);
        $con = $this->getDoctrine()->getConnection();
        $req="delete from pcarte  WHERE ID_Carte=?";
        $stm=$con->prepare($req);
        $stm->execute([ $idcarte]);
        return $this->redirectToRoute('home');;
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

      
     // ================ Route modifier repartition =================
    // ===============================================================

    /**
     * @Route("/updatepaxrep", name="updatepaxrep")
     */
    public function updatepaxrep(Request $request)
    {   
        // dd($request);   
       
        $qtes = $request->get('qtes');
        $idrepartition = $request->get('idrepartition');
        $idcarte = $request->get('idcarte');
        
        $con = $this->getDoctrine()->getConnection();
        $req="UPDATE pcarte_repartition SET pax='".$qtes."' WHERE ID_Repartition='".$idrepartition. "'AND ID_Carte='".$idcarte."'";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();

        $req2="select * from pcarte_repartition where ID_Carte ='".$idcarte."'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $lstFamille= $stm2->fetchAll();
        $tbody = $this->render('inc/tbodyRep.html.twig',[
            'lstRep'=>$lstFamille,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbody));
        return $response;

    }
    
    
    
    
    // ================ Route test si b2c =================
    // ===============================================================

    /**
     * @Route("/testb2c/{id}", name="testb2c")
     */
    public function testb2c($id): Response
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select pc.ID_Carte, pc.Date_Création , pc.Date_Validité , pcl.Client , pb.Bénéficiaire , pc.Type_Client ,pc.Obs from pcarte pc 
        inner join pclients pcl on pc.ID_Client=pcl.ID_Client
         inner join pclients_bénéficiaire pb on pb.ID_Bénéficiaire=pc.ID_Bénéficiaire where ID_Carte='".$id."'";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();
        $lstF= $stm->fetch();
        $html = $this->render('inc/btnb2c.html.twig', [
            'list' => $lstF,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($html));
        return $response;
    }

    
    

     /**
     * @Route("/rempselectbeneffact/{id}", name="rempselectbeneffact")
     */
    public function rempselectbeneffact($id)
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pclients_bénéficiaire where ID_Client ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstbenef= $stm->fetchAll();
        $DDLbenef = $this->render('inc/ddlbeneffacturer.html.twig',[
            'lstbenef' => $lstbenef,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($DDLbenef));
        return $response;
    }

    

}

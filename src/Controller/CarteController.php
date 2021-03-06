<?php

namespace App\Controller;

use App\Entity\Carte;
use App\Entity\Client;
use App\Entity\ClientBeneficiaire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarteController extends AbstractController
{
    // ================= Liste des cartes par jour ================= M
    
    /**
     * @Route("/", name="carte")
     */
    public function index(): Response
    {
        $current_day= new \DateTime('now');
        $current_day = $current_day->format('Y-m-d');
        $em = $this->getDoctrine()->getManager();
        $cartes = $em->getRepository(Carte::class)->findBy(['DateValidite' => new \DateTime('now')]);
        dd($cartes);
        // ======================================================

        $client = $this->getDoctrine()
        ->getRepository(Client::class)
        ->findAll();
        
        // ======================================================

        return $this->render('home/index.html.twig', [
            'list' => $cartes,
            'listClient' => $client,
        ]);
    }

    // ================= Liste des cartes par jour precis ================= M
    
    /**
     * @Route("/remptablebydate/{date}", name="remptablebydate")
     */
    public function remptablebydate(): Response
    {
        $date2=new DateTime($date);
        $date2=$date2->format('Y-m-d');

        $em = $this->getDoctrine()->getManager();
        $cartes = $em->getRepository(Carte::class)->findBy(['Dtae_Validite' => $date2 ]);
        dd($cartes);
      

        return $this->render('home/index.html.twig', [
            'list' => $cartes,
            
        ]);
    }

    // ================= Liste des cartes par jour non precis ================= non M
    
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
        // $req="select pc.ID_Carte, pc.Date_Cr??ation , pc.Date_Validit?? , pcl.Client , pb.B??n??ficiaire , pc.Type_Client ,pc.Obs ,pc.G??n??rer,pc.Facturer from pcarte pc 
        // inner join pclients pcl on pc.ID_Client=pcl.ID_Client
        //  inner join pclients_b??n??ficiaire pb on pb.ID_B??n??ficiaire=pc.ID_B??n??ficiaire ";
        // if ($date == "aujourdhui") { 
        //     $req .= " where  pc.Date_Validit?? = '".$aujourdhui." 00:00:00'";
        // }
        // else if ($date == "demain") { 
        //     $req .= " where  pc.Date_Validit?? = '".$demain." 00:00:00' ";
        // }
        // else if ($date == "prochainement") { 
        //     $req .= " where  pc.Date_Validit?? > '".$demain." 00:00:00' ";
        // }
        // else if ($date == "tous") { 
        //     $req .= "  ";
        // }
       
        // $req .= "limit 200";
        
        return $this->render('inc/tbodycartefiltre.html.twig', [
            'lstCarteF' => $data,
        ]);
    }

    // ================= Liste des Clients Beneficiaire ================= M
    
     /**
     * @Route("/rempselect/{id}", name="rempselect")
     */
    public function rempselect($id)
    {
        // $req="select * from pclients_b??n??ficiaire where ID_Client ='".$id."'";
        $em = $this->getDoctrine()->getManager();
        $ClientB = $em->getRepository(ClientBeneficiaire::class)->findBy(['Id_Client' => $id]);

        $DDLbenef = $this->render('inc/DDLbenef.html.twig',[
            'lstbenef' => $lstbenef,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($DDLbenef));
        return $response;
    }

    // ================= Liste des Clients Beneficiaire ================= M

     /**
     * @Route("/rempselectadd/{id}", name="rempselectadd")
     */
    public function rempselectadd($id)
    {
        $em = $this->getDoctrine()->getManager();
        $ClientB = $em->getRepository(ClientBeneficiaire::class)->findBy(['Id_Client' => $id]);
        $DDLbenef = $this->render('inc/DDLbenefadd.html.twig',[
            'lstbenef' => $lstbenef,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($DDLbenef));
        return $response;
    }

    // ================= Liste des Clients Beneficiaire ================= non M

     /**
     * @Route("/rempselecttarifadd/{id}", name="rempselecttarifadd")
     */
    public function rempselecttarifadd($id)
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pType_Tarif ptf inner join pclients_b??n??ficiaire pb on ptf.ID_tarif=pb.ID_Tarif where ID_B??n??ficiaire ='".$id."'";
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

    // ================= Liste des cartes filter by client et beneficiaire ================= non M

     /**
     * @Route("/remptable/{id}/{id2}", name="remptable")
     */
    public function remptable($id, $id2)
    { 
        //   $id2 = "";
        $con = $this->getDoctrine()->getConnection();
        $req2="select pc.ID_Carte, pc.Date_Cr??ation , pc.Date_Validit?? , pcl.ID_Client , pcl.Client , pb.B??n??ficiaire , pc.Type_Client ,pc.Obs from pcarte pc 
            inner join pclients pcl on pc.ID_Client=pcl.ID_Client 
            inner join pclients_b??n??ficiaire pb on pcl.ID_Client=pb.ID_Client 
            where pc.ID_Client  ='".$id."' ";
            if ($id2 !== "a") {
                $req2 .= "AND  pb.ID_B??n??ficiaire  ='".$id2."' ";
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

    // ================= Ajouter Carte ================= non M

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
        $req="insert into pcarte (ID_Carte,ID_Client,ID_B??n??ficiaire,ID_Tarif,Date_validit??,Obs) values(?,?,?,?,?,?)";
        $stm=$con->prepare($req);
        $stm->execute([$idcarte, $client, $beneficiaire,$tarif,$date,$obs]);
        return $this->redirectToRoute('home');;
    }
    
    // ================= Popup modifier carte ================= M

    /**
     * @Route("/modifmodalcarte/{id}", name="modifmodalcarte")
     */
    public function modifmodalcarte($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $Carte = $em->getRepository(Carte::class)->findBy(['Id_Carte' => $id]);
        // $req="select * from pcarte where ID_Carte  ='".$id."' limit 1";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();
        $lstF= $stm->fetch();

        // ==========================================

        // $req2="select * from pclients ";
        $Client = $em->getRepository(Client::class)->findAll();
       
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

    // ================= DDL client beneficiaire modifier carte ================= M

     /**
     * @Route("/rempselectmodif/{id}", name="rempselectmodif")
     */
    public function rempselectmodif($id)
    {
        $em = $this->getDoctrine()->getManager();
        $ClientB = $em->getRepository(ClientBeneficiaire::class)->findBy(['Id_Client' => $id]);
        // $req="select * from pclients_b??n??ficiaire where ID_Client ='".$id."'";
      
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
        $req="select * from pType_Tarif ptf inner join pclients_b??n??ficiaire pb on ptf.ID_tarif=pb.ID_Tarif where ID_B??n??ficiaire ='".$id."'";
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
        $req="UPDATE pcarte SET ID_Client=?, ID_B??n??ficiaire=? , ID_Tarif=? , Date_Validit??= ? , Obs=? WHERE ID_Carte=?";
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
       
        // $req="select pc.ID_Carte, pc.Date_Cr??ation , pc.Date_Validit?? , pt.Tarif , pcl.Client , pb.B??n??ficiaire , pc.Type_Client ,pc.Obs from pcarte pc
        // inner join pclients pcl on pc.ID_Client=pcl.ID_Client inner join 
        // pclients_b??n??ficiaire pb on pcl.ID_Client=pb.ID_Client 
        // inner join pType_Tarif pt on pb.ID_Tarif=pt.ID_Tarif
        // where ID_Carte  ='".$id."' limit 1";
        // dd($req);
        $em = $this->getDoctrine()->getManager();
        $Carte = $em->getRepository(Carte::class)->findBy(['Id_Carte' => $id]);

        
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

    // ================ Route test si b2c =================
    // ===============================================================

    /**
     * @Route("/testb2c/{id}", name="testb2c")
     */
    public function testb2c($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $Carte = $em->getRepository(Carte::class)->findBy(['Id_Carte' => $id]);
        // $req="select pc.ID_Carte, pc.Date_Cr??ation , pc.Date_Validit?? , pcl.Client , pb.B??n??ficiaire , pc.Type_Client ,pc.Obs from pcarte pc 
        // inner join pclients pcl on pc.ID_Client=pcl.ID_Client
        //  inner join pclients_b??n??ficiaire pb on pb.ID_B??n??ficiaire=pc.ID_B??n??ficiaire where ID_Carte='".$id."'";
        // dd($req);
      
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
        $em = $this->getDoctrine()->getManager();
        $ClientB = $em->getRepository(ClientBeneficiaire::class)->findBy(['Id_Client' => $id]);
        // $req="select * from pclients_b??n??ficiaire where ID_Client ='".$id."'";
        $DDLbenef = $this->render('inc/ddlbeneffacturer.html.twig',[
            'lstbenef' => $lstbenef,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($DDLbenef));
        return $response;
    }

    
    
    

}

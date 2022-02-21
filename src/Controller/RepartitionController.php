<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RepartitionController extends AbstractController
{
    
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
    
    

}

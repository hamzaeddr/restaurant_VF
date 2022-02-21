<?php

namespace App\Controller;

use \Datetime;
use Mpdf\Mpdf;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class TraitementController extends AbstractController
{
   
    /**
     * @Route("/valider/{id}", name="valider")
     */
    public function index($id)
    {
        $mpdf=new \Mpdf\Mpdf();

        $con = $this->getDoctrine()->getConnection();
        $req1="SELECT `ID_Carte`,`Nom_Carte`,`Date_Validité`,`Obs`,ptt.Tarif,pcb.Bénéficiaire FROM `pcarte`
        inner join ptype_tarif ptt on pcarte.ID_Tarif=ptt.ID_Tarif
        inner JOIN pclients_bénéficiaire pcb on pcarte.ID_Bénéficiaire=pcb.ID_Bénéficiaire
        WHERE  ID_Carte ='".$id."'";
        $stm1=$con->prepare($req1);
        $stm1->execute();
        $detailcarte= $stm1->fetch();
        $req2="SELECT * from pcarte_repartition WHERE  ID_Carte ='".$id."'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $detailrep= $stm2->fetchAll();

        /////////////////::
        
        $req3="SELECT pcl.ID_Produit,pcl.ID_Repartition,pp.Produit,pp.Unité_Vente,pcl.Stock_Cmd,ppt.Tarif_TTC FROM `pcarte_lg` pcl
        inner join pproduits pp on pcl.ID_Produit=pp.ID_Produit
        inner join pproduits_tarif ppt on pcl.ID_Produit=ppt.ID_Produit
        inner join pcarte pc on pcl.ID_Carte=pc.ID_Carte
        WHERE pcl.id_carte= '".$id."' and ppt.ID_Tarif=pc.ID_Tarif";
        $stm3=$con->prepare($req3);
        $stm3->execute();
        $detailrep3= $stm3->fetchAll();
      //  dd($detailrep);
        $html = $this->renderView('mdpf/index.html.twig', [
            'detailC' => $detailcarte,
            'detailR' => $detailrep,
            'detailP' => $detailrep3,
        ]);
        
        $req4="update pcarte set Générer=1 where ID_Carte ='".$id."'";
        $stm4=$con->prepare($req4);
        $stm4->execute();

        $mpdf->WriteHTML($html);
        $mpdf->output('result.pdf','D');
        die; 
    }
    /**
     * @Route("/facturer/{id}", name="facturer")
     */
    public function facturer($id)
    {
        $mpdf=new \Mpdf\Mpdf();

        

        $con = $this->getDoctrine()->getConnection();
        $req1="SELECT Client , Bénéficiaire , Tarif , numfact , datefact, dateA ,demandeA FROM `pfacturer` 
        inner join pclients on pfacturer.ClientF=pclients.ID_Client
        inner join pclients_bénéficiaire on pfacturer.BeneficiaireF=pclients_bénéficiaire.ID_Bénéficiaire
        inner join ptype_tarif on pfacturer.TarifF=ptype_tarif.ID_Tarif
        WHERE id=".$id."";
        $stm1=$con->prepare($req1);
        $stm1->execute();
        $detailcarte= $stm1->fetch();
        $req2="select DISTINCT pcarte.Date_Validité from pcarte_lg
        inner join pcarte_repartition on pcarte_repartition.ID_Repartition=pcarte_lg.ID_Repartition 
        inner join pcarte on pcarte.ID_Carte=pcarte_repartition.ID_Carte 
        where pcarte.numfact='".$id."'  " ;
        // ptype_tarif.Tarif='Standard'  and Date_Validité BETWEEN '2018-10-03' and '2018-10-09' 
        // GROUP BY pcarte_lg.ID_Repartition order by Date_Validité ASC 
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $detaildate= $stm2->fetchAll();

        /////////////////::
        
        $req3="select DISTINCT pcarte_lg.ID_Repartition,pcarte_lg.ID_Carte,pcarte_repartition.Repartition,pcarte_repartition.Heure,pcarte_repartition.Pax, pcarte.Date_Validité,pcarte_lg.ID_Produit,SUM(pcarte_lg.Stock_Cmd*pproduits_tarif.Tarif_TTC) Montant from pcarte_lg inner join pcarte_repartition on pcarte_repartition.ID_Repartition=pcarte_lg.ID_Repartition inner join pcarte on pcarte.ID_Carte=pcarte_repartition.ID_Carte INNER join pproduits_tarif on pproduits_tarif.ID_Produit=pcarte_lg.ID_Produit where pcarte.numfact='5' and pproduits_tarif.ID_Tarif=pcarte.ID_Tarif GROUP BY pcarte_repartition.ID_Repartition";
        // dd($req3);
        $stm3=$con->prepare($req3);
        $stm3->execute();
        $detailrep3= $stm3->fetchAll();
      //  dd($detailrep);
        $html = $this->renderView('mdpf/facturer.html.twig', [
            'detailC' => $detailcarte,
            'detailR' => $detaildate,
            'detailP' => $detailrep3,
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->output('result.pdf','I');
        die; 
    }

    /**
     * @Route("/repartition/{id}/{id2}", name="repartition")
     */
    public function repartition($id,$id2)
    {
        $mpdf=new \Mpdf\Mpdf();

        $con = $this->getDoctrine()->getConnection();
        $req1="SELECT `ID_Carte`,`Nom_Carte`,`Date_Validité`,`Obs`,ptt.Tarif,pcb.Bénéficiaire FROM `pcarte`
        inner join ptype_tarif ptt on pcarte.ID_Tarif=ptt.ID_Tarif
        inner JOIN pclients_bénéficiaire pcb on pcarte.ID_Bénéficiaire=pcb.ID_Bénéficiaire
        WHERE ID_Carte ='".$id."'";
        $stm1=$con->prepare($req1);
        $stm1->execute();
        $detailcarte= $stm1->fetch();
        $req2="SELECT * from pcarte_repartition WHERE ID_Carte='".$id."' and ID_Repartition='".$id2."'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $detailrep= $stm2->fetch();

        /////////////////::
        
        $req3="SELECT pcl.ID_Produit,pcl.ID_Repartition,pp.Produit,pp.Unité_Vente,pcl.Stock_Carte FROM `pcarte_lg` pcl
        inner join pproduits pp on pcl.ID_Produit=pp.ID_Produit
        inner join pcarte pc on pcl.ID_Carte=pc.ID_Carte
        WHERE pcl.id_carte='".$id."' and pcl.ID_Repartition='".$id2."'";
        $stm3=$con->prepare($req3);
        $stm3->execute();
        $detailrep3= $stm3->fetchAll();
      //  dd($detailrep);
        $currentday= getdate();

        $html = $this->renderView('mdpf/repartition.html.twig', [
            'detailC' => $detailcarte,
            'detailR' => $detailrep,
            'detailP' => $detailrep3,
            'current' => $currentday,
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->output('result.pdf','I');
        die; 
    }

    
    /**
     * @Route("/B2C/{id}", name="B2C")
     */
    public function B2C($id)
    {
        $mpdf=new \Mpdf\Mpdf();

        $con = $this->getDoctrine()->getConnection();
        $req1="SELECT `ID_Carte`,`Nom_Carte`,`Date_Validité`,`Obs`,ptt.Tarif,pcb.Bénéficiaire FROM `pcarte`
        inner join ptype_tarif ptt on pcarte.ID_Tarif=ptt.ID_Tarif
        inner JOIN pclients_bénéficiaire pcb on pcarte.ID_Bénéficiaire=pcb.ID_Bénéficiaire
        WHERE  ID_Carte ='".$id."'";
        $stm1=$con->prepare($req1);
        $stm1->execute();
        $detailcarte= $stm1->fetch();
        $req2="SELECT DISTINCT pfc.FamilleC FROM `pcarte_lg` pcl 
        inner join pproduits pp on pcl.ID_Produit=pp.ID_Produit 
        inner join pcarte pc on pcl.ID_Carte=pc.ID_Carte 
        inner join pfamillessous_carte pfsc on pp.ID_FamilleSousC=pfsc.ID_FamilleSousC 
        INNER join pfamilles_carte pfc on pfsc.ID_FamilleC=pfc.ID_FamilleC
         WHERE pcl. ID_Carte ='".$id."'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $detailrep= $stm2->fetchAll();

        /////////////////::
        
        $req3="SELECT pcl.ID_Produit,pp.Produit,pp.Unité_Vente,pcl.Stock_Carte,pcl.Stock_Cmd,pcl.Stock_Reste,pfc.FamilleC 
        FROM `pcarte_lg` pcl
        inner join pproduits pp on pcl.ID_Produit=pp.ID_Produit
        inner join pcarte pc on pcl.ID_Carte=pc.ID_Carte
        inner join pfamillessous_carte pfsc on pp.ID_FamilleSousC=pfsc.ID_FamilleSousC
        INNER join pfamilles_carte pfc on pfsc.ID_FamilleC=pfc.ID_FamilleC
        WHERE pcl. ID_Carte ='".$id."'";
        $stm3=$con->prepare($req3);
        $stm3->execute();
        $detailrep3= $stm3->fetchAll();
      //  dd($detailrep);
        $currentday= getdate();

        $html = $this->renderView('mdpf/B2C.html.twig', [
            'detailC' => $detailcarte,
            'detailR' => $detailrep,
            'detailP' => $detailrep3,
            'current' => $currentday,
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->output('result.pdf','I');
        die; 
    }

    

     /**
     * @Route("/rechercheCarte", name="rechercheCarte")
     */
    public function rechercheCarte(Request $request)
    {
        // dd($request);

        $DateD = $request->get('DateD');
        $DateF = $request->get('DateF');
        $Client = $request->get('Client');
        $Benef = $request->get('Benef');
        $typeC = $request->get('typeC');
        $con = $this->getDoctrine()->getConnection();
        $req="select pc.ID_Carte, pcl.Client , pb.Bénéficiaire ,pc.ID_Client,pc.ID_Bénéficiaire from pcarte pc
        inner join pclients pcl on pc.ID_Client=pcl.ID_Client
        inner join pclients_bénéficiaire pb on pb.ID_Bénéficiaire=pc.ID_Bénéficiaire  where pc.ID_Client ='".$Client."' and pc.ID_Bénéficiaire='".$Benef."' and pc.ID_Tarif='".$typeC."' and Facturer != 1 and Générer=1 and Date_Validité between '".$DateD."' and '".$DateF."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstbenef= $stm->fetchAll();
        $DDLbenef = $this->render('inc/tbodyfacturer.html.twig',[
            'lstcarte' => $lstbenef,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($DDLbenef));
        return $response;
    }

    
    

     /**
     * @Route("/rempselecttariffacturer/{id}", name="rempselecttariffacturer")
     */
    public function rempselecttariffacturer($id)
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pType_Tarif ptf inner join pclients_bénéficiaire pb on ptf.ID_tarif=pb.ID_Tarif where ID_Bénéficiaire ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lsttarif= $stm->fetchAll();
        $DDLtarif = $this->render('inc/DDLtariffacturer.html.twig',[
            'lsttarif' => $lsttarif,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($DDLtarif));
        return $response;
    }


    

     /**
     * @Route("/ajouterfacture", name="ajouterfacture")
     */
    public function ajouterfacture(Request $request)
    {
        // dd($request);

        $DateD = $request->get('DateD');
        $DateF = $request->get('DateF');
        $Client = $request->get('Client');
        $Benef = $request->get('Benef');
        $typeC = $request->get('typeC');
        $current_day= new DateTime('now');
        $current_day = $current_day->format('Y-m-d');
        $con = $this->getDoctrine()->getConnection();

        $reqrep="SELECT numfact FROM pfacturer ORDER BY id DESC LIMIT 1";
        $stm3=$con->prepare($reqrep);
        $stm3->execute();
        $numfact=$stm3->fetch();
       $split = str_split($numfact['numfact'],3);
    //    $slipt2=strstr($numfact['numfact'], 'RUR');
       
       $CODE = $split[1];
    //    dd($CODE);
       $CODE = (int)$CODE;
       $CODE=$CODE+1;
        $numfact='RUR'.$CODE; 
        // dd($numfact,$CODE);

        $req="insert into pfacturer set datefact='".$current_day."',numfact='".$numfact."' , demandeA='".$DateF."' , dateA='".$DateD."'  ,
         ClientF='".$Client."'  , BeneficiaireF='".$Benef."' , TarifF='".$typeC."' ";
        $stm=$con->prepare($req);
        $stm->execute();

        // dd($id);
        // $req3="update carte set Facturer=1 and numfact='".$id."' where ";
        
        return new JsonResponse($CODE);
        return die; 
    }

    

     /**
     * @Route("/facturation", name="facturation")
     */
    public function facturation(Request $request)
    {
        // dd($request);
        $idfact=$request->get('idfact');
        $idcarte = $request->get('idcarte');
        $con = $this->getDoctrine()->getConnection();
        $req="update pcarte set Facturer=1 , numfact=".(int)$idfact." where ID_Carte='".$idcarte."' ";
        $stm=$con->prepare($req);
        $stm->execute();

        return new JsonResponse($idfact);
        return die;
    }
}

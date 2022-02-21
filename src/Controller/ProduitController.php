<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProduitController extends AbstractController
{
    
    
    // ================ Route remplissage table Sous Famille product =================
    // =======================================================================

    /**
     * @Route("/remplirtableSFP/{id}", name="remplirtableSFP")
     */
    public function remplirtableSFP($id)
    {   
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pfamillessous_carte where ID_FamilleC ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstSousFamille= $stm->fetchAll();
        $tbodySousFamille = $this->render('inc/navsoufamilleP.html.twig',[
          'lstSousF' => $lstSousFamille
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbodySousFamille));
        return $response;
      
    }

    
    // ================ Route remplissage table Sous Famille =================
    // =======================================================================

    /**
     * @Route("/remplirtableSousFamille/{id}", name="remplirtableSousFamille")
     */
    public function remplirtableSousFamille($id)
    {   
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pfamillessous_carte where ID_FamilleC ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstSousFamille= $stm->fetchAll();
        $tbodySousFamille = $this->render('inc/tbodySousFamille.html.twig',[
          'lstSousF' => $lstSousFamille
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbodySousFamille));
        return $response;
      
    }

    
    // ================ Route remplissage table Produit =================
    // ==================================================================


    /**
     * @Route("/remplirtableProduit/{id}", name="remplirtableProduit")
     */
    public function remplirtableProduit($id)
    {   
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pproduits pp inner join pproduits_tarif ppt on pp.ID_Produit = ppt.ID_Produit where ID_FamilleSousC  ='".$id."' and ID_Tarif='1'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstProduit= $stm->fetchAll();
        // ==============================
        $req="select * from pfamillessous_carte";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstSF= $stm->fetchAll();
        // ==============================
        $req="select * from ptype_produit";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstType= $stm->fetchAll();
        // dd($lstProduit);
        $tbodyProduit = $this->render('inc/tbodyProduit.html.twig',[
          'lstProduit' => $lstProduit,
          'lstsf' => $lstSF,
          'lsttype' => $lstType,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbodyProduit));
        return $response;
      
    }

    
    // ================ Route remplissage table Produit par sous famille produit =================
    // ==================================================================


    /**
     * @Route("/remplirtablePP/{id}", name="remplirtablePP")
     */
    public function remplirtablePP($id)
    {   
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pproduits pp inner join pproduits_tarif ppt on pp.ID_Produit = ppt.ID_Produit where ID_FamilleSousC  ='".$id."' and ID_Tarif='1'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstProduit= $stm->fetchAll();
        // dd($lstProduit);
        $tbodyProduit = $this->render('inc/espaceproduit.html.twig',[
          'lstProduit' => $lstProduit
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbodyProduit));
        return $response;
      
    }

    // ================ Route remplissage navbar sous famille =================
    // ======================================================================


    /**
     * @Route("/remplirNavSousFamille/{id}", name="remplirNavSousFamille")
     */
    public function remplirNavSousFamille($id)
    {   
        $con = $this->getDoctrine()->getConnection();
        $req="select * from pfamillessous_carte where ID_FamilleC ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstSousFamille= $stm->fetchAll();
        $NavSousFamille = $this->render('inc/NavSousFamille.html.twig',[
          'lstSousF' => $lstSousFamille
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($NavSousFamille));
        return $response;
      
    }

    
    // ================ Route affichage twig product =================
    // ===============================================================

    /**
     * @Route("/product", name="product")
     */
    public function product(): Response
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select pfc.ID_FamilleC,pfc.FamilleC,pfc.FArabeC,ptf.Type_Famille,pfc.Photo from pfamilles_carte pfc inner join pType_Famille ptf on pfc.type_famille = ptf.ID_type_famille";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstFamille= $stm->fetchAll();
        $req="select * from pfamillessous_carte";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstSF= $stm->fetchAll();
        // ==============================
        $req="select * from ptype_produit";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstType= $stm->fetchAll();
         // ==============================
         $req="select * from ptype_tarif";
         $stm=$con->prepare($req);
         $stm->execute();
         $lstTypeT= $stm->fetchAll();
        // dd($lstProduit);
        $req="select * from ptype_famille";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstTypeF= $stm->fetchAll();
        
        // dd($lstFamille);
        return $this->render('product/index.html.twig', [
            'list' => $lstFamille,
            'lstsf' => $lstSF,
          'lsttype' => $lstType,
          'lsttypet' => $lstTypeT,
          'lsttypef' => $lstTypeF,
        ]) ;
    }
    
    // ================ Route affichage twig product/compo =================
    // ===============================================================

    /**
     * @Route("/product/compo", name="Cproduct")
     */

    public function CompProduct(): Response
    {
        return $this->render('product/compo.html.twig',);
    }

    
    // ================ Route popup supprimer famille =================
    // ===============================================================

    /**
     * @Route("/rempmodalfamille/{id}", name="rempmodalfamille")
     */
    public function rempmodalfamille($id): Response
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select pfc.ID_FamilleC,pfc.FamilleC,pfc.FArabeC,ptf.Type_Famille,pfc.Photo from pfamilles_carte pfc inner join pType_Famille ptf on pfc.type_famille = ptf.ID_type_famille where ID_FamilleC  ='".$id."' limit 1";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();
        $lstF= $stm->fetch();
        // dd($lstF);
        $html = $this->render('inc/suppmodelF.html.twig', [
            'list' => $lstF,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($html));
        return $response;
    }
    

    // ================ Route supprimer famille =================
    // ===============================================================

    /**
     * @Route("/Suppfamille/{id}", name="Suppfamille")
     */
    public function Suppfamille($id): Response
    {
        $con = $this->getDoctrine()->getConnection();
        $req="delete from pfamilles_carte where ID_FamilleC   ='".$id."'";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode(0));
        return $response;
    }

    // ================ Route popup modifier famille =================
    // ===============================================================

    /**
     * @Route("/modifmodalfamille/{id}", name="modifmodalfamille")
     */
    public function modifmodalfamille($id): Response
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select pfc.ID_FamilleC,pfc.FamilleC,pfc.FArabeC,ptf.Type_Famille,pfc.Photo from pfamilles_carte pfc inner join pType_Famille ptf on pfc.type_famille = ptf.ID_type_famille where ID_FamilleC  ='".$id."' limit 1";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();
        $lstF= $stm->fetch();

        // dd($lstF);
        $req="select * from ptype_famille";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstTypeF= $stm->fetchAll();
        $html = $this->render('inc/modifmodalF.html.twig', [
            'list' => $lstF,
            'lsttypef' => $lstTypeF,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($html));
        return $response;
    }


    // ================ Route mdifier famille =================
    // ===============================================================

    /**
     * @Route("/modiffamille", name="modiffamille")
     */
    public function modiffamille(Request $request): Response
    {   
        $idfamille = $request->get('idfamille');
        $famille = $request->get('famille');
        $tfamille = $request->get('tfamille');
        $farabe = $request->get('farabe');
        $con = $this->getDoctrine()->getConnection();
        $req="UPDATE pfamilles_carte SET FamilleC=?,Type_Famille=? ,FArabeC=?WHERE ID_FamilleC=?";
        $stm=$con->prepare($req);
        $stm->execute([$famille,$tfamille,$farabe, $idfamille]);
        return $this->redirectToRoute('product');
    }

    // ================ Route ajouter famille =================
    // ===============================================================

    /**
     * @Route("/addfamille", name="addfamille")
     */
    public function addfamille(Request $request): Response
    {   
        // dd($request);
        $idfamille = $request->get('idfamille');
        $famille = $request->get('famille');
        $tfamille = $request->get('tfamille');
        $farabe = $request->get('farabe');
        $con = $this->getDoctrine()->getConnection();
        $req="insert into pfamilles_carte (FamilleC,FArabeC,Type_Famille,ID_FamilleC) values(?,?,?,?)";
        $stm=$con->prepare($req);
        $stm->execute([$famille, $farabe,$tfamille,$idfamille]);
        return $this->redirectToRoute('product');;
    }

    
    
    // ================ Route popup supprimer sous famille =================
    // ===============================================================

    /**
     * @Route("/rempmodalsupprimerSF/{id}", name="rempmodalsupprimerSF")
     */
    public function rempmodalsupprimerSF($id): Response
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select pfsc.ID_FamilleC,pfsc.ID_FamilleSousC,pfc.FamilleC,pfsc.FamilleSousC,pfsc.SArabeC from pfamillessous_carte pfsc inner join pfamilles_carte pfc on pfsc.ID_FamilleC=pfc.ID_FamilleC where ID_FamilleSousC  ='".$id."' limit 1";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();
        $lstF= $stm->fetch();
        // dd($lstF);
        $html = $this->render('inc/suppmodalsousfamille.html.twig', [
            'list' => $lstF,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($html));
        return $response;
    }
    
    // ================ Route supprimer sous famille =================
    // ===============================================================

    /**
     * @Route("/SuppSousFamille/{id}", name="SuppSousFamille")
     */
    public function SuppSousFamille($id,Request $request): Response
    {
        $idf = $request->get('idf');
        $con = $this->getDoctrine()->getConnection();
        $req="delete from pfamillessous_carte where ID_FamilleSousC   ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();

        $req="select * from pfamillessous_carte where ID_FamilleC ='".$idf."'";
        $stm=$con->prepare($req);
        $stm->execute();
        $lstSousFamille= $stm->fetchAll();
        $tbodySousFamille = $this->render('inc/tbodySousFamille.html.twig',[
          'lstSousF' => $lstSousFamille
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbodySousFamille));
        return $response;
    }

    // ================ Route ajouter Sous famille =================
    // ===============================================================

    /**
     * @Route("/addSousFamille", name="addSousFamille")
     */
        public function addSousFamille(Request $request): Response
        {   
            // dd($request);
            $idsousfamille = $request->get('idsousfamille');
            $sousfamille = $request->get('sousfamille');
            $famille = $request->get('idfamille');
            $farabe = $request->get('farab');
            
            $con = $this->getDoctrine()->getConnection();
            $req="insert into pfamillessous_carte (ID_FamilleSousC,FamilleSousC,SArabeC,ID_FamilleC) values(?,?,?,?)";
            $stm=$con->prepare($req);
            $stm->execute([$idsousfamille, $sousfamille, $farabe,$famille]);
            
            $req2="select * from pfamillessous_carte where ID_FamilleC ='".$famille."'";
            $stm2=$con->prepare($req2);
            $stm2->execute();
            $lstSousFamille= $stm2->fetchAll();
            $tbodySousFamille = $this->render('inc/tbodySousFamille.html.twig',[
              'lstSousF' => $lstSousFamille
            ])->getContent();

            $response = new Response();
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent(json_encode($tbodySousFamille));
            return $response;
        }

        
    
    // ================ Route popup supprimer sous famille =================
    // ===============================================================

    /**
     * @Route("/rempmodalsupprimerPP/{id}", name="rempmodalsupprimerPP")
     */
    public function rempmodalsupprimerPP($id): Response
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select pp.ID_FamilleSousC,pp.ID_Produit,pp.Produit,ptf.Type_Famille,FamilleSousC from pproduits pp
         inner join pfamillessous_carte pfc on pp.id_famillesousc=pfc.id_famillesousc
         inner join pfamilles_carte pf on pfc.ID_FamilleC=pf.ID_FamilleC 
         inner join ptype_famille ptf on pf.Type_Famille=ptf.ID_Type_Famille
          where pp.id_produit  ='".$id."' limit 1";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();
        $lstF= $stm->fetch();
        // dd($lstF);
        $html = $this->render('inc/modalsupppro.html.twig', [
            'list' => $lstF,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($html));
        return $response;
    }
    
     
    // ================ Route supprimer produit =================
    // ===============================================================

    /**
     * @Route("/Supppro/{id}", name="Supppro")
     */
    public function Supppro($id,Request $request): Response
    {
        $idsf = $request->get('idsf');
        $con = $this->getDoctrine()->getConnection();
        $req="delete from pproduits where ID_Produit   ='".$id."'";
        $stm=$con->prepare($req);
        $stm->execute();

        $req2="select * from pproduits pp inner join pproduits_tarif ppt on pp.ID_Produit = ppt.ID_Produit where ID_FamilleSousC  ='".$idsf."' and ID_Tarif='1'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $lstProduit= $stm2->fetchAll();
        $tbodyProduit = $this->render('inc/tbodyProduit.html.twig',[
            'lstProduit' => $lstProduit,
          ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbodyProduit));
        return $response;
    }    

        
    
    // ================ Route popup modifier produit =================
    // ===============================================================

    /**
     * @Route("/rempmodalmodifPP/{id}", name="rempmodalmodifPP")
     */
    public function rempmodalmodifPP($id): Response
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select pp.ID_FamilleSousC,pp.ID_Produit,pp.Produit,ptf.Type_Famille,FamilleSousC from pproduits pp
         inner join pfamillessous_carte pfc on pp.id_famillesousc=pfc.id_famillesousc
         inner join pfamilles_carte pf on pfc.ID_FamilleC=pf.ID_FamilleC 
         inner join ptype_famille ptf on pf.Type_Famille=ptf.ID_Type_Famille
          where pp.id_produit  ='".$id."' limit 1";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();
        $lstF= $stm->fetch();
        // dd($lstF);
        $html = $this->render('inc/modalmodpro.html.twig', [
            'list' => $lstF,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($html));
        return $response;
    }
     
     
    // ================ Route modifier produit =================
    // ===============================================================

    /**
     * @Route("/modpro/{id}", name="modpro")
     */
    public function modpro($id,Request $request): Response
    {
        $idsf = $request->get('idsf');
        $npro = $request->get('npro');
        $con = $this->getDoctrine()->getConnection();
        $req="UPDATE pproduits SET Produit=? WHERE ID_Produit=?";
        $stm=$con->prepare($req);
        $stm->execute([$npro,$id]);

        $req2="select * from pproduits pp inner join pproduits_tarif ppt on pp.ID_Produit = ppt.ID_Produit where ID_FamilleSousC  ='".$idsf."' and ID_Tarif='1'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $lstProduit= $stm2->fetchAll();
        $tbodyProduit = $this->render('inc/tbodyProduit.html.twig',[
            'lstProduit' => $lstProduit,
          ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbodyProduit));
        return $response;
    }    

    // ================ Route ajouter produit product =================
    // ===============================================================

    /**
     * @Route("/addproduitproduct", name="addproduitproduct")
     */
    public function addproduitproduct(Request $request): Response
    {   
        // dd($request);
        $idproduit = $request->get('idproduit');
        $sousfamille = $request->get('sousfamille');
        $produit = $request->get('produit');
        $typeproduit = $request->get('typeproduit');
        
        $con = $this->getDoctrine()->getConnection();
        $req="insert into pproduits (ID_Produit,Produit,ID_FamilleSousC,ID_Type_Produit) values(?,?,?,?)";
        $stm=$con->prepare($req);
        $stm->execute([$idproduit, $produit, $sousfamille,$typeproduit]);


        
        $req2="select * from pproduits pp inner join pproduits_tarif ppt on pp.ID_Produit = ppt.ID_Produit where ID_FamilleSousC  ='".$sousfamille."' and ID_Tarif='1'";
        $stm2=$con->prepare($req2);
        $stm2->execute();
        $lstProduit= $stm2->fetchAll();
        $tbodyProduit = $this->render('inc/tbodyProduit.html.twig',[
            'lstProduit' => $lstProduit,
          ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbodyProduit));
        return $response;
    }

    
    // ================ Route ajouter produit product =================
    // ===============================================================

    /**
     * @Route("/addproduittatif", name="addproduittatif")
     */
    public function addproduittatif(Request $request): Response
    {   
        // dd($request);
        $idproduit = $request->get('idproduit');
        $idtarif = $request->get('idtarif');
        $tarif = $request->get('tarif');
        
        $con = $this->getDoctrine()->getConnection();
        $req="insert into pproduits_tarif (ID_Produit,ID_Tarif,Tarif_TTC) values(?,?,?)";
        $stm=$con->prepare($req);
        $stm->execute([$idproduit, $idtarif, $tarif]);
       

        return new JsonResponse('ok');

        
        }

    
    // ================ Route popup modifier sous famille =================
    // ===============================================================

    /**
     * @Route("/rempmodalmodifSF/{id}", name="rempmodalmodifSF")
     */
    public function rempmodalmodifSF($id): Response
    {
        $con = $this->getDoctrine()->getConnection();
        $req="select pfsc.ID_FamilleC,pfsc.ID_FamilleSousC,pfc.FamilleC,pfsc.FamilleSousC,pfsc.SArabeC from pfamillessous_carte pfsc inner join pfamilles_carte pfc on pfsc.ID_FamilleC=pfc.ID_FamilleC where ID_FamilleSousC  ='".$id."' limit 1";
        // dd($req);
        $stm=$con->prepare($req);
        $stm->execute();
        $lstF= $stm->fetch();
        // dd($lstF);
        $html = $this->render('inc/popupmodifSF.html.twig', [
            'list' => $lstF,
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($html));
        return $response;
    }

        
    // ================ Route mdifier sous famille =================
    // ===============================================================

    /**
     * @Route("/modsousfamille", name="modsousfamille")
     */
    public function modsousfamille(Request $request): Response
    {   
        // dd($request);
        $idsousfamille = $request->get('idsf');
        $sousfamille = $request->get('sf');
        $idfamille = $request->get('idf');
        $farabe = $request->get('fa');
        $con = $this->getDoctrine()->getConnection();
        $req="UPDATE pfamillessous_carte SET FamilleSousC=?,SArabeC=? WHERE ID_FamilleC=? AND ID_FamilleSousC=?";
        $stm=$con->prepare($req);
        $stm->execute([$sousfamille,$farabe,$idfamille, $idsousfamille]);
        // return $this->redirectToRoute('product');
        $req1="select * from pfamillessous_carte where ID_FamilleC ='".$idfamille."'";
        $stm1=$con->prepare($req1);
        $stm1->execute();
        $lstSousFamille= $stm1->fetchAll();
        $tbodySousFamille = $this->render('inc/tbodySousFamille.html.twig',[
          'lstSousF' => $lstSousFamille
        ])->getContent();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($tbodySousFamille));
        return $response;
    }


}

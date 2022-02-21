
        $(document).ready(function() {

          var tableData = []; 
          var tableData2 = []; 
         
        
/////////////////repartition id //////////////////////////////

$('body').on('click', '.tabrow2 tr',function () {

     tableData2 = $(this).children("td").map(function () {
          return $(this).text();
        }).get();

});

 ////////////////sidebarclick////////////////////////////////

            $('.sidebarBtn').on('click',function () {
                if($( ".sidebar" ).hasClass("active")){
                    $( ".sidebar" ).removeClass("active")
                }
                else{
                    $( ".sidebar" ).addClass("active")
                }
            });

          $('#myModal').on('shown.bs.modal', function () {
             $('#myInput').trigger('focus')
          })


  
////////////////////////////////////////////////////////////

    $('.check-date').on('change',function () {
                $('.check-date').attr('checked', false);
                $(this).attr('checked', true);
                let selectedProject = $(this).attr("data-id");
             
                 $.ajax({
                     type: "POST",
                     url:'/filtretablecarte/'+selectedProject,
                     success:function(data) {
                         $('.tbodycarte').html(data); 
                         console.log(data);
                      }
                 })
            });
    
          $('body').on('click','.tabrow tr',function () {
                $('.tabrow tr').css('background-color', 'white');
                $(this).css('background-color', '#cacaca');

                 let selectedProject = $(this).find("td").attr("data-id");
                  
                    tableData = $(this).children("td").map(function () {
                         return $(this).text();
                       }).get();
                       
                       if(tableData[5] == "B2C") {
                            $("#b2c").removeClass('show');
                            $("#b2c").removeClass('hide');
                            $("#b2c").addClass('show');

                       }
                       else{
                         $("#b2c").removeClass('show');
                         $("#b2c").removeClass('hide');
                         $("#b2c").addClass('hide');

                       }

                    $.ajax({
                         type: "POST",
                         url:'/remplirtablerepar/'+selectedProject,
                         success:function(data) {
                              $('.tbody').html(data);
                              console.log(data)
                         }
                    })
            });

            $('body').on('click', '.tabrow2 tr',function () {
               $('.tabrow2 tr').css('background-color', 'white');
               $(this).css('background-color', '#cacaca');

               let selectedProject = $(this).find("td:eq(1)").text();
                
                $.ajax({
                    type: "POST",
                    url:'/remplirtablepro/'+selectedProject,
                    success:function(data) {
                         $('.tbody2').html(data);
                        console.log(data)
                     }
                })
           });


            $('.navIMG ').on('click',function () {
                $('.navIMG').css('background-color', 'white');
                $(this).css('background-color', '#cacaca');

                 let selectedProject = $(this).find("a").attr("data-id");
               
                 $.ajax({
                     type: "POST",
                     url:'/remplirtableSousFamille/'+selectedProject,
                     
                     success:function(data) {
                          $('.tbodySousFamille').html(data);
                         console.log(data)
                      }
                 })
            });


             $('body').on('click','.navImgProduit2',function () {
                $('.navImgProduit2').css('background-color', 'white');
                $(this).css('background-color', '#cacaca');

                 let selectedProject = $(this).find("a").attr("data-id");
                 $.ajax({
                     type: "POST",
                     url:'/remplirtableProduit/'+selectedProject,
                     
                     success:function(data) { 
                          $('.tbodyProduit').html(data);
                         console.log(data)
                      }
                 })
            });

  

             $('body').on('click','.navImgProduit1 ',function () {
            
                 let selectedProject = $(this).find("a").attr("data-id");
               
                 $.ajax({
                     type: "POST",
                     url:'/remplirNavSousFamille/'+selectedProject,
                     
                     success:function(data) {
                          $('.navSF').html(data);
                         console.log(data)
                      }
                 })
            });
   
             $('.slct').on('change',function () {
                 let selectedProject = $(this).val();
                 let sel2 = $('slct2').val();
                $.ajax({
                     type: "post",
                     url:'/rempselect/'+selectedProject,
                     success:function(data) {
                         $('.slct2').html(data);
                         console.log(data);
                         $.ajax({
                            type: "post",
                            url:'/remptable/'+selectedProject+'/a',
                            success:function(result) {
                                $('.tbodycarte').html(result); 
                                // console.log(data) #}
                            }
                        })
                         // console.log(data) #}
                      }
                 })
                 
            }); 


             $('.slct2').on('change',function () {
                 let selectedProject = $('.slct').val();
                 let sel2 = $(this).val();
                $.ajax({
                     type: "post",
                     url:'/remptable/'+selectedProject+'/'+sel2,
                     success:function(data) {
                         $('.tbodycarte').html(data); 
                         console.log(data);
                      }
                 })
                 
            }); 

             
            $('body .dateC').on('change',function () {
                 let selectedProject = $('.dateC').val();
                 alert(selectedProject);
                 $.ajax({
                     type: "post",
                     url:'/remptablebydate/'+selectedProject,
                     success:function(data) {
                         $('.tbodycarte').html(data); 
                         console.log(data);
                      }
                 })
                 
            }); 
   
             
            $('body .tbodyFamille tr').on('click',function () {

                 $('.tbodyFamille tr').css('background-color', 'white');
                $(this).css('background-color', '#cacaca');

                 let selectedProject = $(this).find('td:first-child').text();
                 // alert(selectedProject); #}
                 $.ajax({
                     type: "post",
                     url:'/rempmodalfamille/'+selectedProject,
                     success:function(data) {
                         $('.model-supp').html(data); 
                         console.log(data);
                      }
                 })
                 
            }); 

             
            $('body #supprimerFamille').on('click',function () {

               

                 let selectedProject = $('body .ID_Famille').val();
                 // alert(selectedProject); #}
                 $.ajax({
                     type: "post",
                     url:'/Suppfamille/'+selectedProject,
                     success:function(data) {
                         window.location.href = window.location.href;
                      }
                 })
                 
            }); 


             
            $('body .tbodyFamille tr').on('click',function () {

                 $('.tbodyFamille tr').css('background-color', 'white');
                $(this).css('background-color', '#cacaca');

                 let selectedProject = $(this).find('td:first-child').text();
                 // alert(selectedProject); #}
                 $.ajax({
                     type: "post",
                     url:'/modifmodalfamille/'+selectedProject,
                     success:function(data) {
                         $('.modif-modal').html(data); 
                         console.log(data);
                      }
                 })
                 
            }); 

    // {# ===================== script on change ddl bénéficiaire par selection client popup ajouter carte ==================== #}
   // {# =============================================================================================== #}
             $('.selectclientadd').on('change',function () {
                 let selectedProject = $(this).val();
                $.ajax({
                     type: "post",
                     url:'/rempselectadd/'+selectedProject,
                     success:function(data) {
                         $('.selectbenefadd').html(data);
                         console.log(data);
                      }
                 })
                 
            }); 

   // {# ===================== script on change ddl tarif par selection Beneficiaire popup ajouter carte==================== #}
   //   {# =================================================================================================================== #}
                    $('.selectbenefadd').on('change',function () {
                        let selectedProject = $(this).val();
                       $.ajax({
                            type: "post",
                            url:'/rempselecttarifadd/'+selectedProject,
                            success:function(data) {
                                $('.selecttarifadd').html(data);
                                console.log(data);
                             }
                        })
                        
                   }); 

                   
     // ===================== script on change ddl tarif par selection Beneficiaire popup ajouter carte==================== #}
     // =================================================================================================================== #}
             $('body').on('change','.slctC',function () {
                 
               let selectedProject = $(this).val();
               
              $.ajax({
                   type: "post",
                   url:'/rempselectbeneffact/'+selectedProject,
                   success:function(data) {
                       $('.slctB').html(data);
                       console.log(data);
                    }
               })
               
          }); 


            // ===================== script on change ddl tarif par selection Beneficiaire popup ajouter carte==================== #}
     // =================================================================================================================== #}
     $('.slctB').on('change',function () {
          let selectedProject = $(this).val();
         $.ajax({
              type: "post",
              url:'/rempselecttariffacturer/'+selectedProject,
              success:function(data) {
                  $('.selectF').html(data);
                  console.log(data);
               }
          })
          
     }); 



    // ===================== script on click valider ==================== #}
    // =============================================================================================== #}

    $('body').on('click','.valider',function () {

     let selectedProject = $(this).attr("data-id");
     window.open('/valider/'+tableData[0]);
     
    
});



   // ===================== script on click recherche on change tbody liste carte==================== #}
     // =================================================================================================================== #}
     $('body').on('click','.btncherchercarte',function () {
                 
          let DateD = $('#lbldatedebut').val();
          let DateF =  $('#lbldatefin').val();
          let Client = $('.slctC').val();
          let Benef  = $('.slctB').val();  
          let typeC =   $('.selecttariffacturer').val();         
         $.ajax({
              type: "post",
              url:'/rechercheCarte',
              data :{
                  'DateD':DateD,
                  'DateF':DateF,
                  'Client':Client,
                  'Benef':Benef,
                  'typeC' : typeC
              },
              success:function(data) {
                  $('.tbodylstcarte').html(data);
                  console.log(data);
               }
          })
          
     }); 

//{# ==============================script on change qte commande enregistre table================================ #}  
  //  {# =============================================================================================== #}  
            
             $('body').on('change','.paxRep',function () {
                 
             
                idcarte=$(this).parent().parent().find('td:eq(0)').text();
                
                idrepartition=$(this).parent().parent().find('td:eq(1)').text();
                 qtes=$(this).val();
                      $.ajax({
                        type: "POST",
                        url:'/updatepaxrep',
                         data: {
                             'qtes':qtes,
                              'idcarte':idcarte,
                              'idrepartition' :idrepartition,
                         },
                        success:function(data) {
                         //   {# alert("l3ez"); #}
                       $.ajax({
                     type: "POST",
                     url:'/remplirtablerepar/'+selectedProject,
                     success:function(data) {
                          $('.tbody').html(data);
                         console.log(data)
                      }
                 })
                                                 }
                              }) 
                                     
               

            });   


 ////////////// {# ===================== script on click produit afficher dans le tableau ==================== #
 ////////////// {# =============================================================================================== #}
        
        
                   $('body').on('click','.selectproduct',function () {
                       
                        $('.selectproduct').css('background-color', '#f8f9fa');
                         $(this).css('background-color','#cacaca');
                        
                        let idproduit = $(this).find('a').attr('data-id');
                        let nomproduit = $(this).find('p').text();
               
                        
                        let nbrrow= $('.tbodyproduitadd tr > td:contains('+idproduit+') ').length;
                        if(nbrrow==0){
                             $('.tbodyproduitadd tr:last').after('<tr><td>'+idproduit+'</td><td>'+nomproduit+'</td><td><input type="text"/></td></tr>');
                        }
                        else{
                            alert("produit deja choisi");
                        }
                        
                    });            



   //         {# ===================== script recupere valeur popup ajouter repartion ==================== #}
     //       {# =============================================================================================== #}
        
                  $('body').on('click','.btnajoutercarteadd',function () {
                     //   {# e.preventDefault(); #}
                        let idcarte = $(this).attr("data-id");
                      
                        let i =$('.checklibelle').filter(':checked').length;
                         var selected = new Array();
                        var searchIDs = $('.checklibelle').filter(':checked').map(function(){
                         return $(this).val();
                        }).get();
                        for(j=0;j<=i-1;j++){
                             
                              $.ajax({
                                type: "POST",
                                url:'/addrapartition',
                                 data: {
                                     'i' : i,
                                     'idcarte':idcarte,
                                     'libelle' :searchIDs[j],
                                 },
                                success:function(data) {
                                      $('.btn-close').click();
                                     $.ajax({
                                         type: "POST",
                                         url:'/remplirtablerepar/'+idcarte,
                                         success:function(data) {
                                         $('.tbody').html(data);
                                         console.log(data)
                                                                }
                                            })
                                                         }
                                      }) 
                                              }
                    });
     



   //                 {# ===================== script recupere valeur popup modifier repartion ==================== #}
     //               {# =============================================================================================== #}
                
                          $('body').on('click','.btnmodifiercarteadd',function () {
                                             
                                let idcarte = $('.btnmodifiercarteadd').attr("data-id");
                                let idrepartition = $('.idrepartitionM').val();
                                let libelle = $('.libelleM').val();
                                let pax = $('.paxM').val();
                                let heure = $('.heureM').val()
                               
                                      
                                      $.ajax({
                                        type: "POST",
                                        url:'/modifierrapartition',
                                         data: {
                                             'idcarte':idcarte,
                                              'idrepartition':idrepartition,
                                              'libelle' : libelle,
                                              'pax' : pax,
                                              'heure' : heure ,
                                         },
                                        success:function(data) {
                                             $('.btn-close').click();
                                            $.ajax({
                                                 type: "POST",
                                                 url:'/remplirtablerepar/'+idcarte,
                                                 success:function(data) {
                                                 $('.tbody').html(data);
                                                 console.log(data)
                                      }
                                 })
                                        }
                                      })
                
                            });

 
                

   //                         {# ===================== script on click repartition ==================== #}
   //                         {# =============================================================================================== #}
                        
                                  $('body').on('click','.printreparition',function () {
                        
                                   
                        
                                    if(tableData[0] =="undefined" && tableData2[1]=="undefined"){
                                        alert("selectionnez une repartition");
                                    }
                        else{
                                       
                                         window.open('/repartition/'+tableData[0]+'/'+tableData2[1]);
                                  }
                                        
                                    });
                        
                        
  
      //                              {# ===================== script recupere valeur popup supprimer repartion ==================== #}
      //                              {# =============================================================================================== #}
                                
                                          $('body').on('click','.btnsupprimercarteadd',function () {
                                                             
                                                let idcarte = $('.btnmodifiercarteadd').attr("data-id");
                                                let idrepartition = $('.idrepartitionS').val();
                                               
                                             
                                                      
                                                      $.ajax({
                                                        type: "POST",
                                                        url:'/deleterapartition',
                                                         data: {
                                                             'idcarte':idcarte,
                                                              'idrepartition':idrepartition,
                                                              
                                                         },
                                                        success:function(data) {
                                                             $('.btn-close').click();
                                                            $.ajax({
                                                                 type: "POST",
                                                                 url:'/remplirtablerepar/'+idcarte,
                                                                 success:function(data) {
                                                                 $('.tbody').html(data);
                                                                 console.log(data)
                                                      }
                                                 })
                                                        }
                                                      })
                                
                                            });



///////////////////////////////////////////// {# ===================== script on click B2C ==================== #}
   /////////////////////////////////////////////{# =============================================================================================== #}
                                        
                                                  $('body').on('click','#b2c',function () {
                                                         window.open('/B2C/'+tableData[0]);
                                                    });
                                

    ///////////////////////////////////// {# ===================== script recupere valeur popup ajouter produit ==================== #}
    /////////////////////////////////////{# =============================================================================================== #}

          $('body').on('click','.btnajouterproduiteadd',function () {
                let idproduit ;
                let i =$('.tbodyproduitadd tr').length;
                let carte = tableData[0];
                let repartitio = tableData2[1];

                alert(i);
               
         
                
                idproduit=$('.tbodyproduitadd tr').find('td:first-child').map(function(){
                 return $(this).text();
                }).get();
                 qteP=$('.tbodyproduitadd tr').find('td:eq(2)').map(function(){
                 return $(this).find('input').val();
                }).get();
                 for(j=0;j<=i-2;j++){
                    alert('okk');
                  //  alert(repartitio);
                      $.ajax({
                        type: "POST",
                        url:'/addproduitcarte',
                         data: {
                             'idproduit':idproduit[j],
                             'idcarte' : carte,
                             'idrepartition' : repartitio,
                             'qtep':qteP[j],
                         },
                        success:function(data) {
                            
                         //    $('.btn-close').click();
                             $.ajax({
                                 type: "POST",
                                  url:'/remplirtablepro/'+tableData2[1],
                                 success:function(data) {
                                  $('.tbody2').html(data);
                      }
                 })
                                                 }
                              }) 
                                      }
              
            });





//------------------------------ modal cart ------------------------------------------------------------------------------------------------//            
            
            $('body .creer').on('click',function () {
                 

               $('#btnajoutercarte').modal('toggle');
               $('#btnajoutercarte').modal('show');
               
                 
            }); 


            $('body .modifier').on('click',function () {
                
               $('#btnsupprimerrepartition').modal('toggle');
               $('#btnsupprimerrepartition').modal('show');
               $.ajax({
                    type: "post",
                    url:'/modifmodalcarte/'+tableData[0],
                    success:function(data) {
                        $('.popupsupprimerrepartition').empty().append(data);; 
                    //     console.log(data);
                         
                      
               
                     }
                })
            }); 
       //------------------------------ modal Supprimer ------------------------------------------------------------------------------------------------//            


          

            $('body .supprimer').on('click',function () {
                
               $('#btnsuppercarte').modal('toggle');
               $('#btnsuppercarte').modal('show');
                $.ajax({
                    type: "post",
                    url:'/suppmodalcarte/'+tableData[0],
                    success:function(data) {
                        $('.popupsuppcarte').empty().append(data);
                        console.log(data);
                     }
                })
                
           }); 
      //------------------------------ modal Facturer ------------------------------------------------------------------------------------------------//            


          

            $('body .facturer').on('click',function () {
                
               $('#btnfacturer').modal('toggle');
               $('#btnfacturer').modal('show');
               
                
           }); 





//------------------------------ modal Repartition ------------------------------------------------------------------------------------------------//            


$('body .repartitioncreer').on('click',function () {
                 

     $('#btnajouterrepartition').modal('toggle');
     $('#btnajouterrepartition').modal('show');
     
       
 
     $.ajax({
          type: "POST",
          url:'/remplirpopupajouterrepar/'+tableData[0],
          success:function(data) {
              $('.popupajoutercarterepartition').empty().append(data);
            
          }
        })

     
  }); 


   //                  {# ===================== script on change popup modifier repartion par selection repartition et bnt modifier ==================== #}
    //                {# =============================================================================================== #}
                
    $('body').on('click', '.repartitionmodifier',function () {
     $('#btnmodifierrepartition').modal('toggle');
     $('#btnmodifierrepartition').modal('show');
                             
                                 
     $.ajax({
         type: "POST",
         url:'/remplirpopupmodifierrepar/'+tableData2[1],
         success:function(data) {
              $('.popupmodifierrepartition').empty().append(data);
          //    console.log(data)
          }
     })
});


  //                                {# ===================== script on change popup supprimer repartion par selection repartition et bnt supprimer ==================== #}
//                              {# =============================================================================================== #}
                                
$('body').on('click', '.supprimerrepartition',function () {

     $('#btnsupprimerrepartition').modal('toggle');
     $('#btnsupprimerrepartition').modal('show');
                                                                       
                                                 
     $.ajax({
         type: "POST",
         url:'/remplirpopupsupprimerrepar/'+tableData2[1],
         success:function(data) {
              $('.popupsupprimerrepartition').empty().append(data);
             
          }
     })
});


////////////////////////////////////:{# ===================== script on change papup calucul par selection repartion ==================== #}
//////////////////////////////////////{# =============================================================================================== #}

        $('body').on('click','.calc',function () {
       
          $('#btnCalc').modal('toggle');
          $('#btnCalc').modal('show');

             $.ajax({
                 type: "POST",
                 url:'/remplirpopupcalcul/'+tableData2[1],
                 success:function(data) {
                      $('.tbodycalcul').empty().append(data);
                  }
             })
        });


////////////////////////////////////:{# ===================== script on change papup calucul par selection repartion ==================== #}
//////////////////////////////////////{# =============================================================================================== #}

        
                                                           $('body').on('click', '.creerproduit',function () {
                                                alert('ok');
                                                            $('#btnajouterproduitrepartition').modal('toggle');
                                                            $('#btnajouterproduitrepartition').modal('show');
                                                
                                                                 $.ajax({
                                                                     type: "POST",
                                                                     url:'/remplirpopupajouterprod',
                                                                     data: {
                                                                             'idcarte':tableData[0],
                                                                              'idrepartition':tableData2[1],
                                                                         },
                                                                     success:function(data) {
                                                                          $('.popupajouterproduit').empty().append(data);
                                                                      }
                                                                 })
                                                            });       
                                                            
                                                            








  ////////////////////////////////////////////////////////////////////  BASE 2  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                          
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                          



     $('#myModal').on('shown.bs.modal', function(){
     $('#myInput').trigger('focus');
 });
  $('#btnFermer').click(function(){ 
 location.href = "product.html#tab4";
});




//{# ===================== script on change nav sous famille par selection famille product  ==================== #}
//{# ===================================================================================================== #}

$('body').on('click','.navIMG',function () {


let selectedProject = $(this).find("a").attr("data-id");
$.ajax({
  type: "POST",
  url:'/remplirtableSFP/'+selectedProject,
  
  success:function(data) {
       $('.navSFP').html(data);
      console.log(data)
   }
})
});


//{# ===================== script on change espace produit par selection sous famille ==================== #}
//{# =============================================================================================== #}

$('body').on('click','.navImgProduit2',function () {
$('.navImgProduit2').css('background-color', '#f8f9fa');

let selectedProject = $(this).find("a").attr("data-id");
$.ajax({
  type: "POST",
  url:'/remplirtablePP/'+selectedProject,
  
  success:function(data) { 
       $('.espaceproduit').html(data);
      console.log(data)
   }
})
});













          });
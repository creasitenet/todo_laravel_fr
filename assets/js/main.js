
 
$(document).ready(function(){

    $.ajaxSetup({
        headers: {
          'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });

    $('.alert').hide();
    var alert = $('.alert'); 
    if(alert.length > 0){
      alert.delay('500').slideDown(500);
      alert.find('.close').click(function(e){
        e.preventDefault();
        alert.delay('500').slideUp(500);
      })
    }  
      
});

    // Fonction d'ajout d'un element 
    function ajouter_element(urlmaj,data,div) {
        $.post(urlmaj,{texte:data},function(response){ 
            if (response.resultat==1) { 
                montrer_notification('success', response.message);
                refresh_liste(response.todo_id);
                $('#input_ajouter_todo').val("");
            } else { 
                montrer_notification('error', response.message);
            }
        },"json");
    }

    // Fonction d'ajout d'un element a une liste via Ajax 
    function refresh_liste(todo_id) {
        $.get('todoAjaxAjouterALaListe/'+ todo_id,function(response){ 
            $('#todos').append(response)
            $('#todo_'+todo_id).show('slow');
        });  
    }

    // Fonction de mise à jour du statut d'un todo
    function mise_a_jour_statut(urlmaj,id,div) {
        $.post(urlmaj,{id:id},function(response){ 
              if ($(div).prop('checked')) {
                $(div).prop('checked', false);              
              } else {
                $(div).prop('checked', true);          
              }
         if (response.resultat==1) { 
            $(div).prop('checked', true); 
            montrer_notification('success', response.message);
          } else { 
            $(div).prop('checked', false); 
            montrer_notification('error', response.message);
          }
        },"json");
    }

    // Fonction de suppression d'un element d'une liste via Ajax 
    function supprimer_element(urlmaj,id,div) { 
        $.post(urlmaj,{id:id},function(response){ 
            $(div).animate({opacity: 0.30}, "slow");
            if (response.resultat==1) {
              montrer_notification('success', response.message);
              $(div).slideUp("slow",function(){$(div).remove();});
            } else { 
                montrer_notification('error', response.message);
                $(div).animate({opacity: 1}, "slow");
            }
            $('#modal_supprimer_'+id).modal('toggle');
        },"json");
    }
    
    // notification
    function montrer_notification(typo,texte){
        if (typo=='error') {
            $.growl.error({ message: texte});  
        }
        if (typo=='success') {
            $.growl.notice({ message: texte});
        }
    }    

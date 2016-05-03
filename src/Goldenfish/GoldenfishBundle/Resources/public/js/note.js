 $(document).ready(function(){

    $(document).on('click', '.notes', function(e){ // quand on clique sur la div de noe
    	var divNote = $(this).children( ".note_content" ).text(); 
 	
        $("#modalnote").modal();
        $('.containerNote').html(divNote); 
        $('.textareaNote').css('display','none');
        
        $('.btnValider').css('display','none');

        var idNote = $(this).children( ".note_content" ).attr('id');
        $('.note_id').html(idNote); 
        
    });

        $(document).on('click', '.btnModifier', function(e){ // quand on clique sur modifier
    	   
    		//$('.btnValider').css('display','block');
    		//$('.btnModifier').css('display','none');

 	       /* $('.textareaNote').css('display','block');
 	        $('.textareaNote').css('width','500px');
 	        $('.textareaNote').css('height','150px');*/
            var idNote = parseInt($(".note_id").text());
            var URL = "app/add/" + idNote;

            $("#corps").load(URL);
            $("#modalnote").modal('toggle');
    });


        $(document).on('click', '.btnValider', function(e){ // Quand on valide la modification
    	var divNote = $(this).text(); 
    		$('.btnValider').css('display','none');
    		$('.btnModifier').css('display','block');

 	        $('.textareaNote').css('display','none');
    });
    


    $(document).on('click', '.clickNote', function(e){ // Quand on clique sur l'onglet Liste Note, on charge app/list
            e.preventDefault();
    $("#corps").css('height','800px');
    $("#corps").load("app/list");

 
        });

    $(document).on('click', '.clickAddNote', function(e){ // Quand on clique sur l'onglet Ajouter une note, on charge app/add
            e.preventDefault();
    $("#corps").css('height','800px');
    $("#corps").load("app/add");

 
        });

    $("#corps").load("app/list"); 

});


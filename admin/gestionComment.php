<script>
$(document).ready(function() {
	$("#listByAuteur_Commment").change(function(){
		//alert("test");
				$.post(
				 'lib/chargCom.php',
				 {
					 selectIDLIST:$("#listByAuteur_Commment option:selected").val(),
																 	
				 },
				 function(data){ $("#div_modifCom").html(data);}
				 
				) 	
				$("#secretIDCOM").val() =$("#listByAuteur_Commment option:selected").val()	
				
				
	});

	$("#listByDate_Commment").change(function(){
		//alert("test");
				$.post(
				 'lib/chargCom.php',
				 {
					 selectIDLIST:$("#listByDate_Commment option:selected").val(),
														 	
				 },
				 function(data){ $("#div_modifCom").html(data);}
				 
				) 	
						
				
				
	});
	
	$("#listByCom").change(function(){
		//alert("test");
				$.post(
				 'lib/chargCom.php',
				 {
					 selectIDLIST:$("#listByCom option:selected").val(),
														 	
				 },
				 function(data){ $("#div_modifCom").html(data);}
				 
				) 	
						
				
				
	});
	
	
	
	$("#applyCom").click(function(){
		//alert("test");
				$.post(
				 'lib/modifCom.php',
				 {
					 id_modifcom:$("#secretIDCOM").val(),
					 auteur_modifcom:$("#input_modifautCom").val(),
					 msg_modifcom:$("#input_modifcontCom").val()
														 	
				 },
				 function(data){ $("#msg_GestionCOM").html(data);}
				 
				) 	
						
				
				
	});

	$("#supprimerCom").click(function(){
		//alert("test");
					
				$("#confirmDelete").dialog({
					resizable:false,
					height:20,
					modal:true,
					buttons:{
						"Confirmer":function(){
							$.post(
									 'lib/delCom.php',
									 {
										 id_modifcom:$("#secretIDCOM").val()
										 
																			 	
									 },
									 function(data){ $("#msg_GestionCOM").html(data);$("#teste").load('gestionComment.php'); 	}
									 
									) ;
							
							
							$(this).dialog("close");
							document.getElementById('input_modifautCom').value='';
							document.getElementById('input_modifcontCom').value='';
							 				
							
							}, 
						"Annuler":function(){

							$(this).dialog("close");
										}
					}	

					});	
				//	
				
					
	});
});
function rafraichir()
{

}


</script>
<div id="teste">
<div id="confirmDelete" title="confirmer la suppression"></div>


<table id="tabGestComm">
<tr> 
	<td id="col_selectlistcom">
		<p><strong>s&eacute;lectionner</strong> le commentaire</p>
		
		<div id ="div_selectCom">  
			<?php 
				 //include ('selectCom.php');
			
			echo'Par auteur : ';
			require 'lib/loadlistCom.php';
			
			listcom_byAut();
			echo '<br /><br /> Par Date : ';
			listcom_byDate();
			echo '<br /><br /> Par Commentaire : ';
			listcom_byCom();
			?>
			
		</div>
		
		
	</td>
	<td>
		<div id="div_modifCom">
		<table id="tb_modifCom">
		<tr><td id="col_modifautCom">auteur</td><td><input id="input_modifautCom" type="text" /></td></tr>
		<tr><td id="col_modifcontCom">commentaire</td><td><textarea id="input_modifcontCom" rows="8" cols="60"></textarea>
		</td></tr>
		
		
		
		
		</table>
		</div>
	</td>
</tr>

<tr><td>

</td><td id="col_btmodifCOM">
<span id="truc">commentaire &nbsp;&nbsp;</span>
 <button id="applyCom">appliquer les modifications</button>&nbsp;<button id="supprimerCom"  >Supprimer</button>
</td></tr>
<tr><td colspan="2" id="resultmanip"><br />
<div id="msg_GestionCOM"></div>
</td></tr>

</table>

</div>
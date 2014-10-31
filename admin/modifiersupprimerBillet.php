<script>


$(document).ready(function(){ 

	

	var id;
	$("#selectionBillets").change(function(){
		
		
			id:	selectBillet:$("#selectionBillets option:selected").val();
			$("#contenuBillet").load('lib/modif_contenubillet.php') ;	


			$.post(
					'lib/modifBillet.php',
					{
						selectBillet:$("#selectionBillets option:selected").val()
					},
						function(data){ $("#contenuBillet").html(data);}
					);	
				
		
		
		});
	$("#del_Billet").click(function(){

				$("#confirmDelete").dialog({
					resizable:false,
					height:20,
					modal:true,
					buttons:{
						"Confirmer":function(){
							$.post(
									 'lib/del_sh.php',
									 {
										del_idBillet:$("#selectionBillets option:selected").val(),
																			 	
									 },
									 function(data){ $("#afficheResult").html(data); $("#loadTitrebillet").load("loadTitrebillet.php");}
									 
									);
							
								
							$(this).dialog("close");
							location.reload(); 
							//$('#loadTitrebillet').load("loadTitrebillet.php");	
							}, 
						"Annuler":function(){

							$(this).dialog("close");
										}
					}	

					});	
			});
	
	
	
});


</script>

<h1 id="titreModif">Modifier un Billet</h1>
<table>
<tr>
<td id="colselect">
<div id="afficheResult"></div>
<div id="selectionBillet">

<legend>Selectionner le billet</legend>
<select id="selectionBillets" size="20">
<div id="loadTitrebillet">

<?php
include ('lib/loadTitrebillet.php');
?>


</div>

				</select>
			</div>&nbsp;&nbsp;&nbsp;<br />
			<button id="del_Billet">Supprimer</button>
			<div  class="confirmDelete" id="confirmDelete" title="confirmer la suppression"></div>
		</td>

		<td><div id="contenuBillet">

				<table id="tab_modifBillet">
					<tr>
						<td id="col_IDmodifBillet">Id</td>
						<td><input type="text" id="identifiant" /></td>
					</tr>
					<tr>
						<td id="col_titremodifBillet">titre</td>
						<td><input type="text" id="newTitre" /></td>
					</tr>
					<tr>
						<td id="col_labContent">Contenu</td>
						<td><textarea rows="15" cols="60" id="newcontenu"></textarea></td>
					</tr>
				</table>
				<br> <br>
			</div></td>
	</tr>
	<tr>
		<td id="col_delBillet"></td>
		<td></td>

</table>

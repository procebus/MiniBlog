<script>
	$(document).ready(function(){
		$("#bt_applyModif").click(function(){
				//alert("test");
						$.post(
						 'lib/pdoReq_modifBillet.php',
						 {
							 newTitre:$("#newTitre").val() ,	
							 newcontenu:$("#newcontenu").val() ,
							 selectId:$("#identifiant").val()
							 
							 
																	 	
						 },
						 function(data){ $("#resultFin").html(data);}
						 
						);
						document.getElementById('loadTitrebillet').reload(); 	
								
						
						
					});
					
					});
				
</script>




<table id="tab_modifBillet">
<?php 


try
{
	
	if (isset($_POST['selectBillet']))
	{
		
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$cnx = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);
		$req_b = $cnx->prepare('select id,titre,contenu,date_creation from billets where id = :idSelectad');
		$req_b->execute(array('idSelectad'=>$_POST['selectBillet']));
		
		while ($data = $req_b->fetch())
		{
			echo '';
			echo '<tr><td id="col_IDmodifBillet">Id</td><td><input type ="text" value="'.$data['id'].'" id="identifiant" /></td></tr>';
			echo '<tr><td id="col_titremodifBillet">titre</td><td><input type ="text" value="'.$data['titre'].'" id="newTitre" /></td></tr>';
			echo '<tr><td id="col_labContent">Contenu</td><td><textarea rows="15" cols="60" id="newcontenu">'.$data['contenu'].'</textarea></td></tr>';
			echo '';
		}
		$req_b->closeCursor();
	}
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}


?>
<tr><td></td><td><button id="bt_applyModif">Appliquer les modifications</button></td></tr>
</table>


<br>
<div id="resultFin"></div>
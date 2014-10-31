<?php 
try 
{

	
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bde = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);
	date_default_timezone_set('Europe/Paris');
	$date_du_jour = date("Y-m-d H:i:s");
	//$date_du_jour = gmDate("Y-m-d H:i:s");
	//echo $date_du_jour;
	//echo $_POST['test'];
	if(isset($_POST['auteur_NC']) && isset($_POST['msg_NC']) && isset($_POST['IDBilCom']))
	{
		if (!empty($_POST['auteur_NC']) && !empty($_POST['msg_NC']) && !empty($_POST['IDBilCom'])) 
			{
				$req_insertBillet = $bde->prepare('insert into commentaires (id_billet,auteur,commentaire,date_commentaire) 
						values (:idBNC,:auteurNC,:NC,:date_com)');
				$req_insertBillet->execute(array(
						'idBNC'=>$_POST['IDBilCom'],
						'auteurNC'=>$_POST['auteur_NC'],
						'NC'=>$_POST['msg_NC'],
						'date_com'=>$date_du_jour)
				);
				echo 'Le commentaire a bien &eacute;t&eacute; cr&eacute;&eacute; ';	
				echo '<script>
							parent.document.getElementById("add_comment").innerHtml = "ttt";
						$(document).ready(function(){ 
								document.getElementById("affichercomment").load("affcomment.php");
						});
						
						</script>
						
						';
			}
		else 
		{	
			echo 'les champs ne sont pas renseign&eacute;s'	;
			
		}
			
	}
	else 
	{
		echo 'erreur';
		
		
	}
	
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>
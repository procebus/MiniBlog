<?php 

try
{
	//echo $_POST['selectId'];
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$cnx = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);
		
	if (
			isset($_POST['id_modifcom']) && !empty($_POST['id_modifcom'])
			&& isset($_POST['auteur_modifcom']) && !empty($_POST['auteur_modifcom']) 
			&& isset($_POST['msg_modifcom']) && !empty($_POST['msg_modifcom']) 
		)
			{
				$req_update = $cnx->prepare('
						update commentaires 
						set auteur = :newauteur, 
						commentaire = :newcommentaire 
						where id = :selectId');
				$req_update->execute(array(
						'newauteur'=>$_POST['auteur_modifcom'],
						'newcommentaire'=>$_POST['msg_modifcom'],
						'selectId'=>$_POST['id_modifcom'] 
					));
				echo 'les lignes ont ete modifiees';
			}
	else {
		
		echo'erreur';
	}	
		
		
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}



?>
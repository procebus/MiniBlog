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
	if(isset($_POST['_titreIns']) && isset($_POST['_contenuIns']))
	{
		if (!empty($_POST['_titreIns']) && !empty($_POST['_contenuIns'])) 
			{
				$req_insertBillet = $bde->prepare('insert into billets (titre,contenu,date_creation) values (:titreIns,:contenuIns,:date_creaIns)');
				$req_insertBillet->execute(array('titreIns'=>$_POST['_titreIns'],'contenuIns'=>$_POST['_contenuIns'],'date_creaIns'=>$date_du_jour));
				echo 'Le billet a bien &eacute;t&eacute; cr&eacute;&eacute; ';	
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
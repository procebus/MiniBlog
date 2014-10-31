<?php 
try {
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);
	$req_affBillet = $bdd->prepare('select id,titre,contenu,date_creation from billets where id= :idBillet order by id desc limit 0,5');
	$req_affBillet->execute(array('idBillet'=> $_POST['ID_billet']));
	while ($data = $req_affBillet->fetch())
	{
		
		echo '<table><tr><td id="enteteBillet">';
		echo htmlspecialchars($data['titre']).' le ' .htmlspecialchars($data['date_creation']) ;
		echo '</td></tr><tr><td id ="msgBillet"><p>';
		echo htmlspecialchars($data['contenu']);
		echo '</p></td></tr></table>';
		
		
	}
	$req_affBillet->closeCursor();
	echo '';
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>
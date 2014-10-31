
<?php 
try {
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);

	$req = $bdd->prepare('select id,id_billet,auteur,commentaire,DATE_FORMAT(date_commentaire,\'%d/%m/%Y a %T \') AS date_com_fr from commentaires where id_billet = :idbillet order by id desc');
	$req->execute(array('idbillet'=> $_POST['ID_billet']));
	
					
	while ($data = $req->fetch())
	{
		
		
		echo '<table><tr><td id="autCOM">';
		echo $data['auteur'].' a &eacute;crit le '.$data['date_com_fr'];
		echo '</td></tr><tr><td id="corpsComment">';
		echo '<p >&nbsp;&nbsp;'.$data['commentaire'].'</p>';
		echo '<tr><td></table>';
		
		
		
	}
	$req->closeCursor();
	

    echo '';
	echo '<input type="hidden" value="'.$_POST['ID_billet'].'" id="numComment"/>';
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

?>
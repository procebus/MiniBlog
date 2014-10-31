<script type="text/javascript" src="javascript/comment.js"> </script>
<script type="text/javascript" src="javascript/jquery.js"> </script>



<article id="afficheBilletwhereID">
<div>

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

</div>



<br />

<div id="retourindex"><a  id="retourLast" href="">Retour &agrave; la liste des billets</a></div>
</article>

<article id="corpsCommentaires">
<div id="titrePageComment">
 <img src="images/comment-add.png" width="20" alt="ajouter commentaire" id="new_Commentaire" title="ajouter un commentaire" onclick="var a=this.id;addcomment(a);" /> 
  </div>
 <div="affichercomment">
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


</div>


<div id="add_comment">


</div>
</article>

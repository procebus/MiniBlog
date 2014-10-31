<script type="text/javascript" src="javascript/print.js"> </script>
<?php 
try {
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);
	$req_affBillet = $bdd->query('select id,titre,contenu,DATE_FORMAT(date_creation,\'%d/%m/%Y a %T \') AS date_creation_fr from billets order by id desc limit 0,5');
	$i =0;
	$j=1;
	while ($data = $req_affBillet->fetch())
	{
		echo '<article><table><tr><td id="enteteBillet">';
		echo htmlspecialchars($data['titre']).' le ' .htmlspecialchars($data['date_creation_fr']) ;
		echo '<img src="images/comment.png" width="20" alt="regarder commentaire" id="'.$i.'" title="afficher les commentaires" onclick="var a=this.id;affcoment(a);"/> &nbsp;';
		echo '<img src="images/pdf.png" width="20" id="'.$j.'" alt="html2pdf" title="afficher version pdf "onclick="var m=this.id;printEtat(m);"  />';
		echo '</td></tr><tr><td id ="msgBillet"><p>';
		echo htmlspecialchars($data['contenu']);
		
		echo '</p></td></tr><tr><td>';
		
		echo '&nbsp;</p><br></td></tr></table></article>' ;
		echo '<input type="hidden" name="C'.$i.'"  id="C'.$i.'" value="'.$data['id'].'" />';
		
		
		$i++;
		$j++;
		
	}
	$req_affBillet->closeCursor();
	
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>
<div id="testprint"></div>
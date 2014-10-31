<?php

//echo $_POST['juju'];


	$titredubillet;
	$contenudubillet;
	$datedubillet;	

	

	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);
	$req_affBillet = $bdd->prepare('select id,titre,contenu,DATE_FORMAT(date_creation,\'%d%m%Y\') AS date_creation_fr from billets where id= :idBillet order by id desc limit 0,5');
	$req_affBillet->execute(array('idBillet'=> $_POST['juju']));
	while ($data = $req_affBillet->fetch())
	{
		$titredubillet =$data['titre'];
		$contenudubillet=$data['contenu'];
		$datedubillet=$data['date_creation_fr'];
		
		
		
	}
	$req_affBillet->closeCursor();





 $content = "
 		
 		<h1>Disquette Blog</h1>
 		<h3>".$titredubillet."</h3>
 		<p>&eacute;crit le ".$datedubillet." </p>	
 		<p>".$contenudubillet."</p>	
 				
 		";
 
 //$content = $_POST['juju'] ;
 //echo $content;

    require_once('html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('../pub/Billet'.$datedubillet.'.pdf', 'F');
    //$html2pdf->Output();
	
	//echo '	' ;
	echo '<div id="dlPDF">telecharger le fichier <a href="pub/Billet'.$datedubillet.'.pdf">Billet'.$datedubillet.'.pdf</a> ';
	echo '<br /><br /><br />';
	echo '<a href="">Retour</a><br /><br /><br /></div>';
	
?>

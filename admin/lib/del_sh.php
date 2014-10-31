<?php
try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdc = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);
	
	//echo $_POST['test'];
	//echo $_POST['del_idBillet'];
	
	if (isset($_POST['del_idBillet']) && !empty($_POST['del_idBillet']) ) 
	{
		$req_affId = $bdc->prepare('delete from billets where id=:idSelected');
		$req_affId->execute(array('idSelected'=>$_POST['del_idBillet']));
		echo 'le billet a bien &eacute;t&eacute; supprim&eacute;';
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
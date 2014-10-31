<?php 

function listcom_byAut()
{
		try 
		{
			//require_once 'sqlConnect.php';
			
			echo '<select id="listByAuteur_Commment">';
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$cnx = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);
			$req_Id = $cnx->query('select id,auteur,commentaire,DATE_FORMAT(date_commentaire,\'%d/%m/%Y a %T \') AS date_com_fr from commentaires');
			while ($data = $req_Id->fetch())
			{
				echo '<option value="'.$data['id'] .'">'.$data['auteur'].'</option>';
			
			}
			$req_Id->closeCursor();
			echo '</select>';
			
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}	
}

function listcom_byDate()
{
	try
	{
		//require_once 'sqlConnect.php';
			
		echo '<select id="listByDate_Commment">';
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$cnx = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);
		$req_Id = $cnx->query('select id,auteur,commentaire,DATE_FORMAT(date_commentaire,\'%d/%m/%Y a %T \') AS date_com_fr from commentaires');
		while ($data = $req_Id->fetch())
		{
			echo '<option value="'.$data['id'] .'">'.$data['date_com_fr'].'</option>';
				
		}
		$req_Id->closeCursor();
		echo '</select>';
			
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
}

function listcom_byCom()
{
	try
	{
		//require_once 'sqlConnect.php';
		
		
		echo '<select id="listByCom">';
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$cnx = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);
		$req_Id = $cnx->query('select id,auteur,SUBSTRING(commentaire,1,10) AS com,DATE_FORMAT(date_commentaire,\'%d/%m/%Y a %T \') AS date_com_fr from commentaires');
		while ($data = $req_Id->fetch())
		{
			echo '<option value="'.$data['id'] .'">'.$data['com'].'</option>';

		}
		$req_Id->closeCursor();
		echo '</select>';
			
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
}















?>
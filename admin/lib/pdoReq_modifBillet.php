
		<?php 
		
		try 
		{
			//echo $_POST['selectId'];
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$cnx = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);
			
			if (isset($_POST['newTitre']) && !empty($_POST['newTitre']) 
					&& isset($_POST['newcontenu']) && !empty($_POST['newcontenu']) && isset($_POST['selectId']) ) 
			{
				$req_update = $cnx->prepare('update billets set titre = :newtitre, contenu = :newcontenu where id = :selectId');
				$req_update->execute(array('newtitre'=>$_POST['newTitre'],'newcontenu'=>$_POST['newcontenu'],'selectId'=>$_POST['selectId'] ));
				echo 'les lignes ont ete modifiees';
			}
			
			
			
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		?>


	
	
	
	
	
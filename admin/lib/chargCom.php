


<?php 
	try
	{
		//require_once 'sqlConnect.php';
			
		
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$cnx = new PDO('mysql:host=localhost;dbname=blog','root','',$pdo_options);
		if (!empty($_POST['selectIDLIST']) && isset($_POST['selectIDLIST']))
		{
			$req_Id = $cnx->prepare('select id,auteur,commentaire from commentaires where id= :selectIDCOM');
			$req_Id->execute(array(
					'selectIDCOM'=>$_POST['selectIDLIST']
			
			
			));
			echo'<table id="tb_modifCom">';
			
			while ($data = $req_Id->fetch())
			{
				echo '<tr><td id="col_modifautCom">auteur</td><td>';
				echo '<input id="input_modifautCom" type="text" value="'.htmlspecialchars($data['auteur']).'"/>';
				echo '<input type="hidden" id="secretIDCOM" value="'.$data['id'].'"/>';
				echo '</td></tr><tr><td id="col_modifcontCom">commentaire</td><td>';
				echo'<textarea id="input_modifcontCom" rows="8" cols="60">'.htmlspecialchars($data['commentaire']).'</textarea>
						</td></tr>';
				
			}
			$req_Id->closeCursor();
			//echo '</table>';
			
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
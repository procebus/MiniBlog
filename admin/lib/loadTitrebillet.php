<?php
try {
	// require_once 'sqlConnect.php';
	$pdo_options [PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$cnx = new PDO ( 'mysql:host=localhost;dbname=blog', 'root', '', $pdo_options );
	$req_Id = $cnx->query ( 'select id,titre,contenu,date_creation from billets' );
	while ( $data = $req_Id->fetch () ) {
		echo '<option value="' . $data ['id'] . '">' . $data ['titre'] . '</option>';
	}
	$req_Id->closeCursor ();
} catch ( Exception $e ) {
	die ( 'Erreur : ' . $e->getMessage () );
}
?>
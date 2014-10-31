<script type="text/javascript">
<!--

//-->

$(document).ready(function() {
	$("#listByAuteur_Commment").change(function(){
		//alert("test");
				$.post(
				 'chargCom.php',
				 {
					 selectIDLIST:$("#listByAuteur_Commment option:selected").val(),
																 	
				 },
				 function(data){ $("#div_modifCom").html(data);}
				 
				) 	
				$("#secretIDCOM").val() =$("#listByAuteur_Commment option:selected").val()	
				
				
	});

	$("#listByDate_Commment").change(function(){
		//alert("test");
				$.post(
				 'chargCom.php',
				 {
					 selectIDLIST:$("#listByDate_Commment option:selected").val(),
														 	
				 },
				 function(data){ $("#div_modifCom").html(data);}
				 
				) 	
				
	});
	
	$("#listByCom").change(function(){
		//alert("test");
				$.post(
				 'chargCom.php',
				 {
					 selectIDLIST:$("#listByCom option:selected").val(),
														 	
				 },
				 function(data){ $("#div_modifCom").html(data); }
				 
				) 	
						
				
				
	});

});
</script>
<?php 
echo'Par auteur : ';
require 'loadlistCom.php';
listcom_byAut();
echo '<br /><br /> Par Date : ';
listcom_byDate();	
echo '<br /><br /> Par Commentaire : ';
listcom_byCom();
?>
		
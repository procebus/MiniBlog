<script>
	$(document).ready(function(){
		$("#insert_Billet").click(function(){
				//alert("test");
						$.post(
						 'lib/ajout_sh.php',
						 {
							_titreIns:$("#insert_TitreBillet").val(),
							_contenuIns:$("#insert_ContenuBillet").val(),
							
						 	
						 	
						 },
						 function(data){ $("#resultInsert").html(data);}
						 
						) 	

						document.getElementById('insert_TitreBillet').value = '';
						document.getElementById('insert_ContenuBillet').value = '';
						
					});
					
					});
				
</script>



<input type="hidden" value="prout" id="cache" name="cache"/>
<div id="ajout">

<br />
<table>
<tr><td></td><td><h1 id="titre_ajoutbillet">Ajout d'un billet sur le Blog</h1></td></tr>
<tr><td id="labelTitreA">titre</td><td><input type ="text" id="insert_TitreBillet" name="insert_TitreBillet" required/></td></tr>
<tr><td id="labelContenuA">Contenu</td><td><textarea rows="15" cols="60" id="insert_ContenuBillet" required></textarea></td></tr>
<tr><td></td><td><button  id="insert_Billet">Appliquer</button></td></tr>
</table>


</div>

<div id="resultInsert" >

</div>


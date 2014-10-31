<script type="text/javascript" src="javascript/jquery.js"> </script>





<table>
<tr><td id="label_auteurNC">auteur</td><td><input type="text" id="auteur_NC" required/></td></tr>
<tr><td id="label_NC">commentaire</td><td>
<textarea id="msg_NC" rows="10" cols="60" required></textarea>

<br>
</td></tr>

<tr><td></td><td><button id="send" name="send" onclick="donnerparams();">Envoyer</button></td><td>
</table>

<div id="validation"></div>
<input type="hidden" id="secretID" value="<?php echo $_POST['ID_BILLET']; ?>" />
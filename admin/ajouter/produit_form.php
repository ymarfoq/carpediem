<form method="post" action="../admin/ajouter/produit.php" enctype="multipart/form-data" id="ajout_produit" class="ajout">
	<img class='exit cible' src='../images/croix.png' width=10 onclick=cachage('ajout_produit')>
	<table width="100%" cellspacing="20">
		<tr>
			<td>
			<input type="radio" name="type" value="livre" checked>Livre
			<input type="radio" name="type" value="jeu">Jeu
			<input type="radio" name="type" value="divers">Divers
			</td>
			<td>
				<label for="titre">Titre : </label>
				<input type="text" name="titre" maxlength="40" />
				<label for='cdc'>Coup de coeur ?</label>
				<input type='checkbox' name='cdc' value='TRUE'>
			</td>
			
		</tr>
		<tr>
			<td>
				<label for="editeur">Auteur/Editeur : </label>
				<input type="text" name="editeur" maxlength="40" />
			</td>
			<td>
				<label for="photo">Photo associée(max=10Mo) : </label>
				<input type="hidden" name="MAX_FILE_SIZE" value="12000000" />
				<input type="file" name="photo" />
			</td>
		</tr>
		<tr>
			<td colspan=2>
				<label for="description">Petite description : </label><br>
				<textarea name="description" cols=50 rows=5></textarea>
			</td>
		</tr>
	</table>

	<input type = "submit" value='Ajouter'>
</form>

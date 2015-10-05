<form method="post" action="../admin/ajouter/membre.php" enctype="multipart/form-data" id='ajout_membre' class='ajout'>
	<img class='exit cible' src='../images/croix.png' width=10 onclick=cachage('ajout_membre')>
	<table width="100%" cellspacing="20">
		<tr>
			<td>
				<label for="nom">Nom : </label>
				<input type="text" name="nom" placeholder="Ex : Guay"  maxlength="40" />
			</td>
			<td>
				<label for="prenom">Prénom : </label>
				<input type="text" name="prenom" placeholder="Ex : Louise"  maxlength="40" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="fonction">Fonction : </label>
				<select name="fonction">
					<option value='Président'>Président</option>
					<option value='Présidente'>Présidente</option>
					<option value='Vice président'>Vice président</option>
					<option value='Vice présidente'>Vice présidente</option>
					<option value='Trésorier'>Trésorier</option>
					<option value='Trésorière'>Trésorière</option>
					<option value='Secrétaire'>Secrétaire</option>
					<option value='Administrateur'>Administrateur</option>
					<option value='Administratrice'>Administratrice</option>
					<option value='Autre'>Autre</option>
				</select>
			</td>
			<td>
				membre travailleur<input type="radio" name="statut" value="travailleur"/>(auxitiaire<input type='checkbox' name='aux' value='TRUE'>)<br>
				membre de soutien de CA<input type="radio" name="statut" value="soutienCA"/><br>
				membre de soutien<input type="radio" name="statut" value="soutien" />
			</td>
		</tr>
		<tr>
			<td colspan=2><label for="logo">Sa photo(max=10Mo) : </label>
				<input type="hidden" name="MAX_FILE_SIZE" value="12000000" />
				<input type="file" name="photo" />
			</td>
		</tr>
		<tr>
			<td colspan=2>
				<label for="bio">Bio : </label><br>
				<textarea name="bio" rows="5"></textarea>
			</td>
		</tr>
	</table>

	<input type = "submit" value='Ajouter'>
</form>

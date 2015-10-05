<form method="post" action="../admin/ajouter/partenaire.php" enctype="multipart/form-data" id='ajout_partenaire' class='ajout'>
	<img class='exit cible' src='../images/croix.png' width=10 onclick=cachage('ajout_partenaire')>
			<table width="100%" cellspacing="20">
				<tr>
					<td>
						<label for="nom">Nom : </label>
						<input type="text" name="nom" placeholder="Ex : Guay"  maxlength="40" />
					</td>
					<td>
						Partenaire financier<input type="radio" name="statut" value="financeur"/><br>
						Fournisseur<input type="radio" name="statut" value="fournisseur" /><br>
						Autre<input type="radio" name="statut" value="autre" />
					</td>
				</tr>
				<tr>
					<td><label for="logo">Logo(max=10Mo) : </label>
						<input type="hidden" name="MAX_FILE_SIZE" value="12000000" />
						<input type="file" name="logo" />
					</td>
					<td>
						<label for="site">Site web : </label>
						<input type="text" name="site" maxlength="40"/>
					</td>
				</tr>
				<tr>
					<td colspan=2>
						<label for="remerciement">Remerciement : </label><br>
						<textarea name="remerciement" rows="5" ></textarea>
					</td>
				</tr>
			</table>
		
			<input type = "submit" value='Ajouter'>
		</form>

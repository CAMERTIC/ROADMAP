<article id="dashboard">
				
				
<?php if(!isset($_GET['view']) && !isset($_GET['layout'])) { ?>
				<h2>Lien rapides</h2>
				<section class="icons">
					<ul>
						<!--<li>
							<a href="#">
								<img src="images/eleganticons/Home.png" />
								<span>Accueil</span>
							</a>
						</li>-->
						<li>
							<a href="tableaudebord?view=vente&layout=sell" title="Faire une vente">
								<img src="images/eleganticons/Paper.png" />
								<span>Vendre</span>
							</a>
						</li>
						<li>
							<a href="tableaudebord?view=caisse&layout=sessions" title="Gestion des sessions">
								<img src="img/icons/folder_home.png" height="48"  />
								<span>Sessions</span>
							</a>
						</li>
						<li>
							<a href="?view=caisse&layout=caisses" title="Gestion de la caisse">
								<img src="img/icons/money_safe1.png" height="48" />
								<span>Caisse</span>
							</a>
						</li>
						<!--<li class="">
							<a href="#">
								<img src="images/eleganticons/Photo.png" />
								<span>Photos</span>
							</a>
						</li>-->
						<li>
							<a href="#">
								<img src="images/eleganticons/Folder.png" />
								<span>Etat Stock</span>
							</a>
						</li>
						
						<li>
							<a href="?view=administration&layout=users">
								<img src="images/eleganticons/Person-group.png" />
								<span>Gestion des utilisateurs</span>
							</a>
						</li><!---->
						<li>
							<a href="#">
								<img src="images/eleganticons/Config.png" />
								<span>Paramètres</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="images/eleganticons/Piechart.png" />
								<span>Rapports</span>
							</a>
						</li>
						
						<li>
							<a href="#">
								<img src="images/eleganticons/Info.png" />
								<span>Informations</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="images/eleganticons/Mail.png" />
								<span>Messages</span>
							</a>
						</li>
						<!---->
						<li>
							<a href="deconnexion">
								<img src="images/eleganticons/X.png" />
								<span>Déconnexion</span>
							</a>
						</li>
					</ul>
				</section>
<?php } 

	if(isView()) {
		getLayout();
	}
?>
	<h2 class="hidden">Notifications</h2>
	
	<div class="success msg hidden">
	This is a success message. Click to close.
	</div>

	<div class="error msg hidden">
	This is an error message. Click to close.
	</div>

	<div class="warning msg hidden">
	This is a warning message. Click to close.
	</div>

	<div class="information msg hidden">
	This is an information message. Click to close.
	</div>
		
</article>
		
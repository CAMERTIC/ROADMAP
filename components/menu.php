<?php

// $expiration = time() - 3600;
// $menu_html_cache = "cache/m-".$_SESSION['u']['utilisateur'].".html";

// if(file_exists($menu_html_cache) && filemtime($menu_html_cache) > $expiration) {
	// include($menu_html_cache);
// } else {
	// ob_start();
	// $menu_html = '<ul id="mainmenu" class="sf-menu">';
	// $menu_html .= '<li class="current"><a href="tableaudebord">Tableau de Bord</a></li>';
	// $m = new menu();
	// $topmenu = $m->getMenus();
	// foreach($topmenu as $tm) {
		// $menu_html .= "<li><a href=\"$tm->lienmenu\">$tm->titremenu</a>";
		// if($m->isParent($tm->id)) $menu_html .= $m->afficheMenus($tm->id); 
		// $menu_html .= '</li>';
	// }
	// $menu_html .= '</ul>';
	// echo($menu_html);
	// $menu_html = ob_get_contents();
	// ob_end_clean();
	// file_put_contents($menu_html_cache, $menu_html);
	// echo($menu_html);
//}?>
<ul> 
	<li class="current"><a href="dash.php">Accueil</a></li> 
	<li> <a href="#">Autocaristes</a> 
		<ul> 
			<li><a href="?view=autocariste-form">Creer nouveau</a></li>
			<li><a href="?view=autocariste-list&membership=premium">Lister Premium</a></li>
			<li><a href="?view=autocariste-list&membership=free">Lister Free</a></li>
			<li><a href="?view=autocariste-list">Lister Tous</a></li>
			<li><a href="#">Formule des emails</a>
				<ul>
					<li><a href="?view=autocariste-emails-rappel-payement">Rappel de payement</a></li>
					<li><a href="?view=autocariste-emails-connexion">Acces de connexion</a></li>
				</ul>
			</li>
		</ul> 
	</li> 
	<li><a href="#">Codes Reduction</a>
		<ul> 
			<li><a href="?view=codes-form">Creer nouveau</a></li>
			<li><a href="?view=codes-list&valid">Lister valides</a></li>
			<li><a href="?view=codes-list&expired">Lister expires</a></li>
			<li><a href="?view=codes-list">Lister tous</a></li>
		</ul> 
	</li>
	<li><a href="?view=payements">Payements</a></li>
	<li><a href="#">Demandes</a>
		<ul> 
			<li><a href="?view=devis">Demandes de devis</a></li>
			<li><a href="?view=demandes">Demandes de referencement</a></li>
		</ul> 
	</li>
	<li><a href="#">Bannieres</a>
		<ul> 
			<li><a href="?view=listbanner">Lister</a></li>
			<li><a href="?view=newbanner">Nouvelle banniere</a></li>
		</ul> 
	</li>
</ul>
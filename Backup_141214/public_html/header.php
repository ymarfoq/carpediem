<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Librairie Carpediem | <?php echo $titre; ?></title>
<META NAME="Desciption" CONTENT="Librairie Carpediem est une librairie située à Mont-Tremblant, une charmante ville du Quebec au Canada. Cette librairie vend des Livres, des jeux de société, des cigars cubain...">
<META NAME="Keywords" CONTENT="Librairie, Carpediem, Livre, Jeu, Mont-tremblant, Quebec, Canada, Cigars, Petit Hameau, coopérative">
<META NAME="Author" CONTENT="Yohan Marfoq">
<META NAME="Identifier-URL" CONTENT="http://www.librairiecarpediem.com">
<META NAME="Date-Creation-yyyymmdd" content="20140915">
<META NAME="Category" CONTENT="Vente livres et jeux">
<meta name="rating" content="general" />
<meta name="revisit-after" content="10 Days" />
<meta name="expires" content="never">
<meta name="distribution" content="global" /> 
<link rel="shortcut icon" type="image/png" href="../images/livre.ico">
<!--POLICES-->
<!--CSS-->
<link rel="stylesheet" type="text/css" media="all" href="../style.css">
<script type='text/javascript' src='../admin/script.js'></script>

</head>
<body>
	<section>
		
<header>
	<a id="accueil" href="../accueil"><img src='../images/logo.png' height=200></a>
	
	<nav>
		<a class="menu_item <?php if($titre=='cooperative'){echo 'select';}?>" href="../cooperative">Coopérative</a>
		<a class="menu_item <?php if($titre=='produits'){echo 'select';}?>" href="../produits">Produits</a>
		<a class="menu_item <?php if($titre=='presse'){echo 'select';}?>" href="../presse">Presse</a>
		<a class="menu_item <?php if($titre=='info'){echo 'select';}?>" href="../info">Info</a>
		<a class="menu_item <?php if($titre=='remerciement'){echo 'select';}?>" href="../partenaires">Remerciements</a>
		<a href='https://www.facebook.com/librairiecarpediem' target='_blank'id='fb'><img src='../images/fb.png' width=40></a>
	</nav>
	
	<form id='admin' method="post">
			<?php if($_SESSION['admin']){echo "<input type='hidden' name='mdp' size=15 id='mdp' value='xxx'><input type='submit' value='Déconnexion'>";}
				else{echo "<input type='password' name='mdp' size=16 id='mdp'><input type='submit' value='<-ADMIN'>";}
				$db =new PDO('sqlite:../admin/base.db');
			?>
			</form>
</header>

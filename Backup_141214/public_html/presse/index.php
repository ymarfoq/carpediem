<?php session_start(); 
header( 'content-type: text/html; charset=utf-8' );
 if(isset($_POST['mdp'])){if($_POST['mdp']=='Carpediem/2014'){$_SESSION['admin']=TRUE;}else{$_SESSION['admin']=FALSE;}}else{if(!(isset($_SESSION['admin']))){$_SESSION['admin']=FALSE;}};?>
<!DOCTYPE html>
<html lang=en>
	<head>
<style>
article{width:680px; display:inline-block;}
article div{margin:30px 20px;}
aside{display:inline-block; float:right;}
div{text-align:center;}
</style>
	<?php
	$titre="presse";
	include("../header.php") ?>
	<!--fin entête et menu-->
		<h1>A propos de nous</h1>
		<article>
			<div>
				<iframe src='http://www.myvirtualpaper.com/doc/hebdo_l-information-du-nord-st-jovite/infomttremblant_6aout2014/2014080401/#6' width="670" height="500"></iframe>
			</div>
		</article>
		<aside>
			<div>
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Flibrairiecarpediem&amp;width=285&amp;height=558&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=true&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:285px; height:558px;" allowTransparency="true"></iframe>
			</div>
		</aside>
	<?php include("../footer.php") ?>
</section>
</body>
</html>	

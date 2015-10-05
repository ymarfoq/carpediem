<style>

@-webkit-keyframes spin1 {
    0% { transform: translateZ(-100px) rotateX(0deg) rotateY(0deg) rotateZ(0deg); }
    100% { transform: translateZ(-100px) rotateX(90deg) rotateY(180deg) rotateZ(180deg); }
}
@-webkit-keyframes spin2 {
    0% { transform: translateZ(-100px) rotateX(90deg) rotateY(180deg) rotateZ(180deg); }
    100% { transform: translateZ(-100px) rotateX(180deg) rotateY(360deg) rotateZ(360deg); }
}
@-webkit-keyframes spin3 {
    0% { transform: translateZ(-100px) rotateX(180deg) rotateY(0deg) rotateZ(0deg); }
    100% { transform: translateZ(-100px) rotateX(270deg) rotateY(180deg) rotateZ(180deg); }
}
@-webkit-keyframes spin4 {
    0% { transform: translateZ(-100px) rotateX(270deg) rotateY(180deg) rotateZ(180deg); }
    100% { transform: translateZ(-100px) rotateX(90deg) rotateY(270deg) rotateZ(90deg); }
}
@-webkit-keyframes spin5 {
    0% { transform: translateZ(-100px) rotateX(90deg) rotateY(270deg) rotateZ(90deg); }
    100% { transform: translateZ(-100px) rotateX(0deg) rotateY(90deg) rotateZ(0deg); }
}
@keyframes spin1 {
    0% { transform: translateZ(-100px) rotateX(0deg) rotateY(0deg) rotateZ(0deg); }
    100% { transform: translateZ(-100px) rotateX(90deg) rotateY(180deg) rotateZ(180deg); }
}
@keyframes spin2 {
    0% { transform: translateZ(-100px) rotateX(90deg) rotateY(180deg) rotateZ(180deg); }
    100% { transform: translateZ(-100px) rotateX(180deg) rotateY(360deg) rotateZ(360deg); }
}
@keyframes spin3 {
    0% { transform: translateZ(-100px) rotateX(180deg) rotateY(0deg) rotateZ(0deg); }
    100% { transform: translateZ(-100px) rotateX(270deg) rotateY(180deg) rotateZ(180deg); }
}
@keyframes spin4 {
    0% { transform: translateZ(-100px) rotateX(270deg) rotateY(180deg) rotateZ(180deg); }
    100% { transform: translateZ(-100px) rotateX(90deg) rotateY(270deg) rotateZ(90deg); }
}
@keyframes spin5 {
    0% { transform: translateZ(-100px) rotateX(90deg) rotateY(270deg) rotateZ(90deg); }
    100% { transform: translateZ(-100px) rotateX(0deg) rotateY(90deg) rotateZ(0deg); }
}

#wrapper {
    position: relative;
    perspective: 1200px;
}

#dice {
	margin:auto;
    width: 200px;
    height: 200px;
    transform-style: preserve-3d;
    animation-fill-mode: forwards;
    -webkit-transform-style: preserve-3d;
    -webkit-animation-fill-mode: forwards;
}

.rotation1{animation: spin1 2s; -webkit-animation: spin1 2s;}
.rotation2{animation: spin2 2s; -webkit-animation: spin2 2s;}
.rotation3{animation: spin3 2s; -webkit-animation: spin3 2s;}
.rotation4{animation: spin4 2s; -webkit-animation: spin4 2s;}
.rotation5{animation: spin5 2s; -webkit-animation: spin5 2s;}
.rotation6{animation: spin6 2s; -webkit-animation: spin6 2s;}

.side {
    position: absolute;
    width: 200px;
    height: 200px;
    background: #fff;
    box-shadow:inset 0 0 40px #ccc;
    border-radius: 40px;
}
.side div{margin:auto; text-align:center;}

.side div a{margin-top:90px; display:inline-block;}

#dice .front  {transform: translateZ(100px); -webkit-transform: translateZ(100px);}
#dice .back {transform: rotateX(-180deg) translateZ(100px); -webkit-transform: rotateX(-180deg) translateZ(100px);}
#dice .right {transform: rotateY(90deg) translateZ(100px); -webkit-transform: rotateY(90deg) translateZ(100px);}
#dice .left {transform: rotateY(-90deg) translateZ(100px); -webkit-transform: rotateY(-90deg) translateZ(100px);}
#dice .top {transform: rotateX(90deg) translateZ(100px); -webkit-transform: rotateX(90deg) translateZ(100px);}
#dice .bottom {transform: rotateX(-90deg) translateZ(100px); -webkit-transform: rotateX(-90deg) translateZ(100px);}


</style>
<div id="wrapper" class='cdc'>
  <div id="platform" class='cible'>
    <div id="dice" onclick=rotation(this) >
<?php 
		$faces=array('front','top','back','bottom','right','left');
		$face=0;
		$cdc_jeux = $db->query('SELECT * FROM produits WHERE type="jeu" and cdc="TRUE" ORDER BY id DESC LIMIT 5;')->fetchAll();
	foreach($cdc_jeux as $donnee){
		echo "<div class='side ".$faces[$face]."'><div><h3>".html_entity_decode(stripslashes($donnee['titre']))."</h3><img src='../admin/".$donnee['photo']."' width=150 height=130></div></div>";
	$face++;
	}
?>
      <div class="side left"><div><a href='./'>Plus</a></div></div>
    </div>
  </div>
</div>
<script>
var num_rot=1;
function rotation(elem){
	if(num_rot<6){
		elem.className='rotation'+num_rot;
		num_rot++;
	}
}
</script>

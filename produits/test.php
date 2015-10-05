<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">
	
.classname {
animation-name: cssAnimation;
animation-duration:3s;
animation-iteration-count: 1;
animation-timing-function: ease;
animation-fill-mode: forwards;
}

@keyframes cssAnimation {
from {transform: rotate(0deg) scale(1) skew(0deg) translate(100px);}
to {transform: rotate(0deg) scale(2) skew(0deg) translate(100px);}
}

</style>
  <script type="text/javascript">
        function ani(){
            document.getElementById('img').className ='classname';
        }
  </script>
<title>Untitled Document</title>
</head>

<body>
<input name="" type="button" onclick="ani()" />
<img id="img" src="../images/de.png" width="328" height="328" />
</body>
</html>

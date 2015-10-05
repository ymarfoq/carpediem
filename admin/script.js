
function revelation(id,cacher){
	var elem=document.getElementById(id);
	if(cacher){
		var cache=document.getElementById('cache');
		cache.style.display='inline-block';
	}
	elem.style.display='inline-block';
}

function cachage(id,cacher){
	var elem=document.getElementById(id);
	if(cacher){
		var cache=document.getElementById('cache');
		cache.style.display='none';
	}
	elem.style.display='none';
}

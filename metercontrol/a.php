<!DOCTYPE html>
<html>
<head>
	<title>App</title>
	
</head>
<body>
<a href="#c" id="c" onclick="plc();">Click</a>
<div id="d"></div>




<script type="text/javascript">
	function pl(){
		var u=document.querySelector("#c");
		var ul=u.getAttribute("href");

		var c=confirm("ARE YOU SURE?");
		if (c===true) {
			window.location.href=ul;
		}else{
			window.location.href="a.php";
		}
	}

	function plc(){
		window.open('home.php','','top');
	}
</script>
</body>
</html>
<?php
    session_start();
    if ($_SESSION['status'] != 'authorized') {
        header("location: login.php");
    }
    
    if ($_POST){
        switch($_POST['action']) {
            case 'logout':
                $_SESSION['status'] = 'unauthorized';
                header("location:login.php");
            break;
            case 'profile':
            break;
        }
    }
?>

<!DOCTYPE html>
<html>
    <!--The <HEAD> designates some presets about the page-->
	<head>
	    
	    
	    <!--Page <TITLE> that appear in browser tab-->
		<title>@me | home</title>
		
		
		<!--Link to the CSS, where all of the elements are styled-->
		<!--<link rel = "stylesheet" type = "text/css" href = "assets/CSS/homeStyle.css">-->
		<link rel = "stylesheet" type = "text/css" href = "assets/CSS/navbar.css">
		
		
	</head>
	<body>
	    <div class = "navbar">
	        <div class = "navcontainer">
    	        <input class = "search navitem" placeholder = "search users"/>
    	        <a href ="#"><img  src = "assets/img/navimages/@.png" class = "logo navitem"></a>
    	        <a><img src = "assets/img/navimages/!circle.png" class = "notifications navitem"></a>
    	        <a><img src = "assets/img/navimages/friends.png" class = "friendReqs navitem"></a>
    	        <a><img src = "assets/img/navimages/profilecircle.png" class = "profile navitem"></a>
    	        <a><img src = "assets/img/navimages/settings.png" class = "settings navitem"></a>
    	        <div class = "settings-drop">
    	            <form method = "post" action = "index.php">
    	                <input type = "hidden" value = "logout" name = "action">
    	                <input type = "submit" name = "submit" value = "sign out" class = "logout">
    	            </form>
    	        </div>
	        </div>
	    </div>
	    <!--Links to the javascript code, and to the online version of jquery-->
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	    <script type="text/javascript" src="assets/JS/homescript.js"></script>
	</body>
</html>
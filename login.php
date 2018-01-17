<?php
session_start();
if ($_SESSION['status'] == 'authorized') {
    header("location: home.php");
}

//**FOR SIGN IN, VALIDATE EXISTING MEMBER
require_once 'classes/member.php';
$member = new member();

if($_POST) {
    switch($_POST['action']) {
        case 'signin': 
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $errormsg = $member->validate_user($_POST['email'], $_POST['password']);
            }
        break;
        case 'signup':
            //*******************
            if (!empty($_POST['first-name']) && !empty($_POST['last-name']) && !empty($_POST['email']) && !empty($_POST['password']) 
            && !empty($_POST['confirm-password']) && !empty($_POST['birthmonth']) && !empty($_POST['birthday']) 
            && !empty($_POST['birthyear']) && !empty($_POST['gender'])) {
            //*************************************************************
                $errormsg2 = $member->create_user($_POST['first-name'], $_POST['last-name'], $_POST['email'], $_POST['password'], $_POST['birthmonth'], $_POST['birthday'], $_POST['birthyear'], $_POST['gender']);
            }
        break;
    }
}

/*
if($_POST && !empty($_POST['email']) && !empty($_POST['password']))   {
    $response = $member->validate_user($_POST['email'], $_POST['password']);
}
*/

?>
<!DOCTYPE html>
<html>
    <!--The <HEAD> designates some presets about the page-->
	<head>
	    
	    
	    <!--Page <TITLE> that appear in browser tab-->
		<title>@me | login</title>
		
		
		<!--Link to the CSS, where all of the elements are styled-->
		<link rel = "stylesheet" type = "text/css" href = "assets/CSS/loginStyle.css">
		
		
	</head>
	
	
	<!--The <BODY> is where all of the content on the page is coded-->
	<body>
	    
	    
	    <!--This is the top bar-->
		<div class = "login-bar">@</div>
		

        <!--This is the rest of the page-->
		<div class = "login-content">
		    
		    
		    <!--This Whole Left Side is for Signing Up New Users-->
			<div class = "left-side">
				<div class = "login-title">
					sign up.
				</div>
				
				
				<!--Sign Up Form, validated with Javascript-->
				<form method = "post" onsubmit = "return validateMySignUp();" action = "login.php" >
					<input class = "first-name border1" type = "text" name = "first-name" placeholder = "first name" onchange = "onChange(this)">
					<input class = "last-name border1" type = "text" name = "last-name" placeholder = "last name" onchange = "onChange(this)">
					<input class = "email border1" type = "text" name = "email" placeholder = "email" onchange = "onChange(this)">
					<input class = "password border1" type = "password" name = "password" placeholder = "password" onchange = "onChange(this)">
					<input class = "confirm-password border1" type = "password" name = "confirm-password" placeholder = "confirm password" onchange = "onChange(this)">
					<select class = "birthmonth border1" name = "birthmonth" onchange = "onChange(this)">
					    <option value = "none">birth month</option>
					    <option value = "01">jan</option>
					    <option value = "02">feb</option>
					    <option value = "03">mar</option>
					    <option value = "04">apr</option>
					    <option value = "05">may</option>
					    <option value = "06">jun</option>
					    <option value = "07">jul</option>
					    <option value = "08">aug</option>
					    <option value = "09">sep</option>
					    <option value = "10">oct</option>
					    <option value = "11">nov</option>
					    <option value = "12">dec</option>
					</select>
					<select class = "birthday border1" name = "birthday" onchange = "onChange(this)">
					    <option value = "none">birth day</option>
					    <option value = "01">01</option>
					    <option value = "02">02</option>
					    <option value = "03">03</option>
					    <option value = "04">04</option>
					    <option value = "05">05</option>
					    <option value = "06">06</option>
					    <option value = "07">07</option>
					    <option value = "08">08</option>
					    <option value = "09">09</option>
					    <option value = "10">10</option>
					    <option value = "11">11</option>
					    <option value = "12">12</option>
					    <option value = "13">13</option>
					    <option value = "14">14</option>
					    <option value = "15">15</option>
					    <option value = "16">16</option>
					    <option value = "17">17</option>
					    <option value = "18">18</option>
					    <option value = "19">19</option>
					    <option value = "20">20</option>
					    <option value = "21">21</option>
					    <option value = "22">22</option>
					    <option value = "23">23</option>
					    <option value = "24">24</option>
					    <option value = "25">25</option>
					    <option value = "26">26</option>
					    <option value = "27">27</option>
					    <option value = "28">28</option>
					    <option value = "29">29</option>
					    <option value = "30">30</option>
					    <option value = "31">31</option>
					</select>
					<select class = "birthyear border1" name = "birthyear" onchange = "onChange(this)">
					    <option value = "none">birth year</option>
					    <option value = "2017">2017</option>
					    <option value = "2016">2016</option>
					    <option value = "2015">2015</option>
					    <option value = "2014">2014</option>
					    <option value = "2013">2013</option>
					    <option value = "2012">2012</option>
					    <option value = "2011">2011</option>
					    <option value = "2010">2010</option>
					    <option value = "2009">2009</option>
					    <option value = "2008">2008</option>
					    <option value = "2007">2007</option>
					    <option value = "2006">2006</option>
					    <option value = "2005">2005</option>
					    <option value = "2004">2004</option>
					    <option value = "2003">2003</option>
					    <option value = "2002">2002</option>
					    <option value = "2001">2001</option>
					    <option value = "2000">2000</option>
					    <option value = "1999">1999</option>
					    <option value = "1998">1998</option>
					    <option value = "1997">1997</option>
					    <option value = "1996">1996</option>
					    <option value = "1995">1995</option>
					    <option value = "1994">1994</option>
					    <option value = "1993">1993</option>
					    <option value = "1992">1992</option>
					    <option value = "1991">1991</option>
					    <option value = "1990">1990</option>
					    <option value = "1989">1989</option>
					    <option value = "1988">1988</option>
					    <option value = "1987">1987</option>
					    <option value = "1986">1986</option>
					    <option value = "1985">1985</option>
					    <option value = "1984">1984</option>
					    <option value = "1983">1983</option>
					    <option value = "1982">1982</option>
					    <option value = "1981">1981</option>
					    <option value = "1980">1980</option>
					    <option value = "1979">1979</option>
					    <option value = "1978">1978</option>
					    <option value = "1977">1977</option>
					    <option value = "1976">1976</option>
					    <option value = "1975">1975</option>
					    <option value = "1974">1974</option>
					    <option value = "1973">1973</option>
					    <option value = "1972">1972</option>
					    <option value = "1971">1971</option>
					    <option value = "1970">1970</option>
					    <option value = "1969">1969</option>
					    <option value = "1968">1968</option>
					    <option value = "1967">1967</option>
					    <option value = "1966">1966</option>
					    <option value = "1965">1965</option>
					    <option value = "1964">1964</option>
					    <option value = "1963">1963</option>
					    <option value = "1962">1962</option>
					    <option value = "1961">1961</option>
					    <option value = "1960">1960</option>
					    <option value = "1959">1959</option>
					    <option value = "1958">1958</option>
					    <option value = "1957">1957</option>
					    <option value = "1956">1956</option>
					    <option value = "1955">1955</option>
					    <option value = "1954">1954</option>
					    <option value = "1953">1953</option>
					    <option value = "1952">1952</option>
					    <option value = "1951">1951</option>
					    <option value = "1950">1950</option>
					    <option value = "1949">1949</option>
					    <option value = "1948">1948</option>
					    <option value = "1947">1947</option>
					    <option value = "1946">1946</option>
					    <option value = "1945">1945</option>
					    <option value = "1944">1944</option>
					    <option value = "1943">1943</option>
					    <option value = "1942">1942</option>
					    <option value = "1941">1941</option>
					    <option value = "1940">1940</option>
					    <option value = "1939">1939</option>
					    <option value = "1938">1938</option>
					    <option value = "1937">1937</option>
					    <option value = "1936">1936</option>
					    <option value = "1935">1935</option>
					    <option value = "1934">1934</option>
					    <option value = "1933">1933</option>
					    <option value = "1932">1932</option>
					    <option value = "1931">1931</option>
					    <option value = "1930">1930</option>
					    <option value = "1929">1929</option>
					    <option value = "1928">1928</option>
					    <option value = "1927">1927</option>
					    <option value = "1926">1926</option>
					    <option value = "1925">1925</option>
					    <option value = "1924">1924</option>
					    <option value = "1923">1923</option>
					    <option value = "1922">1922</option>
					    <option value = "1921">1921</option>
					    <option value = "1920">1920</option>
					    <option value = "1919">1919</option>
					    <option value = "1918">1918</option>
					    <option value = "1917">1917</option>
					    <option value = "1916">1916</option>
					    <option value = "1915">1915</option>
					    <option value = "1914">1914</option>
					    <option value = "1913">1913</option>
					    <option value = "1912">1912</option>
					    <option value = "1911">1911</option>
					</select>
					<div class = "choices_box">
					    <div class = "butt gend border1" style = "clear:left;">female</div>
					    <div class = "butt gend border1">male</div>
					    <div class = "butt gend border1">nonbinary</div>
					</div>
					<input class = "gender" name = "gender" type = "text">
					<input type="hidden" name="action" value="signup">
    				<input type = "submit" value = "Join" class = "signUp border1">
				</form>
				<?php if(isset($errormsg2)) echo "<h4 class='alert'>" . $errormsg2 . "</h4>"; ?>
				
				
			</div>
			
			
            <!--This Whole Right Side is for Logging In Returning Users-->
			<div class = "right-side">
				<div class = "login-title">
					sign in.
				</div>
				
				
				<!--Login Form, validated with Javascript-->
				<form method="post" action="login.php"">
    				<input class = "email border1" type = "text" name = "email" placeholder = "email">
    				<input class = "password border1" type = "password" name = "password" placeholder = "password">
    				<input type="hidden" name="action" value="signin">
    				<input type = "submit" name = "submit" value = "Enter" class = "signIn border1">
				</form>
				<?php if(isset($errormsg)) echo "<h4 class='alert'>" . $errormsg . "</h4>"; ?>
			</div>
			
			
		</div>
		
		
	<!--Links to the javascript code, and to the online version of jquery-->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="assets/JS/loginscript.js"></script>
	</body>
</html>

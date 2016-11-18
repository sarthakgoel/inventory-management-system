<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login CRLInMS</title>
</head><!--xCThD2MspADaL9dj
sqNcdFv7HTEAtPjY-->
<style type="text/css">
body{background-image:url('white-abstract-wave.jpg');
}
h1{margin-top:150px;
font-family:"Prototype";}
h3{font-family:"Prototype";
font-size:24px;}
form{
width:480px;
height:450px;}
input{margin-top:30px;}
</style>
<body>
<h1 align="center">Welcome to CRL's Inventory</h1>
<h3 align="center">Login</h3>
<center><div style="background-image:url(formBG.png); width:490px; height:400px; background-repeat:no-repeat; background-position:center;">


<form name="f1" action="process.php" method="post" >
Username:  <input type="text" name="uname" maxlength="25" size="35"  autofocus><br>
Password: <input type="password" name="pass" maxlength="25" size="35"  ><br>
<input type="submit" name="login" value="Sign In" style="margin-right:70px;">
<input type="submit" name="Register" value="Sign Up" onclick="f1.action='add_user.html';return true;"></form>

</div>
</center>
</body>
</html>


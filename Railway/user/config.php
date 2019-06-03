<?php
include 'dbcon.php';
//$con=mysqli_connect("localhost","root","","store");
@session_start();



define("SITE_NAME","Quick Nest");
define("SITE_URL","http://localhost/Railway/");
define("FILE_PATH","user/");
define("FILE_UPLOAD_PATH", "photos/");




function IsLogin()
{
	if(isset($_SESSION["email"]))
	return true;
}
function CheckLogout()
{

//echo 'fxf';
	if(!IsLogin())
	{


	header("Location: ".SITE_URL."");
	exit;
	}
}
function CheckLogIn()
{
	if(IsLogin())
	{
	header("Location: ".SITE_URL.$_SESSION["PATH"]."");
	exit;
	}

}

function LogOut()
{
	unset($_SESSION["id"]);
	unset($_SESSION["PATH"]);
}





?>

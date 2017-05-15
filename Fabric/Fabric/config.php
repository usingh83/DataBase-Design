<?PHP

/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'accounts';
$con = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>
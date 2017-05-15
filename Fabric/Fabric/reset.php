<!doctype html>
<html>
<head>
<html lang="en" class="full"><head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
     <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
	
    <title>Reset Data</title>
</head>

<body>
<?PHP
//connection script
include('config.php');

//Read SQL Commands file for deleting data from tables

//disable Foreign Key checks
mysqli_query($con,'SET foreign_key_checks = 0');

$fileName="sqlcommands/resettables.sql";
//$fileName="sqlcommands/deletetables.sql";
//$fileName="sqlcommands/createtables.sql";
$fileContent = file_get_contents($fileName);
$fileCommands = explode(";", $fileContent);

//execute SQL Commands
for ($i=0; $i<sizeof($fileCommands)-1;$i++)
{
	if (!mysqli_query($con,$fileCommands[$i])) 
	{
	  echo "Error creating table: " . mysqli_error($con);
	}
	
	$result = mysqli_query($con, $fileCommands[$i]);
}


//Enable Foreign Key checks
mysqli_query($con,'SET foreign_key_checks = 1');

//redirect to insertdata.php to insert default data
header("Location: insertdata.php");
?>







</body>
</html>
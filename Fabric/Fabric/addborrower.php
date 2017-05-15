<!DOCTYPE html>


<html lang="en"class="other-pages-background">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
     <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
	
    <title>Check In Book</title>
</head>


<body>
<!-- NAVIGATION BAR -->
<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
       <div class="navbar-header">
            <a href="index.php" class="navbar-brand">Eugene McDermott Library</a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="searchbooks.php">Search Books</a></li>
                <li><a href="bookloans.php">Book Loans</a></li>
                <li class="active"><a href="addborrower.php">Manage Borrowers</a></li>
                <li><a href="fines.php">Fines</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- NAVIGATION BAR -->




<br>
	<h1 style="color:#F60; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; font-weight:700; font-size:55px; text-align:center">ADD BORROWER</h1><br><br>

<?php
if(!isset($_GET['fName']) && !isset($_GET['lName']) && !isset($_GET['address']) && !isset($_GET['phone'])){//GET Request not set. So user has to enter information.
?>


<!-- ADD BORROWER FORM -->
    <form class="form-horizontal" action="addborrower.php" method="get">
     <p style="color:#F60; font-size:18px; font-weight:bold; text-align:left; margin-left:5%; font-style:italic">Enter the following information to register new borrower</p>
        <div class="form-group">
            <label for="fName" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">First Name *</label>
            <div class="col-xs-10">
                <input type="text" id="fName" class="form-control" name="fName" placeholder="Enter First Name....." style="max-width:1000px; font-weight:bold">
            </div>
        </div>
        <div class="form-group">
            <label for="lName" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Last Name *</label>
            <div class="col-xs-10">
                <input type="text" id="lName" class="form-control" name="lName" placeholder="Enter Last name....." style="max-width:1000px; font-weight:bold">
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Address *</label>
            <div class="col-xs-10">
                <input type="text" id="address" class="form-control" name="address" placeholder="Enter Address....." style="max-width:1000px; font-weight:bold">
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Phone No.</label>
            <div class="col-xs-10">
                <input type="text" id="phone" class="form-control" name="phone" placeholder="Enter Phone Number....." style="max-width:1000px; font-weight:bold">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button type="submit" class="btn btn-primary" style="color:#FFF; background:#F60">Register</button>
            </div>
        </div>
    </form>	

<!-- ADD BORROWER FORM -->
<?php
}//Closing bracket for: GET Request not set. So user has to enter information.
else{//GET Request is true. So user has entered information.
	include('config.php');
	if (isset($_GET['fName']))
		$fName=$_GET['fName'];
	else
		$fName='';
		
	if (isset($_GET['lName']))
		$lName=$_GET['lName'];
	else
		$lName='';
		
	if (isset($_GET['address']))
		$address=$_GET['address'];
	else
		$address='';
	
	if (isset($_GET['phone']))
		$phone=$_GET['phone'];
	else
		$phone='';
		
	if ($fName=='' || $lName=='' || $address==''){//Some information is missing. So cant insert new borrower's record
?>

        <form class="form-horizontal" action="addborrower.php" method="get">
            <div class="form-group">
                <label for="fName" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">First Name</label>
                <div class="col-xs-10">
                    <input type="text" id="fName" class="form-control" name="fName" placeholder="Enter First Name....." style="max-width:1000px; font-weight:bold" value="<?php echo $fName;?>">
                </div>
<?php
		if($fName==''){//First Name not entered by user
?>
					<p style="font-weight:bold; color:#F00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Enter borrower's first name</p>
<?php
}//Closing bracket for: First Name not entered by user
?>
            </div>
            <div class="form-group">
                <label for="lName" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Last Name</label>
                <div class="col-xs-10">
                    <input type="text" id="lName" class="form-control" name="lName" placeholder="Enter Last name....." style="max-width:1000px; font-weight:bold" value="<?php echo $lName;?>">
                </div>
<?php
		if($lName==''){//First Name not entered by user
?>
					<p style="font-weight:bold; color:#F00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Enter borrower's last name</p>
<?php
}//Closing bracket for: First Name not entered by user
?>
            </div>
            <div class="form-group">
                <label for="address" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Address</label>
                <div class="col-xs-10">
                    <input type="text" id="address" class="form-control" name="address" placeholder="Enter Address....." style="max-width:1000px; font-weight:bold" value="<?php echo $address;?>">
                </div>
<?php
		if($address==''){//First Name not entered by user
?>
					<p style="font-weight:bold; color:#F00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Enter borrower's address</p>
<?php
}//Closing bracket for: First Name not entered by user
?>
            </div>
            <div class="form-group">
                <label for="phone" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Phone No.</label>
                <div class="col-xs-10">
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="Enter Phone Number....." style="max-width:1000px; font-weight:bold" value="<?php echo $phone;?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button type="submit" class="btn btn-primary" style="color:#FFF; background:#F60">Register</button>
                </div>
            </div>

        </form>	


<?php
	}//Closing bracket for: Some information is missing. So cant insert new borrower's record
	
	else{//User has entered all the information
		
		//check if this new borrower has a library card
		$query = "SELECT 1 FROM BORROWER WHERE Fname=\"" . $fName . "\" AND Lname=\"" . $lName . "\" AND Address=\"" . $address . "\"";
		$res = mysqli_query($con,$query);
		if($res == FALSE) {
?>
		<p style="color:#F60; font-size:18px; font-weight:bold; text-align:left; margin-left:5%; font-style:italic">Failed to query database. Please try again.</p>
<?php
			die(mysql_error()); // TODO: better error handling
		}
		$rowCount = mysqli_num_rows($res);
		if($rowCount==1){//New borrower already has a library card
?>
			<form class="form-horizontal" action="addborrower.php" method="get">
            	<p style="color:#F60; font-size:18px; font-weight:bold; text-align:left; margin-left:5%; font-style:italic">This user already exists. One person can't have multiple library cards. Kindly check if you have entered wrong information.</p>
                <div class="form-group">
                    <label for="fName" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">First Name</label>
                    <div class="col-xs-10">
                        <input type="text" id="fName" class="form-control" name="fName" placeholder="Enter First Name....." style="max-width:1000px; font-weight:bold" value="<?php echo $fName?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lName" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Last Name</label>
                    <div class="col-xs-10">
                        <input type="text" id="lName" class="form-control" name="lName" placeholder="Enter Last name....." style="max-width:1000px; font-weight:bold" value="<?php echo $lName?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Address</label>
                    <div class="col-xs-10">
                        <input type="text" id="address" class="form-control" name="address" placeholder="Enter Address....." style="max-width:1000px; font-weight:bold" value="<?php echo $address?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Phone No.</label>
                    <div class="col-xs-10">
                        <input type="text" id="phone" class="form-control" name="phone" placeholder="Enter Phone Number....." style="max-width:1000px; font-weight:bold" value="<?php echo $phone?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary" style="color:#FFF; background:#090">Register</button>
                    </div>
                </div>
            </form>	
<?php
			
		}//Closing bracket for: New borrower already has a library card
		else{//New borrower doesnot have a library card
			//generate new Card No.
			$query="SELECT MAX(Card_no) FROM BORROWER";
			$res= mysqli_query($con,$query);
			$resArray=mysqli_fetch_array($res);
			$nextCardNo=$resArray['MAX(Card_no)']+1;
			
			$query="INSERT into BORROWER (Card_no, Fname, Lname, Address, Phone) Values(\"" . $nextCardNo . "\", \"" . $fName . "\", \"" . $lName . "\", \"" . $address . "\", \"" . $phone . "\")";
			$res=mysqli_query($con, $query);
			if(!$res){//Cound not run update query
?>
				<p style="color:#F60; font-size:18px; font-weight:bold; text-align:left; margin-left:5%; font-style:italic">Oops! The user could not be registered. Please try again.</p>
<?php
			}//Closing bracket for: Cound not run update query
			else{//user registered successfully
				$query="SELECT MAX(Card_no) FROM BORROWER";
				$res= mysqli_query($con,$query);
				if(!$res){//Select statement didnt execute
					die(mysql_error()); // TODO: better error handling
				}//Closing bracket for: Select statement didnt execute
				$resArray=mysqli_fetch_array($res);
				$cardNo=$resArray['MAX(Card_no)'];
				$query="Select * from BORROWER WHERE Card_no=\"" . $cardNo . "\"";
				$res=mysqli_query($con, $query);
				$resArray=mysqli_fetch_array($res);
?>
			<p style="color:#F60; font-size:18px; font-weight:bold; text-align:left; margin-left:5%;"><i>Congrats!</i> You are now a member of this library. You can checkout AT MOST 3 books at any time. All books are checked out for 14 days.</p>
            <table class="table table-center-align" style="color:#000; background:#999; max-width:1200px;">
        <caption class="text-left" style="color:#F60; font-style:italic; font-weight:bold; font-size:20px">Registration Details:</caption>  
    			<thead>
                    <tr>
                        <th>Card No.</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone No.</th>
                    </tr>
        		</thead>
       		 <tbody>
             
             		<tr>
            			<td><?php echo $resArray['Card_no']; ?></td>
                        <td><?php echo $resArray['Fname'] . " " . $resArray['Lname']; ?></td>
                        <td><?php echo $resArray['Address']; ?></td>
                        <td><?php echo $resArray['Phone']; ?></td>
                    </tr>
             
            </tbody>
            </table>
            
<?php
			}//Closing bracket for: user registered successfully
		
		}//Closing bracket for: New borrower doesnot have a library card
	}//Closing bracket for: User has entered all the information
		
}//Closing bracket for: GET Request is true. So user has entered information.
?>








</body>
</html>
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
                <li><a href="addborrower.php">Manage Borrowers</a></li>
                <li class="active"><a href="fines.php">Fines</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- NAVIGATION BAR -->

<?php
if (isset($_GET['cardNo']))
	$cardNo=$_GET['cardNo'];
else
	$cardNo='';
		
	



?>


<br>
	<h1 style="color:#FFF; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; font-weight:700; font-size:55px; text-align:center">VIEW AND PAY FINES</h1><br><br>


	<form class="form-horizontal" action="fines.php" method="get">
    	<p style="color:#FFF; font-size:18px; font-weight:bold; text-align:left; margin-left:5%; font-style:italic">Enter the card No.</p>
        <div class="form-group">
            <label for="cardNo" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Card No.</label>
            <div class="col-xs-10">
                <input type="text" id="cardNo" class="form-control" name="cardNo" placeholder="Enter Card No....." style="max-width:1000px; font-weight:bold" value="<?php echo $cardNo?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button type="submit" class="btn btn-primary" style="color:#000; background:#FFF">Search</button>
            </div>
        </div>
    </form>	


<?php

if (isset($_GET['cardNo']) && !isset($_GET['pay'])){//card no. is set
	$cardNo=$_GET['cardNo'];
	include('config.php');
	
	$query="SELECT SUM(FINES.Fine_amt) FROM FINES, BOOK_LOANS WHERE FINES.Loan_id=BOOK_LOANS.Loan_id AND FINES.Paid='0' AND BOOK_LOANS.Card_no =\"". $cardNo ."\"";
	$res=mysqli_query($con,$query);
	$resArray=mysqli_fetch_array($res);
	if($resArray['SUM(FINES.Fine_amt)']!=NULL){//fine exists for this user
		
?>
	<p style="color:#FFF; font-size:18px; font-weight:bold; text-align:left; margin-left:5%; font-style:italic">You have to pay $<?php echo $resArray['SUM(FINES.Fine_amt)'];?></p>
        <a href="fines.php?cardNo=<?php echo $cardNo;?>&pay=1" class="btn btn-primary" style="color:#000; background:#FFF; margin-left:5%">Pay Fine</a>
<?php
	
	}//closing bracket for: fine exists for this user
	else{
?>
	<p style="color:#FFF; font-size:18px; font-weight:bold; text-align:left; margin-left:5%; font-style:italic">No fines for this user.</p>
<?php
	}
	
}//closing bracket for: card no. is set
if (isset($_GET['cardNo']) && isset($_GET['pay'])){//pay fine
	$cardNo=$_GET['cardNo'];
	include('config.php');
	
	$query="SELECT COUNT(*) FROM BOOK_LOANS WHERE Card_no=\"" . $cardNo . "\" and Date_in='0000-00-00'";
	$res=mysqli_query($con, $query);
	$resArray=mysqli_fetch_array($res);
	if($resArray['COUNT(*)']>0){//user has not returned book
?>
	<p style="color:#FFF; font-size:18px; font-weight:bold; text-align:left; margin-left:5%; font-style:italic">User has not returned the book. So, can't pay fine.</p>
<?php			
	}//closing bracket for: user has returned book
	else{//pay fine
		$query="UPDATE FINES SET PAID=1 WHERE LOAN_ID IN (SELECT LOAN_ID FROM BOOK_LOANS WHERE Card_no=\"" . $cardNo. "\")";
		$res=mysqli_query($con, $query);
		if($res){
	?>
		<p style="color:#FFF; font-size:18px; font-weight:bold; text-align:left; margin-left:5%; font-style:italic">Fine Paid.</p>
	<?php	
		}
	}//closing bracket for: pay fine
}//closing bracket for: Pay fine

?>





</body>

<footer>
	<a id="reset" href="updatefines.php" class="btn btn-default btn-xs custom-button" style="background:#000; bottom:1%; position:absolute;color:#FFF; font-weight:bold">Update Fines</a>
</footer>
</html>
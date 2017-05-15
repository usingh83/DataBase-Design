<!DOCTYPE html>


<html lang="en"class="other-pages-background">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
     <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
	
    <title>Search Books</title>
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
                <li class="active"><a href="bookloans.php">Book Loans</a></li>
                <li><a href="addborrower.php">Manage Borrowers</a></li>
                <li><a href="fines.php">Fines</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- NAVIGATION BAR -->

<?php
	include('config.php');
	
	
	$query="SELECT * FROM FINES";
	$res=mysqli_query($con, $query);
	$finesArray = $res->fetch_all();
	
	//convert 2D $finesArray into 1D array
	$fineList[]="";
	$paidList[]="";
	foreach($finesArray as $fine){
		$fineList[]=$fine[0];
		$paidList[]=$fine[2];	
	}
	
	$query="SELECT * FROM BOOK_LOANS WHERE (DUE_Date<Date_in AND Date_in<>'0000-00-00') OR (Date_in='0000-00-00' AND Due_Date<\"" . date("Y/m/d") . "\")";
	$res=mysqli_query($con, $query);
	
	while($resArray=mysqli_fetch_array($res)){//loop through all results
			
			$dueDate= new DateTime($resArray['Due_date']);
			if($resArray['Date_in']=='0000-00-00'){//book not checked in	
				$currDate= new DateTime(date("Y/m/d"));
				$d=date_diff($dueDate,$currDate);
			}//closing bracket for: book not checked in
			else{//book checked in
				$currDate= new DateTime($resArray['Date_in']);
				$d=date_diff($dueDate,$currDate);
			}//closing bracket for: book checked in
			
			$e = $d->format("%R%a days");
			$d=explode("+", $e);
			$dayDiff=explode(" ", $d[1]);
			$dayDiff=$dayDiff[0];
						
		if(array_search($resArray['Loan_id'], $fineList) == FALSE){//Loan  ID does not exist in fines table
			$query="INSERT INTO FINES(Loan_id, Fine_amt, Paid) VALUES(\"" . $resArray['Loan_id'] . "\", \"" . $dayDiff * 0.25 . "\",\"0\")";
			$res1=mysqli_query($con, $query);
			if($res==FALSE)
			{
				die(mysql_error());
			}
			
		}//Closing bracket for: Loan  ID does not exist in fines table
		else{//Loan ID exists in fines table
			$index=array_search($resArray['Loan_id'], $fineList);
			if($paidList[$index]=='0'){//fine not paid
					$query="UPDATE FINES SET Fine_amt = \"" . $dayDiff * 0.25 . "\" WHERE Loan_id=\"" . $resArray['Loan_id'] . "\"";
					$res1=mysqli_query($con,$query);
			}//Closing bracket for: fine not paid
	
		}//Closing bracket for: Loan ID exists in fines table
	}//Closing bracket for: //loop through all results



?>



<?php
//View all fines group by card no.
if(!isset($_GET['filter'])){//Dont filter results by fine paid
	?><p style="color:#FF0; font-size:18px; font-weight:bold; text-align:left; margin-left:5%; margin-top:5%; font-style:italic">FINES TABLE UPDATED. Here is a list of all fines:  </p> <?php
	$query="SELECT BOOK_LOANS.Card_no, SUM(FINES.Fine_amt), Paid FROM FINES, BOOK_LOANS, BORROWER WHERE FINES.Loan_id=BOOK_LOANS.Loan_id AND BOOK_LOANS.Card_No=BORROWER.Card_No GROUP BY BOOK_LOANS.Card_no";
	$res=mysqli_query($con, $query);
?>
<a class="btn btn-primary " href="updatefines.php?filter=1" style="margin-left:75%" >Filter out paid results</a><br>
	<table class="table table-center-align" style="color:#000; background:#999; max-width:1200px;">
        
        <thead>
            <tr>
                <th>Card No.</th>
                <th>Fine</th>
                <th>Paid</th>
            </tr>
        </thead>
     	<tbody>
     
            	
	
	
<?php	
	
	while($resArray=mysqli_fetch_array($res)){//Loop through all results
?>		
		
			<tr>
                <td><?php echo $resArray['Card_no']; ?></td>
                <td><?php echo $resArray['SUM(FINES.Fine_amt)']; ?></td>
                
<?php
if($resArray['Paid']=='0')
	echo "<td>No</td>";
else
	echo "<td>Yes</td>";
?>
            </tr>
     
    	
<?php	
	}//Closing bracket for: Loop through all results
?>
		</tbody>
    </table>	
<?php

}//Closing bracket for: Dont filter results by fine paid

else{//filter results by fine paid
	?><p style="color:#FF0; font-size:18px; font-weight:bold; text-align:left; margin-left:5%; margin-top:5%; font-style:italic">Here is a list of all unpaid fines:  </p> <?php
	$query="SELECT BOOK_LOANS.Card_no, SUM(FINES.Fine_amt) FROM FINES, BOOK_LOANS, BORROWER WHERE FINES.Loan_id=BOOK_LOANS.Loan_id AND BOOK_LOANS.Card_No=BORROWER.Card_No AND FINES.PAID=\"0\" GROUP BY Card_no";
	echo $query;
	$res=mysqli_query($con, $query);
?>
	<table class="table table-center-align" style="color:#000; background:#999; max-width:1200px;">
        
        <thead>
            <tr>
                <th>Card No.</th>
                <th>Fine</th>
            </tr>
        </thead>
     	<tbody>
     
            	
	
	
<?php	
	
	while($resArray=mysqli_fetch_array($res)){//Loop through all results
?>		
		
			<tr>
                <td><?php echo $resArray['Card_no']; ?></td>
                <td><?php echo $resArray['SUM(FINES.Fine_amt)']; ?></td>
                
            </tr>
     
    	
<?php	
	}//Closing bracket for: Loop through all results
?>
		</tbody>
    </table>	

<?php

}//Closing bracket for: filter results by fine paid
//header("Location: fines.php");
?>




</body>
</html>
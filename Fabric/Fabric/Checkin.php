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
                <li class="active"><a href="bookloans.php">Book Loans</a></li>
                <li><a href="addborrower.php">Manage Borrowers</a></li>
                <li><a href="fines.php">Fines</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- NAVIGATION BAR -->




<br>
	<h1 style="color:#090; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; font-weight:700; font-size:55px; text-align:center">CHECK IN BOOK</h1><br><br>

<?php

//store GET request values in variables
	if (isset($_GET['bookID']))
		$bookID=$_GET['bookID'];
	else
		$bookID='';
	
	if (isset($_GET['branchID']))
		$branchID=$_GET['branchID'];
	else
		$branchID='';
	
	if (isset($_GET['cardNo']))
		$cardNo=$_GET['cardNo'];
	else
		$cardNo='';
		
	if (isset($_GET['bookName']))
		$bookName=$_GET['bookName'];
	else
		$bookName='';
		
	if (isset($_GET['borrowerName']))
		$borrowerName=$_GET['borrowerName'];
	else
		$borrowerName='';
	
	if (isset($_GET['loanID']))
		$loanID=$_GET['loanID'];
	else
		$loanID='';
	
	if (!isset($_GET['loanID'])){//loan ID GET Request is false	
	?>
    
        <form class="form-horizontal" action="checkin.php" method="get">
            <div class="form-group">
                <label for="cardNo" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Card No.</label>
                <div class="col-xs-10">
                    <input type="text" id="cardNo" class="form-control" name="cardNo" placeholder="Enter Card No....." style="max-width:1000px; font-weight:bold" value="<?php echo $cardNo?>">
                </div>
            </div>
            <div class="form-group">
                <label for="borrowerName" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Borrower Name</label>
                <div class="col-xs-10">
                    <input type="text" id="borrowerName" class="form-control" name="borrowerName" placeholder="Enter Borrower's name....." style="max-width:1000px; font-weight:bold" value="<?php echo $borrowerName?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bookID" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Book ID</label>
                <div class="col-xs-10">
                    <input type="text" id="bookID" class="form-control" name="bookID" placeholder="Enter Book ID....." style="max-width:1000px; font-weight:bold" value="<?php echo $bookID?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bookName" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Book Name</label>
                <div class="col-xs-10">
                    <input type="text" id="bookName" class="form-control" name="bookName" placeholder="Enter Book ID....." style="max-width:1000px; font-weight:bold" value="<?php echo $bookName?>">
                </div>
            </div>
            <div class="form-group">
                <label for="branchID" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Branch ID</label>
                <div class="col-xs-10">
                    <input type="text" id="branchID" class="form-control" name="branchID" placeholder="Enter Branch ID....." style="max-width:1000px; font-weight:bold" value="<?php echo $branchID?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button type="submit" class="btn btn-primary" style="color:#FFF; background:#090">Search Loan Record</button>
                </div>
            </div>
        </form>	
        
        
        
        <?php
        
        include('config.php');
        if (isset($_GET['bookID']) || isset($_GET['branchID']) || isset($_GET['cardNo'])){//If any GET request is true
        
            $query= "SELECT * from BOOK, BOOK_AUTHORS, BORROWER, BOOK_LOANS WHERE BOOK.Book_id = BOOK_LOANS.Book_id AND BOOK.Book_id = BOOK_AUTHORS.Book_id AND BORROWER.Card_no = BOOK_LOANS.Card_no AND BOOK_LOANS.Date_in = \"0000-00-00\" AND BOOK_LOANS.Card_no LIKE \"%". $cardNo . "%\" AND concat(BORROWER.Fname, ' ', BORROWER.Lname) LIKE \"%" . $borrowerName . "%\" AND BOOK.Book_id LIKE \"%" . $bookID . "%\" AND  Book.Title LIKE \"%" . $bookName . "%\" AND BOOK_LOANS.Branch_id LIKE \"%" . $branchID . "%\"" ;
            $res= mysqli_query($con,$query);
            $rowCount = mysqli_num_rows($res);
            
            if($rowCount>0){//there are some results for the query
            
                ?>
                <table class="table table-center-align" style="color:#000; background:#999; max-width:1200px;">
                    <caption class="text-right" style="color:#C00; font-style:italic; font-weight:bold; font-size:20px"><?php echo $rowCount;?> Results</caption>  
                <thead>
                        <tr>
                            <th>Loan ID</th>
                            <th>Branch ID</th>
                            <th>Card No.</th>
                            <th>Borrower Name</th>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Checkout Date</th>
                            <th>Due Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>       
            
                        <?php	
                while($resArray=mysqli_fetch_array($res)){
                        ?>
                    <tr>
                        <td><?php echo $resArray['Loan_id']; ?></td>
                        <td><?php echo $resArray['Branch_id']; ?></td>
                        <td><?php echo $resArray['Card_no']; ?></td>
                        <td><?php echo $resArray['Fname']. " " . $resArray['Lname']  ?></td>
                        <td><?php echo $resArray['Book_id']; ?></td>
                        <td><?php echo $resArray['Title']; ?></td>
                        <td><?php echo $resArray['Author_name']?></td>
                        <td><?php echo $resArray['Date_out']?></td>
                        <td><?php echo $resArray['Due_date']?></td>
                        <td>
                            <button type="button" id=" <?php echo $resArray['Loan_id']?> " class="btn btn-primary" style="background:#090;" data-loanID="<?php echo $resArray['Loan_id']; ?>" onClick="checkin(this.id)">Check In</button>
                        
                        <?php
                }
                        ?>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                        <?php
            }//closing bracket for: there are some results for the query
		}//Closing bracket for: If any GET request is true
	}//Closing bracket for: loan ID GET Request is false	
		else{//Loan ID GET Request is true
			include('config.php');
			$query="SELECT * FROM BOOK_LOANS, BOOK, BOOK_AUTHORS WHERE Loan_id = \"" . $loanID . "\"" ;
			$res= mysqli_query($con,$query);
			$resArray=mysqli_fetch_array($res);	
						?>
                        
                        <table class="table table-center-align" style="color:#000; background:#999; max-width:1200px;">
                <thead>
                        <tr>
                            <th>Loan ID</th>
                            <th>Card No.</th>
                            <th>Branch ID</th>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Checkout Date</th>
                            <th>Due Date</th>
                        </tr>
                </thead> 
                <tbody>       
                        <tr>
                            <td><?php echo $resArray['Loan_id']; ?></td>
                            <td><?php echo $resArray['Card_no']; ?></td>
                            <td><?php echo $resArray['Branch_id']; ?></td>
                            <td><?php echo $resArray['Book_id']; ?></td>
                            <td><?php echo $resArray['Title']; ?></td>
                            <td><?php echo $resArray['Author_name']?></td>
                            <td><?php echo $resArray['Date_out']?></td>
                            <td><?php echo $resArray['Due_date']?></td>
                        </tr>
                </tbody>
                </table> 
                <br>
                		<?php
			if($resArray['Date_in']=="0000-00-00"){//Book for this Loan_id hasn't been returned yet
				$query="UPDATE BOOK_LOANS SET DATE_IN = \"" .  date("Y/m/d") . "\" WHERE Loan_id = \"" . $loanID . "\"" ;
				echo $query;
				$res= mysqli_query($con,$query);
				
				if($res){//Update Query ran successfully
						?>
					<p style="color:#090; font-size:18px; font-weight:bold; text-align:center">The book has been successfully checked in. Thanks!&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a type="button" class="btn" style="background:#090; color:#FFF; font-weight:bold" href="checkin.php">Check In Another Book</a></p>
						<?php
				}//Closing bracket for: Update Query ran successfully
			}//Closing bracket for: Book for this Loan_id hasn't been returned yet
			else{//Book for this Loan_id has been returned
						?>
					<p style="color:#090; font-size:18px; font-weight:bold; text-align:center">Somebody has already checked in this book on <?php echo $resArray['Date_in']?>. Thanks!&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a type="button" class="btn" style="background:#090; color:#FFF; font-weight:bold" href="checkin.php">Check In Another Book</a></p>
						<?php
			}//Closing bracket for: Book for this Loan_id has been returned
		}//Closing bracket for: Loan ID GET Request is true
		
		
		


?>













<script>
	
function checkin(buttonID){
	var button = document.getElementById(buttonID);
	var loanID = button.getAttribute("data-loanID");
	window.location.href = "Checkin.php?loanID=" + loanID;
	
}

</script>








</body>

<footer>
	
</footer>

</html>
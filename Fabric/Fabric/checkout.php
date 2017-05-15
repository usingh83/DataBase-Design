<!DOCTYPE html>


<html lang="en"class="other-pages-background">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
     <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
	
    <title>Checkout Book</title>
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
	<h1 style="color:#090; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; font-weight:700; font-size:55px; text-align:center">CHECKOUT BOOK</h1><br><br>

<?php
//If GET request for bookID, Branch ID or Card_no is true, then show book loan form with pre-filled values
if (isset($_GET['bookID']) && isset($_GET['branchID']) && !isset($_GET['cardNo'])){
	if (isset($_GET['bookID']))
		$bookID=$_GET['bookID'];
	else
		$bookID='';
	
	if (isset($_GET['branchID']))
		$branchID=$_GET['branchID'];
	else
		$branchID='';
	?>

<!-- Pre-filled Book Search Form based on search-->
	<form class="form-horizontal" action="checkout.php" method="get">
    <p class="text-left" style="color:#090; font-style:italic; font-weight:bold; font-size:20px">Please enter your Card No. to checkout this book</p> 
        <div class="form-group">
            <label for="cardNo" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Card No.</label>
            <div class="col-xs-10">
                <input type="text" id="cardNo" class="form-control" name="cardNo" placeholder="Enter Card No....." style="max-width:1000px; font-weight:bold">
            </div>
        </div>
        <div class="form-group">
            <label for="bookID" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Book ID</label>
            <div class="col-xs-10">
                <input type="text" id="bookID" class="form-control" name="bookID" placeholder="Enter Book ID....." style="max-width:1000px; font-weight:bold" value="<?php echo $bookID?>">
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
                <button type="submit" class="btn btn-primary" style="color:#FFF; background:#090">Check Out</button>
            </div>
        </div>
    </form>	
<!-- Pre-filled Book Search Form based on search-->	

<?php
}//Closing bracket for: If GET request for bookID, Branch ID or Card_no is true, then show book loan form with pre-filled values

//if all GET requests are true
elseif(isset($_GET['bookID']) && isset($_GET['branchID']) && isset($_GET['cardNo'])){
	
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
?>

<!-- Pre-filled Book Search Form based on search-->
	<form class="form-horizontal" action="checkout.php" method="get">
       <div class="form-group">
            <label for="cardNo" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Card No.</label>
            <div class="col-xs-10">
                <input type="text" id="cardNo" class="form-control" name="cardNo" placeholder="Enter Card No....." style="max-width:1000px; font-weight:bold" value="<?php echo $cardNo?>">
            </div>
            		<?php   
						//check if Card No. is valid
						include('config.php');
						$query= "SELECT 1 from BORROWER WHERE Card_no='" . $cardNo . "'";
						$res3= mysqli_query($con,$query);
						if (mysqli_num_rows($res3) == 0) { 
							?>
								<p style="font-weight:bold; color:#F00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Incorrect Card Number. Kindly check!</p>
							<?php	
						}
						
                    ?>
        </div>
        <div class="form-group">
            <label for="bookID" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Book ID</label>
            <div class="col-xs-10">
                <input type="text" id="bookID" class="form-control" name="bookID" placeholder="Enter Book ID....." style="max-width:1000px; font-weight:bold" value="<?php echo $bookID?>">
            </div>
					<?php   
						//check if Book ID is valid
						include('config.php');
						$query= "SELECT 1 from BOOK_COPIES WHERE Book_id='" . $bookID . "'";
						$res1= mysqli_query($con,$query);
						if (mysqli_num_rows($res1) == 0) { 
							?>
								<p style="font-weight:bold; color:#F00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Incorrect Book ID. Kindly check!</p>
							<?php	
						}
                    ?>
        </div>
        <div class="form-group">
            <label for="branchID" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Branch ID</label>
            <div class="col-xs-10">
                <input type="text" id="branchID" class="form-control" name="branchID" placeholder="Enter Branch ID....." style="max-width:1000px; font-weight:bold" value="<?php echo $branchID?>">
            </div>
            		<?php   
						//check if Branch ID is valid
						include('config.php');
						$query= "SELECT 1 from LIBRARY_BRANCH WHERE Branch_id='" . $branchID . "'";
						$res2= mysqli_query($con,$query);
						if (mysqli_num_rows($res2) == 0) { 
							?>
								<p style="font-weight:bold; color:#F00">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Incorrect Branch ID. Kindly check!</p>
							<?php	
						}
                    ?>
        </div>
        <?php
			//show Checkout button if bookID/branchID/CardNo. is wrong
			if(mysqli_num_rows($res1) == 0 || mysqli_num_rows($res2) == 0 || mysqli_num_rows($res3) == 0){
				?>
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary" style="background:#090">Check Out</button>
                    </div>
                </div>
    			<?php
			}
			else{//this means bookID, branchID and CardNo. entered is correct
				
				$query= "SELECT * FROM BOOK_LOANS, BOOK, BOOK_AUTHORS WHERE BOOK_LOANS.Book_id = BOOK.Book_id AND BOOK.Book_id=BOOK_AUTHORS.Book_id AND Card_no = '" . $cardNo . "' AND Date_in = '0000-00-00'";
				$res4= mysqli_query($con,$query);
							$checkout='0';
					//check if this user has unpaid fines
							$query="SELECT * FROM BOOK_LOANS, FINES WHERE BOOK_LOANS.Loan_id=FINES.Loan_id AND FINES.PAID=0";
							$result=mysqli_query($con, $query);
							$resArray = $result->fetch_all();
							$cardNoArray[]="";
							foreach($resArray as $res1){
								$cardNoArray[]=$res1[3];	
							}
					if(array_search($cardNo, $cardNoArray)!=FALSE){//user has unpaid fines
						?>
                        <p style="color:#F00; font-size:16px; font-weight:bold; font-style:italic; text-align:left; margin-left:10%">This has unpaid loans. Can't checkout books.&nbsp;&nbsp;<a type="button" class="btn" style="background:#090; color:#FFF; font-weight:bold" href="checkout.php">Checkout Another Book</a></p>			
                        <?php
					}//Closing bracket for: user has unpaid fines
					elseif (mysqli_num_rows($res4) == 3 ) { //this means user has already checked out maximum number of allowed books
							?>
                            <p style="color:#F00; font-size:16px; font-weight:bold; font-style:italic; text-align:center">This user has already checked out maximum number of allowed books.&nbsp;&nbsp;<a type="button" class="btn" style="background:#090; color:#FFF; font-weight:bold" href="checkout.php">Checkout Another Book</a></p>
							  <table class="table table-center-align" style="color:#000; background:#999; max-width:1200px;">
                                <caption class="text-left" style="color:#FFF; font-weight:bold; font-size:20px">List of books this user has checked out:</caption>  
                                <thead>
                                    <tr>
                                        <th>Loan ID</th>
                                        <th>Branch ID</th>
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
                            while($resArray=mysqli_fetch_array($res4))
                            {
                        ?>
                                <tr>
                                    <td><?php echo $resArray['Loan_id']; ?></td>
                                    <td><?php echo $resArray['Branch_id']; ?></td>
                                    <td><?php echo $resArray['Book_id']; ?></td>
                                    <td><?php echo $resArray['Title']; ?></td>
                                    <td><?php echo $resArray['Author_name']; ?></td>
                                    <td><?php echo $resArray['Date_out']; ?></td>
                                    <td><?php echo $resArray['Due_date']; ?></td>
                                    <td><button type="button" id=" <?php echo $resArray['Book_id'].$resArray['Branch_id'].$cardNo;?> " class="btn" data-bookID="<?php echo $resArray['Book_id']; ?>" data-branchID="<?php echo $resArray['Branch_id'];?>" data-cardNo="<?php echo $cardNo;?>" onClick="checkout(this.id)" style="background:#090; color:#FFF; font-weight:bold">Return Book</button></td>
                                </tr>
                        <?php   
                            }//closing bracket for while loop
                        ?>
                        
                                </tbody>
                            </table>			
		<?php
					}//Closing bracket for: this means user has already checked out maximum number of allowed books
					else{//this means user can checkout this book if it is available in this library
						
						//check if book is available in this library
						$query1 = "SELECT * FROM BOOK_LOANS WHERE Branch_id LIKE '" . $branchID . "' AND Book_id LIKE '" . $bookID . "' AND Date_in='0000-00-00'";
						$res1= mysqli_query($con,$query1);
						$checkedOutCount = mysqli_num_rows($res1);
						
						$query1 = "SELECT No_of_copies FROM BOOK_COPIES WHERE Branch_id LIKE '" . $branchID . "' AND Book_id LIKE '" . $bookID . "'";
						$res1= mysqli_query($con,$query1);
						$resArray=mysqli_fetch_array($res1);
						$totalBooks=$resArray['No_of_copies'];
						
						$remainingCount = $totalBooks - $checkedOutCount;
						
						if($remainingCount>0){//book is available in this library, so user can checkout this book
							$query="SELECT MAX(Loan_id) FROM BOOK_LOANS";
							$res= mysqli_query($con,$query);
							$resArray=mysqli_fetch_array($res);
							$nextLoanID=$resArray['MAX(Loan_id)']+1;
							
							$query = "INSERT INTO BOOK_LOANS (Loan_id, Book_id, Branch_id, Card_no, Date_out, Due_date, Date_in) VALUES ('" . $nextLoanID . "', '" . $bookID . "', '" . $branchID . "', '" . $cardNo . "', '" . date("Y/m/d") . "', " . "DATE_ADD(Date_out, INTERVAL 14 DAY)" . ", '0000-00-00')"  ;
							$res= mysqli_query($con,$query);
							if($res){//Book is successfully checked out
							
							$query = "SELECT * FROM BOOK_LOANS WHERE Loan_id = \"" . $nextLoanID . "\"";
							$res= mysqli_query($con,$query);
							$resArray=mysqli_fetch_array($res);
								?>
								<p style="color:#090; font-size:18px; font-weight:bold; text-align:center">The book has been successfully checked out. Please return it back by <?php echo $resArray['Due_date'] ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a type="button" class="btn" style="background:#090; color:#FFF; font-weight:bold" href="checkout.php">Checkout Another Book</a></p>
								<?php	
							}//Closing bracket for: Book is successfully checked out
							else{//Book is not successfully checked out
								?>
								<p style="color:#F00; font-size:18px; font-weight:bold; text-align:center">The book could not be checked out due to some internal error. Please try again.
							
                            	<a type="button" class="btn" style="background:#090; color:#FFF; font-weight:bold" href="checkout.php">Checkout Another Book</a></p>
                            <?php
							}//closing bracket for: Book is not successfully checked out
						}//closing bracket for: book is available in this library, so user can checkout this book
						else{//book is not available in this library, so user cannot checkout this book
							?>
                            	<p style="color:#F00; font-size:18px; font-weight:bold; text-align:center">All copies of this book in this library have been checked out.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a type="button" class="btn" style="background:#F00; color:#FFF; font-weight:bold" href="searchbooks.php?bookID=<?php echo $bookID?>">Search in other libraries</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a type="button" class="btn" style="background:#090; color:#FFF; font-weight:bold" href="checkout.php">Checkout Another Book</a></p>
							<?php
                        }//closing bracket for: book is not available in this library, so user cannot checkout this book
						
						
					}//closing bracket for: this means user can checkout this book
					
			}//Closing bracket for: this means bookID, branchID and CardNo. entered is correct
				
			
		?>	
    </form>
	
    
    
	
<?php	
}//Closing bracket for: if all GET requests are true
else//No GET request is true
{
?>
<form class="form-horizontal" action="checkout.php" method="get">
   		<div class="form-group">
            <label for="cardNo" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Card No.</label>
            <div class="col-xs-10">
                <input type="text" id="cardNo" class="form-control" name="cardNo" placeholder="Enter Card No....." style="max-width:1000px; font-weight:bold">
            </div>
        </div>
        <div class="form-group">
            <label for="bookID" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Book ID</label>
            <div class="col-xs-10">
                <input type="text" id="bookID" class="form-control" name="bookID" placeholder="Enter Book ID....." style="max-width:1000px; font-weight:bold">
            </div>
        </div>
        <div class="form-group">
            <label for="branchID" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Branch ID</label>
            <div class="col-xs-10">
                <input type="text" id="branchID" class="form-control" name="branchID" placeholder="Enter Branch ID....." style="max-width:1000px; font-weight:bold">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button type="submit" class="btn btn-primary" style="color:#FFF; background:#090">Check Out</button>
            </div>
        </div>
    </form>	
    
<?php 
}//Closing bracket for: No GET request is true
?>
	
	
	
	
	
	
	
	
	









<!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	
	<script>
	function checkout(buttonID){
		var button=document.getElementById(buttonID);
		
		var bookID = button.getAttribute("data-bookID");
		var branchID = button.getAttribute("data-branchID");
		var cardNo = button.getAttribute("data-cardNo");
		
		window.location.href = 'checkin.php?bookID=' + bookID + '&branchID=' + branchID + '&cardNo=' + cardNo; 
	}
	</script>








</body>


<footer>
	
</footer>

</html>
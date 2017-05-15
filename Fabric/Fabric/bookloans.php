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
            <a href="index.php" class="navbar-brand">My Fabric Store</a>
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
	<h1 style="color:#090; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; font-weight:700; font-size:55px; text-align:center">Place Order</h1><br><br>

   
        <form class="form-horizontal" method="get">
            <div class="form-group">
                <label for="cardNo" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Card No.</label>
                <div class="col-xs-10">
                    <input type="text" id="cardNo" class="form-control" name="cardNo" placeholder="Enter Card No....." style="max-width:1000px; font-weight:bold" >
                </div>
            </div>
            <div class="form-group">
                <label for="borrowerName" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Borrower Name</label>
                <div class="col-xs-10">
                    <input type="text" id="borrowerName" class="form-control" name="borrowerName" placeholder="Enter Borrower's name....." style="max-width:1000px; font-weight:bold">
                </div>
            </div>
            <div class="form-group">
                <label for="bookID" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Book ID</label>
                <div class="col-xs-10">
                    <input type="text" id="bookID" class="form-control" name="bookID" placeholder="Enter Book ID....." style="max-width:1000px; font-weight:bold">
                </div>
            </div>
            <div class="form-group">
                <label for="bookName" class="control-label col-xs-2" style="color:#CCC; font-weight:bold; font-size:20px">Book Name</label>
                <div class="col-xs-10">
                    <input type="text" id="bookName" class="form-control" name="bookName" placeholder="Enter Book ID....." style="max-width:1000px; font-weight:bold">
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
                    <a class="btn btn-primary" style="color:#FFF; background:#090" onclick="checkin()">Checkin</a>
                    <a class="btn btn-primary" style="color:#FFF; background:#090" onclick="checkout()">Checkout</a>
                </div>
            </div>
        </form>	
 <script>
 function checkin()
 {
	 var a=document.getElementById("bookID");
	 var bookID=a.value;
	 
	 a=document.getElementById("bookName");
	 var bookName=a.value;
	 
	 a=document.getElementById("borrowerName");
	 var borrowerName=a.value;
	 
	 a=document.getElementById("branchID");
	 var branchID=a.value;
	 
	 a=document.getElementById("cardNo");
	 var cardNo=a.value;
	 
	 window.location='checkin.php?cardNo=' + cardNo + '&borrowerName=' + borrowerName + '&bookID=' + bookID + '&bookName=' + bookName + '&branchID=' + branchID;
 }
 
 function checkout()
 {
	 var a=document.getElementById("bookID");
	 var bookID=a.value;
	 
	 a=document.getElementById("branchID");
	 var branchID=a.value;
	 
	 a=document.getElementById("cardNo");
	 var cardNo=a.value;
	 
	 window.location='checkout.php?cardNo=' + cardNo + '&bookID=' + bookID + '&branchID=' + branchID;
 }
 </script>       
        
</body>
</html>
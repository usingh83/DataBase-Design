<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert Data</title>
</head>

<body>

<?PHP

//include configuration file
include('config.php');



//Parse csv file
function getFileData($Name){
	$Content = file_get_contents($Name);
	return $Content;
}

//insert data from 'book_authors.csv' into 'BOOK' table
function insertBookData(){
	include('config.php');
	$fileContent=getFileData('data/books_authors.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			$query="INSERT INTO BOOK (Book_id, Title) VALUES(" . "\"" . $tableData1[0] . "\",\"" . $tableData1[2] . "\")";
			if (!mysqli_query($con,$query)) 
				echo "Error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}

}

//insert data from 'book_authors.csv' into 'BOOK_AUTHORS' table
function insertBookAuthorsData(){
	include('config.php');
	$fileContent=getFileData('data/books_authors.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			if($tableData1[1]!=="Various" || $tableData1[1]=="The Beatles")
				$query="INSERT INTO BOOK_AUTHORS (Book_id, Author_name, Type) VALUES (" . "\"" . $tableData1[0] . "\",\"" . $tableData1[1]. "\",2)";
			else
				$query="INSERT INTO BOOK_AUTHORS (Book_id, Author_name, Type) VALUES (" . "\"" . $tableData1[0] . "\",\"" . $tableData1[1]. "\",1)";
			
			if (!mysqli_query($con,$query)) 
				echo "Error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}
}

//insert data from 'library_branch.csv' into 'LIBRARY_BRANCH' table
function insertLibraryBranchData(){
	include('config.php');
	$fileContent=getFileData('data/library_branch.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			$query="INSERT INTO LIBRARY_BRANCH (Branch_id, Branch_name, Address) VALUES (" . "\""  . $tableData1[0] . "\",\"" . $tableData1[1]."\",\"" . $tableData1[2] . "\")";
			if (!mysqli_query($con,$query)) 
				echo "Error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}
}

//insert data from 'book_copies.csv' into 'BOOK_COPIES' table
function insertBookCopiesData(){
	include('config.php');
	$fileContent=getFileData('data/book_copies.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			$query="INSERT INTO BOOK_COPIES(Book_id, Branch_id, No_of_copies) VALUES (" . "\""  . $tableData1[0] . "\",\"" . $tableData1[1] ."\",\"" . $tableData1[2]. "\")";
			if (!mysqli_query($con,$query)) 
				echo "Error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}
}

//insert data from 'borrowers.csv' into 'BORROWER' table
function insertBorrowerData(){
	include('config.php');
	$fileContent=getFileData('data/borrowers.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			$query="INSERT INTO BORROWER(Card_no, Fname, Lname, Address, Phone) VALUES (" . "\""  . $tableData1[0] . "\",\"" . $tableData1[1]. "\",\"" . $tableData1[2] . "\",\""  . $tableData1[3] . ", " . $tableData1[4] . $tableData1[5] . "\",\"" . $tableData1[6] . "\")";
			if (!mysqli_query($con,$query)) 
				echo "Error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}
}

//insert data from 'book_loans_data.csv' into 'BOOK_LOANS' table
function insertBookLoansData(){
	include('config.php');
	$fileContent=getFileData('data/book_loans_data_F14.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			$query="INSERT INTO BOOK_LOANS(Loan_id, Book_id, Branch_id, Card_no, Date_out, Due_date, Date_in) VALUES (" . "\""  . $tableData1[0] . "\",\"" . $tableData1[1]. "\",\"" . $tableData1[2] . "\",\""  . $tableData1[3] . "\",\"" . $tableData1[4] . "\",\"" . $tableData1[5] . "\",\"" . $tableData1[6] . "\")";
			if (!mysqli_query($con,$query)) 
				echo "Error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}
}

insertBookData();
insertBookAuthorsData();
insertLibraryBranchData();
insertBookCopiesData();
insertBorrowerData();
insertBookLoansData();

header("Location: index.php");
?>




</body>
</html>
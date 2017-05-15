

CREATE TABLE BOOK
(
    Book_id Varchar(10) NOT NULL PRIMARY KEY, 
    Title varchar(100) NOT NULL
);
    

CREATE TABLE BOOK_AUTHORS
(
    Book_id varchar(10) NOT NULL,
    Author_name varchar(100) NOT NULL,
    Type int NOT NULL,
    CONSTRAINT AuthorForeignKey FOREIGN KEY (Book_id) REFERENCES BOOK(BOOK_id),
    CONSTRAINT AuthorPrimaryKey PRIMARY KEY (Book_id, Author_name)
);



CREATE TABLE LIBRARY_BRANCH
(
    Branch_id varchar(10) NOT NULL PRIMARY KEY,
    Branch_name varchar(50) NOT NULL,
    Address varchar(50)
);


CREATE TABLE BOOK_COPIES
(
    Book_id varchar(10) NOT NULL,
    Branch_id varchar(10) NOT NULL,
    No_of_copies int NOT NULL,
    CONSTRAINT BookIDForeignKey FOREIGN KEY (Book_id) REFERENCES BOOK(BOOK_id),
    CONSTRAINT BranchIDForeignKey FOREIGN KEY (Branch_id) REFERENCES LIBRARY_BRANCH(Branch_id),
    CONSTRAINT BooksCopiesPrimaryKey PRIMARY KEY (Book_id, Branch_id)
);


CREATE TABLE BORROWER
(
    Card_no varchar(5) NOT NULL PRIMARY KEY,
    Fname varchar(25) NOT NULL,
    Lname varchar(25) NOT NULL,
    Address varchar(200) NOT NULL,
    Phone varchar(13),
    CONSTRAINT UniqueBorrower UNIQUE(Fname, Lname, Address)
);


CREATE TABLE BOOK_LOANS
(
    Loan_id int NOT NULL PRIMARY KEY,
    Book_id varchar(10) NOT NULL,
    Branch_id varchar(10) NOT NULL,
    Card_no varchar(5) NOT NULL,
    Date_out date NOT NULL,
    Due_date date NOT NULL,
    Date_in date NOT NULL,
    CONSTRAINT LoanBookID FOREIGN KEY (Book_id) REFERENCES BOOK(Book_id),
    CONSTRAINT LoanBranchID FOREIGN KEY (Branch_id) REFERENCES LIBRARY_BRANCH(Branch_id),
    CONSTRAINT LoanCardNo FOREIGN KEY (Card_no) REFERENCES BORROWER(Card_No)    
);


CREATE TABLE FINES
(
    Loan_id int NOT NULL PRIMARY KEY,
    Fine_amt DECIMAL(10,2) NOT NULL,
    Paid boolean NOT NULL,
    CONSTRAINT LoanID FOREIGN KEY (Loan_id) REFERENCES BOOK_LOANS(Loan_id)
);
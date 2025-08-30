<?php
session_start();
// These are the correct default settings for a local XAMPP server.
// --- HOSTINGER DATABASE CONNECTION ---
define('DB_SERVER','localhost'); 

// Replace with your full Hostinger database username
define('DB_USER','u783668098_nayrit'); 

// Replace with the password you created
define('DB_PASS' ,'Nayrit@1234'); 

// Replace with your full Hostinger database name
define('DB_NAME', 'u783668098_taskflow_db');
class DB_con
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}
//Data Insertion Function
	public function insert($todo)
	{
	// Corrected query now includes a default value for the 'checked' column
	$ret=mysqli_query($this->dbh,"insert into todolist(todo, checked) values('$todo', 0)");
	return $ret;
	}

	public function insertTrash()
	{
	$ret=mysqli_query($this->dbh,"insert into trash (trashName)
	select todo from todolist where id='" . $_GET["del"] . "'");
	return $ret;

	}

	public function insertTodo()
	{
    // Corrected query now provides a '0' for the 'checked' column upon restore.
	$ret=mysqli_query($this->dbh,"insert into todolist (todo, checked)
	select trashName, 0 from trash where id='" . $_GET["restore"] . "'");
	return $ret;

	}
	
	
//Data read Function
public function fetchdata()
	{
	$result=mysqli_query($this->dbh,"select * from todolist");
	return $result;
	}

	public function fetchdataTrash()
	{
	$result=mysqli_query($this->dbh,"select * from trash");
	return $result;
	}
//Data one record read Function
public function fetchonerecord($userid)
	{
	$oneresult=mysqli_query($this->dbh,"select * from todolist where id=$userid");
	return $oneresult;
	}
//Data updation Function
public function update($todo,$userid)
	{
	$updaterecord=mysqli_query($this->dbh,"update  todolist set todo='$todo'  where id='$userid' ");
	return $updaterecord;
	}
//Data Deletion function Function
public function delete($rid)
	{
	// $insertTotask = mysqli_query($this->dbh,"INSERT INTO trash(trashName) Values($task)");
	$deleterecord=mysqli_query($this->dbh,"delete from todolist where id=$rid");
	return $deleterecord;
	}
	public function deleteTrash($rid)
	{
	// $insertTotask = mysqli_query($this->dbh,"INSERT INTO trash(trashName) Values($task)");
	$deleterecord=mysqli_query($this->dbh,"delete from trash where id=$rid");
	return $deleterecord;
	}

}
?>
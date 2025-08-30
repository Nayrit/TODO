<body>
    <?php
    include("header.php");
?>
    <?php
// include database connection file
require_once('function.php');
// Object creation
$insertdata=new DB_con();
if(isset($_POST['insert']))
{
// Posted Values
$todo=$_POST['todo'];
//Function Calling
$sql=$insertdata->insert($todo);
if($sql)
{
// The success alert has been removed.
echo "<script>window.location.href='index.php'</script>";
}
else
{
// The failure alert has been removed.
echo "<script>window.location.href='index.php'</script>";
}
}
?>

</body>
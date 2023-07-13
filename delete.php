<?php
include "db_conn.php"
?>
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];

$query = "delete from `students` where `id` = $id";
$result = mysqli_query($conn,$query);

if(!$result){
    die("query Failed");
}
else{
    header('location:index.php?deleteMsg=Record Deleted');
}

}

?>
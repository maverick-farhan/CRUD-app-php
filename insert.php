<?php
include 'db_conn.php';
if(isset($_POST['add_students'])){
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $age = $_POST['age'];

    if($firstName=="" || empty($firstName) && $lastName=="" || empty($lastName) && $age="" || empty($age)){
        header('location:index.php?error=Fields can`t be empty.Please fill all fields!');
    }
    else{
        $query = "insert into students (first_name,last_name,age) 
        values ('$firstName','$lastName','$age')";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Query Failed".mysqli_error($mysql));
        }
        else{
            header('location:index.php?success=Data Added');
        }
    }
}
?>

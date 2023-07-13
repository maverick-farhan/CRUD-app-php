<?php
    include 'db_conn.php';
    include 'header.php';
?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "select * from `students` where `id`= '$id'"; 
    $result = mysqli_query($conn,$query);
       if(!$result){
        die("Query failed".mysqli_error($mysql));
       }
       else{
        $row = mysqli_fetch_assoc($result);
       }
    }
?>
<?php 
if(isset($_POST['update']))
{
    if(isset($_GET['id_new'])){
        $id= $_GET['id_new'];
    }  
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $age = $_POST['age'];   
    $query = "update `students` set `first_name`= '$fname',`last_name`='$lname',`age`='$age' where `id`='$id'";
    $result=mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed");
    }
        else{
            header('location:index.php?updateMsg=Successfully Updated');
            
        }
    }
?>

    <form action="update.php?id_new=<?php echo  $id;?>" method="POST">
        <div class="form-group">
            <label id="firstname">first name</label>
            <input type="text" name="firstname" id="firstname"class="form-control" value="<?php echo $row['first_name']?>"/><br />
        </div>
        <div class="form-group">
        <label id="lastname">last name</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $row['last_name']?>" /><br />
        </div>
        <div class="form-group">
            <label id="age">age</label>
            <input type="number" name="age" id="age" class="form-control" value="<?php echo $row['age']?>" />
        </div>
        <br />
    <input type="submit" name="update" value="Update" class="btn btn-success ps-5 pe-5"/>
    </form>
<?php  include 'footer.php';?>     
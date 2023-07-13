<?php include 'header.php' ;?>
<?php include 'db_conn.php' ; ?>
<div class="head-btn-wrapper">
    <h2 class="record-details">ALL RECORDS</h2>
    <button type="button" class="btn btn-dark btn-big btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addStudents">
        ADD STUDENTS
    </button>
</div>

<table class="table table-hover table-bordered table-striped table-dark">
    <thead>
    <tr>
        <th>ID</th>
        <th>FIRST NAME</th>
        <th>LAST NAME</th>
        <th>AGE</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
        <?php 
       $query = "select * from `students`"; 
       $result = mysqli_query($conn,$query);
       if(!$result){
        die("Query failed".mysqli_error($mysql));
       }
       else{
        while($row=mysqli_fetch_assoc($result)){ 
        ?>
             <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name'];?></td>
            <td><?php echo $row['last_name'] ?></td>
            <td><?php echo $row['age']?></td>
            <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php

        }
       }
        ?>
    </tbody>
   </table>

   <?php 
   if(isset($_GET['error'])){
    echo "<h6 class='error'>".$_GET['error']."</h6>";
   }
   if(isset($_GET['success'])){
    echo "<h6 class='success'>".$_GET['success']."</h6>";
   }
   if(isset($_GET['updateMsg'])){
    echo "<h6 class='success'>".$_GET['updateMsg']."</h6>";
   }
   if(isset($_GET['deleteMsg'])){
    echo "<h6 class='error'>".$_GET['deleteMsg']."</h6>";
   }
   ?>
    <form action="insert.php" method="POST">
    <div class="modal fade" id="addStudents" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label id="firstname">First name</label>
            <input type="text" name="firstname" id="firstname"class="form-control" /><br />
            <label id="lastname">Last name</label>
            <input type="text" name="lastname" id="lastname" class="form-control" /><br />
            <label id="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD" />
      </div>
    </div>
  </div>
</div>
</form>




<?php include('footer.php');?> 
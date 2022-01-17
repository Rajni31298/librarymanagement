<?php

$insert = false;
$delete = false;
$update = false;   


//Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

//Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

//Die if connection was not successful.
if(!$conn){
    die("Sorry we failed to connect: ".mysqli_connect_error());
}
if(isset($_GET['delete'])){
  $SNo = $_GET['delete'];
  //echo $SNo;
  $delete = true;
  $sql = "DELETE FROM `notes` WHERE `SNo.` = $SNo";
$results = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['snoEdit'])){
    //Update the record
 
    $SNO = $_POST["snoEdit"];
    $Title = $_POST["TitleEdit"];
  $Description =$_POST["DescriptionEdit"];

//SQL Query to be executed
$sql="UPDATE `notes` SET Title ='$Title', Description ='$Description'WHERE `notes`.`SNo.` = $SNO";

$result = mysqli_query($conn, $sql);
if($result){
  $update = true;
 }
  else{
        die('2'); 
    echo "We could not update the record successfully!";
  }
   // exit();
  }
  else{
     
    $Title = $_POST["Title"];
    $Description =$_POST["Description"];
    

  //SQL Query to be executed
  $sql = "INSERT INTO `notes` (`Title`, `Description`)
   VALUES ('$Title', '$Description');";
  $result1 = mysqli_query($conn, $sql);
  
  //Add a new trip in trip table into the database
  
  if($result1){
    
      echo "The record has been inserted  successfully!<br>";
  $insert = true;
    }
  else{
    
      echo "The record  was not inserted successfully because of this error --->".mysqli_error($conn);
  }
//exit();
}
  }
?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- <link rel ="stylesheet" href ="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src ="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script> -->

  <link rel = "stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src ="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <link rel ="stylesheet" href ="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <!-- <script src ="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script> -->
  
  <title>iNotes</title>
   </head>

<body>
<!-- Edit  modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
Edit Modal
</button> -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action = "/CRUD/Index.php" method = "POST">
      <div class="modal-body">
        
       
          <input type ="hidden" name = "snoEdit" id = "snoEdit">

      <div class= "form-group mb-3">
        <label for="title" class="form-label">Note Title</label>
        <input type="text" class="form-control" id="TitleEdit" name="TitleEdit" aria-describedby="emailHelp">

      </div>
      <!-- <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Note Description</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div> -->
      <div class="form-group">
        <lable for="desc">Note Description</lable>
        <textarea class="form-control" id="DescriptionEdit" name="DescriptionEdit" row="3"></textarea>
      </div>
      <br>
      <!-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
      <!-- <button type="submit" class="btn btn-primary">Update Note</button> -->
    <!-- </form> -->
      </div>
      <div class="modal-footer d-block mr-auto">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
</form>
    </div>
  </div>
</div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src = "/CRUD/logo.png"height="28px" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <!-- <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li> -->
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
          <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li> -->
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

<?php
if($insert){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your note has been inserted successfully!
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  <span aria-hidden = 'true'>&times;</span>
  </button>
</div>";
}
?>

<?php
if($update){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your note has been updated successfully!
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  <span aria-hidden = 'true'>&times;</span>
  </button>
</div>";
}
?>
<?php
if($delete){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your note has been deleted successfully!
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  <span aria-hidden = 'true'>&times;</span>
  </button>
</div>";
}
?>

  <div class="container my-4">
    <h2>Add a Note to iNotes App</h2>
    <form action = "/CRUD/Index.php" method = "POST">
      <div class="mb-3">
        <label for="title" class="form-label">Note Title</label>
        <input type="text" class="form-control" id="Title" name="Title" aria-describedby="emailHelp">

      </div>
      <!-- <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Note Description</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div> -->
      <div class="form-group">
        <lable for="desc">Note Description</lable>
        <textarea class="form-control" id="Description" name="Description" row="3"></textarea>
      </div>
      <br>
      <!-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
      <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
  </div>
  <div class="container my-4">
 <!-- //table -->
    <table class="table" id = "myTable">
      <thead>
        <tr>
          <th scope="col">SNo.</th>
          <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
          
        </tr>
      </thead>
      <tbody>
      <?php

$sql = "SELECT * FROM `notes`";
$result = mysqli_query($conn, $sql);
$no = 0;
while($row = mysqli_fetch_assoc($result)){
  $no = $no + 1;
     
  // echo var_dump($row);
//   echo "<tr>
//    <th scope='row'>".$row['SNo.']. "</th>
//   <td>".$row['Title']. "</td>
//   <td>".$row['Description']. "</td>
//   <td>Actions</td>
// </tr>";

echo "<tr>
<th scope='row'>".$no ."</th>
<td>".$row['Title']. "</td>
<td>".$row['Description']. "</td>

<td><button class = 'edit btn btn-sm btn-primary' id=".$row['SNo.']." >Edit</button> 
<button class = 'delete btn btn-sm btn-primary' id=d".$row['SNo.'].">Delete</button></td>
</tr>";
  // echo $row['SNo.']. ".Hello   "  .$row['Title'] ."   Description is   ".$row['Description'];
  }
?>
         </tbody>
    </table>
  </div>
  <hr>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>



    <script src ="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>






  <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    <script>
      edits = document.getElementsByClassName('edit');
      Array.from(edits).forEach((element)=>{
         element.addEventListener("click",(e)=>{
          console.log("edit ",);
       tr = e.target.parentNode.parentNode;
       Title = tr.getElementsByTagName("td")[0].innerText;
       Description = tr.getElementsByTagName("td")[1].innerText;
       console.log(Title,Description);
       TitleEdit.value = Title;
       DescriptionEdit.value = Description;
       snoEdit.value = e.target.id;
       console.log(e.target.id);
       $('#editModal').modal('toggle');
        })
      })
      


      deletes = document.getElementsByClassName('delete');
      Array.from(deletes).forEach((element)=>{
         element.addEventListener("click",(e)=>{
          console.log("edit ",);
          SNo =  e.target.id.substr(1,);
      
       if(confirm("Are you sure you want to delete this note!")){
         console.log("Yes");
         window.location = `/CRUD/Index.php?delete=${SNo}`;
         // TODO :Create a form and use post request to submit a form


       }
       else{
         console.log("No");
       }
        })
      })
        </script>




         
</body>

</html>
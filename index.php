<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      .container{
        width: 400px;
        border: 2px solid grey;
        padding: 10px;
        box-shadow: 0 0 .3px 5px grey;
      }
    </style>
  </head>
  
  <body>
  <nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Project
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<?php
include "config.php";

if(isset($_POST['add'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $sql="insert into login(email, pass) values('$email','$pass')";
    if($conn->query($sql)==TRUE){
        echo "Record Added";
    }else{
        echo "Error: ". $conn->error;
    }
    header('Location:form.php');
    exit();
}elseif(isset($_POST['delete'])){
  $del_id=$_POST['del_id'];

  $sql="DELETE from login WHERE sno=$del_id";

  if($conn->query($sql)==TRUE){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Record Deleted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  else{
    echo $conn->error;
  }
}
?>

<div class="container">
<form action="form.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="add" class="btn btn-primary">Add</button>
  <div class="operation">
  <label for="exampleInputEmail1" class="form-label">Enter ID to Delete:</label>
  <input type="text" name="del_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

  <button type="submit" name="delete" class="btn btn-primary">Delete</button>


  </div>

</form>
   
</div>
<div class="container">
<?php
echo "<br>";
$result=$conn->query("select * from login");
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo $row["sno"]." "."Email: ".$row["email"]." ->Pass: ".$row["pass"],"<br>";
    }
}
$conn->close();

?>


</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
  <title>New page</title>
</head>
<body>
  <div>
  Thank You ! ! !<br>
  Your Name : <?php echo $_POST["name"]; ?><br>
  Your Email : <?php echo $_POST["email"]; ?><br>
  Your Number : <?php echo $_POST["number"]; ?><br>
  <a href="list.php">Submited List</a>
  </div>
  <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "insert";

    $conn = mysqli_connect($server, $username, $password, $dbname);
    if(isset($_POST['submit'])){
      if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $number = $_POST["number"];

        $query = "insert into form(name, email, number) values('$name', '$email', '$number')";

        $run = mysqli_query($conn, $query) or die(mysqli_error());
        if ($run){
          echo "submited";
        }
        else{
          echo "not";
        }

      }
      else{
        echo "field required";
      }
    }
?>
</body>
</html>
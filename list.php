<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
  <title>List</title>
</head>
<body>
  <table cellspacing='3'>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Number</th>
    </tr>
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

          /* if($run){
              echo "submitted";
            }
            else{
              echo "not submitted";
            }*/
        }
        else{
          echo "field required";
        }
      }
      $sql = "SELECT * FROM form;";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck > 0){
        while ($row = $result-> fetch_assoc()){
          
            echo "
              <tr>
                <td>".$row["name"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["number"]."</td>
              </tr>";
        }
        echo "</table>";
      }
      else{
        echo "0 result";
      }
      $conn-> close();
    ?>
</body>
</html>



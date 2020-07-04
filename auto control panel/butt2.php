<?php session_start(); ?>
<!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<title>control panel</title>
<!--<link rel="stylesheet" type = "text/css" href = "style1.css"> -->

  </head>
  <?php
          session_start();

          $forwardv = $_POST['forward'];
          $rightv = $_POST['right'];
          $leftv = $_POST['left'];
          // Create connection
          $conn = mysqli_connect('localhost', 'root', '','remote_control');

          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $sql ="INSERT INTO task2 (forward,right1,left1)
          values('$forwardv','$rightv','$leftv')";


          if (isset($_POST['delete']))
          {
          $sql = "DELETE FROM task2 ";
          }


          if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
           header('location: autoControlPanel.php');
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }

          $sql = "SELECT id , forward , right1,left1 FROM task2";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                     if ($row["id"] == $last_id) {
                        $_SESSION["forward2"] = $row["forward"]; 
                        $_SESSION["right2"] = $row["right1"]; 
                        $_SESSION["left2"] = $row["left1"] ;
                     }
              }
            } else {
              echo "0 results";
}
         
          $conn->close();

?>

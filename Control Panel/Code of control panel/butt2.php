<?php session_start(); 
  
          

          $forwardv = $_POST['forward'];
          $rightv = $_POST['right'];
          $leftv = $_POST['left'];
          // Create connection
          $conn = mysqli_connect('localhost', 'root', '','remote_control');

          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $sql ="INSERT INTO auto_panel (forward,right1,left1)
          values('$forwardv','$rightv','$leftv')";


          if (isset($_POST['delete']))
          {
          $sql = "DELETE FROM auto_panel ";
          }


          if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
           header('location: autoControlPanel.php');
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }

          $sql = "SELECT id , forward , right1,left1 FROM auto_panel";
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

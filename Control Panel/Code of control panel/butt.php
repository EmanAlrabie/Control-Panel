
<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">

<title>control panel</title>

<link rel="stylesheet" type = "text/css" href = "ControlPanelStyle.css">


  </head>



  <?php
if (isset($_POST['stop']))
{
  echo" <center><p>Stop</p> </center>";
  $stopv='S';
  $forwardv=null;
  $backwardv=null;
  $rightv=null;
  $leftv=null;

}
if (isset($_POST['forwards']))
  {
    echo"  <center><p >Forwards</p></center>";
    $stopv=null;
  $forwardv= 'F';
  $backwardv=null;
  $rightv=null;
  $leftv=null; }
if (isset($_POST['backwards']))
    {
      echo"<center> <p >Backwards</p></center> ";
      $stopv=null;
  $forwardv=null;
  $backwardv='B';
  $rightv=null;
  $leftv=null; }

  if (isset($_POST['right']))
      {
        echo"<center><p > Right</p></center>";
       $stopv=null;
  $forwardv=null;
  $backwardv=null;
  $rightv='R';
  $leftv=null; }

    if (isset($_POST['left']))
        {
          echo" <center><p>Left</p></center> ";
        $stopv=null;
  $forwardv=null;
  $backwardv=null;
  $rightv=null;
  $leftv='L'; }
          // Create connection
   
          $conn = mysqli_connect('localhost', 'root', '','remote_control');

          // Check connection
          if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



         $sql ="INSERT INTO remote_control1(stop,backward ,forward,right1,left1)
          values('$stopv','$backwardv','$forwardv','$rightv','$leftv')";
          if ($conn->query($sql) ) {
            header('location: index.html');
          } 
          else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }

          $conn->close();

?>
<center>
  <br><br><br><br>
  <a href="index.html"> <button>Back</button></a>
    </html>

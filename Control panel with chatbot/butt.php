
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
  $stopv=1;
  $forwardv=0;
  $backwardv=0;
  $rightv=0;
  $leftv=0;

}
if (isset($_POST['forwards']))
  {
    echo"  <center><p >Forwards</p></center>";
    $stopv=0;
    $forwardv=1;
    $backwardv=0;
    $rightv=0;
    $leftv=0; }
if (isset($_POST['backwards']))
    {
      echo"<center> <p >Backwards</p></center> ";
      $stopv=0;
      $forwardv=0;
      $backwardv=1;
      $rightv=0;
      $leftv=0; }

  if (isset($_POST['right']))
      {
        echo"<center><p > Right</p></center>";
        $stopv=0;
        $forwardv=0;
        $backwardv=0;
        $rightv=1;
        $leftv=0; }

    if (isset($_POST['left']))
        {
          echo" <center><p>Left</p></center> ";
        $stopv=0;
        $forwardv=0;
        $backwardv=0;
        $rightv=0;
        $leftv=1; }
          // Create connection
          $conn = mysqli_connect('localhost', 'root', '','remote_control');

          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $sql ="insert into remote_control1(stop,backward ,forward,right1,left1)
          values('$stopv','$backwardv','$forwardv','$rightv','$leftv')";

          if ($conn->query($sql) === TRUE) {

          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }

          $conn->close();

?>
<center>
  <br><br><br><br>
  <a href="index.html"> <button>Back</button></a>
    </html>

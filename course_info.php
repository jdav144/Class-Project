<link rel="stylesheet" href="main.css" type="text/css">
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
session_start();  
if (!$_SESSION['student_id']){
    header("Location: Login.php");
    exit;
}
include("functions.php");
  $mysqli= dbconnect();

  if (isset($_POST['Enroll']))
{
 
   
   
   $sql = "INSERT INTO enrolled (course_id, student_id)
VALUES ('".$_POST['course_id']."','". $_SESSION['student_id']."')"; //concat

if ($mysqli->query($sql) === TRUE) {
  echo " You've succesfully registered.>"<br>;
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}



}

  
  
// Attempt select query execution
$sql = "SELECT * FROM course";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
               echo "<th></th>";
            echo "<th>Course ID</th>";
                echo "<th>Course Name</th>";
                echo "<th>Semester</th>";
                echo "<th>Instructor</th>";
                echo "<th>Classroom</th>";
                echo "<th>Time</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td><form method='post' action='course_info.php'>
        <input type='hidden' name='course_id' value='" . $row['course_id']. "'/> <input type='submit' value='Enroll' name='Enroll'/></form></td>";
            echo "<td>" . $row['course_id'] . "</td>";
                echo "<td>" . $row['course_name'] . "</td>";
                echo "<td>" . $row['semester'] . "</td>";
                echo "<td>" . $row['instructor'] . "</td>";
                 echo "<td>" . $row['classroom'] . "</td>";
                  echo "<td>" . $row['time'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>
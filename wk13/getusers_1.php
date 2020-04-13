<?php
$con=mysqli_connect("localhost","newuser","password","week14");
if (mysqli_connect_errno())
    echo "Not successfull to connect to MySQL: " . mysqli_connect_error();

if (isset($_GET["submit"])){
   $result=mysqli_query($con, "SELECT * FROM users WHERE firstname LIKE '" . $_GET['input'] . "' AND active LIKE 1"); 
    echo "<table border='1'>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
}
mysqli_close($con);

?>

<form method="GET">
    <input type=text name=input>
    <input type=submit name=submit value="submit">
</form>
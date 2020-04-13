<?php
    $con=mysqli_connect("localhost","newuser","password","week14");

    if (mysqli_connect_errno())
        echo "Not successfull to connect to MySQL: " . mysqli_connect_error();

    if (isset($_GET["submit"])) {
        $firstname = $_GET["input"];
        $active = 1;
        $sql = "SELECT * FROM users WHERE firstname LIKE ? AND active LIKE ?";
        $stmt = $con->prepare($sql); 
        $stmt->bind_param("si", $firstname, $active);
        $stmt->execute();
        $result = $stmt->get_result();

        echo "<table border='1'>
            <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            </tr>";

        while($row = $result->fetch_assoc())
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
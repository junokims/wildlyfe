<html>
<body>

<?php
if (isset($_POST['submit_form'])) {
    $someFieldToProject = $_POST['selected_field'];
    if (empty($someFieldToProject)) {
        echo "Name is empty";
    } else {
        echo $someFieldToProject;
        $dbconnect = mysqli_connect('localhost', 'root', 'root', 'wildlyfe')or die("initial host/db connection problem");


        $sql = "SELECT ".$someFieldToProject." FROM employee";

        $result = mysqli_query($dbconnect,$sql);
        
        echo "<table>";
        echo "<tr><th>$someFieldToProject</th></tr>";
        
        while($row = mysqli_fetch_array($result)) {
            echo "<tr><td style='width: 200px;'>".$row[$someFieldToProject]."</td></tr>";
        } 
        
        echo "</table>";
        mysqli_close($dbconnect);

    }

}

?>

</body>
</html>
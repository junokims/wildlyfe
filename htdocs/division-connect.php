<html>
<body>

<?php
if (isset($_POST['save'])) {

        $dbconnect = mysqli_connect('localhost', 'root', 'root', 'wildlyfe')or die("initial host/db connection problem");


        $sql = "SELECT name FROM visitorhascontactinformation V WHERE NOT EXISTS ((SELECT E.event_id FROM events E) EXCEPT (SELECT A.event_id FROM attends A WHERE A.visitor_id = V.visitor_id))";

        $result = mysqli_query($dbconnect,$sql);
        
        echo "<table>";
        echo "<tr><th>Names</th></tr>";
        
        while($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            echo "<tr><td style='width: 200px;'>".$name."</td></tr>";
        } 
        
        echo "</table>";
        mysqli_close($dbconnect);

    }
?>

</body>
</html>
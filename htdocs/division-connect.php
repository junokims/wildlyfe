<html>
<body>

<?php
if (isset($_POST['save'])) {

        $dbconnect = mysqli_connect('localhost', 'root', 'root', 'wildlyfe')or die("initial host/db connection problem");


        $sql = "SELECT Name FROM VisitorHasContactInformation V WHERE NOT EXISTS ((SELECT E.Event_ID FROM Events E) EXCEPT (SELECT A.Event_ID FROM Attends A WHERE A.Visitor_ID=V.Visitor_ID))";

        $result = mysqli_query($dbconnect,$sql);
        
        echo "<table>";
        echo "<tr><th>Names</th></tr>";
        
        while($row = mysqli_fetch_array($result)) {
            $name = $row['Name'];
            echo "<tr><td style='width: 200px;'>".$name."</td></tr>";
        } 
        
        echo "</table>";
        mysqli_close($dbconnect);

    }
?>

</body>
</html>
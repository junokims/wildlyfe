<html>
<body>

<?php
if (isset($_POST['submit_form'])) {
    $someDiet = $_POST['selected_diet'];
    if (empty($someDiet)) {
        echo "Name is empty";
    } else {
        // echo $someDiet;
        // // echo <option value='$selected_diet'>$selected_diet</option>; 
        // $dbconnect = mysqli_connect('localhost', 'root', 'root', 'wyldlyfe')or die("initial host/db connection problem");
        
        // $sql = "SELECT * FROM Species"; //You don't need a ; like you do in SQL
        // $run = mysqli_query($dbconnect, $sql);

        // echo "<table>"; // start a table tag in the HTML
        
        // while($row = $mysqli->query($dbconnect, $sql)->fetch_array()){   //Creates a loop to loop through results
        //     printf ("%s (%s)\n", $row["Species"]);        }
        

        // echo "</table>"; //Close the table in HTML




        echo $someDiet;
        $dbconnect = mysqli_connect('localhost', 'root', 'root', 'wyldlyfe')or die("initial host/db connection problem");


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

    // CREATE Table CanGraduate AS SELECT * FROM AllStudents 
    // WHERE NOT EXISTS 
    // (SELECT * FROM CannotGraduate WHERE 
    //     CannotGraduate.Student_name = AllStudents.Student_name)


    // $dbconnect = mysqli_connect('localhost', 'root', 'root', 'wyldlyfe')or die("initial host/db connection problem");

    // $sql ="INSERT into AnimalLivesIn (Animal_ID, Enclosure_ID, Species) VALUES ('$animalid', '$enclosureid', '$species')";

    // $run = mysqli_query($dbconnect, $sql)or die(mysqli_error($dbconnect));

}

?>

</body>
</html>
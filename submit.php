<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "hotel_system";

    $con = mysqli_connect($host,$username,$password,$database);               // Database Connection

    echo "<div style='font-size:20px;'><a href='index.php'>Go back</a></div><br><br>";

    if($con){
        $id = rand(1000000,9999999);
        $name = $_POST["name"];
        $nic = $_POST["nic"];
        $email = $_POST["email"];
        $checkin = $_POST["checkin"];
        $checkout = $_POST["checkout"];
        $rooms = $_POST["rooms"];

        $query2 = "SELECT SUM(rooms) AS sum FROM room";

        $result2 = mysqli_query($con,$query2);

        while($row = mysqli_fetch_assoc($result2)){
            $output = $row['sum'];
        }

        $roomleft = 50-($output+$rooms);

        if($roomleft<0){
            echo "<div style='color:red;font-size:25px;'>Rooms are not available</div>";
        }
        else{
            $query = "INSERT INTO room(id,name,nic,email,checkin,checkout,rooms) VALUES('$id','$name','$nic','$email','$checkin','$checkout','$rooms')";
            
            $result = mysqli_query($con,$query);

            if($result){
                echo "<div style='width:40%;border:2px solid purple;text-align:center;margin:auto;'>";
                echo "<p style='color:green;font-size:40px'>Successful</p><br>";
                echo "<div><b>Name: </b>".$name."</div><br>";
                echo "<div><b>Number of Rooms: </b>".$rooms."</div><br>";
                echo "<div><b>Cost per night: </b>".($rooms*2500)." /-</div><br>";
                echo "<div><b>Check in: </b>".$checkin."</div><br>";
                echo "<div><b>Check out: </b>".$checkout."</div><br>";
                echo "<div><b>Transaction code: </b>".$id."</div><br><br>";
                echo "</div>";
            }
            else{
                echo "<h3 style='color:red;'>Faild. Try Again.</h3>";
            }
        }
    }
    else{
        echo "Data base not connected! Please come back later.";
    }
?>
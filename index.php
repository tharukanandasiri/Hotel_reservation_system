<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hotel Reservation System</title>

        <link rel="stylesheet" href="style.css">

        <script src="validate.js"></script>
    </head>

    <body>
        <p id="top">Hotel Reservation System<p>
        <hr><br>

        <div id="formborder">
            <form action="submit.php" method="post" onsubmit="return validate()">
                <label for="">Name</label><br>
                <input type="text" id="name" name="name"><br>
                <span id="error1"></span><br>

                <label for="">National ID Card Number</label><br>
                <input type="text" id="nic" name="nic"><br>
                <span id="error2"></span><br>

                <label for="">Email</label><br>
                <input type="email" id="email" name="email"><br>
                <span id="error3"></span><br>

                <label for="">Check in</label><br>
                <input type="date" id="in" name="checkin"><br>
                <span id="error4"></span><br>

                <label for="">Check out</label><br>
                <input type="date" id="out" name="checkout"><br>
                <span id="error5"></span><br>

                <label for="">Number of Rooms</label><br>
                <select id="rooms" name="rooms">
                    <option value="0">-Select-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select><br>
                <span id="error6"></span>
                <br>
                <input type="submit" value="Submit" id="sub">

                <div id="dis_box">
                    <p class="r">Rates:</p>
                    <div class="p" id="pr">Per night: 2500/-</div>
                    <p class="r">Rooms Left:</p>
                    <p class="p" id="roomleft">
                        <?php                                           // Rooms Left
                            $host = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "hotel_system";
                        
                            $con = mysqli_connect($host,$username,$password,$database);

                            if($con){
                                $query2 = "SELECT SUM(rooms) AS sum FROM room";

                                $result2 = mysqli_query($con,$query2);

                                while($row = mysqli_fetch_assoc($result2)){
                                    $output = $row['sum'];
                                }

                                $roomleft = 50-$output;

                                if($roomleft<=0){
                                    echo "None";
                                }
                                else{
                                    echo $roomleft." Rooms";
                                }
                            }
                        ?>
                    </p>
                </div>
            </form>
        </div>

    </body>

</html>
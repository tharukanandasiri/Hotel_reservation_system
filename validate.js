            function validate()
            {
                var name = document.getElementById("name").value;
                var nic = document.getElementById("nic").value;
                var size = nic.length;
                var email = document.getElementById("email").value;
                var checkin = document.getElementById("in").value;
                var checkout = document.getElementById("out").value;
                var rooms = document.getElementById("rooms").value;

                if(name == "")
                {
                    document.getElementById("error1").innerHTML = "Name is empty!";
                    return false;
                }
                if(nic == "")
                {
                    document.getElementById("error2").innerHTML = "NIC is empty!";
                    return false;
                }
                if(size != 12)
                {
                    document.getElementById("error2").innerHTML = "Invalid NIC!";
                    return false;
                }
                if(email == "")
                {
                    document.getElementById("error3").innerHTML = "Email is empty!";
                    return false;
                }
                if(checkin == "")
                {
                    document.getElementById("error4").innerHTML = "Date is empty!";
                    return false;
                }
                if(checkout == "")
                {
                    document.getElementById("error5").innerHTML = "Date is empty!";
                    return false;
                }
                if(rooms == "0")
                {
                    document.getElementById("error6").innerHTML = "Select number of rooms!";
                    return false;
                }
            }
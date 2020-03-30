<?php 
    $firstName = filter_input(INPUT_POST, 'firstname');
    $lastName = filter_input(INPUT_POST, 'lastname');
    $email = filter_input(INPUT_POST, 'email');

    if (!empty($firstname)) {
        $host = "localhost";
        $dbusername = "root"; 
        $dbpassword = ""; 
        $dbname = "dbconnect"; 
            // database connection
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
        if (mysqli_connect_error()) {
            die('Connect Error ('. mysqli_connect_errno().')'
            . mysqli_connect_error()); 
        } else {
           $sql = "INSERT INTO mytable (firstname, lastname) values ('$firstname','$lastname')"; 
            if ($conn->query($sql)) {
                echo "New record has been inserted successfully"; 
            } else {
                echo "Error: ". $sql."<br>". $conn->error;
            }
            $conn->close(); 
        }
    }
    else {
        echo "First name should not be empty.";
    }
?> 
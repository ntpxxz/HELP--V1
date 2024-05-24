<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php

        require('config/dbconnect.php');
       


        // Taking all 5 values from the form data(input)
        $user_id = $_POST['user_id'];
        $first_name = $_POST['user_name'];
        $last_name = $_POST['user_lastname'];
        $password = $_POST['user_pass'];
        $gender = $_POST['gender'];        
        $section = $_POST['user_sec'];
        $regdate = $_POST['user_reg'];
        $address = $_POST['user_address'];
        $email = $_POST['user_mail'];
        $tel = $_POST['user_tel'];

        /*    
        $user_pc = $_REQUEST['item_name'];
        $user_ip = $_REQUEST['item_ip'];
        
         */

        // Performing insert query execution
        // here our table name is college
        $sql = " INSERT INTO 'rith_user' (user_id, user_name,user_lastname, gender, user_pass, user_sec, user_reg, user_address, user_mail, user_tel, item_name, item_ip) 
        VALUES ('$user_id', '$first_name', '$last_name', '$password', '$gender', '$section', '$regdate', '$address', '$email', '$tel')";


        /*         save to database */
        $result = mysqli_query($connect, $sql);

    
        
        if($result){
        echo "<h3>Save Data Success</h3>";

        echo nl2br("\n$first_name\n $last_name\n "
        . "$gender\n $tel\n $email\n $section\n $password\n $user_pc\n $user_ip $regdate");
        } else {
        echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>
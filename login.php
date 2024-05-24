<?php 
session_start();
        if(isset($_POST['user_id'])){

				//connection
        include("config/dbconnect.php"); 

  // Check if the login attempts session variable is set
  if (!isset($_SESSION['login_attempts'])) {
    // If it's not set, initialize it to 0
    $_SESSION['login_attempts'] = 0;
  }

  // Get the current number of login attempts
  $loginAttempts = $_SESSION['login_attempts'];

  // Check if the limit has been reached
  if ($loginAttempts >= 3) {
    // Display an error message or take appropriate action
    echo "<script>";
    echo "alert(\"Login limit exceeded. Please try again later.\");";
    Header("Location: 404error.php"); //user & password incorrect back to login again
    echo "</script>";
    
    exit; // Stop further execution of the script
  }

  $_SESSION['login_attempts']++;

  // Continue with your login code
  $Username = mysqli_real_escape_string($connect, $_POST['user_id']);
  $Password = mysqli_real_escape_string($connect, $_POST['user_pass']);

  // query
  $sql = "SELECT * FROM rith_user WHERE user_id='$Username' AND user_pass='$Password'";
  $result = mysqli_query($connect, $sql);

  // Check the result and perform the necessary actions
  if (mysqli_num_rows($result) > 0) {
    // Successful login
    // Reset the login attempts counter
    $_SESSION['login_attempts'] = 0;
    // Continue with your logic                 

           $row = mysqli_fetch_array($result);

            $_SESSION["ID"] = $row["user_id"];
            $_SESSION["name"] = $row["user_name"];
            $_SESSION["lname"] = substr($row["user_lastname"],0,-8).".";
            $_SESSION["sec"] = $row["user_sec"];
            $_SESSION["mail"] = $row["user_mail"];
            $_SESSION["role"] = $row["user_type"];
             $_SESSION["profile"] = $row["user_img"];

                      if($_SESSION["role"]=="admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
                        // If it's an admin, redirect to the admin page
                        Header("Location: ./admin/dash.php");

                      }

                      else if ($_SESSION["role"]=="user"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
                        // If it's a user, redirect to the user page
                        Header("Location: ./user/home_u.php");

                      }else{
                        echo "<script>";
                            echo "alert(\"Invalid username or password.\");"; 
                            echo "window.history.back()";
                        echo "</script>";
                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" Invalid username or password.\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{
  echo "<script>";
             echo "alert(\" You Login over limit, Please login again later. \");"; 
             Header("Location: 404error.php"); //user & password incorrect back to login again
  echo "</script>";
        }

?>
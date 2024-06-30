<?php
/*
MIT License
Copyright (c) 2024 ARIBFIB 
https://github.com/ARIBFIB/
*/

// Configure your MySQL database connection details:
$mysqlserverhost = "localhost";
$database_name = "Registration_Page_DESIGN_06";
$username_mysql = "root";
$password_mysql = "";

function sanitize($variable) {
    $clean_variable = strip_tags($variable);
    $clean_variable = htmlentities($clean_variable, ENT_QUOTES, 'UTF-8');
    return $clean_variable;
}

function connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name) {
    $connect = mysqli_connect($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $connect;    
}

if(isset($_POST["loginform"])) {
    $connection = connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
    $email = mysqli_real_escape_string($connection, sanitize($_POST["email"]));
    $user_pass = mysqli_real_escape_string($connection, sanitize($_POST["user_pass"]));

    $sql = "INSERT INTO login_form06 (Email_Address, User_Password) VALUES ('$email', '$user_pass')";

    try {
        if (mysqli_query($connection, $sql)) {
            echo "<h2><font color=blue>New record added to database.</font></h2>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    } catch(mysqli_sql_exception $e) {
        if($e->getCode() == 1062) {
            echo "<h2><font color=red>Note: This email: $email is already exists by other users, kindly go back and Sign up with different email</font></h2>";
            header("Location: dashboard.html");
            exit();
          } else {
            error_log("Error: " . $e->getMessage());
            echo "<h2><font color=red>Note: There was an error for preceeding yout request. Please try again later.</font></h2>";
        }
    }
    mysqli_close($connection);
}
?>

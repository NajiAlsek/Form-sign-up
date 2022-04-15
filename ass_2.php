<?php

/*
Student name: naji alsek
*/

$serverName = "localhost";
$userName = "root";
$password = "";
$datbaseName = "hotel";
$conenction = new mysqli($serverName,$userName,$password,$datbaseName);

$ToCreateTable = "Create table user(name VARCHAR(50) NOT NULL,age int(2) NOT NULL,
gender VARCHAR(15) NOT NULL,address VARCHAR(100),email VARCHAR(50) PRIMARY KEY)";
$excutedStatement =  $conenction->query($ToCreateTable);


if($_SERVER['REQUEST_METHOD'] == "POST"){
    if((!empty($_POST['Name'])) and (!empty($_POST['Age'])) and (!empty($_POST['Gender'])) and (!empty($_POST['email']))){
        $name_input = '/[a-zA-Z]+/';
        $email_input = '/[a-zA-Z0-9_\.]+@[a-zA-Z]+\.[a-zA-Z]+/';
        $name_entery = $_POST['Name'];
        $age_entery = $_POST['Age'];
        $gender_entery = $_POST['Gender'];
        $email_entery = $_POST['email'];
        if( (preg_match($name_input,$name_entery)) and ($age_entery > 10 and $age_entery < 30)
        and ($gender_entery == "male" or $gender_entery == "female") and (preg_match($email_input,$email_entery)) ){
            $name = $_POST['Name'];
            $age = $_POST['Age'];
            $gender = $_POST['Gender'];
            $address = $_POST['Address'];
            $email = $_POST['email'];

            $SQL_statement = "Insert Into user(name, age, gender, address, email)values('$name','$age','$gender','$address','$email')";
            $conenction->query($SQL_statement);
        }
        if(!preg_match($name_input,$name_entery)){
            echo "The user name is can not contain any symbol or number, it must contain only letters."."<br>";
        }
        if($age_entery < 10 or $age_entery > 30){
            echo "The age is must only contain numbers between 10 and 30."."<br>";
        }
        if($gender_entery != "male" and $gender_entery != "female"){
            echo "The gender must be either male or female."."<br>";
        }
        if(!preg_match($email_input,$email_entery)){
            echo "The email is must be email syntax."."<br>";
        }
    }
    else{
        echo "Unable to register, you must not enter empty value in any input except address you can do it.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    <div class = "all">
        <h2>Sign up page</h2>
        <form action = "" method = "post">
            <p>
            Name: <input type = "text" name = "Name" placeholder = "Enter your name">
            </p>
            <p>
            Age: <input type = "text" name = "Age" placeholder = "Enter your age">
            </p>
            <p>
            Gender: <input type = "text" name = "Gender" placeholder = "Enter your gender">
            </p>
            <p>
            Address: <input type = "text" name = "Address" placeholder = "Enter your address">
            </p>
            <p>
            Email: <input type = "email" name = "email" placeholder = "Enter your email">
            </p>
            <input type = "submit" name = "submit" value = "submit" >
        </form>
    </div>
</body>
</html>
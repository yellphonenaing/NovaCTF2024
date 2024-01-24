<?php
session_start();
$db = new PDO('sqlite:static/db/login.db');
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
if(!empty($_POST['username']) && !empty($_POST['password'])){
$username = addslashes($_POST['username']);
$password = md5($_POST['password']);
$sql = "SELECT * FROM users WHERE username = :name AND password = :pass";

try {
    $statement = $db->prepare($sql);
    $statement->execute(array('name' => $username, 'pass' => $password));
    $row = $statement->fetch();
    if ($row['username'] == $username && $row['password'] == $password){
      $loggedin = "Admin";
    }
}
catch(PDOException $e) {
    echo "Something went wrong: ".$e->getMessage();
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            background: url('./static/images/cute.webp') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #ffffff; /* White text color */
        }

        .login-container {
            background-color: rgba(46, 204, 113, 0.8); /* Semi-transparent green background color */
            padding: 20px;
            border-radius: 10px;
            margin: 10% auto;
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #2ecc71; /* Green button color */
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
<?php
                      if ($loggedin == "Admin"){
                        echo "<pre id=\"output\"><center>Welcome " .$row['username']. ", You are now logged in.<br/>I have something to give you.Do not share it to another guys.<br>N0v@_Web_Sec{S0M3t!mE_I\$_v3RY_!mport@nt_t0_FINd_S3ns!tiV3_DATA}";
                        exit();
}                     
                      ?>

    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>

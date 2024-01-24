<?php
require_once './vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
function encode($data){
    $key = "e45e329feb5d925b"; 
    $bs = "base64_" . "encode";
    for ($i = 0; $i < strlen($data); $i++) {
        $data[$i] = $data[$i] ^ $key[$i + 1 & 15];
    }
    $after = $bs($data);

    return $after;
}
$key = '!@#$%^&';
$key = md5(md5(encode($key)));
$payload = array(
    "id" => 10,
    "username" => "nova",
    "flag" => "nova_ctf{F.A.K.E_F-L-A-G}",
    "role" => "user",
);

if(empty($_COOKIE['token']) || !isset($_COOKIE['token'])){
    $token = JWT::encode($payload, $key, 'HS256');
    $exp = time() + 3600;
    setcookie('token', $token, $exp, "/");
    header("Location: ./");
    exit();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Theme Page 2</title>
    <style>
        body {
            background-color: #2ecc71; /* Green background color */
            color: #ffffff; /* White text color */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #27ae60; /* Dark green header background color */
            padding: 1em;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        section {
            padding: 20px;
        }

        footer {
            background-color: #27ae60; /* Dark green footer background color */
            padding: 1em;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <header>
        <h1>Green Web</h1>
    </header>

    <section>
        <?php
                        if(JWT::decode($_COOKIE['token'], new Key($key, 'HS256'))){
                            $acc = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
                            $user = $acc->username;
                            $role = $acc->role;
                            if($role == "admin"){
                                echo "<center>Welcome to admin area.<br>I have something to give you.Do not share it to another guys.<br>N0v@_Web_Sec{i_C@N_cR@cK_jwT_s3CR3T_T0k3N}</center>";
                            }else{
                                echo "You are logged in as $user and your account role is $role.You can't get flag.";
                            }
                        }
                        ?>

    </section>

  

</body>
</html>

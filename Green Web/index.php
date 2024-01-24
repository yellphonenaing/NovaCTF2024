<?php
class Role {
    public $user;
    public $role;
    public function __construct($user,$role){
            $this->user = $user;
            $this->role = $role;
    }
     
}
if(empty($_COOKIE['token']) || !unserialize(base64_decode($_COOKIE['token'])) || !isset($_COOKIE['token'])){
    $acc = new Role("guest","guest");
    $token = base64_encode(serialize($acc));
    $exp = time() + 3600;
    setcookie('token', $token, $exp, "/");
    header("Location: ./");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Theme Page</title>
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
                        if(unserialize(base64_decode($_COOKIE['token']))){
                            $acc = unserialize(base64_decode($_COOKIE['token']));
                            $user = $acc->user;
                            $role = $acc->role;
                            if($role == "admin"){
                                echo "<center>Welcome to admin area.<br>I have something to give you.Do not share it to another guys.<br>N0v@_Web_Sec{PhP_s3R!@lIze_!s_n0T_s0_SSup3R_S3cuRe}</center>";
                            }else{
                                echo "You are logged in as $user and your account role is $role.You can't get flag.";
                            }
                        }
                        ?>

    </section>

  

</body>
</html>

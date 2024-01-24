<?php
session_start();
if(!isset($_SESSION['userdata'])){
  $_SESSION['userdata'] = '{
    "name":"player",
    "password":"player223",
    "nickname":"pl@Y3r",
    "role":"user"
    }';
}

if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['nickname'])){
$name = $_POST['name'];
$password = $_POST['password'];
$nickname = $_POST['nickname'];
$_SESSION['userdata'] = '{
  "name":"' .$name. '",
  "password":"' .$password. '",
  "role":"user",
  "nickname":"' .$nickname. '"
  }';
}
$data = json_decode($_SESSION['userdata'], true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile</title>
  <style>
    body {
      background-color: black;
      color: white;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    form {
      background-color: #00cc66; /* Green theme color */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      width: 300px;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      border: none;
      border-radius: 5px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #003300; /* Dark green for submit button */
      color: white;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #005500; /* Dark green on hover */
    }
  </style>
</head>
<body>
  <?php
if($data['role'] == "admin"){
echo "N0v@w3bsEc{I_cAn_!Nj3ct_js0N}";
exit();
}
  ?>
  <form action="" method="post">
      Admin can see flag
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $data['name']; ?>" required>

    <label for="email">Password:</label>
    <input type="password" id="email" name="password" value="<?php echo $data['password']; ?>" required>

    <label for="password">Nickname:</label>
    <input type="text" id="password" name="nickname" value="<?php echo $data['nickname']; ?>" required>

    <input type="submit" value="Submit">
  </form>

</body>
</html>

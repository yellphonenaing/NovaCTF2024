<?php
session_start();
$animals = [
    'Lion', 'Tiger', 'Bear', 'Elephant', 'Giraffe',
    'Zebra', 'Kangaroo', 'Penguin', 'Koala', 'Panda',
    'Horse', 'Dolphin', 'Ostrich', 'Cheetah', 'Gorilla',
    'Hippopotamus', 'Koala', 'Platypus', 'Armadillo', 'Antelope',
    'Cheetah', 'Chimpanzee', 'Cougar', 'Crocodile', 'Eagle',
    'Frog', 'Jaguar', 'Kangaroo', 'Leopard', 'Lynx',
    'Monkey', 'Ocelot', 'Octopus', 'Otter', 'Pangolin',
    'Parrot', 'Penguin', 'Puma', 'Raccoon', 'Rhinoceros',
    'Seagull', 'Shark', 'Sloth', 'Snail', 'Squirrel',
    'Swan', 'Walrus', 'Zebra'
];
$randomAnimal = $animals[array_rand($animals)];
$exp = time() + 3600;
if(!isset($_COOKIE['captcha'])){
setcookie('captcha', $randomAnimal, $exp, "/");
header("Location: ./");
    exit();}
function generateRandomToken($length = 32) {
    return bin2hex(random_bytes($length));
}
if(!isset($_SESSION['step'])){
$_SESSION['step'] = 0;
}
if(isset($_POST['captcha']) && $_POST['captcha'] != "" && $_POST['captcha'] == $_COOKIE['captcha']){
    $_SESSION['step'] = $_SESSION['step'] + 1;
    $_SESSION['name'] = generateRandomToken();
    setcookie('captcha', '', time() - 3600, '/');
    header("Location: ./");
    exit();
}
?>
<?php
if($_SESSION['step'] < 500){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Easy Captcha</title>
    <style>
        /* Add some basic styling for clarity */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
    </style>
</head>
<body>

    <h2>CAPTCHA Form</h2>
<?php
$step = $_SESSION['step'];
echo "You are on step $step/500. Win the game and upload files";
?>
    <form action="" method="post">
        <!-- Display the CAPTCHA image -->

        <!-- Input field for user to enter the CAPTCHA code -->
        <label for="captcha">Enter  <b><?php
require './smarty/libs/Smarty.class.php';

$smarty = new Smarty;
$smarty->debugging = false;
$smarty->setTemplateDir('/tmp/smarty/templates');
$smarty->setCompileDir('/tmp/smarty/templates_c');
$smarty->setCacheDir('/tmp/smarty/cache');
$smarty->setConfigDir('/tmp/smarty/configs');

$smarty->assign('foo','value');
$x = $_COOKIE['captcha'];
$smarty->display('string:'.$x); 
?></b> to submit</label>
        <input type="text" id="captcha" name="captcha" required><br>

        <!-- Submit button -->
        <input type="submit" value="Submit">
    </form>

</body>
</html>
<?php
exit();
}

?>

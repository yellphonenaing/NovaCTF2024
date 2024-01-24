<?php
session_start();
function generateRandomToken($length = 32) {
    return bin2hex(random_bytes($length));
}
if(!isset($_SESSION['step'])){
$_SESSION['step'] = 0;
}
if(isset($_POST['captcha']) && $_POST['captcha'] != "" && $_POST['captcha'] == $_SESSION['name']){
    $_SESSION['step'] = $_SESSION['step'] + 1;
    $_SESSION['name'] = generateRandomToken();;
}
if(isset($_GET['file']) && !preg_match('/\//', $_GET['file'])){
    include('./uploads/'. basename($_GET['file']));
    exit();
}
?>
<?php
if($_SESSION['step'] < 300){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAPTCHA Form</title>
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
echo "You are on step $step/300. Win the game and upload files";
?>
    <form action="" method="post">
        <!-- Display the CAPTCHA image -->
        <img src="index.php?file=img.php" alt="CAPTCHA Image"><br>

        <!-- Input field for user to enter the CAPTCHA code -->
        <label for="captcha">Enter animal name:</label>
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
<?php
function xxd(string $s): string {
        $out = '';
        $ctr = 0;
        foreach (str_split($s, 16) as $v) {
                $hex_string = implode(' ', str_split(bin2hex($v), 4));
                $ascii_string = '';
                foreach (str_split($v) as $c) {
                        $ascii_string .= $c < ' ' || $c > '~' ? '.' : $c;
                }
                $out .= sprintf("%08x: %-40s %-16s\n", $ctr, $hex_string, $ascii_string);
                $ctr += 16;
        }
        return $out;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        $ext = pathinfo($_FILES['file']['name']);
        $ext = strtolower($ext['extension']);
        $allowedFileSize = 1 * 1024 * 1024;
        if (in_array($ext, $allowedExtensions) && $_SESSION['step'] >= 300 && $_FILES['file']['size'] < $allowedFileSize) {
           $fname=strtotime(date('D, d M Y H:i:s \G\M\T')). ".png";
           $upload_contents = xxd(file_get_contents($_FILES['file']['tmp_name']));
           if (file_put_contents('./uploads/'. $fname, $upload_contents)) {
            $message = 'Your file has been uploaded';
        } 
        } else {
           
           
        }
    } else {
       
       
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload and List</title>
</head>
<body>

    <h2>File Upload</h2>

    <!-- Form for file upload -->
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Choose File:</label>
        <input type="file" name="file" id="file" required>
        <input type="submit" value="Upload">
    </form>

    <hr>

    <h2>XXD File Server</h2>

    <!-- Table to display uploaded files -->
    <table border="1">
        <tr>
            <th>File Name</th>
            <th>Uploaded Time</th>
        </tr>
<!--  <tr>
                <td><a href="./uploads/img.php">img.php</a></td>
<td>Sun, 21 Jan 2024 18:40:41 GMT</td>
</tr> -->
       
               <tr>
                <td><a href="./uploads/1705863341.png">1705863341.png</a></td>
<td>Sun, 21 Jan 2024 18:55:41 GMT</td>
</tr>
       
    </table>

</body>
</html>

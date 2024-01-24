<?php
if(isset($_GET['data']) && !empty($_GET['data'])){
    $substitutions = array(
                ';'  => '',
        '&'  => '',
        '|' => '',
                '$'  => '',
                '('  => '',
        '{'  => '',
        ']'  => '',
        '\''  => '',
        'flag.txt'  => '',
        'etc'  => '',
        '>'  => '',
      '`'  => '',

        );
        $data = str_replace( array_keys( $substitutions ), $substitutions, $_GET['data'] );
    $cmd = "curl ". $data ."";
    if(preg_match('/file:\/\//i',$data) || preg_match('/-o/i',$data)){
        echo "We don't accept file:// schema OR -o";
        exit();
    }
    if(htmlspecialchars(system($cmd))){

    }else{
        echo "Unable to execute : ". $cmd;
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Command Injection Lab - 1</title>
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
            background-color: black;
            border: 2px solid lightgreen;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            background-color: black;
            color: white;
            border: 1px solid lightgreen;
            border-radius: 5px;
        }

        button {
            background-color: lightgreen;
            color: black;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        output {
            display: block;
            margin-top: 20px;
            padding: 10px;
            background-color: black;
            color: white;
            border: 1px solid lightgreen;
            border-radius: 5px;
            height: 200px;
            width: 600px; /* Set a fixed height */
            overflow-y: auto; /* Enable vertical scrollbar if content overflows */
        }
    </style>
</head>
<body>
    <form>
        <label for="deviceIP">Online curl Tool</label>
        <input type="text" id="deviceIP" name="deviceIP" placeholder="Enter url" required value="https://www.google.com">

        <button type="button" onclick="pingDevice()">Run</button>

        <pre><output id="output"></output>
    </form>

    <script>
        function pingDevice() {
            var data = document.getElementById('deviceIP').value;
            var outputElement = document.getElementById('output');

            // Use fetch API to make a GET request to your server
            fetch('./<?php echo htmlspecialchars(basename(__FILE__)); ?>?data=' + data)
                .then(response => response.text())
                .then(data => {
                    // Update the output text box with the API response
                    outputElement.textContent = data;
                })
                .catch(error => {
                    // Handle errors
                    console.error('Error:', error);
                    outputElement.textContent = 'Error occurred while pinging device.';
                });
        }
    </script>
</body>
</html>

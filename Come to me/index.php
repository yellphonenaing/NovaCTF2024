<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Theme Web Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #eafbea; /* Light green background */
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff; /* White container background */
            border: 5px solid #2ecc71; /* Green border */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(46, 204, 113, 0.3); /* Green shadow */
        }

        h1 {
            color: #2ecc71; /* Green heading color */
        }

        p {
            color: #333333; /* Dark text color */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Web Page</h1>
        <p>
            <?php
            if (!isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != "https://www.nova.ctf") {
                echo "We welcome only visitors come from https://www.nova.ctf";
                exit();
                
            }
            if ($_SERVER['REQUEST_METHOD'] != 'POST'){
                echo "We don't have GET. We use POST";
                exit();
            }
            if ($_SERVER['HTTP_USER_AGENT'] != "n0v@agENT"){
                echo "We don't know agent " .$_SERVER['HTTP_USER_AGENT']. ". We know only n0v@agENT";
                exit();
            }
            if (!isset($_COOKIE['kaungmon'])) {
                echo "I want to eat cookie.It's name is kaungmon";
                exit();
            }
            echo "N0v@w3bsEc{y0U+G0t_m3}";
            ?>
            
        </p>
    </div>
</body>
</html>

<header>
        <h1>Super WAF</h1>
    </header>
    <div>
        <?php
ini_set("display_errors", 1);
$dbuser ='';
$dbpass ='';
$dbname ="sqli2";
$host = '127.0.0.1';

$con = mysqli_connect($host,$dbuser,$dbpass);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
    @mysqli_select_db($con, $dbname) or die ( "Unable to connect to the database: $dbname");
}

        if (!empty($_REQUEST['id'])) {
            $substitutions = array(
                'union'  => '',
                'select'  => '',
                'table_name'  => '',
            );
            $id = addslashes($_REQUEST['id']);
            $id = str_ireplace( array_keys( $substitutions ), $substitutions, $id );
            $q = "SELECT * FROM posts WHERE id=$id" ;
            echo "<p style=\"color: #c4d113;text-align:center;\"><b>Query</b> : SELECT * FROM posts WHERE id=<i style=\"color: red;\">$id</i>;</p>";
                if (!mysqli_query($con,$q))
                {
                    die('Error: ' . mysqli_error($con));
                }
                
                $result = mysqli_query($con,$q);
            
                
                
                $row = mysqli_fetch_array($result);
                
                if ($row){
                    echo "<h2 style=\"text-align: center;\">" .$row['1']. "</h2>";
                    echo "<p style=\"text-align: center;\">" .$row['2']. "</p>";
                }
            }else{
                header('Location: '.basename(__FILE__).'?id=1');
            }
            
            ?>
      
    </div>
</html>

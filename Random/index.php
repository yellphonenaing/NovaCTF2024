<b><?php
session_start();
if(!isset($_SESSION['step'])){
$_SESSION['step'] = 0;
}
$game = $_SESSION['step'] ;
$x = [3,5,7,8,11,13,16,18,20,25];
$y = [25,20,18,16,13,11,8,7,5,3];
$a = rand(0,9);
$b = rand(0,9);
echo "$x[$a] * $x[$a] = ?<br>";
$c = $x[$a] * $y[$b];

if(isset($_GET['ans']) && is_numeric($_GET['ans']) && $_GET['ans'] == $c){
echo "You won the game.";
$_SESSION['step'] = $_SESSION['step'] + 1;
}
echo "You won $game. Won 21 games and get flag.<br>";
if($_SESSION['step'] >= 50){
echo "N0v@w3bsEc{fake_fl4g}";
}
?>

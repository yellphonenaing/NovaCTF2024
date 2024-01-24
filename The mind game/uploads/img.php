<?php
// Start the session to store the CAPTCHA answer
session_start();

// Create an image with the CAPTCHA                                                                                                                                   
$image = imagecreate(250, 50);
$bgColor = imagecolorallocate($image, 0, 0, 0); // Black background
$textColor = imagecolorallocate($image, 255, 255, 255); 
// Display the arithmetic sum on the image
// Array of animal names
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
$_SESSION['name'] = $randomAnimal;
imagestring($image, 5, 20, 15, "$randomAnimal", $textColor);
header("Content-type: image/png");
imagepng($image);

// Free up memory
imagedestroy($image);
header('Captcha: '. $_SESSION['name']);
?>

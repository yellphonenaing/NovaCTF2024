<?php
if(isset($_GET['cmd']) && strlen($_GET['cmd']) === 12 && mb_strlen($_GET['cmd'], 'UTF-8') === 12){
    $cmd = $_GET['cmd'];
    $substitutions = array('$'  => '','\\'  => '','/'  => '','>>'  => '','>>>'  => '','<'  => '',);$cmd = str_replace( array_keys( $substitutions ), $substitutions, $cmd );
system($cmd);
}
/*
Command injection is a security vulnerability that occurs when an application or system allows an attacker to execute arbitrary commands on the host operating system. This vulnerability is typically found in applications that take user input and directly use it as part of a system command, without proper validation or sanitation.
For all the times that you rained on my parade
$
And all the clubs you get in using my name
$
You think you broke my heart, oh, girl, for goodness' sake
$
You think I'm crying on my own, well, I ain't
$
And I didn't wanna write a song
$
'Cause I didn't want anyone thinkin' I still care, I don't, but
$
You still hit my phone up
$
And baby, I'll be movin' on
$
And I think you should be somethin' I don't wanna hold back
$
Maybe you should know that
$
My mama don't like you and she likes everyone
$
And I never like to admit that I was wrong
$
And I've been so caught up in my job
$
Didn't see what's going on, but now I know
$
I'm better sleeping on my own
$
'Cause if you like the way you look that much
$
Oh, baby, you should go and love yourself
$
And if you think that I'm still holdin' on to somethin'
$
You should go and love yourself
$
But when you told me that you hated my friends
$
The only problem was with you and not them
$
And every time you told me my opinion was wrong
$
And tried to make me forget where I came from
$
And I didn't wanna write a song
$
'Cause I didn't want anyone thinkin' I still care, I don't, but
$
You still hit my phone up
$
And baby, I'll be movin' on
$
And I think you should be somethin' I don't wanna hold back
$
Maybe you should know that
$
My mama don't like you and she likes everyone
$
And I never like to admit that I was wrong
$
And I've been so caught up in my job
$
Didn't see what's going on, but now I know
$
I'm better sleeping on my own
$
'Cause if you like the way you look that much
$
Oh, baby, you should go and love yourself
$
And if you think that I'm still holdin' on to somethin'
$
You should go and love yourself
$
For all the times that you made me feel small
$
I fell in love, now I feel nothin' at all
$
I never felt so low and I was vulnerable
$
Was I a fool to let you break down my walls?
$
'Cause if you like the way you look that much
$
Oh, baby, you should go and love yourself
$
And if you think that I'm still holdin' on to somethin'
$
You should go and love yourself
$
'Cause if you like the way you look that much
$
Oh, baby, you should go and love yourself (yeah)
$
And if you think (you think) that I'm (that I'm)
$
Still holdin' on to somethin' (holdin' on, no)
$
You should go and love yourself
$
Source: Musixmatch
$

*/
?>

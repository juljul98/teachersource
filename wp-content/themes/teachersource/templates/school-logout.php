<?php 
/*
Template Name: School Logout Page
*/
?>
<?php 
session_start();

unset($_SESSION['teachersource']['school']);

$dir = home_url() . '/' . 'schoolpage';
header("Location: " . $dir);

?>
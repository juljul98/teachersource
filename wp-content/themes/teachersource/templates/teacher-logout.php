<?php 
/*
Template Name: Teacher Logout Page
*/
?>
<?php 
session_start();

unset($_SESSION['teachersource']['teacher']);

$dir = home_url() . '/' . 'teacherpage';
header("Location: " . $dir);

?>
<?php
include("userService.php");

$user = new userService($_POST['email'], $_POST['password']);
$data1 = new userService($_POST['email'], $_POST['password']);

if($get_user = $user->login()) {
    echo 'Welcome '.$user->getRole();
    echo ', Logged it as user email: '.$get_user;
	if($get_data1 = $data1->login1()) {
	echo '<br><br><br>';
	echo $get_user .' meminjam buku :<br>';
	echo $data1->getData1() .'<br>';
	echo 'Tanggal Peminjaman: ' .$data1->getData2();
}} 
else {
    echo 'Invalid Login';
}

?>

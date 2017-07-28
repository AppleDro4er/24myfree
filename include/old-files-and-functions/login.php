!СТАРАЯ ФОРМА !
<?php
/*if($_SERVER['REQUEST_METHOD']=='POST'){
if(!empty($_POST['username'])&&!empty($_POST['password'])){
$username=strtolower($_POST['username']);
$password=$_POST['password'];
$qur=mysql_query("SELECT username,password FROM usertbl WHERE username='".$username."'");
$row=mysql_num_rows($qur);
if($row!=0){
while($rez=mysql_fetch_assoc($qur)){
$dbusername=$rez['username'];
$dbpassword=$rez['password'];
if(password_verify($password,$dbpassword)){
if($username==$dbusername){
$_SESSION['session_username']=$username;
mysql_query("UPDATE usertbl SET last_login='".time()."' WHERE username='".$username."'");}
}else{$msg_login="Неверный пароль!";}}
}else{$msg_login="Пользователь не зарегистрирован!";}
}else{$msg_login="Все поля обязательны для заполнения!";}
}
?>
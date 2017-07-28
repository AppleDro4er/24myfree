<?php
function confirmPassword($hash, $password){
	return crypt($password, $hash) === $hash;
	}
function hashPassword($password){
	$salt = md5(uniqid('some_prefix', true));
	$salt = substr(strtr(base64_encode($salt), '+', '.'), 0, 22);
	return crypt($password, '$2a$08$' . $salt);
	}
?>
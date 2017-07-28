<?php
$uploaddir = $_SERVER["DOCUMENT_ROOT"].'/upload/medialibrary/';
$_FILES['file']['type'] = strtolower($_FILES['file']['type']);
if($_FILES['file']['type']=='image/png') {$file = md5(date('YmdHis')).'.png';}
if($_FILES['file']['type']=='image/jpg') {$file = md5(date('YmdHis')).'.jpg';}
if($_FILES['file']['type']=='image/gif') {$file = md5(date('YmdHis')).'.gif';}
if($_FILES['file']['type']=='image/jpeg') {$file = md5(date('YmdHis')).'.jpg';}

$uploadfile=$uploaddir.$file;

move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile);

$array = array(
'filelink' => '/upload/medialibrary/'.$file
);

echo stripslashes(json_encode($array));
?>
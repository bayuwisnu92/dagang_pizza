<?php
// $mahasiswa = [

//     [
//      "nama" => "bayu",
//      "hp" => "090900909",
//      "email" => "bayuwisnu9292"
//     ],
//     [
//      "nama" => "hasni",
//      "hp" => "090900909",
//      "email" => "hasniisnu9292"
//     ],
    
// ];

 $dbh = new PDO("mysql:host=localhost;dbname=belajar-laravel-9","root","");


$db = $dbh->prepare('SELECT * FROM students');
$db->execute();
$students = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($students);
echo $data;


?>
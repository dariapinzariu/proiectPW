<?php
class Utilizator{
public $Nume="Buna,";
public function Nume(){
    echo "nu stiu inca care e numele tau!";
}
}
$u1=new Utilizator();
$u1->Nume();
echo "<br><br>"."'{$u1->Nume}'";
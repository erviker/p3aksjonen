<?php
$json = file_get_contents('http://p3.no/saus/nettradio/onairnow.php');
$obj = json_decode($json);
$b = $obj->program->elements;

if($b[1]->runorder == "present") {
print($b[1]->contributor);
print(" - ");
print($b[1]->title);
}
elseif($b[0]->runorder == "present") {
print($b[1]->contributor);
print(" - ");
print($b[1]->title);
}
elseif($b[2]->runorder == "present") {
print($b[1]->contributor);
print(" - ");
print($b[1]->title);
}
else {
print("Ingen sång");
}



?>

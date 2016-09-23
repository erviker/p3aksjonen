<?php 
function convertTime($dec)
{
    $hour = floor($dec);
    $min = round(60*($dec - $hour));
    return $hour;
}

$start = 1444842000;
$slutt = 1445202000;
$now = time();

$diff = $slutt-$now; 
$igjen = $diff/60/60+1;
$runda = convertTime($igjen);


print("TIMER IGJEN: ".$runda);
?>


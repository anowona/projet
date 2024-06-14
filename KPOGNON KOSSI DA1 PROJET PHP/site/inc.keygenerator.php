<?php
$keyCharacters = "azertyuiopqsdfghjklmwxcvbn1234567890AZERTYUIOPQSDFGHJKLMWXCVBN";
$keyShuffle = str_shuffle($keyCharacters);
$keySplit = str_split($keyShuffle);

$keyArray = array();
for ($i = 0; $i < 4; $i++) {
    array_push($keyArray, $keySplit[$i]);
}

$keyImp = implode("", $keyArray);
$keyString = $keyImp;

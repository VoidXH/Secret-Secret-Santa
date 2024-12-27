<?php
require '_shuffle.php';
$names = file('names.txt', FILE_IGNORE_NEW_LINES);

$drawnNames = [];
for ($i = 0, $c = count($names); $i < $c; $i++) {
  $shuffle = shuffleNames($names, date('Y'));
  $drawn = $shuffle[$i];
  if (in_array($drawn, $drawnNames)) {
    die("Error: Duplicate name drawn: $drawn");
  } else {
    $drawnNames[] = $drawn;
  }
}
echo "Everyone has drawn a different person.";
?>

<?php
function stableShuffle(&$items) {
  for ($i = count($items) - 1; $i > 0; $i--) {
    $j = rand(0, $i);
    $tmp = $items[$i];
    $items[$i] = $items[$j];
    $items[$j] = $tmp;
  }
}

function shuffleNames($names, $seed) {
  srand($seed);
  $shuffled = $names;
  do {
    stableShuffle($shuffled);
    $c = count($names);
    $no_fixed_points = $c != 0;
    for ($i = 0; $i < $c; $i++) {
      if ($names[$i] === $shuffled[$i]) {
        $no_fixed_points = false;
        break;
      }
    }
  } while (!$no_fixed_points);
  return $shuffled;
}
?>

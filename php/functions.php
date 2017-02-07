<?php
function gcd($a,$b) {
    $a = abs($a); $b = abs($b);
    if( $a < $b) list($b,$a) = Array($a,$b);
    if( $b == 0) return $a;
    $r = $a % $b;
    while($r > 0) {
        $a = $b;
        $b = $r;
        $r = $a % $b;
    }
    return $b;
}

function to_inches($mm,$denom) {
  $in_frac = round($mm/25.4*$denom,0,PHP_ROUND_HALF_UP);
  $inches = floor($in_frac/$denom);
  $num = $in_frac % $denom;
  $gcd = gcd($num,$denom);
  $num = $num/$gcd;
  $denom = $denom/$gcd;
  $retval = "";
  if ($num == 0) {
    $retval = $inches . "\"";
  } 
  else {
    $retval = $inches . " " . $num . "/" . $denom . "\"";
  }
  return $retval;
}

function to_feetinches($mm,$denom) {
  $in_frac = round($mm/25.4*$denom,0,PHP_ROUND_HALF_UP);
  $inches = floor($in_frac/$denom);
  $num = $in_frac % $denom;
  $gcd = gcd($num,$denom);
  $num = $num/$gcd;
  $denom = $denom/$gcd;
  $feet = floor($inches/12);
  $inches = $inches % 12;
  $retval = "";
  if ($num == 0) {
    $retval = $feet . "'-" . $inches . "\"";
  }
  else {
    $retval = $feet . "'-" . $inches . " " . $num . "/" . $denom . "\"";
  }
  return $retval;
}
  
?>

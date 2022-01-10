<?php
function gcd($a,$b) {
    # Find greatest common denominator
    #
    # Convert 2/4 to 1/2 or 6/16 to 3/8, etc.
    #
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
    # Convert from millimeters to inches
    #
    # Arguments:
    # mm - length in millimeters
    # denom - accuracy in fractions of an inch, e.g. 1/8, 1/16, etc.
    #
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
    # Convert from millimeters to feet-and-inches
    #
    # Arguments:
    # mm - length in millimeters
    # denom - accuracy in fractions of an inch, e.g. 1/8, 1/6, etc
    #
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

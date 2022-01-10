<html>
<?php
include('headers.php');
?>

<body>
<div class="container">
<h1>Antenna Calculator</h1>

<form action="index.php" method="post" class="form-inline">
<?php
include('input-form.php');
?>
</form>

<?php
include('functions.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $in_denom = 8;
  $freq    = $_POST['frequency'];
  $vel_fac = $_POST['velocity-factor'];
  // Calculate 1/4-wavelength in mm using speed of light for air
  #$full_mm = 936 / $freq * 304.8; #From p.142 "Practical Antenna Handbook" 4th ed.
  $full_mm = 299792 * $vel_fac / $freq;
  $quarter_mm = $full_mm / 4;

  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>Frequency:</div>";
  echo "  <div class='col-xs-6'><strong>" . $freq . " MHz</strong></div>";
  echo "</div>";
  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>Velocity Factor:</div>";
  echo "  <div class='col-xs-6'><strong>" . $vel_fac . " c</strong></div>";
  echo "</div>";
  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>1/4-wave length:</div>";
  echo "  <div class='col-xs-6'><strong>" . to_feetinches($quarter_mm,$in_denom) . " </strong> (" . to_inches($quarter_mm,$in_denom) . ") " . round($quarter_mm) . " mm</div>";
  echo "</div>";
  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>1/2-wave length:</div>";
  echo "  <div class='col-xs-6'><strong>" . to_feetinches(2*$quarter_mm,$in_denom) . " </strong> (" . to_inches(2*$quarter_mm,$in_denom) . ") " . round(2*$quarter_mm) . " mm</div>";
  echo "</div>";


  $quarter_in_tmp = round($quarter_mm / 25.4 * $in_denom,0,PHP_ROUND_HALF_UP);
  $quarter_in = round($quarter_in_tmp/$in_denom);
  $quarter_in_num = $quarter_in_tmp % $in_denom;
}
?>

</div><!-- /.container -->
</body>
</html>

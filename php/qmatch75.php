<html>
<?php
include('headers.php');
?>

<body>
<div class="container">
<h1>Q-Match Calculator for 75-ohm cable</h1>

<form action="qmatch75.php" method="post" class="form-inline">
  <div class="form-group">
    <label class="sr-only" for="frequency">Frequency</label>
    <div class="input-group">
      <div class="input-group-addon">Frequency:</div>
      <input type="text" class="form-control" id="frequency" name="frequency" placeholder="e.g. 14.250">
      <div class="input-group-addon">MHz</div>
    </div>
  </div>
  <br>
  <div class="form-group">
    <label class="sr-only" for="velocityFactor">Velocity Factor</label>
    <div class="input-group">
      <div class="input-group-addon">Velocity Factor</div>
      <input type="text" class="form-control" id="velfac" name="velfac" placeholder="e.g. 79">
      <div class="input-group-addon">%</div>
    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Calculate</button>
</form>

<?php
include('functions.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $in_denom = 8;
  $freq   = $_POST['frequency'];
  $velfac = $_POST['velfac'];
  // Calculate 1/4-wavelength in mm using speed of light for air
  $quarter_mm = 299.7 / $freq * $velfac / 100 / 4 * 1000;

  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>Frequency:</div>";
  echo "  <div class='col-xs-6'><strong>" . $freq . " MHz</strong></div>";
  echo "</div>";
  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>Velocity Factor:</div>";
  echo "  <div class='col-xs-6'><strong>" . $velfac . "%</strong></div>";
  echo "</div>";  
  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>1/4-wave length:</div>";
  echo "  <div class='col-xs-6'><strong>" . to_feetinches($quarter_mm,$in_denom) . " </strong> (" . to_inches($quarter_mm,$in_denom) . ") " . round($quarter_mm) . " mm</div>";
  echo "</div>";
  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>Full wave length:</div>";
  echo "  <div class='col-xs-6'><strong>" . to_feetinches(4*$quarter_mm,$in_denom) . " </strong> (" . to_inches(4*$quarter_mm,$in_denom) . ") " . round(4*$quarter_mm) . " mm</div>";
  echo "</div>";


  $quarter_in_tmp = round($quarter_mm / 25.4 * $in_denom,0,PHP_ROUND_HALF_UP);
  $quarter_in = round($quarter_in_tmp/$in_denom);
  $quarter_in_num = $quarter_in_tmp % $in_denom;
}
?>

</div><!-- /.container -->
</body>
</html>

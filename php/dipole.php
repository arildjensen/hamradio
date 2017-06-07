<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>


<body>
<div class="container">
<h1>Dipole Calculator</h1>

<form action="dipole.php" method="post" class="form-inline">
  <div class="form-group">
    <label class="sr-only" for="frequency">Frequency</label>
    <div class="input-group">
      <div class="input-group-addon">Frequency:</div>
      <input type="text" class="form-control" id="frequency" name="frequency" placeholder="e.g. 14.250">
      <div class="input-group-addon">MHz</div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Calculate</button>
</form>

<?php
include('functions.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $in_denom = 8;
  $freq   = $_POST['frequency'];
  // Calculate 1/4-wavelength in mm using speed of light for air
  $full_mm = 1005 / $freq * 304.8;
  $quarter_mm = $full_mm / 4;

  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>Frequency:</div>";
  echo "  <div class='col-xs-6'><strong>" . $freq . " MHz</strong></div>";
  echo "</div>";
  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>1/4-wave length:</div>";
  echo "  <div class='col-xs-6'><strong>" . to_feetinches($quarter_mm,$in_denom) . " </strong> (" . to_inches($quarter_mm,$in_denom) . ") " . round($quarter_mm) . " mm</div>";
  echo "</div>";
  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>Total dipole length:</div>";
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

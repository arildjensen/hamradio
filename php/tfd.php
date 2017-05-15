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
<h1>Terminated Folded Dipole</h1>

<form action="tfd.php" method="post" class="form-inline">
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
  $length_mm = 50000 / $freq;
  $height_mm = 3000  / $freq;

  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>Frequency:</div>";
  echo "  <div class='col-xs-6'><strong>" . $freq . " MHz</strong></div>";
  echo "</div>";
  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>Length (each side):</div>";
  echo "  <div class='col-xs-6'><strong>" . to_feetinches($length_mm,$in_denom) . " </strong> (" . to_inches($length_mm,$in_denom) . ") " . round($length_mm) . " mm</div>";
  echo "</div>";
  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>Height:</div>";
  echo "  <div class='col-xs-6'><strong>" . to_feetinches($height_mm,$in_denom) . " </strong> (" . to_inches($height_mm,$in_denom) . ") " . round($height_mm) . " mm</div>";
  echo "</div>";
  echo "<div class='row'>";
  echo "  <div class='col-xs-6'>Wire length (each):</div>";
  echo "  <div class='col-xs-6'><strong>" . to_feetinches($height_mm+2*$length_mm,$in_denom) . " </strong> (" . to_inches($height_mm+2*$length_mm,$in_denom) . ") " . round($height_mm+2*$length_mm) . " mm</div>";
  echo "</div>";


}
?>

</div><!-- /.container -->
</body>
</html>

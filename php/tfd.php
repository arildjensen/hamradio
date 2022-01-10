<html>
<?php
include('headers.php');
?>

<body>
<div class="container">
<h1>Terminated Folded Dipole</h1>

<form action="tfd.php" method="post" class="form-inline">
<?php
include('input-form.php');
?>
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

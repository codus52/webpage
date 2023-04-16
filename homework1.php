<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $n = $_POST["num"];
  $sum = 0;
  $prod = 1;

  for ($i = 1; $i <= $n; $i++) {
    echo $i . " ";
    $sum += $i;
    $prod *= $i;
  }
  echo "<br>전체 합: " . $sum . "<br>";
  echo "전체 곱: " . $prod . "<br>";
}
?>
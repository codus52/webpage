
<!DOCTYPE html>
<html>
<body>
  <form method="post" action="homework1.php">
    <label for="num">숫자를 입력하세요: </label>
    <input type="number" id="num" name="num">
    <input type="submit" value="확인">
  </form>


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

</body>
</html>

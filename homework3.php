<!DOCTYPE html>
<html>
<body>
  <form method="post" action="">
    <label for="num">숫자를 입력하세요: </label>
    <input type="number" id="num" name="num">
    <input type="submit" value="확인">
  </form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = $_POST["num"];
    $fibonacci = array();

    $fibonacci[0] = 1;
    $fibonacci[1] = 1;

for ($i = 2; $i < $n; $i++) {
    $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
}

echo "i\tfi\tfi+1\tfi+1/fi\n";
for ($i = 0; $i < $n - 1; $i++) { // $n - 1 까지만 반복
    $fi = $fibonacci[$i];
    $fi_plus_1 = $fibonacci[$i + 1];

    echo ($i + 1) . "\t" . $fi . "\t" . $fi_plus_1 . "\t" . ($fi_plus_1 / $fi) . "\n";
}
}
?>

</body>
</html>
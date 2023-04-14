<?php

$n = 30;


$sum = 0;
$prod = 1;


for ($i = 1; $i <= $n; $i++) {
    echo $i . " "; 
    $sum += $i; 
    $prod *= $i; 
}


echo "<br>전체 합: " . $sum . "<br>";
echo "전체 곱: " . base_convert($prod, 10, 10) . "<br>";
?>


<?php
$n = 10;
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
?>

<!DOCTYPE html>
<html>
<head>
    <title>도형 계산기</title>
</head>
<body>
    <h1>도형 계산기</h1>
    <form method="post" action="">
        <label>도형 선택:</label>
        <select name="shape">
            <option value="triangle">삼각형</option>
            <option value="rectangle">직사각형</option>
            <option value="circle">원</option>
            <option value="cuboid">직육면체</option>
            <option value="cylinder">원통</option>
            <option value="sphere">구</option>
        </select>
        <br>
        <label>가로/반지름:</label>
        <input type="number" name="width" step="any" required>
        <br>
        <label>세로/높이:</label>
        <input type="number" name="height" step="any" required>
        <br>
        <label>높이 (원통 및 구의 경우):</label>
        <input type="number" name="length" step="any">
        <br>
        <input type="submit" value="계산">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 폼에서 입력된 값 가져오기
        $shape = $_POST["shape"];
        $width = $_POST["width"];
        $height = $_POST["height"];
        $length = $_POST["length"];

        // 선택된 도형에 따라 면적 또는 체적 계산하기
        switch ($shape) {
            case "triangle":
                $area = $width * $height / 2;
                echo "<p>삼각형의 면적: " . $area . "</p>";
                break;
            case "rectangle":
                $area = $width * $height;
                echo "<p>직사각형의 면적: " . $area . "</p>";
                break;
            case "circle":
                $area = pi() * $width * $width;
                echo "<p>원의 면적: " . $area . "</p>";
                break;
            case "cuboid":
                $volume = $width * $height * $length;
                echo "<p>직육면체의 체적: " . $volume . "</p>";
                break;
            case "cylinder":
                $volume = pi() * $width * $width * $height;
                echo "<p>원통의 체적: " . $volume . "</p>";
                break;
            case "sphere":
                $volume = 4 / 3 * pi() * $width * $width * $width;
                echo "<p>구의 체적: " . $volume . "</p>";
                break;
            default:
                echo "<p>잘못된 도형 선택</p>";
                break;
        }
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Calendar</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Calendar</h1>
    <form method="get" action="">
        <label>년도:</label>
        <input type="number" name="year" required>
        <br>
        <label>월:</label>
        <input type="number" name="month" required>
        <br>
        <input type="submit" value="확인">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // 폼에서 입력된 값 가져오기
        $year = $_GET["year"];
        $month = $_GET["month"];

        // 입력된 년도와 월에 해당하는 날짜 객체 생성
        $date = DateTime::createFromFormat('Y-m', $year . '-' . $month);

        // 날짜 객체가 유효한 경우에만 달력 출력
        if ($date !== false) {
            // 달력 테이블 생성
            echo '<table>';
            echo '<tr><th colspan="7">' . $date->format('F Y') . '</th></tr>';
            echo '<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>';
            echo '<tr>';
            
            // 입력된 년도와 월에 해당하는 첫 날의 요일을 구하여 해당 날짜까지 빈 칸 출력
            $firstDayOfWeek = $date->format('w');
            for ($i = 0; $i < $firstDayOfWeek; $i++) {
                echo '<td></td>';
            }
            
            // 입력된 년도와 월에 해당하는 마지막 날짜를 구하여 달력에 출력
            $lastDayOfMonth = $date->format('t');
            for ($day = 1; $day <= $lastDayOfMonth; $day++) {
                echo '<td>' . $day . '</td>';
                
                // 토요일인 경우에는 다음 행으로 이동
                if (($day + $firstDayOfWeek) % 7 == 0) {
                    echo '</tr><tr>';
                }
            }
            
            // 마지막 날짜 이후의 빈 칸 출력
            for ($i = 0; $i < (7 - ($lastDayOfMonth + $firstDayOfWeek) % 7) % 7; $i++) {
                echo '<td></td>';
            }
            
            echo '</tr>';
            echo '</table>';
        } else {
            echo '<p>잘못된 년도 또는 월 입력</p>';
        }
    }
    ?>
</body>
</html>
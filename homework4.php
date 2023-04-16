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

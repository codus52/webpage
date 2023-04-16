<!DOCTYPE html>
<html>
<head>
    <title>랜덤 숫자 생성 및 소팅</title>
</head>
<body>
    <h1>랜덤 숫자 생성 및 소팅</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="n">10 이상 100 이하의 정수 숫자 n을 입력하세요:</label>
        <input type="number" id="n" name="n" min="10" max="100" required>
        <button type="submit">생성 및 소팅</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = $_POST["n"];

        $data = array();

        for ($i = 0; $i < $n; $i++) {
            $data[$i] = rand(10, 100);
        }

        

        sort($data);

        echo "<br>오름차순 소팅 결과: ";
        for ($i = 0; $i < $n; $i++) {
            echo $data[$i] . " ";
        }
    }
    ?>
</body>
</html>
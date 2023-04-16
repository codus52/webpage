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
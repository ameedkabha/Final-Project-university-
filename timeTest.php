<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time test</title>
</head>
<body>
    <?php
        $d = strtotime("18:00");
        $d1 = strtotime("19:30");

        $start = date("H:i:s",$d);
        $end = date("H:i:s",$d1);

        echo $start ."<br/>";
        echo $end;
    ?>
</body>
</html>
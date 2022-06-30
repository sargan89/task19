<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
</head>
<body>

<?php
require __DIR__.'/templates/alerts.php';

$numbers = [];
for ($i = 0; $i < 24; $i++) {
    $number = random_int(-100,100);

    // Проверка числа на 0
    if ($number != 0) {
        $numbers[] = $number;
    } else {
        $number = random_int(-100,100);
        $numbers[] = $number;
    }
}

$sum1 = $numbers[0] + $numbers[1];
$sum2 = $numbers[2] + $numbers[3];
$sum3 = $numbers[4] + $numbers[5];

$subtract1 = $numbers[6] - $numbers[7];
$subtract2 = $numbers[8] - $numbers[9];
$subtract3 = $numbers[10] - $numbers[11];

$multiple1 = $numbers[12] * $numbers[13];
$multiple2 = $numbers[14] * $numbers[15];
$multiple3 = $numbers[16] * $numbers[17];

$divide1 = round($numbers[18] / $numbers[19], 2);
$divide2 = round($numbers[20] / $numbers[21], 2);
$divide3 = round($numbers[22] / $numbers[23], 2);

$rows = [
    1  => [
        'first_number' => $numbers[0],
        'second_number' => $numbers[1],
        'operation' => '+',
        'result' => $sum1
    ],
    2  => [
        'first_number' => $numbers[2],
        'second_number' => $numbers[3],
        'operation' => '+',
        'result' => $sum2
    ],
    3  => [
        'first_number' => $numbers[4],
        'second_number' => $numbers[5],
        'operation' => '+',
        'result' => $sum3
    ],
    4  => [
        'first_number' => $numbers[6],
        'second_number' => $numbers[7],
        'operation' => '-',
        'result' => $subtract1
    ],
    5  => [
        'first_number' => $numbers[8],
        'second_number' => $numbers[9],
        'operation' => '-',
        'result' => $subtract2
    ],
    6  => [
        'first_number' => $numbers[10],
        'second_number' => $numbers[11],
        'operation' => '-',
        'result' => $subtract3
    ],
    7  => [
        'first_number' => $numbers[12],
        'second_number' => $numbers[13],
        'operation' => '*',
        'result' => $multiple1
    ],
    8  => [
        'first_number' => $numbers[14],
        'second_number' => $numbers[15],
        'operation' => '*',
        'result' => $multiple2
    ],
    9  => [
        'first_number' => $numbers[16],
        'second_number' => $numbers[17],
        'operation' => '*',
        'result' => $multiple3
    ],
    10  => [
        'first_number' => $numbers[18],
        'second_number' => $numbers[19],
        'operation' => '/',
        'result' => $divide1
    ],
    11  => [
        'first_number' => $numbers[20],
        'second_number' => $numbers[21],
        'operation' => '/',
        'result' => $divide2
    ],
    12  => [
        'first_number' => $numbers[22],
        'second_number' => $numbers[23],
        'operation' => '/',
        'result' => $divide3
    ]
];
?>

<h1 class="m-5">Контрольная работа по арифметике</h1>

<form name="math-test" action="scripts/check.php" method="post" class="m-5">
    <div class="operations container">
        <?php foreach ($rows as $key => $value): ?>
            <?php
            $firstNumber = $value['first_number'];
            $secondNumber = $value['second_number'];
            $operation = $value['operation'];
            ?>
            <div class="row mb-3">
                <div class="col-lg-2 col-5">
                    <?php echo $firstNumber . ' ' . $operation . ' ' . $secondNumber ?>
                </div>
                <div class="col-lg-1 col-3">=</div>
                <div class="col-lg-2 col-4">
                    <input type="number" step="0.01" class="answer form-control" name="answer_<?php echo $key ?>" required>
                    <input type="hidden" name="hidden_first_number_<?php echo $key ?>" value="<?php echo $firstNumber ?>">
                    <input type="hidden" name="hidden_second_number_<?php echo $key ?>" value="<?php echo $secondNumber ?>">
                    <input type="hidden" name="hidden_operation_<?php echo $key ?>" value="<?php echo $operation ?>">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <br>
    <div class="button">
        <button type="Submit" class="btn btn-primary mb-3">Submit</button>
    </div>
</form>

</body>
</html>

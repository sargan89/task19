<?php
session_start();

var_dump($_POST);

require_once __DIR__.'/../functions/alerts.php';

// 1. Проверить корректность запроса

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    set_alert('alert alert-danger', 'Method not allowed!');

    header('Location: ../index.php');

    exit;
}

// 2. Проверить данные

$answer1 = $_POST['answer_1'];
$answer2 = $_POST['answer_2'];
$answer3 = $_POST['answer_3'];
$answer4 = $_POST['answer_4'];
$answer5 = $_POST['answer_5'];
$answer6 = $_POST['answer_6'];
$answer7 = $_POST['answer_7'];
$answer8 = $_POST['answer_8'];
$answer9 = $_POST['answer_9'];
$answer10 = $_POST['answer_10'];
$answer11 = $_POST['answer_11'];
$answer12 = $_POST['answer_12'];

if (!$answer1 || !$answer2 || !$answer3 || !$answer4 || !$answer5 || !$answer6 ||
    !$answer7 || !$answer8 || !$answer9 || !$answer10 || !$answer11 || !$answer12
) {
    set_alert('alert alert-danger', 'Не все поля заполнены! Заполните пожалуйста.');
    header('Location: ../index.php');
    exit;
}

if (!is_numeric($answer1) || !is_numeric($answer2) || !is_numeric($answer3) ||
    !is_numeric($answer4) || !is_numeric($answer5) || !is_numeric($answer6) ||
    !is_numeric($answer7) || !is_numeric($answer8) || !is_numeric($answer9)
) {
    set_alert('alert alert-danger', 'Не во всех полях числа! Нельзя вводить буквы! Пожалуйста введите числа во всех полях.');
    header('Location: ../index.php');
    exit;
}

// 3. Считаем количество правильных ответов

$mark = 0;

for ($i = 1; $i <= 12; $i++) {
    if ($_POST['answer_'.$i] == $_POST['hidden_answer_'.$i]) {
        $mark++;
    }
}

set_alert('alert alert-success', 'Ваша оценка: ' . '<strong>' . $mark . '</strong>');

header('Location: ../index.php');

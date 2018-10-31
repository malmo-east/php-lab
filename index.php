<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php lab 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <form action="" name="Students List" method="post">
        <div class="field-wrapper">
            <div class="line">
                <div class="title">Номер зачётной книжки</div>
            <div class="field"><input type="number" name="bookNumber0" size="10"
                                      placeholder="введите номер зачётной книжки.."></div>
            <div class="field"><input type="number" name="bookNumber1" size="10"
                                      placeholder="введите номер зачётной книжки.."></div>
            <div class="field"><input type="number" name="bookNumber2" size="10"
                                      placeholder="введите номер зачётной книжки.."></div>
            <div class="field"><input type="number" name="bookNumber3" size="10"
                                      placeholder="введите номер зачётной книжки.."></div>
            <div class="field"><input type="number" name="bookNumber4" size="10"
                                      placeholder="введите номер зачётной книжки.."></div>
        </div>
            <div class="line">
                <div class="title">Фамилия студента</div>
                <div class="field"><input type="text" name="lastName0" size="10" placeholder="введите фамилию.."></div>
                <div class="field"><input type="text" name="lastName1" size="10" placeholder="введите фамилию.."></div>
                <div class="field"><input type="text" name="lastName2" size="10" placeholder="введите фамилию.."></div>
                <div class="field"><input type="text" name="lastName3" size="10" placeholder="введите фамилию.."></div>
                <div class="field"><input type="text" name="lastName4" size="10" placeholder="введите фамилию.."></div>
            </div>
            <div class="line">
                <div class="title">Cредний балл</div>
                <div class="field"><input type="number" name="avgScore0" size="10" placeholder="введите средний балл..">
                </div>
                <div class="field"><input type="number" name="avgScore1" size="10" placeholder="введите средний балл..">
                </div>
                <div class="field"><input type="number" name="avgScore2" size="10" placeholder="введите средний балл..">
                </div>
                <div class="field"><input type="number" name="avgScore3" size="10" placeholder="введите средний балл..">
                </div>
                <div class="field"><input type="number" name="avgScore4" size="10" placeholder="введите средний балл..">
                </div>
            </div>
        </div>
        <div class="btn-bottom">
            <button type="submit" name="add" size="10">Сортировать</button>
        </div>
    </form>
</div>

<?php

class UserData
{
    public $number;
    public $lastName;
    public $avgScore;
    public function __construct($number, $lastName, $avgScore){
        $this->number = $number;
        $this->lastName = $lastName;
        $this->avgScore = $avgScore;
    }
    public function toString(){
        echo " " . $this->number . " " . $this->lastName . " " . $this->avgScore . " ";
    }
}

function fieldResult($collection){
    echo "<div class='result-item'>";
    foreach ($collection as $value) {
        $value->toString();
    }
    echo "</div>";
}

if (isset($_POST['add'])) {

    $student0 = new UserData($_POST['bookNumber0'], $_POST['lastName0'], $_POST['avgScore0']);
    $student1 = new UserData($_POST['bookNumber1'], $_POST['lastName1'], $_POST['avgScore1']);
    $student2 = new UserData($_POST['bookNumber2'], $_POST['lastName2'], $_POST['avgScore2']);
    $student3 = new UserData($_POST['bookNumber3'], $_POST['lastName3'], $_POST['avgScore3']);
    $student4 = new UserData($_POST['bookNumber4'], $_POST['lastName4'], $_POST['avgScore4']);

    $allData = array($student0, $student1, $student2, $student3, $student4);
    $buffer = $allData;

    echo "<div class='title-item'>Введённые данные: </div>";
    fieldResult($buffer);


    echo "<div class='title-item'>Сортировка по возрастанияю по номеру: </div>";

    usort($buffer, 'compareToNumberUp');
    fieldResult($buffer);
    $buffer = $allData;

    echo "<div class='title-item'>Сортировка по возрастанияю по фамилии: </div>";

    usort($buffer, 'compareToNameUp');
    fieldResult($buffer);
    $buffer = $allData;

    echo "<div class='title-item'>Сортировка по возрастанияю по среднему балу: </div>";

    usort($buffer, 'compareToScoreUp');
    fieldResult($buffer);
    $buffer = $allData;

    echo "<div class='title-item'>Сортировка по убыванию по номеру: </div>";

    usort($buffer, 'compareToNumberDown');
    fieldResult($buffer);
    $buffer = $allData;

    echo "<div class='title-item'>Сортировка по убыванию по фамилии: </div>";

    usort($buffer, 'compareToNameDown');
    fieldResult($buffer);
    $buffer = $allData;

    echo "<div class='title-item'>Сортировка по убыванию по среднему балу: </div>";

    usort($buffer, 'compareToScoreDown');
    fieldResult($buffer);
    $buffer = $allData;

}

function compareToNumberUp($number1, $number2)
{
    if ($number1->number == $number2->number) {
        return 0;
    }
    if ($number1->number > $number2->number) {
        return 1;
    }
    return -1;
}


function compareToNameUp($lastName1, $lastName2)
{
    if ($lastName1->lastName == $lastName2->lastName) {
        return 0;
    }
    if ($lastName1->lastName > $lastName2->lastName) {
        return 1;
    }
    return -1;
}

function compareToScoreUp($avgScore1, $avgScore2)
{
    if ($avgScore1->avgScore == $avgScore2->avgScore) {
        return 0;
    }
    if ($avgScore1->avgScore > $avgScore2->avgScore) {
        return 1;
    }
    return -1;
}

function compareToNumberDown($number1, $number2)
{
    if ($number1->number == $number2->number) {
        return 0;
    }
    if ($number1->number < $number2->number) {
        return 1;
    }
    return -1;
}

function compareToNameDown($lastName1, $lastName2)
{
    if ($lastName1->lastName == $lastName2->lastName) {
        return 0;
    }
    if ($lastName1->lastName < $lastName2->lastName) {
        return 1;
    }
    return -1;
}

function compareToScoreDown($avgScore1, $avgScore2)
{
    if ($avgScore1->avgScore == $avgScore2->avgScore) {
        return 0;
    }
    if ($avgScore1->avgScore < $avgScore2->avgScore) {
        return 1;
    }
    return -1;
}

?>


</body>
</html>

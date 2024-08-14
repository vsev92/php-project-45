<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function brainEvenMain()
{
    $name = greeting();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $trueResponcecount = 0;
    for ($i = 0; $i < 3; $i++) {
        $number = rand(0, 100);
        line("Question: {$number}");
        if (!isEvenResponceTrue($number)) {
            line("Let's try again, {$name}!");
            break;
        } else {
            $trueResponcecount++;
        }
    }
    if ($trueResponcecount === 3) {
        line("Congratulations, {$name}!");
    }
}



function isEvenResponceTrue($number)
{
    $ansver = prompt('Your answer');
    $correctAnsver = getCorrectAnsver($number);
    if (isAnsverValid($ansver)) {
        if ($ansver === $correctAnsver) {
            line("Correct!");
            return true;
        } else {
            line("'{$ansver}' is wrong answer ;(. Correct answer was '{$correctAnsver}'.");
            return false;
        }
    } else {
        line("'{$ansver}' is wrong answer ;(. Correct answer was '{$correctAnsver}'.");
        return false;
    }
}

function getCorrectAnsver($number)
{
    return ($number % 2 === 0) ?  'yes' : 'no';
}

function isAnsverValid($ansver)
{
    $ansvers = ["no" , "yes"];
    return in_array($ansver, $ansvers);
}

<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greet()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function isCorrectAnswer(string $correctAnswer, string $userAnswer)
{
    if ($userAnswer === $correctAnswer) {
        line("Correct!");
        return true;
    } else {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
         return false;
    }
}

const ROUNDS_COUNT = 3;

function playBrainGame(string $getGameTitle, string $getQuestionAndAnswer)
{
    $name = greet();
    line($getGameTitle());
    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $questAndAnswer = $getQuestionAndAnswer();
        line($questAndAnswer['question']);
        $userAnswer = prompt('Your answer');
        if (!isCorrectAnswer($questAndAnswer['answer'], $userAnswer)) {
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}

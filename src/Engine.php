<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function playBrainGame(string $gameTitle, callable $getQuestionAndAnswer)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameTitle);
    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $questAndAnswer = $getQuestionAndAnswer();
        line($questAndAnswer['question']);
        $userAnswer = prompt('Your answer');
        $isCorrectAnswer = ($questAndAnswer['answer'] === $userAnswer);
        if ($isCorrectAnswer) {
            line("Correct!");
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$questAndAnswer['answer']}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}

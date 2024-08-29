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

function isCorrectAnswer(string $question, string $correctAnswer, string $userAnswer)
{
    if ($userAnswer === $correctAnswer) {
        line("Correct!");
        return true;
    } else {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
         return false;
    }
}

function playBrainGame(string $gameTitle, array $questions, array $correctAnswers)
{
    $name = greet();
    line($gameTitle);
    $correctUserAnswersCount = 0;
    for ($i = 0; $i < 3; $i++) {
        line($questions[$i]);
        $userAnswer = prompt('Your answer');
        if (isCorrectAnswer($questions[$i], $correctAnswers[$i], $userAnswer)) {
            $correctUserAnswersCount++;
        } else {
            line("Let's try again, {$name}!");
            break;
        }
    }
    if ($correctUserAnswersCount === 3) {
        line("Congratulations, {$name}!");
    }
}

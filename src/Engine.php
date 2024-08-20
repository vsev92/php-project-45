<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

class GameBase
{
    public function greeting()
    {
        line('Welcome to the Brain Game!');
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);
        return $name;
    }

    public function getGameTitle()
    {
        return 'This is the BaseGame';
    }

    public function getQuestion()
    {
        return "Question: ";
    }

    public function getCorrectAnsver($question)
    {
        return '';
    }
    public function isAnsverValid($ansver)
    {
        return true;
    }

    public function isCorrectAnswer($question, $ansver)
    {
        $correctAnsver = $this->getCorrectAnsver($question);
        if ($this->isAnsverValid($ansver)) {
            if ($ansver == $correctAnsver) {
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

    public function brainGameMain()
    {
        $name = $this->greeting();
        line($this->getGameTitle());
        $trueResponcecount = 0;
        for ($i = 0; $i < 3; $i++) {
            $question = $this->getQuestion();
            line($question);
            $ansver = prompt('Your answer');
            if ($this->isCorrectAnswer($question, $ansver)) {
                $trueResponcecount++;
            } else {
                line("Let's try again, {$name}!");
                break;
            }
        }
        if ($trueResponcecount === 3) {
            line("Congratulations, {$name}!");
        }
    }
}

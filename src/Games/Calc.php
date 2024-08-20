<?php

namespace BrainGames\Engine;

class GameCalc extends GameBase
{
    public function getGameTitle()
    {
        return 'What is the result of the expression?';
    }

    public function getQuestion()
    {
        $operators = ['+', '-', '*'];
        $operand1 = rand(0, 100);
        $operand2 = rand(0, 100);
        $operator = $operators[rand(0, 2)];
        return "Question: {$operand1} {$operator} {$operand2}";
    }

    public function getCorrectAnsver($question)
    {
        $aQuestion = explode(" ", $question);
        $operand1 = $aQuestion[1];
        $operator = $aQuestion[2];
        $operand2 = $aQuestion[3];
        switch ($operator) {
            case '+':
                return $operand1 + $operand2;
                break;
            case '*':
                return $operand1 * $operand2;
                break;
            case '-':
                return $operand1 - $operand2;
                break;
        }
    }
    public function isAnsverValid($ansver)
    {
        return is_numeric($ansver);
    }
}

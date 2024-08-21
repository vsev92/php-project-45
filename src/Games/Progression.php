<?php

namespace BrainGames\Engine;

class GameProgression extends GameBase
{
    public function getGameTitle()
    {
        return 'What number is missing in the progression?';
    }

    public function getQuestion()
    {
        $progressionLenght = rand(5, 10);
        $hidenElementPos = rand(0, $progressionLenght - 1);
        $element = rand(0, 100);

        for (;;) {
            $difference = rand(-5, 5);
            if ($difference !== 0) {
                break;
            }
        }
        if ($hidenElementPos !== 0) {
            $question = "Question: " . $element;
        } else {
            $question = "Question: ..";
        }

        for ($i = 1; $i < $progressionLenght; $i++) {
            $element += $difference;
            if ($i === $hidenElementPos) {
                $question = $question . " ..";
            } else {
                $question = $question . " " . $element;
            }
        }

        return $question;
    }

    public function getCorrectAnsver($question)
    {
        $aQuestion = explode(" ", $question);
        $difference = 0;
        $aLen = count($aQuestion);
        for ($i = 2; $i < $aLen; $i++) {
            if (($aQuestion[$i] !== '..') && ($aQuestion[$i - 1] !== '..')) {
                $difference = (int)$aQuestion[$i] - (int)$aQuestion[$i - 1];
                break;
            }
        }
        for ($i = 1; $i < $aLen; $i++) {
            if ($aQuestion[$i] === '..') {
                if ($i === $aLen - 1) {
                    return $aQuestion[$i - 1] + $difference;
                } else {
                    return $aQuestion[$i + 1] - $difference;
                }
            }
        }
    }


    public function isAnsverValid($ansver)
    {
        return is_numeric($ansver);
    }
}

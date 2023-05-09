<?php

namespace Buddhika\Helpers;

class Helpers
{
    public static function getRandomElement(array $array): mixed
    {
        return $array[array_rand($array)];
    }

    public static function getLanguageScores(array $languageModels, string $text): array
    {
        // Lowercase the input text
        $text = strtolower($text);

        // Remove punctuation marks and numbers
        $text = preg_replace('/[^\p{L}\p{N}\s]/u', '', $text);

        // Split the input text into words
        $words = preg_split('/\s+/u', $text, -1, PREG_SPLIT_NO_EMPTY);

        $scores = [];

        foreach ($languageModels as $language => $model) {
            // Calculate the intersection of the input text words and the language model words
            $matchingWords = array_intersect($model, $words);

            // Calculate the score for this language
            $scores[$language] = count($matchingWords) / count($words);
        }

        // Normalize the scores to sum up to 1
        $totalScore = array_sum($scores);

        if ($totalScore === 0) {
            throw new \Exception('Unable to detect language for given text.');
        }

        foreach ($scores as $language => $score) {
            $scores[$language] = $score / $totalScore;
        }

        arsort($scores);

        return $scores;
    }
}

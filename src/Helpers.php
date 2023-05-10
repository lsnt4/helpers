<?php

namespace Buddhika\Helpers;

class Helpers
{
    public static function languageScores(array $languageModels, string $text): array
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

    public static function randomElement(array $array): mixed
    {
        return $array[array_rand($array)];
    }

    public static function slugify(string $text): string
    {
        // Map diacritic characters to their base characters
        $diacritic_map = [
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O',
            'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 'ß' => 'ss', 'à' => 'a',
            'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 'è' => 'e',
            'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'd',
            'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u',
            'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'þ' => 'th', 'ÿ' => 'y', 'Ŕ' => 'R', 'ŕ' => 'r'
        ];

        // Replace diacritic characters with their base characters
        $text = strtr($text, $diacritic_map);

        // Lowercase the input text
        $text = strtolower(trim($text));

        // Replace all character with a '-' except alpha numeric characters
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        $text = preg_replace('/-+$/', '', $text);

        return $text;
    }
}

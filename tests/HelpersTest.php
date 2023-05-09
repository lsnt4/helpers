<?php

namespace Buddhika\Helpers;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    public function testGetRandomElement(): void
    {
        $animals = ['alpaca', 'bear', 'cheetah', 'dolphin', 'elephant'];
        $randomAnimal = Helpers::getRandomElement($animals);

        $this->assertTrue(in_array($randomAnimal, $animals));
    }

    public function testGetLanguageScores()
    {
        $languageModels = [
            'en' => ['hello', 'world', 'goodbye'],
            'es' => ['hola', 'mundo', 'adios'],
            'fr' => ['bonjour', 'monde', 'au revoir'],
        ];

        // Test with English text
        $text = 'Hello world! How are you doing today?';
        $expectedResult = ['en' => 1.0, 'es' => 0.0, 'fr' => 0.0];
        $result = Helpers::getLanguageScores($languageModels, $text);
        $this->assertEquals($expectedResult, $result);

        // Test with Spanish text
        $text = 'Hola mundo! ¿Cómo estás hoy?';
        $expectedResult = ['en' => 0.0, 'es' => 1.0, 'fr' => 0.0];
        $result = Helpers::getLanguageScores($languageModels, $text);
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetLanguageScoresError()
    {
        $languageModels = [
            'en' => ['hello', 'world', 'goodbye'],
            'es' => ['hola', 'mundo', 'adios'],
            'fr' => ['bonjour', 'monde', 'au revoir'],
        ];

        // Test with unsupported language
        $text = 'こんにちは';
        $this->expectException(\Exception::class);
        Helpers::getLanguageScores($languageModels, $text);
    }
}

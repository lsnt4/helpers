<?php

namespace Buddhika\Helpers;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    public function testArrayFlattenFlattensMultidimensionalArray()
    {
        $array = array([1, 2], [3, 4], [5, 6]);
        $flattenedArray = Helpers::arrayFlatten($array);
        $this->assertEquals([1, 2, 3, 4, 5, 6], $flattenedArray);
    }

    public function testArraySortByKeySortsMultidimensionalArrayByKey()
    {
        $array = [
            ['name' => 'John', 'age' => 30],
            ['name' => 'Alice', 'age' => 25],
            ['name' => 'Bob', 'age' => 35],
        ];

        $sortedArray = [
            ['name' => 'Alice', 'age' => 25],
            ['name' => 'John', 'age' => 30],
            ['name' => 'Bob', 'age' => 35],
        ];

        $result = Helpers::arraySortByKey($array, 'age');

        $this->assertEquals($sortedArray, $result);
    }

    public function testArraySortByKeyReturnsOriginalArrayWhenKeyNotExists()
    {
        $array = [
            ['name' => 'John', 'age' => 30],
            ['name' => 'Alice', 'age' => 25],
            ['name' => 'Bob', 'age' => 35],
        ];

        $result = Helpers::arraySortByKey($array, 'nonexistent_key');

        $this->assertEquals($array, $result);
    }

    public function testArraySortByKeyReturnsEmptyArrayWhenGivenEmptyArray()
    {
        $array = [];

        $result = Helpers::arraySortByKey($array, 'name');

        $this->assertEquals($array, $result);
    }

    public function testLanguageScores()
    {
        $languageModels = [
            'en' => ['hello', 'world', 'goodbye'],
            'es' => ['hola', 'mundo', 'adios'],
            'fr' => ['bonjour', 'monde', 'au revoir'],
        ];

        // Test with English text
        $text = 'Hello world! How are you doing today?';
        $expectedResult = ['en' => 1.0, 'es' => 0.0, 'fr' => 0.0];
        $result = Helpers::languageScores($languageModels, $text);
        $this->assertEquals($expectedResult, $result);

        // Test with Spanish text
        $text = 'Hola mundo! ¿Cómo estás hoy?';
        $expectedResult = ['en' => 0.0, 'es' => 1.0, 'fr' => 0.0];
        $result = Helpers::languageScores($languageModels, $text);
        $this->assertEquals($expectedResult, $result);
    }

    public function testLanguageScoresError()
    {
        $languageModels = [
            'en' => ['hello', 'world', 'goodbye'],
            'es' => ['hola', 'mundo', 'adios'],
            'fr' => ['bonjour', 'monde', 'au revoir'],
        ];

        // Test with unsupported language
        $text = 'こんにちは';
        $this->expectException(\Exception::class);
        Helpers::languageScores($languageModels, $text);
    }

    public function testRandomElement(): void
    {
        $animals = ['alpaca', 'bear', 'cheetah', 'dolphin', 'elephant'];
        $randomAnimal = Helpers::randomElement($animals);

        $this->assertTrue(in_array($randomAnimal, $animals));
    }

    public function testSlugifyConvertsStringIntoSlug()
    {
        $text = "This is a sample string! #123";
        $expected = "this-is-a-sample-string-123";
        $this->assertEquals($expected, Helpers::slugify($text));
    }

    public function testSlugifyWithMultipleSpaces()
    {
        $text = " This    is   a  sample  string!   ";
        $expected = "this-is-a-sample-string";
        $this->assertEquals($expected, Helpers::slugify($text));
    }

    public function testSlugifyWithSymbols()
    {
        $text = "This is a sample string! @#$%^&*()";
        $expected = "this-is-a-sample-string";
        $this->assertEquals($expected, Helpers::slugify($text));
    }

    public function testSlugifyWithDiacritics()
    {
        $text = "Jalapeño is a type of chili pepper";
        $expected = "jalapeno-is-a-type-of-chili-pepper";
        $this->assertEquals($expected, Helpers::slugify($text));
    }

    public function testSlugifyWithTrailingHyphen()
    {
        $text = "This is a sample string-";
        $expected = "this-is-a-sample-string";
        $this->assertEquals($expected, Helpers::slugify($text));
    }
}

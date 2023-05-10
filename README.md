# Helpers

- [Installation](#installation)
- [Usage](#usage)
  - [Flatten array](#flatten-array)
  - [Sort array by key (values)](#sort-array-by-key-values)
  - [Detect languages](#detect-languages)
  - [Get a random element](#get-a-random-element)
  - [Slugify strings](#slugify-strings)

## Installation

```
composer require buddhika/helpers
```

## Usage

```php
namespace Buddhika\Helpers;
```

### Flatten array

```php
$array = array(['a'], ['b', 'c'], ['d', 'e', 'f']);
$flattenedArray = Helpers::arrayFlatten($array);

print_r($flattenedArray);

/*
Array
(
    [0] => a
    [1] => b
    [2] => c
    [3] => d
    [4] => e
    [5] => f
)
*/
```

### Sort array by key (values)

```php
$array = array(
    array("name" => "John", "age" => 23),
    array("name" => "Jane", "age" => 21),
    array("name" => "Mike", "age" => 25)
);
$sortedArray = Helpers::arraySortByKey($array, "age");

print_r($sortedArray);

/*
Array
(
    [0] => Array
        (
            [name] => Jane
            [age] => 21
        )

    [1] => Array
        (
            [name] => John
            [age] => 23
        )

    [2] => Array
        (
            [name] => Mike
            [age] => 25
        )

)
*/
```

### Detect languages

```php
$languageModels = [
    'en' => ['hello', 'world', 'goodbye'],
    'es' => ['hola', 'mundo', 'adios'],
    'fr' => ['bonjour', 'monde', 'au revoir'],
];
$text = 'Hello world! How are you doing today?';
$result = Helpers::languageScores($languageModels, $text);

print_r($result);

/*
Array
(
    [en] => 1.0
    [es] => 0.0
    [fr] => 0.0
)
*/
```

### Get a random element

```php
$array = ['apple', 'banana', 'cherry'];
$element = Helpers::randomElement($array);

print_r($element);

// banana
```

### Slugify strings

```php
$text = "Commit Often, Perfect Later, Publish Once: Git Best Practices";
$result = Helpers::slugify($text);

print_r($result);

// commit-often-perfect-later-publish-once-git-best-practices
```

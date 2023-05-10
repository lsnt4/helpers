# Helpers

- [Installation](#installation)
- [Usage](#usage)
  - [Flatten arrays](#flatten-arrays)
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

### Flatten arrays

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

# Helpers

## Installation

```
composer require buddhika/helpers
```

## Usage 

### Get a random element

```php
$element = Buddhika\Helpers::getRandomElement($array);
```

### Detect languages

```php
$languageModels = [
    'en' => ['hello', 'world', 'goodbye'],
    'es' => ['hola', 'mundo', 'adios'],
    'fr' => ['bonjour', 'monde', 'au revoir'],
];

$text = 'Hello world! How are you doing today?';

$result = Buddhika\Helpers::getLanguageScores($languageModels, $text);

print_r($result);

Array
(
    [en] => 1.0
    [es] => 0.0
    [fr] => 0.0
)
```

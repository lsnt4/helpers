# Helpers

## Installation

```
composer require buddhika/helpers
```

## Usage 

### Get a random element

```php
$element = Buddhika\Helpers::randomElement($array);
```

### Detect languages

```php
$languageModels = [
    'en' => ['hello', 'world', 'goodbye'],
    'es' => ['hola', 'mundo', 'adios'],
    'fr' => ['bonjour', 'monde', 'au revoir'],
];

$text = 'Hello world! How are you doing today?';

$result = Buddhika\Helpers::languageScores($languageModels, $text);

print_r($result);

Array
(
    [en] => 1.0
    [es] => 0.0
    [fr] => 0.0
)
```

### Slugify strings

```php
$text = "Commit Often, Perfect Later, Publish Once: Git Best Practices";
$result = Buddhika\Helpers::slugify($text);

print_r($result);

// commit-often-perfect-later-publish-once-git-best-practices
```

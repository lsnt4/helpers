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
}

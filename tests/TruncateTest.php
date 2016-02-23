<?php

namespace Dzango\Twig\Extension\Test;

use PHPUnit_Framework_TestCase;
use Dzango\Twig\Extension\Truncate;

class TruncateTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testTruncate($text, $length, $ending, $exact, $considerHtml, $expected)
    {
        $truncate = new Truncate();

        $this->assertEquals(
            $expected,
            $truncate->truncate($text, $length, $ending, $exact, $considerHtml)
        );
    }

    public function dataProvider()
    {
        return array(
            array('text to truncate', 1, '...', false, true, '...'),
            array('text to truncate', 1, '...', true, true, 't...'),
            array('text', 4, '...', false, true, 'text'),
            array('text', 1, '...', false, true, '...'),
            array('text', 2, '...', true, true, 'te...'),
            array('<div style="color: red;">Hello world</div>', 5, '...', false, true, '<div style="color: red;">Hello</div>...'),
            array('<div style="color: red;">Hello world</div>', 8, '...', false, false, '<div...'),
            array('<div style="color: red;">Hello world</div>', 1, '...', false, false, '...'),
            array('<div style="color: red;">Hello world</div>', 1, '...', true, false, '<d...'),
            array('<div style="color: red;">Hello world</div>', 3, '...', true, true, '<div style="color: red;">Hel</div>...'),
            array('<div>Hi friend</div>', 2, '...', false, true, '<div>Hi</div>...'),
            array('<div>Hi friend</div>', 2, '...', false, false, '...'),
            array('<div>Hi friend</div>', 5, '...', true, true, '<div>Hi fr</div>...'),
        );
    }
}

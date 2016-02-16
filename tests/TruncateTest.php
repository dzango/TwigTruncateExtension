<?php

namespace Dzango\Twig\Extension\Test;

use PHPUnit_Framework_TestCase;
use Dzango\Twig\Extension\Truncate;

class TruncateTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testTruncate($text, $length, $expected)
    {
        $truncate = new Truncate();

        $this->assertEquals(
            $expected,
            $truncate->truncate($text, $length)
        );
    }

    public function dataProvider()
    {
        return array(
            array('text to truncate', 1, 'text...'),
            array('<p>text to truncate</p>', 2, '<p>text</p>...'),
            array('text', 4, 'text'),
        );
    }
}

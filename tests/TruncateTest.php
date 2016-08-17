<?php

namespace Dzango\Twig\Extension\Test;

use PHPUnit_Framework_TestCase;
use Dzango\Twig\Extension\Truncate;

class TruncateTest extends PHPUnit_Framework_TestCase
{
    protected $truncate;

    /**
     * @dataProvider dataProvider
     */
    public function testTruncate($text, $length, $ending, $exact, $considerHtml, $expected)
    {
        $this->assertEquals(
            $expected,
            $this->truncate->truncate($text, $length, $ending, $exact, $considerHtml)
        );
    }

    public function dataProvider()
    {
        return array(
            array('Fourscore and seven years ago', 9, '', true, false, 'Fourscore'),
            array('Fourscore and seven years ago', 9, '', false, false, 'Fourscore'),
            array('Fourscore and seven years ago', 10, '', true, false, 'Fourscore '),
            array('Fourscore and seven years ago', 10, '', false, false, 'Fourscore'),
            array('Fourscore and seven years ago', 11, '', true, false, 'Fourscore a'),
            array('Fourscore and seven years ago', 11, '', false, false, 'Fourscore'),
            array('Fourscore and seven years ago', 9, '...', true, false, 'Foursc...'),
            array('Fourscore and seven years ago', 9, '...', false, false, 'Foursc...'),
            array('Fourscore and seven years ago', 14, '...', true, false, 'Fourscore a...'),
            array('Fourscore and seven years ago', 14, '...', false, false, 'Fourscore...'),
            array('Fourscore and seven years ago', 16, '...', true, false, 'Fourscore and...'),
            array('Fourscore and seven years ago', 16, '...', false, false, 'Fourscore...'),
            array('Fourscore and seven years ago', 18, '...', true, false, 'Fourscore and s...'),
            array('Fourscore and seven years ago', 18, '...', false, false, 'Fourscore and...'),
            array('<div>Fourscore and seven years ago</div>', 9, '', true, true, '<div>Fourscore</div>'),
            array('<div>Fourscore and seven years ago</div>', 9, '', false, true, '<div>Fourscore</div>'),
            array('<div>Fourscore and seven years ago</div>', 10, '', true, true, '<div>Fourscore </div>'),
            array('<div>Fourscore and seven years ago</div>', 10, '', false, true, '<div>Fourscore</div>'),
            array('<div>Fourscore and seven years ago</div>', 11, '', true, true, '<div>Fourscore a</div>'),
            array('<div>Fourscore and seven years ago</div>', 11, '', false, true, '<div>Fourscore</div>'),
            array('<div>Fourscore and seven years ago</div>', 9, '...', true, true, '<div>Foursc</div>...'),
            array('<div>Fourscore and seven years ago</div>', 9, '...', false, true, '<div>Foursc</div>...'),
            array('<div>Fourscore and seven years ago</div>', 14, '...', true, true, '<div>Fourscore a</div>...'),
            array('<div>Fourscore and seven years ago</div>', 14, '...', false, true, '<div>Fourscore</div>...'),
            array('<div>Fourscore and seven years ago</div>', 16, '...', true, true, '<div>Fourscore and</div>...'),
            array('<div>Fourscore and seven years ago</div>', 16, '...', false, true, '<div>Fourscore</div>...'),
            array('<div>Fourscore and seven years ago</div>', 18, '...', true, true, '<div>Fourscore and s</div>...'),
            array('<div>Fourscore and seven years ago</div>', 18, '...', false, true, '<div>Fourscore and</div>...'),
            array('<div style="color:red">Fourscore and seven years ago</div>', 9, '', true, true, '<div style="color:red">Fourscore</div>'),
            array('<div style="color:red">Fourscore and seven years ago</div>', 9, '', false, true, '<div style="color:red">Fourscore</div>'),
            array('£^_{}|}~žščř"', 4, '', true, false, '£^_{'),
            array('£^_{}|}~žščř"', 4, '', false, false, '£^_{'),
        );
    }

    protected function setUp()
    {
        $this->truncate = new Truncate();
    }
}

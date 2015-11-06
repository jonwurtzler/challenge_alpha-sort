<?php
use AlphaSort\AlphaSort;

/**
 * @author Jon Wurtzler <jon.wurtzler@gmail.com>
 */
class AlphaSortTest extends PHPUnit_Framework_TestCase
{

    public function testDualArray() {
        $alphaSort = new AlphaSort("typewriter");
        $this->assertEquals("eeiprrttwy", $alphaSort->alphaSortDualArrays());
    }

    public function testDualArrayProcessCount() {
        $alphaSort = new AlphaSort("typewriter");
        $alphaSort->alphaSortDualArrays();
        $this->assertEquals(23, $alphaSort->getLastProcessCount());
    }

    public function testSwapSort() {
        $alphaSort = new AlphaSort("typewriter");
        $this->assertEquals("eeiprrttwy", $alphaSort->alphaSwapSort());
    }

    public function testSwapSortProcessCount() {
        $alphaSort = new AlphaSort("typewriter");
        $alphaSort->alphaSwapSort();
        $this->assertEquals(34, $alphaSort->getLastProcessCount());
    }
}

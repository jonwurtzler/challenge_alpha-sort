<?php namespace AlphaSort;

/**
 * AlphaSort - Sort a given string's characters into an alphabetical list
 */
class AlphaSort
{
    /**
     * @var string $baseString
     */
    private $baseString;

    /**
     * @var int $processCount
     */
    public $processCount = 0;

    /**
     * AlphaSort constructor.
     *
     * @param string $baseString
     */
    public function __construct($baseString)
    {
        $this->baseString = $baseString;
    }

    /**
     * Return the process count for the last run sort.
     *
     * @return int
     */
    public function getLastProcessCount() {
        return $this->processCount;
    }

    /**
     * Reset the process count.
     */
    private function resetProcessCount() {
        $this->processCount = 0;
    }

    /**
     * Sort the passed string in alphabetical order by using a second array
     *
     * NOTES:
     * --------------------------------------------------------------------
     * Dual Array Method
     *
     * typewriter
     *
     * [t]          0 - t - Starting Array
     * [ty]         1 - y - One comparison
     * [pty]        1 - p - Check vs t only
     * [epty]       1 - e - Check vs p only
     * [eptwy]      4 - w - Check vs e, p, t, and y
     * [eprtwy]     3 - r - Check vs e, p, and t
     * [eiprtwy]    2 - i - Check vs e and p
     * [eiprttwy]   5 - t - Check vs e, i, p, and t
     * [eeiprttwy]  1 - e - Check vs e only
     * [eeiprrttwy] 5 - r - Check vs e, e, i, p, and t
     *
     * Total comparisons: 23
     * --------------------------------------------------------------------
     *
     * @param string $string
     *
     * @return string $sortedString
     */
    public function alphaSortDualArrays() {
        $this->resetProcessCount(); // Reset process count before running.

        $sortedString = [$this->baseString[0]];
        $stringLen    = strlen($this->baseString);

        for ($i = 1; $i < $stringLen; $i++) {
            $currentChar = $this->baseString[$i];
            $charPushed  = false;

            // Check current string for new char placement.
            foreach ($sortedString as $sortedIndex => $sortedChar) {
                $this->processCount++;  // Keep a tally of comparisons run

                if ($currentChar <= $sortedChar) {
                    array_splice($sortedString, $sortedIndex, 0, $currentChar);
                    $charPushed = true;
                    break;
                }
            }

            // Character is beyond that in the current sorted array, push to end.
            if (!$charPushed) {
                array_push($sortedString, $currentChar);
            }
        }

        // Convert array back to string
        $sortedString = implode($sortedString);
        return $sortedString;
    }

    /**
     * Sort the passed string in alphabetical order by using a second array
     *
     * NOTES:
     * --------------------------------------------------------------------
     * Swapping method
     *
     * typewriter start
     * typewriter 1 - t / y in correct position
     * ptyewriter 2 - p shifts 2 spots
     * eptywriter 3 - e shifts 3 spots
     * eptwyriter 2 - w shifts 2 spot
     * eprtwyiter 4 - r shifts 4 spots
     * eiprtwyter 6 - i shifts 6 spots
     * eiprttwyer 3 - t shifts 3 spots
     * eeiprttwyr 8 - e shifts 8 spots
     * eeiprrttwy 5 - r shifts 5 spots
     *
     * Total Comparisons: 34
     * --------------------------------------------------------------------
     *
     * @param string $string
     *
     * @return string $sortedString
     */
    public function alphaSwapSort() {
        $this->resetProcessCount(); // Reset process count before running.

        $string    = $this->baseString;
        $stringLen = strlen($string);

        // Start at 1 since we know we need to compare the first two.
        for ($i = 1; $i < $stringLen; $i++) {
            $string = $this->swapSort($string, $i);
        }

        return $string;
    }

    /**
     * Recursively keep checking index to see if it needs to move forward farther.
     *
     * @param string $string
     * @param int    $cursor
     *
     * @return string $string
     */
    private function swapSort($string, $cursor) {
        $this->processCount++;

        if ($cursor > 0) {
            $prevCharIndex = $cursor - 1;

            if ($string[$cursor] < $string[$prevCharIndex]) {
                // Swap characters
                $movingChar             = $string[$cursor];
                $string[$cursor]        = $string[$prevCharIndex];
                $string[$prevCharIndex] = $movingChar;

                // Check if we need to keep checking for swaps.
                if ($cursor > 1) {
                    $string = $this->swapSort($string, $prevCharIndex);
                }
            }
        }

        return $string;
    }

}
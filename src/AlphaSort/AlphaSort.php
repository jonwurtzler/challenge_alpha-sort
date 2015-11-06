<?php namespace AlphaSort;

/**
 * AlphaSort -
 *
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
        $this->processCount = 0; // Reset process count before running.

        $sortedString    = [$this->baseString[0]];
        $stringLen       = strlen($this->baseString);

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
     * eptwyriter 1 - w shifts 1 spot
     * eprtwyiter 3 - r shifts 3 spots
     * eiprtwyter 5 - i shifts 5 spots
     * eiprttwyer 2 - t shifts 2 spots
     * eeiprttwyr 7 - e shifts 7 spots
     * eeiprrttwy 5 - r shifts 5 spots
     *
     * Total Comparisons: 29
     * --------------------------------------------------------------------
     *
     * @param string $string
     *
     * @return string $sortedString
     */
    public function alphaSwapSort() {

    }

}
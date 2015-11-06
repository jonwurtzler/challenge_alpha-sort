<?php
/**
 * Challenge Yourselph - 002
 * Alpha Sort the word 'typewriter'
 *
 * Write a function that sorts the letters of the word typewriter alphabetically.
 *
 * Usage: php alphasort.php
 *
 * @author Jon Wurtzler <jon.wurtzler@gmail.com>
 * @date 11/06/2015
 */

/**
 */

use AlphaSort\AlphaSort;

require_once __DIR__ . '/vendor/autoload.php';


$stringToSort = (string) isset($argv[1]) ? $argv[1] : "typewriter";
$alphaSort    = new AlphaSort($stringToSort);

echo ("Sorting String: {$stringToSort}\n\n");

// Sort string by Dual Arrays
$sortedString   = $alphaSort->alphaSortDualArrays();
$dualArrayCount = $alphaSort->getLastProcessCount();

echo ("Finished Sorting String via Dual Arrays!\n");
echo ("Number of Comparisons: {$dualArrayCount}\n");
echo ("Sorted String: {$sortedString}\n\n");

// Sort string by Swap Method
$sortedString  = $alphaSort->alphaSwapSort();
$swapSortCount = $alphaSort->getLastProcessCount();

echo ("Finished Sorting String via Swap Sort!\n");
echo ("Number of Comparisons: {$swapSortCount}\n");
echo ("Sorted String: {$sortedString}\n\n");
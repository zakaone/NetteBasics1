<?php

/**
 * Test: Nette\Utils\Arrays::grep() errors.
 *
 * @author     David Grudl
 * @package    Nette\Utils
 * @subpackage UnitTests
 */

use Nette\Utils\Arrays;



require __DIR__ . '/../bootstrap.php';



Assert::throws(function() {
	Arrays::grep(array('a', '1', 'c'), '#*#');
}, 'Nette\Utils\RegexpException', 'preg_grep(): Compilation failed: nothing to repeat at offset 0 in pattern: #*#');


Assert::throws(function() {
	Arrays::grep(array('a', "1\xFF", 'c'), '#\d#u');
}, 'Nette\Utils\RegexpException', 'Malformed UTF-8 data (pattern: #\d#u)');

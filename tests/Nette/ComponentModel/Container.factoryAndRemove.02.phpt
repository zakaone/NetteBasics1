<?php

/**
 * Test: Nette\ComponentModel\Container component factory & remove inside.
 *
 * @author     David Grudl
 * @package    Nette\ComponentModel
 * @subpackage UnitTests
 */

use Nette\ComponentModel\Container;



require __DIR__ . '/../bootstrap.php';



class TestClass extends Container
{

	public function createComponentB($name)
	{
		$b = new self($this, $name);
		$this->removeComponent($b);
		return new self;
	}

}


$a = new TestClass;
Assert::same( 'b', $a->getComponent('b')->name );

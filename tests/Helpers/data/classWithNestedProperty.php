<?php

class FooClass
{
	private $fooProperty;

	public function classMethod()
	{
		return new class {
			public $anonymousClassProperty;
		};
	}

}

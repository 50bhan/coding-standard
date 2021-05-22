<?php

class FineAmountOfPropertiesClass
{
	protected $property1;
	protected $property2;
	protected $property3;
	protected $property4;
	protected $property5;
	protected $property6;
	protected $property7;
	protected $property8;
	protected $property9;
	protected $property10;

	protected function anonymousClassMethod()
	{
		return new class {
			protected $anonymousProperty1;
		};
	}
}

function FineAmountOfPropertiesClass()
{
	return new class {
		protected $property1;
		protected $property2;
		protected $property3;
		protected $property4;
		protected $property5;
		protected $property6;
		protected $property7;
		protected $property8;
		protected $property9;
		protected $property10;

		protected function anonymousClassMethod()
		{
			return new class {
				protected $anonymousProperty1;
			};
		}
	};
}

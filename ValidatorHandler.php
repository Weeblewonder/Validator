<?php     	
namespace Weeble\Validator;

class ValidatorHandler
{
	public function validateList(array $validators)
	{
		array_reduce($validators, $this->validate(), true);
	}

	/**
	 * Closure to call the validate function on Validators
	 *
	 * @return Closure
	 **/
	protected function validate()
	{
		// array_reduce calls this over the array
		return function($stack, Validator $validator)
		{
			return $validator->validate($stack);
		};
	}
}
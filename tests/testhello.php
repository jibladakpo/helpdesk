<?php
class testhello extends \PHPUnit_Framework_TestCase{

	public function testBasicExample()
	{
		$data = 'Je suis petit';
		
		$this->assertStringStartsWith('Je', $data);
		$this->assertStringEndsWith('petit', $data);
	}

}
?>
<?php

class DefaultControllerTest extends \PHPUnit_Framework_TestCase{


    public function testIndex()
	{
		$response = $this->action('GET', '_DefaultC@index');
		$this->assertResponseOk();
	}

}
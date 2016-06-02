<?php
class testhello extends \PHPUnit_Framework_TestCase{
	
	public function NombreTicketNouveau() {
	$db ='petit';
	$this->assertStringEquals('petit',$db);	
	
	}
}
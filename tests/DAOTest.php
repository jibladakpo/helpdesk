<?php


class DAOTest extends \PHPUnit_Framework_TestCase{
	private $variable;
	/* (non-PHPdoc)
	 * @see <span class="search_hit">PHPUnit</span>_Framework_TestCase::setUp()
	 */
	protected function setUp() {
		$this->variable=1;
	}
	
	public function testIncVariable(){
		$this->assertEquals($this->variable, 1);
		for($i=0;$i<10;$i++){
			$this->variable+=1;
		}
		$this->assertEquals(11, $this->variable);
	}
	
	public function testVariable(){
		$this->assertEquals($this->variable, 1);
	}
	/* (non-PHPdoc)
	 * @see <span class="search_hit">PHPUnit</span>_Framework_TestCase::tearDown()
	 */
	protected function tearDown() {
		$this->variable=0;
	}
	}
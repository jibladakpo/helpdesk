<?php
use micro\controllers\BaseController;
use micro\utils\RequestUtils;

class Selenium extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->initialize();
		echo "<h1>Hello Selenium</h1>";
		echo "<form method='POST' action='Selenium/post' name='frm' id='frm'>";
		echo "<input type='text' name='text' id='text'>";
	}

	public function post(){
		if(RequestUtils::isPost()){
			echo "<div id='result'>".$_POST['text']."</div>";
		}
	}
}

class SeleniumTest extends \AjaxUnitTest{
	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();
		self::get("Selenium/index");
	}
	public function testDefault(){
		$this->assertPageContainsText('Hello Selenium');
		$this->assertTrue($this->elementExists("#text"));
		$this->assertTrue($this->elementExists("#frm"));
	}
	public function testValidation(){
		$this->getElementById("text")->sendKeys("okay");
		$this->getElementById("text")->sendKeys("\xEE\x80\x87");
		SeleniumTest::$webDriver->manage()->timeouts()->implicitlyWait(5);
		$this->assertEquals("okay",$this->getElementById("result")->getText());
	}
}
?>
<?php



/**
 * Test class for App.
 * Generated by PHPUnit on 2012-03-04 at 11:37:03.
 */
class AppTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var App
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new App('one/two/three');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
    }


    public function testSetErrorReportingProd() {
        $this->object->setErrorReporting();
        $this->assertEquals('Off', ini_get('display_errors'));
        $this->assertEquals('On', ini_get('log_errors'));
    }

    /**
     * @covers App::setErrorReporting
     */
    public function testSetErrorReportingDev() {
        define('DEVELOPMENT_ENVIRONMENT',1);
        $this->object->setErrorReporting();
        $this->assertEquals('On', ini_get('display_errors'));
    }

    public function testAddRoute() {
        $this->object->addRoute('admin','Administrator');
        $this->assertArrayHasKey('admin', $this->object->getRoutes());
    }

    public function testAddStaticRoute() {
        $this->object->addStaticRoute('admin','admin');
        $this->assertArrayHasKey('admin', $this->object->getStaticRoutes());
    }

    public function testSetUrl() {
        $this->object->setUrl('test');
        $this->assertEquals('test', $this->object->getUrl());
    }

}
?>

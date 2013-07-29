<?php

namespace Fuel\Fieldset\Input;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-17 at 16:38:28.
 */
class SubmitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
	
	/**
	 * @covers FuelPHP\Fieldset\Input\Submit::__construct
	 * @group Fieldset
     */
    public function testConstruct()
    {
		$attributes = array('type' => 'submit', 'name' => '', 'value' => null);
		
		$instance = new Submit();
		
		$this->assertEquals($attributes, $instance->getAttributes());
    }
	
}

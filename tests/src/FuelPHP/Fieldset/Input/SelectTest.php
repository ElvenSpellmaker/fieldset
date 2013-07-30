<?php

namespace Fuel\Fieldset\Input;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-17 at 16:38:28.
 */
class SelectTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * @var Select
	 */
	protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
		$this->object = new Select;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
	
	/**
	 * @covers Fuel\Fieldset\Input\Select::set
	 * @group Fieldset
     */
    public function testSet()
    {
		$this->object[] = new Option;
		$this->object[] = new Option;
		$this->object[] = new Option;
		$this->object[] = new Option;
		
		$this->assertEquals(4, count($this->object));
    }
	
	/**
	 * @expectedException \InvalidArgumentException
	 * @covers Fuel\Fieldset\Input\Select::set
	 * @group Fieldset
	 */
	public function testSetInvalid()
	{
		$this->object[] = '';
	}
	
	/**
	 * @covers Fuel\Fieldset\Input\Select::set
	 * @group Fieldset
	 */
	public function testSetOptgroup()
	{
		$this->object[] = new Optgroup;
		
		$this->assertEquals(1, count($this->object));
	}
	
	/**
	 * @group Fieldset
	 */
	public function testSetValue()
	{
		$option = new  Option('test');
		$this->object[] = $option;
		$this->object->setValue('test');
		
		$this->assertEquals(
			array('selected', 'value' => 'test'),
			$option->getAttributes()
		);
	}
}

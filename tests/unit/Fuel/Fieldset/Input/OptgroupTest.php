<?php
/**
 * @package   Fuel\Fieldset
 * @version   2.0
 * @author    Fuel Development Team
 * @license   MIT License
 * @copyright 2010 - 2013 Fuel Development Team
 * @link      http://fuelphp.com
 */

namespace Fuel\Fieldset\Input;

use Codeception\TestCase\Test;

/**
 * Tests for Optgroup
 *
 * @package Fuel\Fieldset\Input
 * @author  Fuel Development Team
 *
 * @coversDefaultClass Fuel\Fieldset\Input\Optgroup
 */
class OptgroupTest extends Test
{

	/**
	 * @var Optgroup
	 */
	protected $object;

    protected function _before()
    {
		$this->object = new Optgroup;
    }

	/**
	 * @covers ::set
	 * @group  Fieldset
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
	 * @covers             ::set
	 * @expectedException  \InvalidArgumentException
	 * @group              Fieldset
	 */
	public function testSetInvalid()
	{
		$this->object[] = '';
	}

	/**
	 * @covers ::fromArray
	 * @group  Fieldset
	 */
	public function testFromArray()
	{
		$config = [
			'label' => 'test',
			'_content' => [
				'1' => 'One',
				'2' => 'Two',
			]
		];

		$object = Optgroup::fromArray($config);

		$this->assertInstanceOf(
			'Fuel\Fieldset\Input\Optgroup',
			$object
		);

		$this->assertEquals(
			'test',
			$object->getAttributes()['label']
		);

		// Check the right content has been set
		$this->assertInstanceOf(
			'Fuel\Fieldset\Input\Option',
			$object[0]
		);

		$this->assertInstanceOf(
			'Fuel\Fieldset\Input\Option',
			$object[1]
		);
	}

	/**
	 * @covers ::render
	 * @group  Fieldset
	 */
	public function testRender()
	{
		$renderer = \Mockery::mock('Fuel\Fieldset\Render');

		$this->assertXmlStringEqualsXmlString(
			'<optgroup name=""></optgroup>',
			$this->object->render($renderer)
		);
	}

	/**
	 * @covers ::render
	 * @group  Fieldset
	 */
	public function testRenderWithContent()
	{
		$renderer = \Mockery::mock('Fuel\Fieldset\Render');

		$option = \Mockery::mock('Fuel\Fieldset\Input\Option');

		$renderer->shouldReceive('render')->with($option)->andReturn('<option></option>')->once();

		$this->object[] = $option;

		$this->assertXmlStringEqualsXmlString(
			'<optgroup name=""><option></option></optgroup>',
			$this->object->render($renderer)
		);
	}

}

<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Tests\Metadata\Loader\Parser\php\Validator;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\PropertyOptionValidator;

/**
 * ObjectOptionValidatorTest.php
 *
 * This class is used to validate the PropertyOptionValidator logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class PropertyOptionValidatorTest extends TestCase
{
    /**
     * Instance
     *
     * This property store the tested instance
     *
     * @var PropertyOptionValidator
     */
    private $instance;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->instance = new PropertyOptionValidator();
    }

    /**
     * Test isValid
     *
     * This method validate the logic of the PropertyOptionValidator::isValidate
     * method
     *
     * @return void
     */
    public function testIsValid()
    {
        $array = [];
        $this->assertFalse($this->instance->isValid($array));

        $array = [
            'property' => 'test'
        ];
        $this->assertTrue($this->instance->isValid($array));

        $array = [
            'property' => 'test',
            'transformer' => 'test',
            'group' => []
        ];
        $this->assertTrue($this->instance->isValid($array));

        $array = [
            'property' => 'test',
            'transformer' => 'test',
            'group' => [],
            'other' => 'fail'
        ];
        $this->assertFalse($this->instance->isValid($array));
    }
}

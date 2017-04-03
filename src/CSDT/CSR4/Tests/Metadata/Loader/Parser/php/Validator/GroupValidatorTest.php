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
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\GroupValidator;

/**
 * GroupValidatorTest.php
 *
 * This class is used to validate the GroupValidator
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class GroupValidatorTest extends TestCase
{
    /**
     * Instance
     *
     * This property store the tested instance
     *
     * @var GroupValidator
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
        $this->instance = new GroupValidator();
    }

    /**
     * Test isValid
     *
     * This method validate the logic of the GroupValidator::isValidate method
     *
     * @return void
     */
    public function testIsValid()
    {
        $validArray = array(
            'string1',
            'string2',
            'string3'
        );

        $invalidArray = array(
            'string1',
            12,
            'string3'
        );

        $this->assertTrue($this->instance->isValid($validArray));
        $this->assertFalse($this->instance->isValid($invalidArray));
    }
}

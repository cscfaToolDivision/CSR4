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
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\ObjectOptionValidator;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\PropertyOptionValidator;

/**
 * ObjectOptionValidatorTest.php
 *
 * This class is used to validate the ObjectOptionValidator logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ObjectOptionValidatorTest extends TestCase
{
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
        $propertyValidator = $this->createMock(PropertyOptionValidator::class);
        $propertyValidator->expects($this->exactly(2))
            ->method('isValid')
            ->willReturn(false, true);
        $instance = new ObjectOptionValidator($propertyValidator);

        $array = [];
        $this->assertFalse($instance->isValid($array));

        $array = [
                  'dto'   => 'test',
                  'class' => 'test',
                 ];
        $this->assertTrue($instance->isValid($array));

        $array = [
                  'dto'        => 'test',
                  'class'      => 'test',
                  'mapper'     => 'test',
                  'properties' => [],
                  'factory'    => 'test',
                 ];
        $this->assertTrue($instance->isValid($array));

        $array = [
                  'dto'        => 'test',
                  'class'      => 'test',
                  'mapper'     => 'test',
                  'properties' => 12,
                  'factory'    => 'test',
                 ];
        $this->assertFalse($instance->isValid($array));

        $array = [
                  'dto'        => 'test',
                  'class'      => 'test',
                  'mapper'     => 'test',
                  'properties' => [
                                   [],
                                  ],
                  'factory'    => 'test',
                 ];
        $this->assertFalse($instance->isValid($array));

        $array = [
                  'dto'        => 'test',
                  'class'      => 'test',
                  'mapper'     => 'test',
                  'properties' => [
                                   [],
                                  ],
                  'factory'    => 'test',
                 ];
        $this->assertTrue($instance->isValid($array));

        $array = [
                  'dto'        => 'test',
                  'class'      => 'test',
                  'mapper'     => 'test',
                  'properties' => [],
                  'factory'    => 'test',
                  'other'      => 'fail',
                 ];
        $this->assertFalse($instance->isValid($array));
    }
}

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
namespace CSDT\CSR4\Tests\Mapper\PropertyAccess\Misc;

/**
 * MiscMappedObject.php
 *
 * This class is used to validate the mapper
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class MiscMappedObject
{
    /**
     * Test property 0
     *
     * This property store a mixed value to be tested
     *
     * @var mixed
     */
    public $testProperty0;

    /**
     * Test property 1
     *
     * This property store a mixed value to be tested
     *
     * @var mixed
     */
    public $testProperty1;

    /**
     * Test property 2
     *
     * This property store a mixed value to be tested
     *
     * @var mixed
     */
    public $testProperty2;

    /**
     * Construct
     *
     * The default MiscMappedObject constructor
     *
     * @param mixed $prop0 The property 0 value
     * @param mixed $prop1 The property 1 value
     * @param mixed $prop2 The property 2 value
     *
     * @return void
     */
    public function __construct($prop0, $prop1, $prop2)
    {
        $this->testProperty0 = $prop0;
        $this->testProperty1 = $prop1;
        $this->testProperty2 = $prop2;
    }
}

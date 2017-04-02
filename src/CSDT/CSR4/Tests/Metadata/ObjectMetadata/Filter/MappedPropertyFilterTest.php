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
namespace CSDT\CSR4\Tests\Metadata\ObjectMetadata\Filter;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Metadata\ObjectMetadata\Filter\MappedPropertyFilter;
use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadataInterface;

/**
 * MappedPropertyFilterTest.php
 *
 * This test case is used to validate the MappedPropertyFilter logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class MappedPropertyFilterTest extends TestCase
{

    /**
     * Test constructor
     *
     * This method validate that the MappedPropertyFilter constructor store the
     * given property name into the 'neededProperty' property
     *
     * @return void
     */
    public function testConstructor()
    {
        $neededTarget = 'neededTarget';

        $instance = new MappedPropertyFilter($neededTarget);

        $reflexProperty = new \ReflectionProperty(
            MappedPropertyFilter::class,
            'neededProperty'
        );
        $reflexProperty->setAccessible(true);

        $this->assertEquals($neededTarget, $reflexProperty->getValue($instance));

        return;
    }

    /**
     * Test availability
     *
     * This method validate the logic of the MappedPropertyFilter isAvailable
     * method
     *
     * @return void
     */
    public function testAvailibility()
    {
        $neededTarget = 'neededTarget';

        $reflexClass = new \ReflectionClass(MappedPropertyFilter::class);
        $instance = $reflexClass->newInstanceWithoutConstructor();

        $reflexProperty = $reflexClass->getProperty('neededProperty');
        $reflexProperty->setAccessible(true);
        $reflexProperty->setValue($instance, $neededTarget);

        $availableMetadata = $this->createMock(
            ObjectPropertyMetadataInterface::class
        );

        $availableMetadata->expects($this->once())
            ->method('getTargetProperty')
            ->willReturn($neededTarget);

        $this->assertTrue($instance->isAvailable($availableMetadata));

        $notAvailableMetadata = $this->createMock(
            ObjectPropertyMetadataInterface::class
        );

        $notAvailableMetadata->expects($this->once())
            ->method('getTargetProperty')
            ->willReturn('failure');

        $this->assertFalse(
            $instance->{MappedPropertyFilter::FILTER_METHOD}($notAvailableMetadata)
        );

        return;
    }
}

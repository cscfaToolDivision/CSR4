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
namespace CSDT\CSR4\Tests\Mapper\PropertyAccess;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadataInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR4\Mapper\UnsupportedMappedPropertyException;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Mapper\PropertyAccess\PropertyAccessMapper;

/**
 * PropertyAccessMapperExceptionTest.php
 *
 * This class is used to validate the logic of the PropertyAccessMapper with
 * unsupported properties
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class PropertyAccessMapperExceptionTest extends TestCase
{

    /**
     * Instance
     *
     * This proeprty store the test instance of PropertyAccessMapper
     *
     * @var PropertyAccessMapper
     */
    private $instance;

    /**
     * Set up
     *
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->instance = new PropertyAccessMapper();
    }

    /**
     * Get mapping exception property
     *
     * This method return the mapping properties to be used in unsupported property tests
     *
     * @return PHPUnit_Framework_MockObject_MockObject[]
     */
    private function getMappingExceptionProperty()
    {
        $properties = [];

        $mock = $this->createMock(ObjectPropertyMetadataInterface::class);

        $mock->expects($this->any())
            ->method('getMappingGroup')
            ->willReturn([]);
        $mock->expects($this->any())
            ->method('getTargetProperty')
            ->willReturn('testProperty');
        $mock->expects($this->any())
            ->method('getProperty')
            ->willReturn('testProperty');
        $mock->expects($this->any())
            ->method('getMappedTransformer')
            ->willReturn(null);

        $properties[] = $mock;

        return $properties;
    }

    /**
     * Get mapping exception metadata
     *
     * This method return the metadata to be used for tests in unsupported property
     *
     * @param array $properties The properties
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    private function getMappingExceptionMetadata(array $properties)
    {
        $metadata = $this->createMock(ObjectMetadataInterface::class);
        $metadata->expects($this->any())
            ->method('getDtoClass')
            ->willReturn(CSR3DTOInterface::class);
        $metadata->expects($this->any())
            ->method('getMappedClass')
            ->willReturn(\stdClass::class);
        $metadata->expects($this->any())
            ->method('getObjectProperties')
            ->willReturn($properties);

        return $metadata;
    }

    /**
     * Test mapToDto mapping exceptions
     *
     * This method validate the PropertyAccessMapper::mapToDto logic in case of
     * unsupported property
     *
     * @return void
     */
    public function testMapToDtoMappingException()
    {
        $properties = $this->getMappingExceptionProperty();
        $metadata = $this->getMappingExceptionMetadata($properties);

        $this->expectException(UnsupportedMappedPropertyException::class);

        $object = $this->createMock(\stdClass::class);

        $this->instance->mapToDto($metadata, $this->createMock(CSR3DTOInterface::class), $object);
    }

    /**
     * Test mapToObject mapping exceptions
     *
     * This method validate the PropertyAccessMapper::mapToDto logic in case of
     * unsupported property
     *
     * @return void
     */
    public function testMapToObjectMappingException()
    {
        $properties = $this->getMappingExceptionProperty();
        $metadata = $this->getMappingExceptionMetadata($properties);

        $this->expectException(UnsupportedMappedPropertyException::class);

        $object = $this->createMock(\stdClass::class);

        $this->instance->mapToObject($metadata, $this->createMock(CSR3DTOInterface::class), $object);
    }
}

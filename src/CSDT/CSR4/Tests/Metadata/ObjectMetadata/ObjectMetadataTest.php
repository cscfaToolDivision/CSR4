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
namespace CSDT\CSR4\Tests\Metadata\ObjectMetadata;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadata;
use CSDT\CSR4\Metadata\ObjectMetadata\Abstracts\AbstractObjectMetadata;
use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadataInterface;

/**
 * ObjectMetadataTest.php
 *
 * This class is used to validate the ObjectMetadata logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ObjectMetadataTest extends TestCase
{

    /**
     * Test constructor
     *
     * This method validate the constructor logic of the ObjectMetadata class
     *
     * @return void
     */
    public function testConstructor()
    {
        $dtoClass = 'DtoClass';
        $mappedClass = 'mappedClass';
        $objectFactory = 'objectFactory';
        $properties = array_values($this->getProperties());
        $dtoMapper = 'dtoMapper';


        $instance = new ObjectMetadata($dtoClass, $mappedClass);
        $this->assertDtoClass($instance, $dtoClass);
        $this->assertMappedClass($instance, $mappedClass);
        $this->assertMetadataProperties($instance, []);
        $this->assertObjectFactory($instance);
        $this->assertTraversingProperty($instance, 0);
        $this->assertDtoMapper($instance);

        $this->assertEquals($dtoClass, $instance->getDtoClass());
        $this->assertEmpty($instance->getByMappedProperty('test'));
        $this->assertNull($instance->getDtoMapper());
        $this->assertEquals($mappedClass, $instance->getMappedClass());
        $this->assertNull($instance->getObjectFactory());
        $this->assertEmpty($instance->getObjectProperties());

        $instance = new ObjectMetadata($dtoClass, $mappedClass, $properties);
        $this->assertDtoClass($instance, $dtoClass);
        $this->assertMappedClass($instance, $mappedClass);
        $this->assertMetadataProperties($instance, $properties);
        $this->assertObjectFactory($instance);
        $this->assertDtoMapper($instance);

        $instance = new ObjectMetadata(
            $dtoClass,
            $mappedClass,
            $properties,
            $objectFactory
        );
        $this->assertDtoClass($instance, $dtoClass);
        $this->assertMappedClass($instance, $mappedClass);
        $this->assertMetadataProperties($instance, $properties);
        $this->assertObjectFactory($instance, $objectFactory);
        $this->assertDtoMapper($instance);

        $instance = new ObjectMetadata(
            $dtoClass,
            $mappedClass,
            $properties,
            $objectFactory,
            $dtoMapper
        );
        $this->assertDtoClass($instance, $dtoClass);
        $this->assertMappedClass($instance, $mappedClass);
        $this->assertMetadataProperties($instance, $properties);
        $this->assertObjectFactory($instance, $objectFactory);
        $this->assertDtoMapper($instance, $dtoMapper);
    }

    /**
     * Test getDtoMapper
     *
     * This method validate the getDtoMapper method logic of the ObjectMetadata
     * class
     *
     * @return void
     */
    public function testGetDtoMapper()
    {
        $reflexClass = new \ReflectionClass(ObjectMetadata::class);
        $instance = $reflexClass->newInstanceWithoutConstructor();

        $value = 'dtoMapper';
        $mappedClass = $this->getReflexDtoMapper();
        $mappedClass->setAccessible(true);
        $mappedClass->setValue($instance, $value);

        $this->assertEquals($value, $instance->getDtoMapper());
    }

    /**
     * Test getDtoClass
     *
     * This method validate the getDtoClass method logic of the ObjectMetadata
     * class
     *
     * @return void
     */
    public function testGetDtoClass()
    {
        $reflexClass = new \ReflectionClass(ObjectMetadata::class);
        $instance = $reflexClass->newInstanceWithoutConstructor();

        $value = 'dtoClass';
        $mappedClass = $this->getReflexDtoClass();
        $mappedClass->setAccessible(true);
        $mappedClass->setValue($instance, $value);

        $this->assertEquals($value, $instance->getDtoClass());
    }

    /**
     * Test getMappedClass
     *
     * This method validate the getMappedClass method logic of the ObjectMetadata
     * class
     *
     * @return void
     */
    public function testGetMappedClass()
    {
        $reflexClass = new \ReflectionClass(ObjectMetadata::class);
        $instance = $reflexClass->newInstanceWithoutConstructor();

        $value = 'mappedClass';
        $mappedClass = $this->getReflexMappedClass();
        $mappedClass->setAccessible(true);
        $mappedClass->setValue($instance, $value);

        $this->assertEquals($value, $instance->getMappedClass());
    }

    /**
     * Test getObjectProperties
     *
     * This method validate the getObjectProperties method logic of the
     * ObjectMetadata class
     *
     * @return void
     */
    public function testGetObjectProperties()
    {
        $reflexClass = new \ReflectionClass(ObjectMetadata::class);
        $instance = $reflexClass->newInstanceWithoutConstructor();

        $properties = array_values($this->getProperties());
        $metadataProperties = $this->getReflexMetadataProperties();
        $metadataProperties->setAccessible(true);
        $metadataProperties->setValue($instance, $properties);

        $this->assertEquals($properties, $instance->getObjectProperties());
    }

    /**
     * Test getObjectFactory
     *
     * This method validate the getObjectFactory method logic of the
     * ObjectMetadata class
     *
     * @return void
     */
    public function testGetObjectFactory()
    {
        $reflexClass = new \ReflectionClass(ObjectMetadata::class);
        $instance = $reflexClass->newInstanceWithoutConstructor();

        $value = 'objectFactory';
        $objectFactory = $this->getReflexObjectFactory();
        $objectFactory->setAccessible(true);
        $objectFactory->setValue($instance, $value);

        $this->assertEquals($value, $instance->getObjectFactory());
    }

    /**
     * Test getByMappedProperty
     *
     * This method validate the getByMappedProperty method logic of the
     * ObjectMetadata class
     *
     * @return void
     */
    public function testByMappedProperty()
    {
        $reflexClass = new \ReflectionClass(ObjectMetadata::class);
        $instance = $reflexClass->newInstanceWithoutConstructor();

        $properties = $this->getProperties();
        $metadataProperties = $this->getReflexMetadataProperties();
        $metadataProperties->setAccessible(true);
        $metadataProperties->setValue($instance, array_values($properties));

        foreach ($properties as $propertyName => $mockObject) {
            $this->assertSame(
                $mockObject,
                $instance->getByMappedProperty($propertyName)
            );
        }

        $this->assertNull($instance->getByMappedProperty('undefined'));
    }

    /**
     * Get properties
     *
     * This method return a set of default properties
     *
     * @return PHPUnit_Framework_MockObject_MockObject[]
     */
    private function getProperties()
    {
        $properties = [];
        for ($i = 0; $i < 3; $i++) {
            $target = sprintf('%s%i', 'property', $i);

            $mock = $this->createMock(
                ObjectPropertyMetadataInterface::class
            );

            $mock->expects($this->any())
                ->method('getTargetProperty')
                ->willReturn($target);

            $properties[$target] = $mock;
        }

        return $properties;
    }

    /**
     * Assert dtoMapper
     *
     * This method assert the dtoMapper value property
     *
     * @param ObjectMetadata $instance The current instance
     * @param string         $value    The expected value
     *
     * @return void
     */
    private function assertDtoMapper(
        ObjectMetadata $instance,
        string $value = null
    ) {
        $dtoMapper = $this->getReflexDtoMapper();
        $dtoMapper->setAccessible(true);
        $this->assertEquals($value, $dtoMapper->getValue($instance));
    }

    /**
     * Assert traversingProperty
     *
     * This method assert the traversingProperty value property
     *
     * @param ObjectMetadata $instance The current instance
     * @param string         $value    The expected value
     *
     * @return void
     */
    private function assertTraversingProperty(ObjectMetadata $instance, int $value)
    {
        $traversingProperty = $this->getReflexTraversingPosition();
        $traversingProperty->setAccessible(true);
        $this->assertEquals($value, $traversingProperty->getValue($instance));
    }

    /**
     * Assert objectFactory
     *
     * This method assert the objectFactory value property
     *
     * @param ObjectMetadata $instance The current instance
     * @param string         $value    The expected value
     *
     * @return void
     */
    private function assertObjectFactory(
        ObjectMetadata $instance,
        string $value = null
    ) {
        $objectFactory = $this->getReflexObjectFactory();
        $objectFactory->setAccessible(true);
        $this->assertEquals($value, $objectFactory->getValue($instance));
    }

    /**
     * Assert metadataProperties
     *
     * This method assert the metadataProperties value property
     *
     * @param ObjectMetadata $instance The current instance
     * @param array          $value    The expected value
     *
     * @return void
     */
    private function assertMetadataProperties(ObjectMetadata $instance, array $value)
    {
        $metadataProperties = $this->getReflexMetadataProperties();
        $metadataProperties->setAccessible(true);
        $this->assertEquals($value, $metadataProperties->getValue($instance));
    }

    /**
     * Assert mappedClass
     *
     * This method assert the mappedClass value property
     *
     * @param ObjectMetadata $instance The current instance
     * @param string         $value    The expected value
     *
     * @return void
     */
    private function assertDtoClass(ObjectMetadata $instance, string $value)
    {
        $dtoClass = $this->getReflexDtoClass();
        $dtoClass->setAccessible(true);
        $this->assertEquals($value, $dtoClass->getValue($instance));
    }

    /**
     * Assert mappedClass
     *
     * This method assert the mappedClass value property
     *
     * @param ObjectMetadata $instance The current instance
     * @param string         $value    The expected value
     *
     * @return void
     */
    private function assertMappedClass(ObjectMetadata $instance, string $value)
    {
        $mappedClass = $this->getReflexMappedClass();
        $mappedClass->setAccessible(true);
        $this->assertEquals($value, $mappedClass->getValue($instance));
    }

    /**
     * Get relfex dtoMapper
     *
     * This method return the dtoMapper reflexion property
     *
     * @return \ReflectionProperty
     */
    private function getReflexDtoMapper() : \ReflectionProperty
    {
        return $this->getReflex('dtoMapper');
    }

    /**
     * Get relfex objectFactory
     *
     * This method return the objectFactory reflexion property
     *
     * @return \ReflectionProperty
     */
    private function getReflexObjectFactory() : \ReflectionProperty
    {
        return $this->getReflex('objectFactory');
    }

    /**
     * Get relfex dtoClass
     *
     * This method return the dtoClass reflexion property
     *
     * @return \ReflectionProperty
     */
    private function getReflexDtoClass() : \ReflectionProperty
    {
        return $this->getReflex('dtoClass');
    }

    /**
     * Get relfex mappedClass
     *
     * This method return the mappedClass reflexion property
     *
     * @return \ReflectionProperty
     */
    private function getReflexMappedClass() : \ReflectionProperty
    {
        return $this->getReflex('mappedClass');
    }

    /**
     * Get relfex metadataProperties
     *
     * This method return the metadataProperties reflexion property
     *
     * @return \ReflectionProperty
     */
    private function getReflexTraversingPosition() : \ReflectionProperty
    {
        return $this->getReflex('traversingPosition');
    }

    /**
     * Get relfex metadataProperties
     *
     * This method return the metadataProperties reflexion property
     *
     * @return \ReflectionProperty
     */
    private function getReflexMetadataProperties() : \ReflectionProperty
    {
        return $this->getReflex('metadataProperties');
    }

    /**
     * Get reflex
     *
     * This method return a reflection property from the ObjectMetadata
     *
     * @param string $property the property name of the reflection
     *
     * @return \ReflectionProperty
     */
    private function getReflex(string $property) : \ReflectionProperty
    {
        return new \ReflectionProperty(AbstractObjectMetadata::class, $property);
    }
}

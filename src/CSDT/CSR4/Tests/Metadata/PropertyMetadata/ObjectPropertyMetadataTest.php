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
namespace CSDT\CSR4\Tests\Metadata\PropertyMetadata;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadata;
use CSDT\CSR4\Metadata\PropertyMetadata\Abstracts\AbstractObjectPropertyMetadata;

/**
 * ObjectPropertyMetadataTest.php
 *
 * This class is used to validate the ObjectPropertyMetadata logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ObjectPropertyMetadataTest extends TestCase
{

    /**
     * Test constructor
     *
     * This method validate the logic of the ObjectPropertyMetadata constructor
     *
     * @return void
     */
    public function testConstructor()
    {
        $targetProperty = 'target';
        $mappingGroup = ['default', 'test'];
        $dataTransformer = 'transformer';

        $instance = new ObjectPropertyMetadata($targetProperty);
        $this->assertTargetProperty($instance, $targetProperty);
        $this->assertMappingGroup($instance);
        $this->assertDataTransformer($instance);

        $this->assertNull($instance->getMappedTransformer());
        $this->assertTrue(is_array($instance->getMappingGroup()));
        $this->assertEquals($targetProperty, $instance->getTargetProperty());

        $instance = new ObjectPropertyMetadata($targetProperty, $mappingGroup);
        $this->assertTargetProperty($instance, $targetProperty);
        $this->assertMappingGroup($instance, $mappingGroup);
        $this->assertDataTransformer($instance);

        $instance = new ObjectPropertyMetadata(
            $targetProperty,
            $mappingGroup,
            $dataTransformer
        );
        $this->assertTargetProperty($instance, $targetProperty);
        $this->assertMappingGroup($instance, $mappingGroup);
        $this->assertDataTransformer($instance, $dataTransformer);
    }

    /**
     * Test getMappedTransformer
     *
     * This method validate the logic of the ObjectPropertyMetadata
     * getMappedTransformer method
     *
     * @return void
     */
    public function testGetMappedTransformer()
    {
        $reflex = new \ReflectionClass(ObjectPropertyMetadata::class);
        $instance = $reflex->newInstanceWithoutConstructor();

        $dataTransformer = 'transformer';

        $transformer = $this->getReflexDataTransformer();
        $transformer->setValue($instance, $dataTransformer);

        $this->assertEquals($dataTransformer, $instance->getMappedTransformer());
    }

    /**
     * Test getMappingGroup
     *
     * This method validate the logic of the ObjectPropertyMetadata
     * getMappingGroup method
     *
     * @return void
     */
    public function testGetMappingGroup()
    {
        $reflex = new \ReflectionClass(ObjectPropertyMetadata::class);
        $instance = $reflex->newInstanceWithoutConstructor();

        $mappingGroup = ['default', 'test'];

        $transformer = $this->getReflexMappingGroup();
        $transformer->setValue($instance, $mappingGroup);

        $this->assertEquals($mappingGroup, $instance->getMappingGroup());
    }

    /**
     * Test getTargetProperty
     *
     * This method validate the logic of the ObjectPropertyMetadata
     * getTargetProperty method
     *
     * @return void
     */
    public function testGetTargetProperty()
    {
        $reflex = new \ReflectionClass(ObjectPropertyMetadata::class);
        $instance = $reflex->newInstanceWithoutConstructor();

        $targetProperty = 'target';

        $transformer = $this->getReflexTargetProperty();
        $transformer->setValue($instance, $targetProperty);

        $this->assertEquals($targetProperty, $instance->getTargetProperty());
    }

    /**
     * Assert dataTransformer
     *
     * This method assert the dataTransformer value property
     *
     * @param ObjectPropertyMetadata $instance The tested instance
     * @param string                 $value    The expected value
     *
     * @return void
     */
    private function assertDataTransformer(
        ObjectPropertyMetadata $instance,
        string $value = null
    ) {
        $reflex = $this->getReflexDataTransformer();
        $this->assertEquals($value, $reflex->getValue($instance));
    }

    /**
     * Assert mappingGroup
     *
     * This method assert the mappingGroup value property
     *
     * @param ObjectPropertyMetadata $instance The tested instance
     * @param string                 $value    The expected value
     *
     * @return void
     */
    private function assertMappingGroup(
        ObjectPropertyMetadata $instance,
        array $value = []
    ) {
        $reflex = $this->getReflexMappingGroup();
        $this->assertEquals($value, $reflex->getValue($instance));
    }

    /**
     * Assert targetProperty
     *
     * This method assert the targetProperty value property
     *
     * @param ObjectPropertyMetadata $instance The tested instance
     * @param string                 $value    The expected value
     *
     * @return void
     */
    private function assertTargetProperty(
        ObjectPropertyMetadata $instance,
        string $value
    ) {
        $reflex = $this->getReflexTargetProperty();
        $this->assertEquals($value, $reflex->getValue($instance));
    }

    /**
     * Get reflex targetProperty
     *
     * This method return an accessible reflection property of the targetProperty
     * property
     *
     * @return \ReflectionProperty
     */
    private function getReflexTargetProperty()
    {
        return $this->getReflex('targetProperty');
    }

    /**
     * Get reflex mappingGroup
     *
     * This method return an accessible reflection property of the mappingGroup
     * property
     *
     * @return \ReflectionProperty
     */
    private function getReflexMappingGroup()
    {
        return $this->getReflex('mappingGroup');
    }

    /**
     * Get reflex dataTransformer
     *
     * This method return an accessible reflection property of the dataTransformer
     * property
     *
     * @return \ReflectionProperty
     */
    private function getReflexDataTransformer()
    {
        return $this->getReflex('dataTransformer');
    }

    /**
     * Get reflex dataTransformer
     *
     * This method return an accessible reflection property of the given
     * property name
     *
     * @param string $property The property name for reflection generation
     *
     * @return \ReflectionProperty
     */
    private function getReflex(string $property)
    {
        $reflex = new \ReflectionProperty(
            AbstractObjectPropertyMetadata::class,
            $property
        );
        $reflex->setAccessible(true);

        return $reflex;
    }
}

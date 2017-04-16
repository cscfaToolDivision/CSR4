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
namespace CSDT\CSR4\Tests\Metadata\Loader\Parser\php;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Metadata\Loader\Parser\php\PhpMetadataParser;
use CSDT\CSR4\Metadata\Loader\Parser\php\Factory\ResolverFactory;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\ObjectOptionValidator;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\PropertyOptionValidator;
use CSDT\CSR4\Metadata\Loader\Parser\UnsupportedMetadataException;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadata;
use CSDT\CSR4\Metadata\ObjectMetadata\Abstracts\AbstractObjectMetadata;
use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadata;
use CSDT\CSR4\Metadata\PropertyMetadata\Abstracts\AbstractObjectPropertyMetadata;

/**
 * ObjectOptionValidatorTest.php
 *
 * This class is used to validate the PhpMetadataParser logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class PhpMetadataParserTest extends TestCase
{
    /**
     * Test parsing failure
     *
     * This method validate the PhpMetadataParser::parse method on unsupported
     * metadata
     *
     * @return    void
     * @exception
     */
    public function testParsingFailure()
    {
        $optionValidator = $this->createMock(ObjectOptionValidator::class);
        $instance = new PhpMetadataParser(new ResolverFactory(), $optionValidator);

        $this->expectException(UnsupportedMetadataException::class);

        $metadata = [
                     [
                      'class'      => 'class_name',
                      'mapper'     => 'mapper_class',
                      'factory'    => 'factoryIdentifyer',
                      'properties' => [
                                       [
                                        'property'    => 'property_name',
                                        'target'      => 'target_property_name',
                                        'transformer' => 'data_transformer',
                                        'group'       => ['group...'],
                                       ],
                                      ],
                     ],
                    ];

        $instance->parse($metadata);
    }

    /**
     * Test parse
     *
     * This method validate the PhpMetadataParser::parse method
     *
     * @return    void
     * @exception
     */
    public function testParse()
    {
        $optionValidator = $this->createMock(ObjectOptionValidator::class);
        $optionValidator->expects($this->once())
            ->method('isValid')
            ->willReturn(true);
        $instance = new PhpMetadataParser(new ResolverFactory(), $optionValidator);

        $metadata = [
                     [
                      'dto'        => 'dto_class_name',
                      'class'      => 'class_name',
                      'mapper'     => 'mapper_class',
                      'factory'    => 'factoryIdentifyer',
                      'properties' => [
                                       [
                                        'property'    => 'property_name',
                                        'target'      => 'target_property_name',
                                        'transformer' => 'data_transformer',
                                        'group'       => ['group...'],
                                       ],
                                      ],
                     ],
                    ];

        $objects = $instance->parse($metadata);

        $this->assertTrue(is_array($objects));
        $this->assertEquals(1, count($objects));

        return array_shift($objects);
    }

    /**
     * Test object metadata
     *
     * This method validate the object metadata generated by the parsing test
     * method
     *
     * @param ObjectMetadata $object The generated object
     *
     * @return  void
     * @depends testParse
     */
    public function testObjectMetadata(ObjectMetadata $object)
    {
        $this->validateProperties(
            [
             'dtoClass'      => 'dto_class_name',
             'mappedClass'   => 'class_name',
             'dtoMapper'     => 'mapper_class',
             'objectFactory' => 'factoryIdentifyer',
            ],
            $object,
            AbstractObjectMetadata::class
        );

        $reflex = new \ReflectionProperty(
            AbstractObjectMetadata::class,
            'metadataProperties'
        );
        $reflex->setAccessible(true);

        $properties = $reflex->getValue($object);
        $this->assertTrue(is_array($properties));
        $this->assertEquals(1, count($properties));

        return array_shift($properties);
    }

    /**
     * Test property metadata
     *
     * This method validate the property metadata generated by the parsing test
     * method
     *
     * @param ObjectPropertyMetadata $property The generated object property
     *
     * @return  void
     * @depends testObjectMetadata
     */
    public function testPropertyMetadata(ObjectPropertyMetadata $property)
    {
        $this->validateProperties(
            [
             'property'        => 'property_name',
             'targetProperty'  => 'target_property_name',
             'dataTransformer' => 'data_transformer',
             'mappingGroup'    => ['group...'],
            ],
            $property,
            AbstractObjectPropertyMetadata::class
        );
    }

    /**
     * Validate properties
     *
     * This method validate a property value of the tested instance
     *
     * @param array  $properties The associative array of property name and values
     *                           to validate
     * @param mixed  $element    The tested instance
     * @param string $base       The base instance class of the properties
     *
     * @return void
     */
    private function validateProperties(array $properties, $element, $base)
    {
        foreach ($properties as $property => $value) {
            $reflex = new \ReflectionProperty(
                $base,
                $property
            );

            $reflex->setAccessible(true);

            $this->assertEquals($value, $reflex->getValue($element));
        }
    }

    /**
     * Test support
     *
     * This method validate the PhpMetadataParser::support method
     *
     * @return void
     */
    public function testSupport()
    {
        $resolverFactory = $this->createMock(ResolverFactory::class);
        $optionValidator = $this->createMock(ObjectOptionValidator::class);

        $optionValidator->expects($this->exactly(2))
            ->method('isValid')
            ->willReturn(false, true);

        $instance = new PhpMetadataParser($resolverFactory, $optionValidator);

        $this->assertFalse($instance->support(12));
        $this->assertFalse($instance->support('metadata.yml'));

        $this->assertFalse($instance->support([[]]));
        $this->assertTrue($instance->support([[]]));
    }
}

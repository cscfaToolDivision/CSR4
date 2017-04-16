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
use CSDT\CSR4\Mapper\PropertyAccess\PropertyAccessMapper;
use CSDT\CSR4\ConfidenceInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadataInterface;
use CSDT\CSR4\Mapper\MappingException;
use CSDT\CSR4\Tests\Mapper\PropertyAccess\Misc\MiscMappedObject;
use CSDT\CSR4\DataTransformer\TransformerResolverInterface;
use CSDT\CSR4\DataTransformer\TransformerInterface;
use CSDT\CSR4\Tests\Mapper\PropertyAccess\Misc\NoTransformerMapper;

/**
 * PropertyAccessMapperTest.php
 *
 * This class is used to validate the PropertyAccessMapper logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class PropertyAccessMapperTest extends TestCase
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
     * Support provider
     *
     * This method return an array of objects and confidence level to be used by
     * the tests
     *
     * @return array
     */
    public function supportProvider(): array
    {
        $meta1 = $this->createMock(ObjectMetadataInterface::class);
        $meta1->expects($this->any())
            ->method('getDtoClass')
            ->willReturn(CSR3DTOInterface::class);
        $meta1->expects($this->any())
            ->method('getMappedClass')
            ->willReturn(\stdClass::class);

        $meta2 = $this->createMock(ObjectMetadataInterface::class);
        $meta2->expects($this->any())
            ->method('getDtoClass')
            ->willReturn(CSR3DTOInterface::class);
        $meta2->expects($this->any())
            ->method('getMappedClass')
            ->willReturn('unsupportedClass');

        $meta3 = $this->createMock(ObjectMetadataInterface::class);
        $meta3->expects($this->any())
            ->method('getDtoClass')
            ->willReturn(CSR3DTOInterface::class);
        $meta3->expects($this->any())
            ->method('getMappedClass')
            ->willReturn(\stdClass::class);
        $meta3->expects($this->any())
            ->method('getDtoMapper')
            ->willReturn(PropertyAccessMapper::class);

        $meta4 = $this->createMock(ObjectMetadataInterface::class);
        $meta4->expects($this->any())
            ->method('getDtoClass')
            ->willReturn(CSR3DTOInterface::class);
        $meta4->expects($this->any())
            ->method('getMappedClass')
            ->willReturn('array');

        return [
            [
                ConfidenceInterface::LOW_CONFIDENCE,
                [
                    'dto' => $this->createMock(CSR3DTOInterface::class),
                    'object' => $this->createMock(\stdClass::class),
                    'metadata' => $meta1
                ]
            ],
            [
                ConfidenceInterface::UNSUPPORTED_CONFIDENCE,
                [
                    'dto' => $this->createMock(CSR3DTOInterface::class),
                    'object' => $this->createMock(\stdClass::class),
                    'metadata' => $meta2
                ]
            ],
            [
                ConfidenceInterface::DEDICATED_CONFIDENCE,
                [
                    'dto' => $this->createMock(CSR3DTOInterface::class),
                    'object' => $this->createMock(\stdClass::class),
                    'metadata' => $meta3
                ]
            ],
            [
                ConfidenceInterface::LOW_CONFIDENCE,
                [
                    'dto' => $this->createMock(CSR3DTOInterface::class),
                    'object' => [],
                    'metadata' => $meta4
                ]
            ]
        ];
    }

    /**
     * Test support
     *
     * This method validate the PropertyAccessMapper support logic
     *
     * @param int   $expectedResult The expected result of the support method
     * @param array $injection      An array of objects to be injected as parameters
     *                              of the support method
     *
     * @return void @dataProvider supportProvider
     */
    public function testSupport(int $expectedResult, array $injection)
    {
        $this->assertEquals(
            $expectedResult,
            $this->instance->support(
                $injection['metadata'],
                $injection['dto'],
                $injection['object']
            )
        );
    }

    /**
     * Get mapping properties
     *
     * This method return the mapping properties to be used in tests
     *
     * @param string $transformer The applyable transformer
     *
     * @return PHPUnit_Framework_MockObject_MockObject[]
     */
    private function getMappingProperties(string $transformer = null)
    {
        $properties = [];
        for ($i = 0; $i < 3; $i ++) {
            $mock = $this->createMock(ObjectPropertyMetadataInterface::class);

            $mock->expects($this->any())
                ->method('getMappingGroup')
                ->willReturn(
                    [
                        $i
                    ]
                );
            $mock->expects($this->any())
                ->method('getTargetProperty')
                ->willReturn('testProperty'.$i);
            $mock->expects($this->any())
                ->method('getProperty')
                ->willReturn('testProperty'.$i);
            $mock->expects($this->any())
                ->method('getMappedTransformer')
                ->willReturn($transformer);

            $properties[] = $mock;
        }

        return $properties;
    }

    /**
     * Get mapping dto
     *
     * This method return the dto for the tests
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    private function getMappingDto()
    {
        $dto = $this->createMock(CSR3DTOInterface::class);
        $dto->expects($this->any())
            ->method('offsetExists')
            ->withConsecutive(
                $this->equalTo('testProperty0'),
                $this->equalTo('testProperty1'),
                $this->equalTo('testProperty2')
            )
            ->will($this->returnValue(true));

        $dto->expects($this->any())
            ->method('offsetGet')
            ->withConsecutive(
                $this->equalTo('testProperty0'),
                $this->equalTo('testProperty1'),
                $this->equalTo('testProperty2')
            )
            ->willReturnCallback(
                function ($property) {
                    switch ($property) {
                        case 'testProperty0':
                            return 123;
                        case 'testProperty1':
                            return 231;
                        case 'testProperty2':
                            return 312;
                        default:
                            $this->fail();
                    }
                }
            );

        return $dto;
    }

    /**
     * Get mapping metadata
     *
     * This method return the metadata to be used for tests
     *
     * @param array $properties The properties
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    private function getMappingMetadata(array $properties)
    {
        $metadata = $this->createMock(ObjectMetadataInterface::class);
        $metadata->expects($this->any())
            ->method('getDtoClass')
            ->willReturn(CSR3DTOInterface::class);
        $metadata->expects($this->any())
            ->method('getMappedClass')
            ->willReturn('array');
        $metadata->expects($this->any())
            ->method('getObjectProperties')
            ->willReturn($properties);

        return $metadata;
    }

    /**
     * Get mapping metadata object
     *
     * This method return the metadata object to be used for tests
     *
     * @param array $properties The properties
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    private function getMappingMetadataObject(array $properties)
    {
        $metadataObject = $this->createMock(ObjectMetadataInterface::class);
        $metadataObject->expects($this->any())
            ->method('getDtoClass')
            ->willReturn(CSR3DTOInterface::class);
        $metadataObject->expects($this->any())
            ->method('getMappedClass')
            ->willReturn(MiscMappedObject::class);
        $metadataObject->expects($this->any())
            ->method('getObjectProperties')
            ->willReturn($properties);

        return $metadataObject;
    }

    /**
     * Mapping provider
     *
     * This method return an array of objects and metadatato be used by
     * the tests
     *
     * @return array
     */
    public function mappingProvider()
    {
        $properties = $this->getMappingProperties();
        $dto = $this->getMappingDto();

        $metadata = $this->getMappingMetadata($properties);
        $metadataObject = $this->getMappingMetadataObject($properties);

        return [
            [
                $dto,
                [],
                $metadata,
                [
                    'testProperty0' => 123,
                    'testProperty1' => 231,
                    'testProperty2' => 312
                ]
            ],
            [
                $dto,
                [],
                $metadata,
                [
                    'testProperty0' => 123,
                    'testProperty1' => 231
                ],
                [
                    0,
                    1
                ]
            ],
            [
                $dto,
                [],
                $metadata,
                [
                    'testProperty2' => 312
                ],
                [
                    2
                ]
            ],
            [
                $dto,
                new MiscMappedObject(null, null, null),
                $metadataObject,
                new MiscMappedObject(123, 231, 312)
            ]
        ];
    }

    /**
     * Test map with transformer
     *
     * This method validate the property accessor trait with transformer
     *
     * @return void
     */
    public function testMapWithTransformer()
    {
        $properties = $this->getMappingProperties('testTransformer');
        $dto = $this->getMappingDto();

        $metadata = $this->getMappingMetadata($properties);

        $transformer = $this->createMock(TransformerInterface::class);
        $transformer->expects($this->exactly(3))
            ->method('transformForObject')
            ->willReturnArgument(0);

        $transformerResolver = $this->createMock(TransformerResolverInterface::class);
        $transformerResolver->expects($this->any())
            ->method('resolve')
            ->willReturn($transformer);

        $this->instance->setTransformerResolver($transformerResolver);

        $mappedObject = [];
        $this->instance->mapToObject($metadata, $dto, $mappedObject);
    }

    /**
     * Test map with transformer
     *
     * This method validate the property accessor trait without transformer resolver but
     * with property data transformer
     *
     * @return void
     */
    public function testMapWithoutTransformer()
    {
        $this->expectException(MappingException::class);

        $properties = $this->getMappingProperties('testTransformer');
        $dto = $this->getMappingDto();

        $metadata = $this->getMappingMetadata($properties);

        $instance = new NoTransformerMapper();

        $mappedObject = [];
        $instance->mapToObject($metadata, $dto, $mappedObject);
    }

    /**
     * Test mapToObject
     *
     * This method validate the PropertyAccessMapper mapToObject logic
     *
     * @param CSR3DTOInterface        $dto            The base dto
     * @param mixed                   $mappedObject   The current mapped object
     * @param ObjectMetadataInterface $metadata       The mapping metadatas
     * @param mixed                   $expectedResult The expected result value
     * @param array                   $groups         The mapping groups
     *
     * @return void @dataProvider mappingProvider
     */
    public function testMapToObject(
        CSR3DTOInterface $dto,
        $mappedObject,
        ObjectMetadataInterface $metadata,
        $expectedResult,
        array $groups = []
    ) {
        $this->assertNull($this->instance->mapToObject($metadata, $dto, $mappedObject, $groups));

        $this->assertEquals($expectedResult, $mappedObject);
    }

    /**
     * Test mapToObject exceptions
     *
     * This method validate the PropertyAccessMapper::mapToObject logic in case of
     * unsupported metadata
     *
     * @return void
     */
    public function testMapToObjectExceptions()
    {
        $metadata = $this->createMock(ObjectMetadataInterface::class);
        $metadata->expects($this->any())
            ->method('getDtoClass')
            ->willReturn(CSR3DTOInterface::class);
        $metadata->expects($this->any())
            ->method('getMappedClass')
            ->willReturn('array');

        $this->expectException(MappingException::class);

        $object = $this->createMock(\stdClass::class);

        $this->instance->mapToObject($metadata, $this->createMock(CSR3DTOInterface::class), $object);
    }

    /**
     * Get mapping to dto
     *
     * This method return the dto for the tests
     *
     * @param int $setCount The setter call count for the DTO onject
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    private function getMappingToDto($setCount = 3)
    {
        $dto = $this->createMock(CSR3DTOInterface::class);
        $dto->expects($this->any())
            ->method('offsetExists')
            ->withConsecutive(
                $this->equalTo('testProperty0'),
                $this->equalTo('testProperty1'),
                $this->equalTo('testProperty2')
            )
            ->will($this->returnValue(true));

        $dto->expects($this->exactly($setCount))
            ->method('offsetSet')
            ->withConsecutive(
                $this->equalTo('testProperty0'),
                $this->equalTo('testProperty1'),
                $this->equalTo('testProperty2')
            );

        return $dto;
    }

    /**
     * Mapping dto provider
     *
     * This method return an array of objects and metadatato be used by
     * the tests
     *
     * @return array
     */
    public function mappingDtoProvider()
    {
        $properties = $this->getMappingProperties();

        $metadata = $this->getMappingMetadata($properties);

        return [
            [
                $this->getMappingToDto(),
                [],
                $metadata
            ],
            [
                $this->getMappingToDto(2),
                [],
                $metadata,
                [0, 1]
            ],
            [
                $this->getMappingToDto(1),
                [],
                $metadata,
                [0]
            ]
        ];
    }

    /**
     * Test mapToDto
     *
     * This method validate the PropertyAccessMapper mapToDto logic
     *
     * @param CSR3DTOInterface        $dto          The base dto
     * @param mixed                   $mappedObject The current mapped object
     * @param ObjectMetadataInterface $metadata     The mapping metadatas
     * @param array                   $groups       The mapping groups
     *
     * @return       void
     * @dataProvider mappingDtoProvider
     */
    public function testMapToDto(
        CSR3DTOInterface $dto,
        $mappedObject,
        ObjectMetadataInterface $metadata,
        array $groups = []
    ) {
        $this->assertNull($this->instance->mapToDto($metadata, $dto, $mappedObject, $groups));
    }

    /**
     * Test mapToDto exceptions
     *
     * This method validate the PropertyAccessMapper::mapToDto logic in case of
     * unsupported metadata
     *
     * @return void
     */
    public function testMapToDtoExceptions()
    {
        $metadata = $this->createMock(ObjectMetadataInterface::class);
        $metadata->expects($this->any())
            ->method('getDtoClass')
            ->willReturn(CSR3DTOInterface::class);
        $metadata->expects($this->any())
            ->method('getMappedClass')
            ->willReturn('array');

        $this->expectException(MappingException::class);

        $object = $this->createMock(\stdClass::class);

        $this->instance->mapToDto($metadata, $this->createMock(CSR3DTOInterface::class), $object);
    }
}

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
    public function supportProvider() : array
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
     * @param array $injection      An array of objects to be injected as
     *                              parameters of the support method
     *
     * @return       void
     * @dataProvider supportProvider
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

    public function mappingProvider()
    {
        $properties = [];
        for ($i = 0; $i < 3; $i++) {
            $mock = $this->createMock(ObjectPropertyMetadataInterface::class);

            $mock->expects($this->any())
                ->method('getMappingGroup')
                ->willReturn([]);
            $mock->expects($this->any())
                ->method('getTargetProperty')
                ->willReturn('testProperty' . $i);
            $mock->expects($this->any())
                ->method('getProperty')
                ->willReturn('testProperty' . $i);
            $mock->expects($this->any())
                ->method('getMappedTransformer')
                ->willReturn(null);

            $properties[] = $mock;
        }

        $dto = $this->createMock(CSR3DTOInterface::class);
        $dto->expects($this->any())
            ->method('offsetExists')
            ->withConsecutive(
                $this->equalTo('testProperty0'),
                $this->equalTo('testProperty1'),
                $this->equalTo('testProperty2')
            )->will($this->returnValue(true));

        $dto->expects($this->any())
            ->method('offsetGet')
            ->withConsecutive(
                $this->equalTo('testProperty0'),
                $this->equalTo('testProperty1'),
                $this->equalTo('testProperty2')
            )->will(
                $this->returnValue(123),
                $this->returnValue(231),
                $this->returnValue(312)
            );


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

        return [
            [
                $dto,
                [],
                $metadata
            ]
        ];
    }

    /**
     * @dataProvider mappingProvider
     */
    public function testMapToObject(
        CSR3DTOInterface $dto,
        $mappedObject,
        ObjectMetadataInterface $metadata
    ) {
        $this->assertNull(
            $this->instance->mapToObject($metadata, $dto, $mappedObject)
        );
    }
}

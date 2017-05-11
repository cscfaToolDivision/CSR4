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
namespace CSDT\CSR4\Tests\Mapper\Manager\Resolver;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Mapper\Manager\Resolver\GenericMetadataResolver;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR4\Tests\Mapper\PropertyAccess\Misc\MiscMappedObject;
use CSDT\CSR4\Mapper\Manager\Resolver\Exception\UnresolvableMetadataException;

/**
 * GenericMetadataResolverTest.php
 *
 * This class is used to test the MetadataResolver logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class GenericMetadataResolverTest extends TestCase
{
    /**
     * Instance
     *
     * This proeprty store the test instance of GenericMetadataResolver
     *
     * @var GenericMetadataResolver
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
        $this->instance = new GenericMetadataResolver();
    }

    /**
     * ResolveMetadata provider
     *
     * This method is used to provide the data used by the resolveMetadata test
     *
     * @return array
     */
    public function resolveMetadataProvider()
    {
        $metadatas = new \SplObjectStorage();

        $metadata1 = $this->createMock(ObjectMetadataInterface::class);
        $metadata1->expects($this->any())
            ->method('getDtoClass')
            ->willReturn(CSR3DTOInterface::class);
        $metadata1->expects($this->any())
            ->method('getMappedClass')
            ->willReturn(\stdClass::class);

        $metadata2 = $this->createMock(ObjectMetadataInterface::class);
        $metadata2->expects($this->any())
            ->method('getDtoClass')
            ->willReturn(CSR3DTOInterface::class);
        $metadata2->expects($this->any())
            ->method('getMappedClass')
            ->willReturn(MiscMappedObject::class);

        $metadatas->attach($metadata1);
        $metadatas->attach($metadata2);

        return [
            [
                $this->createMock(CSR3DTOInterface::class),
                $metadatas,
                $this->createMock(\stdClass::class),
                $metadata1
            ],
            [
                $this->createMock(CSR3DTOInterface::class),
                $metadatas,
                null,
                $metadata1
            ],
            [
                $this->createMock(CSR3DTOInterface::class),
                $metadatas,
                new MiscMappedObject(null, null, null),
                $metadata2
            ]
        ];
    }

    /**
     * Test resolveMetadata
     *
     * This method test the resolveMetadata logic of the GenericMetadataResolver
     *
     * @param \PHPUnit_Framework_MockObject_MockObject $dto            The mocked dto to be used
     * @param \SplObjectStorage                        $metadatas      The metadatas to be used
     * @param mixed                                    $mappedObject   The mapped object to be used
     * @param \PHPUnit_Framework_MockObject_MockObject $expectedResult The expected result of the call
     *
     * @return       void
     * @dataProvider resolveMetadataProvider
     */
    public function testResolveMetadata(
        \PHPUnit_Framework_MockObject_MockObject $dto,
        \SplObjectStorage $metadatas,
        $mappedObject,
        \PHPUnit_Framework_MockObject_MockObject $expectedResult
    ) {
        $result = $this->instance->resolveMetadata($metadatas, $dto, $mappedObject);

        $this->assertSame($expectedResult, $result);
    }

    /**
     * Test resolveMetadata exception
     *
     * This method test the resolveMetadata logic of the GenericMetadataResolver in
     * case of unresolvable metadata
     *
     * @return void
     */
    public function testResolveMetadataException()
    {
        $this->expectException(UnresolvableMetadataException::class);

        $this->instance->resolveMetadata(new \SplObjectStorage(), $this->createMock(CSR3DTOInterface::class), null);
    }
}

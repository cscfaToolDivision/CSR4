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
namespace CSDT\CSR4\Tests\Fonctionnal;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Mapper\Manager\GenericMapperManager;
use CSDT\CSR4\Mapper\PropertyAccess\PropertyAccessMapper;
use CSDT\CSR4\Metadata\Loader\Parser\php\PhpMetadataParser;
use CSDT\CSR4\Metadata\Loader\Parser\php\Factory\ResolverFactory;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\ObjectOptionValidator;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\PropertyOptionValidator;
use CSDT\CSR4\Metadata\Loader\MetadataLoader;
use CSDT\CSR3\CSR3GenericDTO;
use CSDT\CSR4\Mapper\Manager\Resolver\GenericMetadataResolver;
use CSDT\CSR4\Mapper\Manager\Resolver\GenericMapperResolver;
use CSDT\CSR4\Mapper\Manager\Resolver\GenericFactoryResolver;
use CSDT\CSR4\Tests\Fonctionnal\Utils\Factory\MiscArrayFactory;

/**
 * ManagerTest.php
 *
 * This class is used to test the Manager logic anf flow
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ManagerTest extends TestCase
{
    /**
     * Array provider
     *
     * This method is used to provide a manager for the array tests
     *
     * @return GenericMapperManager
     */
    public function arrayProvider()
    {
        $resolverFactory = new ResolverFactory();
        $optionValidator = new ObjectOptionValidator(new PropertyOptionValidator());
        $parser = new PhpMetadataParser($resolverFactory, $optionValidator);

        $loader = new MetadataLoader();
        $loader->addParser($parser);

        $loader->load(
            [
                [
                    'dto' => CSR3GenericDTO::class,
                    'class' => 'array',
                    'mapper' => PropertyAccessMapper::class,
                    'properties' => [
                        [
                            'property' => 'prop1',
                            'target' => 'prop1',
                            'group' => ['group1']
                        ],
                        [
                            'property' => 'prop2',
                            'target' => 'prop2',
                            'group' => ['group2']
                        ]
                    ]
                ]
            ]
        );

        $manager = new GenericMapperManager();

        $manager->addMapper(new PropertyAccessMapper());
        $manager->setMetadataResolver(new GenericMetadataResolver());
        $manager->setMapperResolver(new GenericMapperResolver());
        $manager->setFactoryResolver(new GenericFactoryResolver());
        $manager->setMetadatas($loader->getMetadata());

        return $manager;
    }

    /**
     * Test map without array
     *
     * This method validate the array mapping of the generic manager
     * with no mapped array parameter
     *
     * @return void
     */
    public function testMapWithoutArray()
    {
        $manager = $this->arrayProvider();

        $manager->addFactory(new MiscArrayFactory());

        $dto = new CSR3GenericDTO();
        $dto['prop1'] = 'val1';
        $dto['prop2'] = 'val2';

        $mappedObject = $manager->mapToObject($dto);

        $this->assertTrue(is_array($mappedObject));
        $this->assertArrayHasKey('prop1', $mappedObject);
        $this->assertEquals('val1', $mappedObject['prop1']);

        $this->assertArrayHasKey('prop2', $mappedObject);
        $this->assertEquals('val2', $mappedObject['prop2']);

        unset($dto['prop1']);
        unset($dto['prop2']);
        $this->assertFalse($dto->offsetExists('prop1'));
        $this->assertFalse($dto->offsetExists('prop2'));

        $manager->mapToDto($dto, $mappedObject);

        $this->assertTrue($dto->offsetExists('prop1'));
        $this->assertEquals('val1', $dto->getAttribute('prop1'));
        $this->assertTrue($dto->offsetExists('prop2'));
        $this->assertEquals('val2', $dto->getAttribute('prop2'));
    }

    /**
     * Test map array group
     *
     * This method validate the array mapping of the generic manager with group
     *
     * @return void
     */
    public function testMapArrayGroup()
    {
        $manager = $this->arrayProvider();

        $dto = new CSR3GenericDTO();
        $dto['prop2'] = 'val2';

        $mappedObject = [];
        $manager->mapToObject($dto, $mappedObject, ['group2']);

        $this->assertArrayNotHasKey('prop1', $mappedObject);
        $this->assertArrayHasKey('prop2', $mappedObject);
        $this->assertEquals('val2', $mappedObject['prop2']);

        unset($dto['prop2']);
        $this->assertFalse($dto->offsetExists('prop2'));
        $mappedObject['prop1'] = 'val1';
        $manager->mapToDto($dto, $mappedObject, ['group1']);

        $this->assertTrue($dto->offsetExists('prop1'));
        $this->assertEquals('val1', $dto->getAttribute('prop1'));

        $this->assertFalse($dto->offsetExists('prop2'));
    }

    /**
     * Test map array
     *
     * This method validate the array mapping of the generic manager
     *
     * @return void
     */
    public function testMapArray()
    {
        $manager = $this->arrayProvider();

        $dto = new CSR3GenericDTO();
        $dto['prop1'] = 'val1';
        $dto['prop2'] = 'val2';

        $mappedObject = [];
        $manager->mapToObject($dto, $mappedObject);

        $this->assertArrayHasKey('prop1', $mappedObject);
        $this->assertEquals('val1', $mappedObject['prop1']);
        $this->assertArrayHasKey('prop2', $mappedObject);
        $this->assertEquals('val2', $mappedObject['prop2']);

        unset($dto['prop1']);
        $this->assertFalse($dto->offsetExists('prop1'));
        unset($dto['prop2']);
        $this->assertFalse($dto->offsetExists('prop2'));

        $manager->mapToDto($dto, $mappedObject);

        $this->assertTrue($dto->offsetExists('prop1'));
        $this->assertEquals('val1', $dto->getAttribute('prop1'));

        $this->assertTrue($dto->offsetExists('prop2'));
        $this->assertEquals('val2', $dto->getAttribute('prop2'));
    }
}

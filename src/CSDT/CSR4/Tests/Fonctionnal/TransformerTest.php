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
use CSDT\CSR4\Mapper\PropertyAccess\PropertyAccessMapper;
use CSDT\CSR3\CSR3GenericDTO;
use CSDT\CSR4\Metadata\Loader\MetadataLoader;
use CSDT\CSR4\Metadata\Loader\Parser\php\PhpMetadataParser;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\ObjectOptionValidator;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\PropertyOptionValidator;
use CSDT\CSR4\Metadata\Loader\Parser\php\Factory\ResolverFactory;
use CSDT\CSR4\Mapper\Manager\GenericMapperManager;
use CSDT\CSR4\Mapper\Manager\Resolver\GenericMetadataResolver;
use CSDT\CSR4\Mapper\Manager\Resolver\GenericMapperResolver;
use CSDT\CSR4\Mapper\Manager\Resolver\GenericFactoryResolver;
use CSDT\CSR4\Tests\Fonctionnal\Utils\Transformer\MiscMd5Transformer;
use CSDT\CSR4\DataTransformer\TransformerResolver;
use CSDT\CSR4\DataTransformer\Loader\ClassLoader\ClassTransformerLoader;

/**
 * TransformerTest.php
 *
 * This class is used to validate the mapping with transformation
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class TransformerTest extends TestCase
{
    /**
     * Test transformation
     *
     * This method validate the mapping with a transformation
     *
     * @return void
     */
    public function testTransformation()
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
                            'property' => 'prop',
                            'target' => 'prop',
                            'transformer' => MiscMd5Transformer::class
                        ]
                    ]
                ]
            ]
        );

        $manager = new GenericMapperManager();

        $transformerResolver = new TransformerResolver();
        $transformerResolver->addTransformerLoader(new ClassTransformerLoader());

        $mapper = new PropertyAccessMapper();
        $mapper->setTransformerResolver($transformerResolver);

        $manager->addMapper($mapper);
        $manager->setMetadataResolver(new GenericMetadataResolver());
        $manager->setMapperResolver(new GenericMapperResolver());
        $manager->setFactoryResolver(new GenericFactoryResolver());
        $manager->setMetadatas($loader->getMetadata());

        $dto = new CSR3GenericDTO();
        $dto['prop'] = 'val';

        $mappedObject = [];
        $manager->mapToObject($dto, $mappedObject);

        $this->assertArrayHasKey('prop', $mappedObject);
        $this->assertEquals(md5('val'), $mappedObject['prop']);
    }
}

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

use CSDT\CSR3\CSR3GenericDTO;
use CSDT\CSR4\Mapper\PropertyAccess\PropertyAccessMapper;
use CSDT\CSR4\Metadata\Loader\Parser\php\Factory\ResolverFactory;
use CSDT\CSR4\Metadata\Loader\Parser\php\PhpMetadataParser;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\ObjectOptionValidator;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\PropertyOptionValidator;
use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadata;
use PHPUnit\Framework\TestCase;

/**
 * MetadataTest.php
 *
 * This class is used to validate the metadata logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class MetadataTest extends TestCase
{
    /**
     * Test metadata
     *
     * This method validate the metadata parsing logic
     *
     * @return void
     */
    public function testMetadata()
    {
        $resolverFactory = new ResolverFactory();
        $optionValidator = new ObjectOptionValidator(new PropertyOptionValidator());
        $parser = new PhpMetadataParser($resolverFactory, $optionValidator);

        $metadatas = $parser->parse(
            [
                [
                    'dto' => CSR3GenericDTO::class,
                    'class' => 'array',
                    'mapper' => PropertyAccessMapper::class,
                    'factory' => 'testFactory',
                    'properties' => [
                        [
                            'property' => 'prop1',
                            'target' => 'prop1'
                        ],
                        [
                            'property' => 'prop2',
                            'target' => 'prop2'
                        ]
                    ]
                ]
            ]
        );

        $metadata = $metadatas[0];

        $propMeta = $metadata->getByMappedProperty('prop2');

        $this->assertInstanceOf(ObjectPropertyMetadata::class, $propMeta);

        $this->assertEquals('testFactory', $metadata->getObjectFactory());
    }
}

<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category MetadataParser
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Metadata\Loader\Parser\php;

use CSDT\CSR4\Metadata\Loader\Parser\MetadataFormatParserInterface;
use CSDT\CSR4\Metadata\Loader\Parser\php\Factory\ResolverFactory;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\ObjectOptionValidator;

/**
 * PhpMetadataParser.php
 *
 * This class is used to parse a php array to a set of ObjectMetadataInterface
 *
 * @category MetadataParser
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class PhpMetadataParser implements MetadataFormatParserInterface
{
    /**
     * Resolver factory
     *
     * This property store the option resolver factory needed to load the options
     * from the parsed php array
     *
     * @var ResolverFactory
     */
    private $resolverFactory;

    /**
     * Option validator
     *
     * This property store the option validator
     *
     * @var ObjectOptionValidator
     */
    private $OptionValidator;

    /**
     * Construct
     *
     * The default PhpMetadataParser constructor
     *
     * @param ResolverFactory       $resolverFactory The resolver factory
     * @param ObjectOptionValidator $optionValidator The option validator
     *
     * @return void
     */
    public function __construct(
        ResolverFactory $resolverFactory,
        ObjectOptionValidator $optionValidator
    ) {
        $this->resolverFactory = $resolverFactory;
        $this->OptionValidator = $optionValidator;
    }

    /**
     * Parse
     *
     * This method parse a metadata input and return an array of
     * ObjectMetadataInterface
     *
     * @param mixed $metadata The metadata
     *
     * @return  ObjectMetadataInterface[]
     * @example
     * [
     *      [
     *          'class' => 'class_name',
     *          'mapper' => 'mapper_class',
     *          'factory' => 'factoryIdentifyer',
     *          'properties' => [
     *              'property' => 'property_name',
     *              'transformer' => 'data_transformer',
     *              'group' => ['group...']
     *          ]
     *      ]
     *s  ];
     */
    public function parse($metadata)
    {
        // TODO Auto-generated method stub
    }

    /**
     * Support
     *
     * This method indicate if the parser support or not the given metadata
     *
     * @param mixed $metadata The metadata
     *
     * @return bool
     */
    public function support($metadata)
    {
        if (!is_array($metadata)) {
            return false;
        }

        foreach ($metadata as $expectedObject) {
            if (!$this->OptionValidator->isValid($expectedObject)) {
                return false;
            }
        }

        return true;
    }
}

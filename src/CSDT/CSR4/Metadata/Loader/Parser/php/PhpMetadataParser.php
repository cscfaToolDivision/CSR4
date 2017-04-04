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
use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadata;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadata;
use Symfony\Component\OptionsResolver\OptionsResolver;
use CSDT\CSR4\Metadata\Loader\Parser\UnsupportedMetadataException;

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
     * @throws  UnsupportedMetadataException
     * @example
     * [
     *      [
     *          'dto' => 'dto_class_name,
     *          'class' => 'class_name',
     *          'mapper' => 'mapper_class',
     *          'factory' => 'factoryIdentifyer',
     *          'properties' => [
     *              [
     *                  'property' => 'property_name',
     *                  'transformer' => 'data_transformer',
     *                  'group' => ['group...']
     *              ]
     *          ]
     *      ]
     * ];
     */
    public function parse($metadata) : array
    {
        if (!$this->support($metadata)) {
            throw new UnsupportedMetadataException(
                'The given metadata cannot be parsed'
            );
        }

        $objects = [];
        foreach ($metadata as $objectOption) {
            $objects[] = $this->resolveObject(
                $objectOption,
                $this->resolverFactory->getObjectOptionResolver(),
                $this->resolverFactory->getPropertyOptionResolver()
            );
        }

        return $objects;
    }

    /**
     * Resolve object
     *
     * This method resolve an object from an object option
     *
     * @param array           $objectOption     The object option
     * @param OptionsResolver $objectResolver   The object option resolver
     * @param OptionsResolver $propertyResolver The property option resolver
     *
     * @return ObjectMetadata
     */
    private function resolveObject(
        array $objectOption,
        OptionsResolver $objectResolver,
        OptionsResolver $propertyResolver
    ) : ObjectMetadata {
        $objectOptions = $objectResolver->resolve($objectOption);

        $properties = [];
        foreach ($objectOptions['properties'] as $property) {
            $properties[] = $this->resolveProperty(
                $propertyResolver->resolve($property)
            );
        }

        return new ObjectMetadata(
            $objectOptions['dto'],
            $objectOptions['class'],
            $properties,
            $objectOptions['factory'],
            $objectOptions['mapper']
        );
    }

    /**
     * Resolve property
     *
     * This method resolve a property from a property option
     *
     * @param array $propertyOption The proeprty option
     *
     * @return ObjectPropertyMetadata
     */
    private function resolveProperty(array $propertyOption)
    {
        return new ObjectPropertyMetadata(
            $propertyOption['property'],
            $propertyOption['group'],
            $propertyOption['transformer']
        );
    }

    /**
     * Support
     *
     * This method indicate if the parser support or not the given metadata
     *
     * @param mixed $metadata The metadata
     *
     * @return  bool
     * @example
     * [
     *      [
     *          'dto' => 'dto_class_name,
     *          'class' => 'class_name',
     *          'mapper' => 'mapper_class',
     *          'factory' => 'factoryIdentifyer',
     *          'properties' => [
     *              [
     *                  'property' => 'property_name',
     *                  'transformer' => 'data_transformer',
     *                  'group' => ['group...']
     *              ]
     *          ]
     *      ]
     * ];
     */
    public function support($metadata) : bool
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

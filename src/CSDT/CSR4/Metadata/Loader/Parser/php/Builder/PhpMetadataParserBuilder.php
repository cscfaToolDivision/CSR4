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
namespace CSDT\CSR4\Metadata\Loader\Parser\php\Builder;

use CSDT\CSR4\Metadata\Loader\Parser\php\Factory\ResolverFactory;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\ObjectOptionValidator;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\PropertyOptionValidator;
use CSDT\CSR4\Metadata\Loader\Parser\php\PhpMetadataParser;

/**
 * PhpMetadataParserBuilder.php
 *
 * This class is used to build a new instance of ObjectMetadataParser
 *
 * @category MetadataParser
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class PhpMetadataParserBuilder
{
    /**
     * Resolver factory
     *
     * This property store the resolver factory to be injected into the PhpMetadataParser
     *
     * @var ResolverFactory
     */
    private $resolverFactory;

    /**
     * Option validator
     *
     * This property store the option validator to be injected into the PhpMetadataParser
     *
     * @var ObjectOptionValidator
     */
    private $optionValidator;

    /**
     * Constructor
     *
     * The default PhpMetadataParserBuimder constructor
     *
     * @return void
     */
    final public function __construct()
    {
        $this->resolverFactory = new ResolverFactory();

        $this->optionValidator = new ObjectOptionValidator(new PropertyOptionValidator());
    }

    /**
     * Set resolver factory
     *
     * This method allow to set the resolver factory to be used as instanciation argument of
     * the PhpMetadataParser
     *
     * @param ResolverFactory $resolverFactory The resolver factory
     *
     * @return void
     */
    public function setResolverFactory(ResolverFactory $resolverFactory)
    {
        $this->resolverFactory = $resolverFactory;

        return;
    }

    /**
     * Set option validator
     *
     * This method allow to set the option validator to be used as instanciation argument of
     * the PhpMetadataParser
     *
     * @param ObjectOptionValidator $optionValidator The option validator
     *
     * @return void
     */
    public function setOptionValidator(ObjectOptionValidator $optionValidator)
    {
        $this->optionValidator = $optionValidator;

        return;
    }

    /**
     * Get metadata parser
     *
     * This method return the PhpMetadataParser instanciated accordingly with the current
     * builder state
     *
     * @return PhpMetadataParser
     */
    public function getMetadataParser() : PhpMetadataParser
    {
        return new PhpMetadataParser($this->resolverFactory, $this->optionValidator);
    }
}

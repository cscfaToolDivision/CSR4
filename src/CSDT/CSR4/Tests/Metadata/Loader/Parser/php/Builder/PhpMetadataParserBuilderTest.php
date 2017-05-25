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
namespace CSDT\CSR4\Tests\Metadata\Loader\Parser\php\Builder;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Metadata\Loader\Parser\php\Builder\PhpMetadataParserBuilder;
use CSDT\CSR4\Metadata\Loader\Parser\php\PhpMetadataParser;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\ObjectOptionValidator;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\PropertyOptionValidator;
use CSDT\CSR4\Metadata\Loader\Parser\php\Factory\ResolverFactory;

/**
 * PhpMetadataParserBuilderTest.php
 *
 * This class is used to validate the PhpMetadataParserBuilder logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class PhpMetadataParserBuilderTest extends TestCase
{
    /**
     * Instance
     *
     * This property store the PhpMetadataParserBuilder instance to be tested
     *
     * @var PhpMetadataParserBuilder
     */
    private $instance;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->instance = new PhpMetadataParserBuilder();
    }

    /**
     * Test default instantiation
     *
     * This method validate the default parser instantiation from the tested builder
     *
     * @return void
     */
    public function testDefaultInstantiation()
    {
        $resolverFactory = new ResolverFactory();
        $optionValidator = new ObjectOptionValidator(new PropertyOptionValidator());
        $parser = new PhpMetadataParser($resolverFactory, $optionValidator);

        $this->assertEquals($parser, $this->instance->getMetadataParser());
    }

    /**
     * Test instantiation
     *
     * This method validate the parser instantiation from the tested builder
     *
     * @return void
     */
    public function testInstantiation()
    {
        $resolverFactory = $this->createMock(ResolverFactory::class);
        $optionValidator = $this->createMock(ObjectOptionValidator::class);
        $parser = new PhpMetadataParser($resolverFactory, $optionValidator);

        $this->instance->setResolverFactory($resolverFactory);
        $this->instance->setOptionValidator($optionValidator);

        $this->assertEquals($parser, $this->instance->getMetadataParser());
    }
}

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
namespace CSDT\CSR4\Tests\Metadata\Loader\Parser\php\Factory;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Metadata\Loader\Parser\php\Factory\ResolverFactory;

/**
 * ResolverFactoryTest.php
 *
 * This class is used to validate the ResolverFactory logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ResolverFactoryTest extends TestCase
{
    /**
     * Instance
     *
     * This property store the current tested instance
     *
     * @var ResolverFactory
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
        $this->instance = new ResolverFactory();
    }

    /**
     * Test getPropertyOptionResolver
     *
     * This method validate the getPropertyOptionResolver method of the
     * ResolverFactory
     *
     * @return void
     */
    public function testGetPropertyOptionResolver()
    {
        $resolver = $this->instance->getPropertyOptionResolver();

        $this->assertTrue($resolver->isRequired('property'));
        $this->assertTrue($resolver->isDefined('transformer'));
        $this->assertTrue($resolver->isDefined('group'));

        $this->assertTrue($resolver->hasDefault('group'));
        $this->asserttrue($resolver->hasDefault('transformer'));
    }

    /**
     * Test getObjectOptionResolver
     *
     * This method validate the getObjectOptionResolver method of the
     * ResolverFactory
     *
     * @return void
     */
    public function testGetObjectOptionResolver()
    {
        $resolver = $this->instance->getObjectOptionResolver();

        $this->assertTrue($resolver->isRequired('class'));
        $this->assertTrue($resolver->isDefined('mapper'));
        $this->assertTrue($resolver->isDefined('factory'));
        $this->assertTrue($resolver->isDefined('properties'));

        $this->assertTrue($resolver->hasDefault('properties'));
        $this->assertTrue($resolver->hasDefault('mapper'));
        $this->assertTrue($resolver->hasDefault('factory'));
    }
}

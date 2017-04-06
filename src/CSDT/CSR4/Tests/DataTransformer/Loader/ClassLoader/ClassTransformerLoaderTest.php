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
namespace CSDT\CSR4\Tests\DataTransformer\Loader\ClassLoader;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\DataTransformer\Loader\ClassLoader\ClassTransformerLoader;
use CSDT\CSR4\Tests\DataTransformer\Loader\ClassLoader\Util\FixtureTransformer;
use CSDT\CSR4\ConfidenceInterface;
use CSDT\CSR4\Tests\DataTransformer\Loader\ClassLoader\Util\OptionalFixtureTransformer;
use CSDT\CSR4\Tests\DataTransformer\Loader\ClassLoader\Util\RequiredFixtureTransformer;
use CSDT\CSR4\DataTransformer\UnsupportedTransformerException;

/**
 * ClassTransformerLoaderTest.php
 *
 * This class is used to validate the logic of the ClassTransformerLoader class
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ClassTransformerLoaderTest extends TestCase
{

    /**
     * The tested instance
     *
     * This property store the
     *
     * @var ClassTransformerLoader
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
        $this->instance = new ClassTransformerLoader();
    }

    /**
     * Test support
     *
     * This method validate the support method of the ClassTransformerLoader
     *
     * @return void
     */
    public function testSupport()
    {
        $classNames = [
            ConfidenceInterface::MEDIUM_CONFIDENCE => FixtureTransformer::class,
            ConfidenceInterface::LOW_CONFIDENCE => OptionalFixtureTransformer::class,
            ConfidenceInterface::UNSUPPORTED_CONFIDENCE => RequiredFixtureTransformer::class,
            ConfidenceInterface::UNSUPPORTED_CONFIDENCE => 'test',
            ConfidenceInterface::UNSUPPORTED_CONFIDENCE => 12,
            ConfidenceInterface::UNSUPPORTED_CONFIDENCE => (new \stdClass())
        ];

        foreach ($classNames as $expectedConfidence => $class) {
            $this->assertEquals(
                $expectedConfidence,
                $this->instance->support($class)
            );
        }
    }

    /**
     * Test load
     *
     * This method validate the load method of the ClassTransformerLoader
     *
     * @return void
     */
    public function testLoad()
    {
        $transformer = $this->instance->load(FixtureTransformer::class);

        $this->assertInstanceOf(
            FixtureTransformer::class,
            $transformer
        );

        $transformer = $this->instance->load(OptionalFixtureTransformer::class);

        $this->assertInstanceOf(
            OptionalFixtureTransformer::class,
            $transformer
        );
    }

    /**
     * Load failure provider
     *
     * This method is used to return the load failure arguments
     *
     * @return array
     */
    public function loadFailureProvider()
    {
        return [
            [RequiredFixtureTransformer::class],
            ['test'],
            [12]
        ];
    }

    /**
     * Test load failure
     *
     * This method validate the load method of the ClassTransformerLoader
     *
     * @param mixed $transformer The transfomer identifyer
     *
     * @return       void
     * @dataProvider loadFailureProvider
     */
    public function testLoadFailure($transformer)
    {
        $this->expectException(UnsupportedTransformerException::class);

        $this->instance->load($transformer);
    }
}

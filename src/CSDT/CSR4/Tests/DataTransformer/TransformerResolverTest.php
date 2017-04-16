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
namespace CSDT\CSR4\Tests\DataTransformer;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\DataTransformer\TransformerResolver;
use CSDT\CSR4\DataTransformer\Loader\TransformerLoaderInterface;
use CSDT\CSR4\ConfidenceInterface;
use CSDT\CSR4\DataTransformer\Abstracts\AbstractTransformerResolver;
use CSDT\CSR4\DataTransformer\TransformerInterface;
use CSDT\CSR4\DataTransformer\UnsupportedTransformerException;

/**
 * TransformerResolverTest.php
 *
 * This class is used to validate the TransformerResolver logic
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class TransformerResolverTest extends TestCase
{

    /**
     * Instance
     *
     * This property store the tested instance
     *
     * @var TransformerResolver
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
        $this->instance = new TransformerResolver();
    }

    /**
     * Test addTransformer
     *
     * This method validate the TransformerResolver addTransformer method
     *
     * @return void
     */
    public function testAddTransformer()
    {
        $loader = $this->createMock(TransformerLoaderInterface::class);

        $this->instance->addTransformerLoader($loader);

        $reflex = new \ReflectionProperty(
            AbstractTransformerResolver::class,
            'loaders'
        );

        $reflex->setAccessible(true);

        $storage = $reflex->getValue($this->instance);

        if ($storage instanceof \SplObjectStorage) {
            $this->assertTrue($storage->contains($loader));

            return;
        }

        $this->fail();
    }

    /**
     * Get loaders
     *
     * This method return a set of loaders to be used in other tests
     *
     * @return array
     */
    public function getLoaders()
    {
        $loaderUnsupported = $this->createMock(TransformerLoaderInterface::class);
        $loaderUnsupported->expects($this->any())
            ->method('support')
            ->willReturn(ConfidenceInterface::UNSUPPORTED_CONFIDENCE);

        $loaderLow = $this->createMock(TransformerLoaderInterface::class);
        $loaderLow->expects($this->any())
            ->method('support')
            ->willReturn(ConfidenceInterface::LOW_CONFIDENCE);

        $loaderMedium = $this->createMock(TransformerLoaderInterface::class);
        $loaderMedium->expects($this->any())
            ->method('support')
            ->willReturn(ConfidenceInterface::MEDIUM_CONFIDENCE);

        $loaderHight = $this->createMock(TransformerLoaderInterface::class);
        $loaderHight->expects($this->any())
            ->method('support')
            ->willReturn(ConfidenceInterface::HIGH_CONFIDENCE);

        $loaderDedicated = $this->createMock(TransformerLoaderInterface::class);
        $loaderDedicated->expects($this->any())
            ->method('support')
            ->willReturn(ConfidenceInterface::DEDICATED_CONFIDENCE);

        return [
                ConfidenceInterface::UNSUPPORTED_CONFIDENCE => $loaderUnsupported,
                ConfidenceInterface::LOW_CONFIDENCE         => $loaderLow,
                ConfidenceInterface::MEDIUM_CONFIDENCE      => $loaderMedium,
                ConfidenceInterface::HIGH_CONFIDENCE        => $loaderHight,
                ConfidenceInterface::DEDICATED_CONFIDENCE   => $loaderDedicated,
               ];
    }

    /**
     * Validate resolver
     *
     * This method is used to validate the loader resolving. It assign an
     * expectation to the expected resolved loader and validate the method load is
     * call, and the return value of this call
     *
     * @param array $loaders    A set of loaders to assign
     * @param int   $confidence A confidence level that indicate which loader is
     *                          expected to be used
     *
     * @return void
     */
    private function validateResolve(array $loaders, int $confidence)
    {
        foreach ($loaders as $loader) {
            $this->instance->addTransformerLoader($loader);
        }

        $transformer = $this->createMock(TransformerInterface::class);

        $dedicated = $loaders[$confidence];
        $dedicated->expects($this->once())
            ->method('load')
            ->with('test')
            ->willReturn($transformer);

        $this->assertEquals($transformer, $this->instance->resolve('test'));
    }

    /**
     * Test resolve dedicated
     *
     * This method validate the TransformerResolver resolve method with dedicated
     * loader
     *
     * @return void
     */
    public function testResolveDedicated()
    {
        $this->validateResolve(
            $this->getLoaders(),
            ConfidenceInterface::DEDICATED_CONFIDENCE
        );
    }

    /**
     * Test resolve high
     *
     * This method validate the TransformerResolver resolve method with high
     * confidence loader
     *
     * @return void
     */
    public function testResolveHigh()
    {
        $loaders = $this->getLoaders();
        unset($loaders[ConfidenceInterface::DEDICATED_CONFIDENCE]);

        $this->validateResolve(
            $loaders,
            ConfidenceInterface::HIGH_CONFIDENCE
        );
    }

    /**
     * Test resolve medium
     *
     * This method validate the TransformerResolver resolve method with medium
     * confidence loader
     *
     * @return void
     */
    public function testResolveMedium()
    {
        $loaders = $this->getLoaders();
        unset($loaders[ConfidenceInterface::DEDICATED_CONFIDENCE]);
        unset($loaders[ConfidenceInterface::HIGH_CONFIDENCE]);

        $this->validateResolve(
            $loaders,
            ConfidenceInterface::MEDIUM_CONFIDENCE
        );
    }

    /**
     * Test resolve low
     *
     * This method validate the TransformerResolver resolve method with low
     * confidence loader
     *
     * @return void
     */
    public function testResolveLow()
    {
        $loaders = $this->getLoaders();
        unset($loaders[ConfidenceInterface::DEDICATED_CONFIDENCE]);
        unset($loaders[ConfidenceInterface::HIGH_CONFIDENCE]);
        unset($loaders[ConfidenceInterface::MEDIUM_CONFIDENCE]);

        $this->validateResolve(
            $loaders,
            ConfidenceInterface::LOW_CONFIDENCE
        );
    }

    /**
     * Test resolve unsupported
     *
     * This method validate the TransformerResolver resolve method with unsupported
     * confidence loader
     *
     * @return void
     */
    public function testResolveUnsupported()
    {
        $this->expectException(UnsupportedTransformerException::class);

        $loaders = $this->getLoaders();
        $this->instance->addTransformerLoader(
            $loaders[ConfidenceInterface::UNSUPPORTED_CONFIDENCE]
        );
        $this->instance->resolve('test');
    }

    /**
     * Test unsupported
     *
     * This method validate the TransformerResolver resolve method with no loader
     *
     * @return void
     */
    public function testUnsupported()
    {
        $this->expectException(UnsupportedTransformerException::class);

        $this->instance->resolve('test');
    }
}

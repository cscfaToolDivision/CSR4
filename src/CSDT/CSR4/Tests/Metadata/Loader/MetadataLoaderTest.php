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
namespace CSDT\CSR4\Tests\Metadata\Loader;

use PHPUnit\Framework\TestCase;
use CSDT\CSR4\Metadata\Loader\MetadataLoader;
use CSDT\CSR4\Metadata\Loader\Parser\MetadataFormatParserInterface;
use CSDT\CSR4\Metadata\Loader\Parser\UnsupportedMetadataException;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR4\Metadata\Loader\Abstracts\AbstractMetadataLoader;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Cache\CacheItemInterface;

/**
 * MetadataLoaderTest.php
 *
 * This class is used to validate the logic of the MetadataLoader class
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class MetadataLoaderTest extends TestCase
{
    /**
     * Test no parser support
     *
     * This method validate the MetadataLoader logic when a metadata with no parser
     * support is loaded
     *
     * @return void
     */
    public function testNoParserSupport()
    {
        $this->expectException(UnsupportedMetadataException::class);
        $this->expectExceptionMessage('No parser found for metadata');

        $parser = $this->createMock(MetadataFormatParserInterface::class);
        $parser->expects($this->once())
            ->method('support')
            ->willReturn(false);


        $instance = new MetadataLoader([$parser]);

        $instance->load('test');
    }

    /**
     * Test parser support
     *
     * This method validate the MetadataLoader logic when a metadata with parser
     * support is loaded
     *
     * @return void
     */
    public function testParserSupport()
    {
        $result = [$this->createMock(ObjectMetadataInterface::class)];

        $parser = $this->createMock(MetadataFormatParserInterface::class);
        $parser->expects($this->once())
            ->method('support')
            ->willReturn(true);
        $parser->expects($this->once())
            ->method('parse')
            ->with($this->equalTo('test'))
            ->willReturn($result);


        $instance = new MetadataLoader([$parser]);

        $instance->load('test');

        $reflex = new \ReflectionProperty(
            AbstractMetadataLoader::class,
            'metadata'
        );
        $reflex->setAccessible(true);

        $this->assertEquals($result, $reflex->getValue($instance));
        $this->assertEquals($result, $instance->getMetadata());
    }

    /**
     * Test multiple parser
     *
     * This method validate the MetadataLoader logic when multiple parser
     * are stored
     *
     * @return void
     */
    public function testMulitpleParser()
    {
        $result = [$this->createMock(ObjectMetadataInterface::class)];

        $parserAvailable = $this->createMock(MetadataFormatParserInterface::class);
        $parserAvailable->expects($this->once())
            ->method('support')
            ->willReturn(true);
        $parserAvailable->expects($this->once())
            ->method('parse')
            ->with($this->equalTo('test'))
            ->willReturn($result);

        $parserError = $this->createMock(MetadataFormatParserInterface::class);
        $parserError->expects($this->once())
            ->method('support')
            ->willReturn(false);
        $parserError->expects($this->never())
            ->method('parse');

        $instance = new MetadataLoader([$parserError, $parserAvailable]);

        $instance->load('test');

        $reflex = new \ReflectionProperty(
            AbstractMetadataLoader::class,
            'metadata'
        );
        $reflex->setAccessible(true);

        $this->assertEquals($result, $reflex->getValue($instance));
        $this->assertEquals($result, $instance->getMetadata());
    }

    /**
     * Test new cache debug
     *
     * This method validate the MetadataLoader logic when a new cache item must be
     * saved but debug mode is activated
     *
     * @return void
     */
    public function testNewCacheDebug()
    {
        $result = [$this->createMock(ObjectMetadataInterface::class)];
        $cache = $this->createMock(CacheItemPoolInterface::class);

        $cache->expects($this->never())
            ->method('getItem');
        $cache->expects($this->never())
            ->method('save');

        $parser = $this->createMock(MetadataFormatParserInterface::class);
        $parser->expects($this->once())
            ->method('support')
            ->willReturn(true);
        $parser->expects($this->once())
            ->method('parse')
            ->with($this->equalTo('test'))
            ->willReturn($result);

        $instance = new MetadataLoader([$parser], $cache, true);

        $instance->load('test');

        $reflex = new \ReflectionProperty(
            AbstractMetadataLoader::class,
            'metadata'
        );
        $reflex->setAccessible(true);

        $this->assertEquals($result, $reflex->getValue($instance));
        $this->assertEquals($result, $instance->getMetadata());
    }

    /**
     * Test new cache
     *
     * This method validate the MetadataLoader logic when a new cache item must be
     * saved
     *
     * @return void
     */
    public function testNewCache()
    {
        $result = [$this->createMock(ObjectMetadataInterface::class)];
        $cache = $this->createMock(CacheItemPoolInterface::class);
        $cacheItem = $this->createMock(CacheItemInterface::class);

        $cacheItem->expects($this->exactly(2))
            ->method('isHit')
            ->willReturn(false);
        $cacheItem->expects($this->once())
            ->method('set')
            ->with($this->equalTo($result));

        $cache->expects($this->exactly(2))
            ->method('getItem')
            ->with($this->equalTo(md5(serialize('test'))))
            ->willReturn($cacheItem);
        $cache->expects($this->once())
            ->method('save')
            ->with($cacheItem);

        $parser = $this->createMock(MetadataFormatParserInterface::class);
        $parser->expects($this->once())
            ->method('support')
            ->willReturn(true);
        $parser->expects($this->once())
            ->method('parse')
            ->with($this->equalTo('test'))
            ->willReturn($result);


        $instance = new MetadataLoader([$parser], $cache);

        $instance->load('test');

        $reflex = new \ReflectionProperty(
            AbstractMetadataLoader::class,
            'metadata'
        );
        $reflex->setAccessible(true);

        $this->assertEquals($result, $reflex->getValue($instance));
        $this->assertEquals($result, $instance->getMetadata());
    }

    /**
     * Test cache
     *
     * This method validate the MetadataLoader logic when an already hit cache item
     * must be returned
     *
     * @return void
     */
    public function testCache()
    {
        $result = [$this->createMock(ObjectMetadataInterface::class)];
        $cache = $this->createMock(CacheItemPoolInterface::class);
        $cacheItem = $this->createMock(CacheItemInterface::class);

        $cacheItem->expects($this->exactly(2))
            ->method('isHit')
            ->willReturn(true);
        $cacheItem->expects($this->once())
            ->method('get')
            ->willReturn($result);

        $cache->expects($this->exactly(2))
            ->method('getItem')
            ->with($this->equalTo(md5(serialize('test'))))
            ->willReturn($cacheItem);
        $cache->expects($this->never())
            ->method('save')
            ->with($cacheItem);

        $parser = $this->createMock(MetadataFormatParserInterface::class);
        $parser->expects($this->never())
            ->method('support');
        $parser->expects($this->never())
            ->method('parse');


        $instance = new MetadataLoader([$parser], $cache);

        $instance->load('test');

        $reflex = new \ReflectionProperty(
            AbstractMetadataLoader::class,
            'metadata'
        );
        $reflex->setAccessible(true);

        $this->assertEquals($result, $reflex->getValue($instance));
        $this->assertEquals($result, $instance->getMetadata());
    }

    /**
     * Test parser ressource
     *
     * This method validate the MetadataLoader logic when a ressource metadata is
     * loaded
     *
     * @return void
     */
    public function testParseResource()
    {
        $result = [$this->createMock(ObjectMetadataInterface::class)];
        $cache = $this->createMock(CacheItemPoolInterface::class);
        $cacheItem = $this->createMock(CacheItemInterface::class);

        $stream = fopen('php://memory', 'r+');
        fwrite($stream, 'test');
        rewind($stream);

        $parser = $this->createMock(MetadataFormatParserInterface::class);
        $parser->expects($this->once())
            ->method('support')
            ->willReturn(true);
        $parser->expects($this->once())
            ->method('parse')
            ->with($this->identicalTo($stream))
            ->willReturn($result);

        $cacheItem->expects($this->exactly(2))
            ->method('isHit')
            ->willReturn(false);
        $cacheItem->expects($this->once())
            ->method('set')
            ->willReturn($result);

        $cache->expects($this->exactly(2))
            ->method('getItem')
            ->with($this->equalTo(md5('test')))
            ->willReturn($cacheItem);
        $cache->expects($this->once())
            ->method('save')
            ->with($cacheItem);

        $instance = new MetadataLoader([$parser], $cache);

        $instance->load($stream);

        $reflex = new \ReflectionProperty(
            AbstractMetadataLoader::class,
            'metadata'
        );
        $reflex->setAccessible(true);

        $this->assertEquals($result, $reflex->getValue($instance));
        $this->assertEquals($result, $instance->getMetadata());
    }
}

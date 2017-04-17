<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Metadata\Loader\Abstracts;

use CSDT\CSR4\Metadata\Loader\MetadataLoaderInterface;
use CSDT\CSR4\Metadata\Loader\Traits\MetadataLoaderTrait;
use CSDT\CSR4\Metadata\Loader\Parser\MetadataFormatParserInterface;
use Psr\Cache\CacheItemPoolInterface;
use CSDT\CSR4\Metadata\Loader\Parser\UnsupportedMetadataException;

/**
 * AbstractMetadataLoader.php
 *
 * This class is used as abstract metadata loader
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class AbstractMetadataLoader implements MetadataLoaderInterface
{
    /**
     * Metadata
     *
     * This property store the metadata currently merged from the load result
     *
     * @var array
     */
    private $metadata = [];

    /**
     * Cache pool
     *
     * This property store the cache item pool to be used to cache the parsing
     * result
     *
     * @var CacheItemPoolInterface
     */
    private $cachePool = null;

    /**
     * Debug
     *
     * This proeprty store the debug state of the current application instance
     *
     * @var bool
     */
    private $debug;

    /**
     * Parser storage
     *
     * This property store the parsers that can be used to load the given metadata
     *
     * @var \SplObjectStorage
     */
    private $parserStorage;

    use MetadataLoaderTrait;

    /**
     * Construct
     *
     * The default AbstractMetadataLoader contructor
     *
     * @param array                  $parsers   A set of parser to add
     * @param CacheItemPoolInterface $cachePool The cache pool to be used
     * @param bool                   $debug     The application debug state
     *
     * @return                                      void
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function __construct(
        array $parsers = [],
        CacheItemPoolInterface $cachePool = null,
        bool $debug = false
    ) {
        $this->parserStorage = new \SplObjectStorage();

        foreach ($parsers as $parser) {
            $this->addParser($parser);
        }

        if ($cachePool !== null) {
            $this->setCache($cachePool);
        }

        $this->setDebug($debug);
    }

    /**
     * Add parser
     *
     * This method is used to add a new metadata format parser to the set of parser
     *
     * @param MetadataFormatParserInterface $parser The parser to add
     *
     * @return $this
     */
    public function addParser(MetadataFormatParserInterface $parser) : MetadataLoaderInterface
    {
        if (!$this->parserStorage->contains($parser)) {
            $this->parserStorage->attach($parser);
        }

        return $this;
    }

    /**
     * Load
     *
     * This method is used to load a metadata and store it into the metadata
     * configuration
     *
     * @param mixed $metadataElement The metadata to load
     *
     * @return void
     */
    public function load($metadataElement)
    {
        $metadata = $this->findMetadata($metadataElement);
        $this->storeMetadata($metadata, $metadataElement);
        $this->mergeMetadata($metadata);
    }

    /**
     * Store metadata
     *
     * This method save the metadata in cache if available
     *
     * @param array $metadata        The metadata to store
     * @param mixed $metadataElement The base metadata element
     *
     * @return void
     */
    private function storeMetadata(array $metadata, $metadataElement)
    {
        if ($this->cachePool !== null && !$this->debug) {
            $cache = $this->getCache($metadataElement);
            if (!$cache->isHit()) {
                $cache->set($metadata);
                $this->cachePool->save($cache);
            }
        }
    }

    /**
     * Find metadata
     *
     * This method is used to find the metadata whether from cache or parsing
     *
     * @param mixed $metadataElement The metadata element to parse
     *
     * @return array
     */
    private function findMetadata($metadataElement) : array
    {
        if ($this->cachePool !== null && !$this->debug) {
            $cache = $this->getCache($metadataElement);
            if ($cache->isHit()) {
                return $cache->get();
            }
        }

        return $this->loadMetadata($metadataElement);
    }

    /**
     * Get cache
     *
     * This method return the cache item relevant to the metadata element
     *
     * @param mixed $metadataElement The relevant metadata element
     *
     * @return \Psr\Cache\CacheItemInterface
     */
    private function getCache($metadataElement)
    {
        return $this->cachePool->getItem($this->getCacheKey($metadataElement));
    }

    /**
     * Load metadata
     *
     * This method is used to iterate the parsers and return the metadata from
     * which parser that support it
     *
     * @param mixed $metadataElement The metadata to load
     *
     * @throws UnsupportedMetadataException
     * @return array
     */
    private function loadMetadata($metadataElement) : array
    {
        foreach ($this->parserStorage as $parser) {
            if ($parser instanceof MetadataFormatParserInterface) {
                if ($parser->support($metadataElement)) {
                    return $parser->parse($metadataElement);
                }
            }
        }

        throw new UnsupportedMetadataException('No parser found for metadata');
    }

    /**
     * Merge metadata
     *
     * This method merge the given metadata with the current stored
     *
     * @param array $metadata The metadata to merge
     *
     * @return void
     */
    private function mergeMetadata(array $metadata)
    {
        $this->metadata = array_merge($this->metadata, $metadata);
    }

    /**
     * Get cache key
     *
     * This method return a cache key applyable to the metadata
     *
     * @param mixed $metadataElement The metadata element
     *
     * @return string
     */
    private function getCacheKey($metadataElement)
    {
        if (is_resource($metadataElement)) {
            rewind($metadataElement);
            return md5(stream_get_contents($metadataElement));
        }

        return md5(serialize($metadataElement));
    }
}

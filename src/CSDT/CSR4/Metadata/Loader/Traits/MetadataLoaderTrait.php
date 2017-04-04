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
namespace CSDT\CSR4\Metadata\Loader\Traits;

use CSDT\CSR4\Metadata\Loader\Parser\MetadataFormatParserInterface;
use Psr\Cache\CacheItemPoolInterface;
use CSDT\CSR4\Metadata\Loader\MetadataLoaderInterface;

/**
 * MetadataLoaderTrait.php
 *
 * This class is used to resolve a set of metadata and render a merge to be used
 * into the mapper manager
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait MetadataLoaderTrait
{
    /**
     * Metadata container
     *
     * This property store the metadata property name
     *
     * @var string
     */
    protected $metadataContainer = 'metadata';

    /**
     * Cache pool container
     *
     * This property store the cache pool property name
     *
     * @var string
     */
    protected $cachePoolContainer = 'cachePool';

    /**
     * Debug container
     *
     * This property store the debug property name
     *
     * @var string
     */
    protected $debugContainer = 'debug';

    /**
     * Add parser
     *
     * This method is used to add a new metadata format parser to the set of parser
     *
     * @param MetadataFormatParserInterface $parser The parser to add
     *
     * @return $this
     */
    abstract public function addParser(MetadataFormatParserInterface $parser) : MetadataLoaderInterface;

    /**
     * Get metadata
     *
     * This method return the loaded metadata
     *
     * @return array
     */
    public function getMetadata() : array
    {
        return $this->{$this->metadataContainer};
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
    abstract public function load($metadataElement);

    /**
     * Set cache
     *
     * This method allow to set the cache item pool that is in charge of the metadata
     * caching
     *
     * @param CacheItemPoolInterface $cachePool The cache item pool that can be
     *                                          used to store the cached metadata
     *
     * @return $this
     */
    public function setCache(CacheItemPoolInterface $cachePool) : MetadataLoaderInterface
    {
        $this->{$this->cachePoolContainer} = $cachePool;

        return $this;
    }

    /**
     * Set debug
     *
     * This method allow to set the debug status
     *
     * @param bool $debug The debug status of the current application instance
     *
     * @return                                      $this
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function setDebug(bool $debug = true) : MetadataLoaderInterface
    {
        $this->{$this->debugContainer} = $debug;

        return $this;
    }
}

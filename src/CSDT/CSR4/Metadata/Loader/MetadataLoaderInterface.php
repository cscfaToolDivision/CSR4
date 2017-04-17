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
namespace CSDT\CSR4\Metadata\Loader;

use CSDT\CSR4\Metadata\Loader\Parser\MetadataFormatParserInterface;
use Psr\Cache\CacheItemPoolInterface;

/**
 * MetadataLoaderInterface.php
 *
 * This interface define the base methods of the MetadataLoader
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface MetadataLoaderInterface
{
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
    public function setDebug(bool $debug = true) : MetadataLoaderInterface;

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
    public function setCache(CacheItemPoolInterface $cachePool) : MetadataLoaderInterface;

    /**
     * Add parser
     *
     * This method is used to add a new metadata format parser to the set of parser
     *
     * @param MetadataFormatParserInterface $parser The parser to add
     *
     * @return $this
     */
    public function addParser(MetadataFormatParserInterface $parser) : MetadataLoaderInterface;

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
    public function load($metadataElement);

    /**
     * Get metadata
     *
     * This method return the loaded metadata
     *
     * @return array
     */
    public function getMetadata() : array ;
}

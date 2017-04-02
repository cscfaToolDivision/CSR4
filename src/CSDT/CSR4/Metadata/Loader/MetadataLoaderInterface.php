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
     * Add parser
     *
     * This method is used to add a new metadata format parser to the set of parser
     *
     * @param MetadataFormatParserInterface $parser The parser to add
     *
     * @return $this
     */
    public function addParser(MetadataFormatParserInterface $parser);

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

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
namespace CSDT\CSR4\Metadata\Loader\Parser;

use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;

/**
 * MetadataFormatParserInterface.php
 *
 * This interface define the base methods of the MetadataFormatParserInterface
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface MetadataFormatParserInterface
{
    /**
     * Support
     *
     * This method indicate if the parser support or not the given metadata
     *
     * @param mixed $metadata The metadata
     *
     * @return bool
     */
    public function support($metadata) : bool ;

    /**
     * Parse
     *
     * This method parse a metadata input and return an array of
     * ObjectMetadataInterface
     *
     * @param mixed $metadata
     *
     * @return ObjectMetadataInterface[]
     */
    public function parse($metadata) : array ;
}

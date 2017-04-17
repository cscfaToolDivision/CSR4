<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category DataTransformer
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\DataTransformer\Loader;

use CSDT\CSR4\ConfidenceInterface;
use CSDT\CSR4\DataTransformer\TransformerInterface;
use CSDT\CSR4\DataTransformer\UnsupportedTransformerException;

/**
 * TransformerLoaderInterface.php
 *
 * This interface define the base methods of the ransformer loader
 *
 * @category DataTransformer
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface TransformerLoaderInterface extends ConfidenceInterface
{
    /**
     * Load
     *
     * This method load and return a data transformer
     *
     * @param mixed $transformer The transformer
     *
     * @return TransformerInterface
     * @throws UnsupportedTransformerException
     */
    public function load($transformer) : TransformerInterface ;

    /**
     * Support
     *
     * This method return a confidence level that indicate which confidence the
     * loader is able to grant on loading transformer
     *
     * @param mixed $transformer The transformer
     *
     * @return int
     */
    public function support($transformer) : int ;
}

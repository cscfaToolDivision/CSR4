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
namespace CSDT\CSR4\DataTransformer;

use CSDT\CSR4\DataTransformer\Loader\TransformerLoaderInterface;

/**
 * TransformerResolverInterface.php
 *
 * This interface define how the resolvers offer access to the
 *
 * @category DataTransformer
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface TransformerResolverInterface
{
    /**
     * Add transformer loader
     *
     * This method add a data transformer loader to the set of loaders to be used
     * for transformer resolver
     *
     * @param TransformerLoaderInterface $loader The data transformer loader
     *
     * @return void
     */
    public function addTransformerLoader(TransformerLoaderInterface $loader);

    /**
     * Resolve
     *
     * This method resolve the loader that is in charge of the transformer loading
     * and return the transformer from the resolved loader
     *
     * @param mixed $transformer The transformer to resolve
     *
     * @return TransformerInterface
     */
    public function resolve($transformer) : TransformerInterface ;
}

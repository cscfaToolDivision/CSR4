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

/**
 * TransformerResolverAwareInterface.php
 *
 * This interface define how an instance will offer methods to receive a
 * transformer resolver
 *
 * @category DataTransformer
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface TransformerResolverAwareInterface
{

    /**
     * Set transformer resolver
     *
     * This method allow the class to store a data transformer resolver
     *
     * @param TransformerResolverInterface $resolver The transformer resolver
     *
     * @return void
     */
    public function setTransformerResolver(TransformerResolverInterface $resolver);

    /**
     * Get ransformer resolver
     *
     * This method return the store data transformer resolver
     *
     * @return TransformerResolverInterface
     */
    public function getTransformerResolver() : TransformerResolverInterface ;
}

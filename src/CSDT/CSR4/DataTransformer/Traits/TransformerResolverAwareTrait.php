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
namespace CSDT\CSR4\DataTransformer\Traits;

use CSDT\CSR4\DataTransformer\TransformerResolverInterface;

/**
 * TransformerResolverAwareTrait.php
 *
 * This trait is used to define the base logic of the data transformer resolver
 * aware interface
 *
 * @category DataTransformer
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait TransformerResolverAwareTrait
{
    /**
     * Resolver container
     *
     * This property indicate which property is used to store the data transformer
     * resolver
     *
     * @var string
     */
    protected $resolverContainer = 'transformerResolver';

    /**
     * Set transformer resolver
     *
     * This method allow the class to store a data transformer resolver
     *
     * @param TransformerResolverInterface $resolver The transformer resolver
     *
     * @return void
     */
    public function setTransformerResolver(TransformerResolverInterface $resolver)
    {
        $this->{$this->resolverContainer} = $resolver;
    }

    /**
     * Get ransformer resolver
     *
     * This method return the store data transformer resolver
     *
     * @return TransformerResolverInterface
     */
    public function getTransformerResolver() : TransformerResolverInterface
    {
        return $this->{$this->resolverContainer};
    }
}

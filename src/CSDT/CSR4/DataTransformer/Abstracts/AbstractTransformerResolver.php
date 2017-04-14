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
namespace CSDT\CSR4\DataTransformer\Abstracts;

use CSDT\CSR4\DataTransformer\TransformerResolverInterface;
use CSDT\CSR4\DataTransformer\Traits\TransformerResolverTrait;

/**
 * AbstractTransformerResolver.php
 *
 * This class is used as abstract data transformer loader resolver
 *
 * @category DataTransformer
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class AbstractTransformerResolver implements TransformerResolverInterface
{
    /**
     * Loaders
     *
     * This property store the loaders
     *
     * @var \SplObjectStorage
     */
    private $loaders;

    use TransformerResolverTrait;

    /**
     * Constructor
     *
     * The default AbstractTransformerResolver constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->loaders = new \SplObjectStorage();
    }
}

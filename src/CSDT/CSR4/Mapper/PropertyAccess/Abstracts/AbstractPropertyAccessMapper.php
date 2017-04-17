<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category Mapper
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Mapper\PropertyAccess\Abstracts;

use CSDT\CSR4\Mapper\MapperInterface;
use CSDT\CSR4\Mapper\PropertyAccess\Traits\PropertyAccessMapperTrait;
use CSDT\CSR4\DataTransformer\TransformerResolverAwareInterface;
use CSDT\CSR4\DataTransformer\TransformerResolverInterface;
use CSDT\CSR4\DataTransformer\Traits\TransformerResolverAwareTrait;

/**
 * AbstractPropertyAccessMapper.php
 *
 * This class is used as abstract parent of the PropertyAccessMapper
 *
 * @category Mapper
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class AbstractPropertyAccessMapper implements MapperInterface, TransformerResolverAwareInterface
{
    /**
     * Transformer resolver
     *
     * This property store the transformer resolver
     *
     * @var TransformerResolverInterface
     */
    private $transformerResolver;

    use PropertyAccessMapperTrait;
    use TransformerResolverAwareTrait;
}

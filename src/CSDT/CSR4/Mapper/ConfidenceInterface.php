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
namespace CSDT\CSR4\Mapper;

/**
 * ConfidenceInterface.php
 *
 * This interface is used to define the confidence levels of the mapper support
 *
 * @category Mapper
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface ConfidenceInterface
{

    /**
     * Low confidence
     *
     * This constant is used to represent a low confidence level of support
     *
     * @var integer
     */
    const LOW_CONFIDENCE = 1;

    /**
     * Low confidence
     *
     * This constant is used to represent a medium confidence level of support
     *
     * @var integer
     */
    const MEDIUM_CONFIDENCE = 2;

    /**
     * Low confidence
     *
     * This constant is used to represent a high confidence level of support
     *
     * @var integer
     */
    const HIGH_CONFIDENCE = 3;

    /**
     * Low confidence
     *
     * This constant is used to represent a dedicated level of support
     *
     * @var integer
     */
    const DEDICATED_CONFIDENCE = 4;
}

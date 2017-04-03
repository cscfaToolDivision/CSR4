<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category Factory
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Metadata\Loader\Parser\php\Factory;

use Symfony\Component\OptionsResolver\OptionsResolver;
use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\GroupValidator;

/**
 * ResolverFactory.php
 *
 * This class is used to create the options resolver in charge of the
 * PhpMetadataParser option resolving
 *
 * @category Factory
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ResolverFactory
{

    /**
     * Get property option resolver
     *
     * This method create a new property option resolver
     *
     * @return OptionsResolver
     */
    public function getPropertyOptionResolver() : OptionsResolver
    {
        $resolver = new OptionsResolver();

        $resolver->setRequired('property')
            ->setDefined('transformer')
            ->setDefault('group', []);

        $resolver->setAllowedTypes('property', 'string')
            ->setAllowedTypes('transformer', 'string')
            ->setAllowedTypes('group', 'array');

        $resolver->setAllowedValues(
            'group',
            array(new GroupValidator(), 'isValid')
        );

        return $resolver;
    }

    /**
     * Get object option resolver
     *
     * This method create a new object option resolver
     *
     * @return OptionsResolver
     */
    public function getObjectOptionResolver() : OptionsResolver
    {
        $resolver = new OptionsResolver();

        $resolver->setRequired('class')
            ->setDefined('mapper')
            ->setDefined('factory')
            ->setDefault('properties', []);

        $resolver->setAllowedTypes('class', 'string')
            ->setAllowedTypes('mapper', 'string')
            ->setAllowedTypes('factory', 'string')
            ->setAllowedTypes('properties', 'array');

        return $resolver;
    }
}

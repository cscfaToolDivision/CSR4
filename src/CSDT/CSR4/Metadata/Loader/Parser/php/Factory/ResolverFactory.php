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
            ->setDefault('transformer', null)
            ->setDefault('group', []);

        $resolver->setAllowedTypes('property', 'string')
            ->setAllowedTypes('transformer', array('string', 'null'))
            ->setAllowedTypes('group', 'array');

        $resolver->setAllowedValues(
            'group',
            function ($values) {
                $validator = new GroupValidator();
                return $validator->isValid($values);
            }
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
            ->setRequired('dto')
            ->setDefault('mapper', null)
            ->setDefault('factory', null)
            ->setDefault('properties', []);

        $resolver->setAllowedTypes('class', 'string')
            ->setAllowedTypes('dto', 'string')
            ->setAllowedTypes('mapper', array('string', 'null'))
            ->setAllowedTypes('factory', array('string', 'null'))
            ->setAllowedTypes('properties', 'array');

        return $resolver;
    }
}

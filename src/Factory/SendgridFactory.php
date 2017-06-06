<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MIAEmail\Factory;

/**
 * Description of SendgridFactory
 *
 * @author matiascamiletti
 */
class SendgridFactory implements \Zend\ServiceManager\Factory\FactoryInterface
{
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        // Obtenemos configuración
        $config = $container->get('Config');
        // Verificamos que exista la key
        if(!array_key_exists('sendgrid', $config)){
            // Iniciamos un array, ya que no se encontro una configuración
            $config['sendgrid'] = [];
        }
        // Creamos objeto SendGrid
        return new \MIAEmail\Service\Sendgrid($config['sendgrid']);
    }
}

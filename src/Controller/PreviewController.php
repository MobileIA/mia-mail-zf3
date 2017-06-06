<?php

namespace MIAEmail\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Description of PreviewController
 *
 * @author matiascamiletti
 */
class PreviewController extends AbstractActionController
{
    public function indexAction()
    {
        // Buscar archivos de templates
        $files = scandir(__DIR__ . '/../../../../../module/Application/view/email');
        // Variable que almacena los templates disponibles
        $templates = array();
        // Recorremos los archivos en busca de los archivos correctos
        foreach($files as $file){
            if(stripos($file, '.phtml') !== false){
                $templates[] = $file;
            }
        }
        // Creamos ViewModel
        $viewModel = $this->getViewModel('preview/index');
        // Seteamos variables
        $viewModel->setVariable('templates', $templates);
        // Devolvemos vista
        return $viewModel;
    }
    /**
     * 
     * @return ViewModel
     */
    public function fileAction()
    {
        // Buscamos si se quiere ver un template
        $template = $this->params()->fromQuery('src', '');
        // Verificamos si se envio un template
        if($template != ''){
            return $this->getViewModel('email/' . $template);
        }
        // Generamos la vista default
        return $this->getViewModel('preview/file');
    }
    /**
     * 
     * @param string|null $template
     * @return ViewModel
     */
    protected function getViewModel($template = '')
    {
        // Creamos View render
        $viewModel = new ViewModel();
        // Desactivamos el layout
        $viewModel->setTerminal(true);
        // Asignamos view si se envio
        if($template != ''){
            $viewModel->setTemplate($template);
        }
        // Devolvemos el ViewModel
        return $viewModel;
    }
}
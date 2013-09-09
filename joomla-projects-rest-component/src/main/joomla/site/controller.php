<?php
/**
 * @version     1.0.0
 * @package     com_rest
 * @copyright   Copyright (C) 2013. Tous droits réservés.
 * @license     GNU General Public License version 2 ou version ultérieure ; Voir LICENSE.txt
 * @author      Roffin <yroffin@gmail.com> - http://www.roffin.org
 */
 
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class RestController extends JControllerLegacy
{
 function bar()
    {
        echo json_encode(JFactory::getApplication());
 
 
        // Exit the application.
    }
}
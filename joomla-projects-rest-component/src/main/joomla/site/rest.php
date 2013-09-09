<?php
/**
 * @version     1.0.0
 * @package     com_rest
 * @copyright   Copyright (C) 2013. Tous droits réservés.
 * @license     GNU General Public License version 2 ou version ultérieure ; Voir LICENSE.txt
 * @author      Roffin <yroffin@gmail.com> - http://www.roffin.org
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

// Execute the task.
$controller	= JControllerLegacy::getInstance('Rest');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

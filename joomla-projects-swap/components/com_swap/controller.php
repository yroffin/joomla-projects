<?php

/*
 *  Copyright 2012 Yannick Roffin
 *
 *   Licensed under the Apache License, Version 2.0 (the "License");
 *   you may not use this file except in compliance with the License.
 *   You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *   limitations under the License.
 */
defined('JPATH_PLATFORM') or die;

jimport('joomla.application.component.controller');

require_once(JPATH_BASE . '/components/com_angularjs/controller.php');
require_once(JPATH_BASE . '/components/com_angularjs/view.php');
require_once(JPATH_COMPONENT . '/model/SwapModel.php');

class swapController extends AngularJsController {

    /**
     * Default constructor
     * @param JInput $input
     * @param JApplicationBase $app
     */
    public function __construct(JInput $input = null, JApplicationBase $app = null) {
        parent::__construct($input, $app);
        $this->defaultView = "SwapView";
    }

    /**
     * View factory.
     *
     * @return  void
     *
     * @since   0.1
     * @throws  RuntimeException
     */
    protected function factory($format, $input) {
        switch ($format) {
            case "SwapView#html":
                require_once(JPATH_COMPONENT . '/views/SwapViewHtml.php');
                return new SwapViewHtml(new SwapModel(), $input);
            case "SwapService#json":
                require_once(JPATH_COMPONENT . '/views/SwapServiceJson.php');
                JFactory::getDocument()->setMimeEncoding('application/json');
                JResponse::setHeader('Content-Disposition', 'attachment;filename="SwapService.json"');
                return new SwapServiceJson(new SwapModel(), $input);
            default:
                require_once(JPATH_COMPONENT . '/views/SwapViewHtml.php');
                return new SwapViewHtml(new SwapModel(), $input);
        }
    }

}

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

require_once(JPATH_COMPONENT . '/model/SwapModel.php');

class swapController extends JControllerBase {

    /**
     * Method to execute the controller.
     *
     * @return  void
     *
     * @since   0.1
     * @throws  RuntimeException
     */
    public function execute() {
        // Setup view.
        $this->view = $this->input->getCmd("view");
        if (!isset($this->view)) {
            $this->view = "SwapView";
        }
        // Setup format.
        $this->format = $this->input->getCmd("format");
        if (!isset($this->format)) {
            $this->format = "html";
        }
        // Render view.
        echo ($this->factory($this->view . '#' . $this->format)->render());
    }

    /**
     * View factory.
     *
     * @return  void
     *
     * @since   0.1
     * @throws  RuntimeException
     */
    private function factory($format) {
        switch ($format) {
            case "SwapView#html":
                require_once(JPATH_COMPONENT . '/views/SwapViewHtml.php');
                return new SwapViewHtml(new SwapModel());
            case "SwapView#json":
                require_once(JPATH_COMPONENT . '/views/SwapViewJson.php');
                return new SwapViewJson(new SwapModel());
            case "SwapLoadView#json":
                require_once(JPATH_COMPONENT . '/views/SwapLoadViewJson.php');
                return new SwapLoadViewJson(new SwapModel());
            default:
                require_once(JPATH_COMPONENT . '/views/SwapViewHtml.php');
                return new SwapViewHtml(new SwapModel());
        }
    }

}

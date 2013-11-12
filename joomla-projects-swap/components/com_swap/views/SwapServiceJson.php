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

/**
 * Description of view
 *
 * @author yannick
 */
class SwapServiceJson extends AngularJSServiceBase {

    /**
     * setup
     * @return nothing
     */
    public function setup() {
        // Convert the data to JSON format.
        return json_encode($this->model->setup("install", "mysql", "utf8"));
    }

    /**
     * getSwaps
     * @return all swaps
     */
    public function swaps() {
        // Convert the data to JSON format.
        return json_encode($this->model->getSwaps());
    }

    /**
     * getSwaps
     * @return all swaps
     */
    public function swap($id) {
        // Convert the data to JSON format.
        return json_encode($this->model->getSwap($this->input->getCmd("swapId")));
    }

}

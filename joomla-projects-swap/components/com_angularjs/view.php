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
class AngularJSViewHtml extends JViewHtml {

    /**
     * Redefine the model so the correct type hinting is available in the layout.
     *
     * @var     SwapModel
     * @since   0.1
     */
    protected $model;

    public function __construct(JModel $model) {
        parent::__construct($model);
        /**
         * bootstrap and angular JS setup
         */
        JHtml::_('bootstrap.framework');
        JHtml::script(Juri::base() . 'components/com_angularjs/angular-1.2.0/angular.min.js');
        JHtml::script(Juri::base() . 'components/com_angularjs/angular-1.2.0/angular-route.min.js');
        JHtml::script(Juri::base() . 'components/com_angularjs/angular-1.2.0/angular-resource.min.js');
    }

}

/**
 * Description of service
 *
 * @author yannick
 */
class AngularJSServiceBase {

    /**
     * Redefine the model so the correct type hinting is available in the layout.
     *
     * @var     SwapModel
     * @since   0.1
     */
    protected $model;
    protected $input;

    public function __construct(JModel $model, JInput $input) {
        $this->model = $model;
        $this->input = $input;
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of view
 *
 * @author yannick
 */
class swapViewswap extends JViewLegacy {

    function display($tpl = null) {

        // Prepare the data
        // Inject the data
        $this->assignRef('variablename', $data1);
        $this->assignRef('variablename2', $data2);
        $this->assignRef('variablename3', $moredata);

        // Call the layout template. If no tpl value is set Joomla will look for a default.php file
        $tpl = 'myTemplate';
        parent::display($tpl);
    }

}

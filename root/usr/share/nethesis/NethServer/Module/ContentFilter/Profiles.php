<?php
namespace NethServer\Module\ContentFilter;

/*
 * Copyright (C) 2011 Nethesis S.r.l.
 * 
 * This script is part of NethServer.
 * 
 * NethServer is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * NethServer is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with NethServer.  If not, see <http://www.gnu.org/licenses/>.
 */

use Nethgui\System\PlatformInterface as Validate;

/**
 * SquidGuard profiles management
 */
class Profiles extends \Nethgui\Controller\TableController
{
    public $sortId = 30;

    public function initialize()
    {
        $columns = array(
            'Key',
            'Src',
            'Filter',
            'Time',
            'Actions',
        );

        $parameterSchema = array(
            array('name', Validate::USERNAME, \Nethgui\Controller\Table\Modify::KEY),
            array('Description', Validate::ANYTHING, \Nethgui\Controller\Table\Modify::FIELD),
        );

        $this
            ->setTableAdapter($this->getPlatform()->getTableAdapter('contentfilter', 'profile'))
            ->setColumns($columns)            
            ->addRowAction(new \NethServer\Module\ContentFilter\Profiles\Modify('update')) 
            ->addRowAction(new \Nethgui\Controller\Table\Modify('delete', $parameterSchema, 'Nethgui\Template\Table\Delete'))
            ->addTableAction(new \NethServer\Module\ContentFilter\Profiles\Modify('create')) 
            ->addTableAction(new \Nethgui\Controller\Table\Help('Help'))
        ;

        parent::initialize();
    }

    private function formatObject(\Nethgui\View\ViewInterface $view, $val, $default='') {
        if (!$val) {
            return $view->translate($default);
        }
        $tmp = explode(';',$val);
        return $view->translate($tmp[0].'_label').": ".$tmp[1];
    }

    public function prepareViewForColumnSrc(\Nethgui\Controller\Table\Read $action, \Nethgui\View\ViewInterface $view, $key, $values, &$rowMetadata)
    {
        return $this->formatObject($view, $values['Src']);
    }
    
    public function prepareViewForColumnFilter(\Nethgui\Controller\Table\Read $action, \Nethgui\View\ViewInterface $view, $key, $values, &$rowMetadata)
    {
        return $this->formatObject($view, $values['Filter']);
    }

    public function prepareViewForColumnTime(\Nethgui\Controller\Table\Read $action, \Nethgui\View\ViewInterface $view, $key, $values, &$rowMetadata)
    {
        return $this->formatObject($view, $values['Time'],'always_label');
    }
}

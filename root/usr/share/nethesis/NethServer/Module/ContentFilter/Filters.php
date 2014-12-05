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
 * SquidGuard profile management
 */
class Filters extends \Nethgui\Controller\TableController
{
    public $sortId = 30;

    public function initialize()
    {
        $columns = array(
            'Key',
            'Description',
            'Actions',
        );

        $parameterSchema = array(
            array('name', Validate::USERNAME, \Nethgui\Controller\Table\Modify::KEY),
            array('Description', Validate::ANYTHING, \Nethgui\Controller\Table\Modify::FIELD),
        );

        $this
            ->setTableAdapter($this->getPlatform()->getTableAdapter('contentfilter', 'filter'))
            ->setColumns($columns)            
            ->addRowAction(new \NethServer\Module\ContentFilter\Filters\Modify('update')) 
            ->addRowAction(new \NethServer\Module\ContentFilter\Filters\Modify('delete'))
            ->addTableAction(new \NethServer\Module\ContentFilter\Filters\Modify('create')) 
            ->addTableAction(new \Nethgui\Controller\Table\Help('Help'))
        ;

        parent::initialize();
    }

    public function prepareViewForColumnActions(\Nethgui\Controller\Table\Read $action, \Nethgui\View\ViewInterface $view, $key, $values, &$rowMetadata)
    {
        $cellView = $action->prepareViewForColumnActions($view, $key, $values, $rowMetadata);

        if (isset($values['Removable']) && $values['Removable'] === 'no') {
            unset($cellView['delete']);
        }

        return $cellView;
    }

}

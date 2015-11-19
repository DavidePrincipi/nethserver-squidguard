<?php

/* @var $view Nethgui\Renderer\Xhtml */

echo $view->textInput('name');
echo $view->textInput('Description');

echo $view->checkBox('BlockIpAccess', 'enabled')
        ->setAttribute('uncheckedValue', 'disabled');

echo $view->checkBox('BlackList', 'enabled')
        ->setAttribute('uncheckedValue', 'disabled');

echo $view->checkBox('WhiteList', 'enabled')
        ->setAttribute('uncheckedValue', 'disabled');

echo $view->checkBox('BlockFileTypes', 'enabled')
        ->setAttribute('uncheckedValue', 'disabled');

echo $view->selector('BlockAll','disabled');
echo $view->selector('Categories', $view::SELECTOR_MULTIPLE);

echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_CANCEL | $view::BUTTON_HELP);

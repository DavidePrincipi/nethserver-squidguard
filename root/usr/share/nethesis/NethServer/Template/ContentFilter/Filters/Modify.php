<?php

echo $view->textInput('name');
echo $view->textInput('Description');
echo $view->fieldsetSwitch('BlockIpAccess', 'enabled',  $view::FIELDSETSWITCH_CHECKBOX)
        ->setAttribute('template', $T('BlockIpAccess'))
        ->setAttribute('uncheckedValue', 'disabled');
echo $view->fieldsetSwitch('BlackList', 'enabled',  $view::FIELDSETSWITCH_CHECKBOX)
        ->setAttribute('template', $T('Expressions'))
        ->setAttribute('uncheckedValue', 'disabled');
echo $view->fieldsetSwitch('WhiteList', 'enabled',  $view::FIELDSETSWITCH_CHECKBOX)
        ->setAttribute('template', $T('Expressions'))
        ->setAttribute('uncheckedValue', 'disabled');
echo $view->fieldsetSwitch('BlockFileTypes', 'enabled',  $view::FIELDSETSWITCH_CHECKBOX)
        ->setAttribute('template', $T('Expressions'))
        ->setAttribute('uncheckedValue', 'disabled');

echo $view->selector('BlockAll','disabled');
echo $view->selector('Categories', $view::SELECTOR_MULTIPLE);

echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_CANCEL | $view::BUTTON_HELP);

<?php

echo $view->textInput('name');
echo $view->textInput('Description');
echo $view->selector('Src', $view::SELECTOR_DROPDOWN);
echo $view->selector('Profile');

echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);

<?php

function chanlang()
{
$lang = input('lang');

switch($lang)
{
    case 'en':
        cookie('think_var','en-us');
        break;
    case 'zh':
        cookie('think_var','zh-cn');
        break;
    default:
        break;
}

echo json_encode(array('status'=>1));
}

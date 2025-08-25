<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = array(
    'NAME' => Loc::getMessage('CATALOG_LIST_NAME'),
    'DESCRIPTION' => Loc::getMessage('CATALOG_LIST_DESCRIPTION'),
    'CACHE_PATH' => 'Y',
    'SORT' => 10,
    'PATH' => [
        'ID' => 'mrxikarosx_components',
        'NAME' => Loc::getMessage('CATALOG_LIST_PATH_NAME'),
        'CHILD' => [
            'ID' => 'simple_components',
            'NAME' => Loc::getMessage('CATALOG_LIST_PATH_CHILD_NAME')
        ]
    ]
);

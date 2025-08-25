<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentParameters = [
    'PARAMETERS' => [
        'VARIABLE_ALIASES' => [],
        'SEF_MODE' => [
            'model' => [
                'NAME' => Loc::getMessage('SEF_MODE_MODEL_NAME'),
                'DEFAULT' => '#BRAND#/',
            ],
            'notebook' => [
                'NAME' => Loc::getMessage('SEF_MODE_NOTEBOOK_NAME'),
                'DEFAULT' => '#BRAND#/#MODEL#/',
            ],
            'detail' => [
                'NAME' => Loc::getMessage('SEF_MODE_DETAIL_NAME'),
                'DEFAULT' => 'detail/#NOTEBOOK#/',
            ]
        ],
    ]
];
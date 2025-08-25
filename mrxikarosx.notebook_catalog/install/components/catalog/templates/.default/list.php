<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent(
    "mrxikarosx:catalog.list",
    "",
    array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "SEF_MODE" => $arParams["SEF_MODE"],
        "SEF_FOLDER" => $arParams["SEF_FOLDER"],
        "BRAND" => $arResult["VARIABLES"]["BRAND"],
        "MODEL" => $arResult["VARIABLES"]["MODEL"],
        "ENTITY" => $arResult["VARIABLES"]["ENTITY"],
        "SORT_FIELD" => "ID",
        "SORT_ORDER" => "DESC",
        "GRID_ID" => "list_grid",
        "ROWS_PER_PAGE" => "5",
    ),
    $component
);
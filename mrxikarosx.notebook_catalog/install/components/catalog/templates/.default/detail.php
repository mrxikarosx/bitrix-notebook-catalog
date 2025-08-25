<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent(
    "mrxikarosx:catalog.detail",
    "",
    array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "SEF_MODE" => $arParams["SEF_MODE"],
        "SEF_FOLDER" => $arParams["SEF_FOLDER"],
        "NOTEBOOK" => $arResult["VARIABLES"]["NOTEBOOK"]
    ),
    $component
);
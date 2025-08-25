<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\SystemException;
use Bitrix\Main\Loader;

class CatalogModel extends CBitrixComponent
{
    public function executeComponent()
    {
        try {
            $this->checkModules();
            $this->getResult();
        } catch (SystemException $e) {
            ShowError($e->getMessage());
        }
    }

    public function onIncludeComponentLang()
    {
        Loc::loadMessages(__FILE__);
    }

    protected function checkModules()
    {
        if (!Loader::includeModule('mrxikarosx.notebook_catalog'))
            throw new SystemException(Loc::getMessage('IBLOCK_MODULE_NOT_INSTALLED'));
    }

    public function onPrepareComponentParams($arParams)
    {
        if (!isset($arParams['CACHE_TIME'])) {
            $arParams['CACHE_TIME'] = 3600;
        } else {
            $arParams['CACHE_TIME'] = intval($arParams['CACHE_TIME']);
        }

        return $arParams;
    }

    protected function getResult()
    {
        if ($this->startResultCache()) {
            $object = \Mrxikarosx\NotebookCatalog\NotebookTable::getByPrimary($this->arParams['NOTEBOOK'], [
                'select' => ["*", "OPTIONS"]
            ])->fetchObject();

            $this->arResult = [
                'ID' => $object->getId(),
                'NAME' => $object->getName(),
                'YEAR' => $object->getYear(),
                'PRICE' => $object->getPrice(),
                'OPTIONS' => $object->getOptions()
            ];

            if (!empty($this->arResult)) {
                $this->SetResultCacheKeys(
                    array()
                );
                $this->IncludeComponentTemplate();
            } else {
                $this->AbortResultCache();
                \Bitrix\Iblock\Component\Tools::process404(
                    "Элемент не найден",
                    true,
                    true
                );
            }
        }
    }
}
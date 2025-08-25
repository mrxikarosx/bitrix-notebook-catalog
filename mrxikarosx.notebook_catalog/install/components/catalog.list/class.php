<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\SystemException;
use Bitrix\Main\Loader;
use Bitrix\Main\UI\PageNavigation;
use Bitrix\Main\Grid\Options as GridOptions;
use Mrxikarosx\NotebookCatalog\{BrandTable, ModelTable, NotebookTable};

class CatalogList extends CBitrixComponent
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
        $gridId = $this->arParams['GRID_ID'];

        /** grid options */
        $gridOptions = new GridOptions($gridId);
        $gridPageSize = $gridOptions->getCurrentOptions()['page_size'];
        $gridSort['sort'] = ['ID' => 'DESC'];

        if (!empty($gridPageSize)) {
            $pageSize = (int)$gridPageSize;
        } else {
            $pageSize = (int)($arParams['ROWS_PER_PAGE'] ?? 10);
        }

        $gridColumns = $this->getDefaultGridColumns();
        // echo "<pre>"; var_dump($gridSort); echo "</pre>";

        $filter = [];

        switch ($this->arParams['ENTITY'])
        {
            case 'brand':
                $entity = BrandTable::class;
                break;
            case 'model':
                $entity = ModelTable::class;
                $filter["BRAND_ID"] = $this->arParams['BRAND'];
                break;
            case 'notebook':
                $entity = NotebookTable::class;
                $filter["MODEL_ID"] = $this->arParams['MODEL'];
                $this->addGridColumns([
                    [
                        "id" => "YEAR",
                        "name" => "Год",
                        "sort" => "YEAR",
                        "default" => true
                    ],
                    [
                        "id" => "PRICE",
                        "name" => "Цена",
                        "sort" => "PRICE",
                        "default" => true
                    ]
                ], $gridColumns);
                $gridSort = $gridOptions->GetSorting([]);
                break;
            default:
                // $gridSort['sort'] = ['ID' => 'DESC'];
                break;
        }

        /** navigation */
        $nav = new PageNavigation("nav");
        $nav->allowAllRecords(false)
            ->setPageSize($pageSize)
            ->initFromUri();

        $orm = $entity::getList([
            'select' => ['*'],
            'filter' => $filter,
            'order' => $gridSort['sort'],
            'offset' => $nav->getOffset(),
            'limit' => $nav->getLimit(),
            'count_total' => true
        ]);

        $nav->setRecordCount($orm->getCount());

        $gridRows = [];

        while ($item = $orm->fetchObject())
        {
            $columns = [
                'ID' => $item->getId(),
                'NAME' => $item->getName()
            ];

            if ($this->arParams['ENTITY'] === 'notebook')
            {
                $columns['YEAR'] = $item->getYear();
                $columns['PRICE'] = $item->getPrice();
            }

            $gridRows[] = [
                'columns' => $columns,
                'actions' => $this->arParams['ENTITY'] == 'notebook' ? $this->getRowActions($this->arParams['SEF_FOLDER'] . 'detail/' . $item->getId() . '/') : $this->getRowActions($item->getId() . '/')
            ];
        }

        $this->arResult['NAV'] = $nav;
        $this->arResult['ROWS'] = $gridRows;
        $this->arParams['GRID_COLUMNS'] = $gridColumns;

        $this->IncludeComponentTemplate();
    }

    private function addGridColumns(array $columns, array &$gridColumns)
    {
        foreach ($columns as $column)
        {
            array_push($gridColumns, $column);
        }
    }

    private function getDefaultGridColumns()
    {
        $columns = [
            [
                "id" => "ID",
                "name" => "ID",
                // "sort" => "ID",
                "default" => true
            ],
			[
                "id" => "NAME",
                "name" => "Название",
                // "sort" => "NAME",
                "default" => true
            ]
        ];
        
        return $columns;
    }

    private function getRowActions(string $link)
    {
        $actionUrl = "document.location.href='" . $link . "'";

        $actions = [
            [
                'text' => 'Перейти',
                'onclick' => $actionUrl
            ]
        ];

        return $actions;
    }
}
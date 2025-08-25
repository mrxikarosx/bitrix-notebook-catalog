<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

class ComplexComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        $componentPage = $this->sef();

        if (!$componentPage) {
            Tools::process404(
                $this->arParams["MESSAGE_404"],
                ($this->arParams["SET_STATUS_404"] === "Y"),
                ($this->arParams["SET_STATUS_404"] === "Y"),
                ($this->arParams["SHOW_404"] === "Y"),
                $this->arParams["FILE_404"]
            );
        }

        $this->IncludeComponentTemplate($componentPage);
    }

    protected function sef()
    {
        $arDefaultUrlTemplates404 = [
            "detail" => "detail/#NOTEBOOK#/",
            "model" => "#BRAND#/",
            "notebook" => "#BRAND#/#MODEL#/",
        ];

        $arComponentVariables = [
            'BRAND',
            'MODEL',
            'NOTEBOOK',
            'ENTITY'
        ];

        $arDefaultVariableAliases404 = [];
        // $arDefaultVariableAliases = [];

        $arVariables = [];
        $arUrlTemplates = CComponentEngine::makeComponentUrlTemplates($arDefaultUrlTemplates404, $this->arParams["SEF_URL_TEMPLATES"]);
        $arVariableAliases = CComponentEngine::makeComponentVariableAliases($arDefaultVariableAliases404, $this->arParams["VARIABLE_ALIASES"]);

        $engine = new CComponentEngine($this);

        $componentPage = $engine->guessComponentPath(
            $this->arParams["SEF_FOLDER"],
            $arUrlTemplates,
            $arVariables
        );

        switch ($componentPage) {
            case 'model':
                $arVariables['ENTITY'] = 'model';
                break;
            case 'notebook':
                $arVariables['ENTITY'] = 'notebook';
                break;
            case 'detail':
                $componentPage = 'detail';
                break;
            default:
                $arVariables['ENTITY'] = 'brand';
                break;
        }

        if ($componentPage !== 'detail')
            $componentPage = 'list';

        CComponentEngine::initComponentVariables(
            $componentPage,
            $arComponentVariables,
            $arVariableAliases,
            $arVariables
        );

        $this->arResult = [
            "FOLDER" => $this->arParams["SEF_FOLDER"],
            "VARIABLES" => $arVariables,
            "ALIASES" => $arVariableAliases
        ];

        return $componentPage;
    }
}
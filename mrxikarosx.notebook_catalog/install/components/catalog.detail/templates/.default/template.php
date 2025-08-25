<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\UI\Extension;

Extension::load('ui.bootstrap5');
Loc::loadMessages(__FILE__);
?>
<div class="container">
    <h2><?php echo $arResult['NAME'] ?></h2>
    <div class="row mb-2">
        <div class="col col-sm-4">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <rect width="100%" height="100%" fill="#55595c"></rect>
                <text x="45%" y="50%" fill="#eceeef" dy=".3em">Image</text>
            </svg>
        </div>
        <div class="col">
            <div class="d-grid gap-2 d-md-flex">
                <button class="btn btn-primary col col-sm-4" type="button"><?php echo Loc::getMessage('BUY') ?></button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header"><?php echo Loc::getMessage('SECTION_OPTIONS') ?></div>
                <div class="card-body">
                    <table class="table caption-top">
                        <caption><?php echo Loc::getMessage('SECTION_OPTIONS_GENERAL') ?></caption>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo Loc::getMessage('YEAR') ?></th>
                                <td><?php echo $arResult['YEAR'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo Loc::getMessage('PRICE') ?></th>
                                <td><?php echo number_format($arResult['PRICE'], 2, '.', ' ') ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table caption-top">
                        <caption><?php echo Loc::getMessage('SECTION_OPTIONS_ADDITIONAL') ?></caption>
                        <tbody>
                            <?php foreach ($arResult['OPTIONS'] as $option): ?>
                                <tr>
                                    <th scope="row"><?php echo $option->getName() ?></th>
                                    <td><?php echo $option->getValue() ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
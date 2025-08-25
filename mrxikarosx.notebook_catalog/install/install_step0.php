<?php

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (!check_bitrix_sessid())
    return;
?>

<form action="<?php echo $APPLICATION->GetCurPage() ?>">
    <?php echo bitrix_sessid_post() ?>
    <input type="hidden" name="lang" value="<?php echo LANGUAGE_ID ?>">
    <input type="hidden" name="id" value="mrxikarosx.notebook_catalog">
    <input type="hidden" name="install" value="Y">
    <input type="hidden" name="step" value="2">
    <p><?php echo Loc::getMessage("MODULE_CREATE_NEW_TABLES") ?></p>
    <p>
        <input type="checkbox" name="readd_tables" id="readd_tables" value="Y">
        <label for="readd_tables"><?php echo Loc::getMessage("MODULE_AGREE_BUTTON") ?></label>
    </p>
    <p><?php echo Loc::getMessage("MODULE_ADD_DATA") ?></p>
    <p>
        <input type="checkbox" name="add_data" id="add_data" value="Y">
        <label for="add_data"><?php echo Loc::getMessage("MODULE_AGREE_BUTTON") ?></label>
    </p>
    <input type="submit" name="" value="<?php echo Loc::getMessage("MODULE_NEXT_BUTTON") ?>">
</form>
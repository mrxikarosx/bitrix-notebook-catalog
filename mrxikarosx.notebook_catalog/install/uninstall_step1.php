<?php

use \Bitrix\Main\Localization\Loc;

if (!check_bitrix_sessid())
    return;
?>

<form action="<?php echo $APPLICATION->GetCurPage() ?>">
    <?php echo bitrix_sessid_post() ?>
    <input type="hidden" name="lang" value="<?php echo LANGUAGE_ID ?>">
    <input type="hidden" name="id" value="mrxikarosx.notebook_catalog">
    <input type="hidden" name="uninstall" value="Y">
    <input type="hidden" name="step" value="2">
    <?php echo CAdminMessage::ShowMessage(Loc::getMessage("MOD_UNINST_WARN")) ?>
    <p><?php echo Loc::getMessage("MODULE_SAVE_DATA") ?></p>
    <p><input type="checkbox" name="save_data" id="save_data" value="Y" checked><label for="save_data"><?php echo Loc::getMessage("MODULE_AGREE_BUTTON") ?></label></p>
    <input type="submit" name="" value="<?php echo Loc::getMessage("MODULE_NEXT_BUTTON") ?>">
</form>
<?php

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (!check_bitrix_sessid())
    return;

if ($errorException = $APPLICATION->getException()) {
    CAdminMessage::showMessage(Loc::getMessage("MODULE_INSTALL_FAILED") . ': ' . $errorException->GetString());
} else {
    CAdminMessage::showNote(Loc::getMessage("MODULE_INSTALL_SUCCESS"));
}
?>

<form action="<?php echo $APPLICATION->GetCurPage() ?>">
    <input type="hidden" name="lang" value="<?php echo LANGUAGE_ID ?>">
    <input type="submit" name="" value="<?php echo Loc::getMessage("MOD_BACK") ?>">
</form>
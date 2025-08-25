<?php

use \Bitrix\Main\{Application, Loader, ModuleManager};
use \Bitrix\Main\Entity\Base;
use \Bitrix\Main\Localization\Loc;

class Mrxikarosx_Notebook_Catalog extends CModule
{
	public $MODULE_ID = 'mrxikarosx.notebook_catalog';
	public $MODULE_NAME;
	public $MODULE_DESCRIPTION;
	public $MODULE_VERSION;
	public $MODULE_VERSION_DATE;
	public $PARTNER_NAME;
	public $PARTNER_URI;

	public function __construct()
	{
		$arModuleVersion = [];
		include(__DIR__ . '/version.php');
		$this->MODULE_NAME = Loc::getMessage('MODULE_NAME');
		$this->MODULE_DESCRIPTION = Loc::getMessage('MODULE_DESC');
		$this->MODULE_VERSION = $arModuleVersion['VERSION'];
		$this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
		$this->PARTNER_NAME = Loc::getMessage('PARTNER_NAME');
		$this->PARTNER_URI = Loc::getMessage('PARTNER_URI');
	}

	public function DoInstall()
	{
		$context = Application::getInstance()->getContext();
		$request = $context->getRequest();

		global $APPLICATION;

		$isAnyTableExists = $this->isAnyTableExists();

		if ($request['step'] < 2) {
			if ($isAnyTableExists) {
				$APPLICATION->IncludeAdminFile(Loc::getMessage('INSTALL_TITLE_STEP_1'), __DIR__ . '/install_step0.php');
			} else {
				$APPLICATION->IncludeAdminFile(Loc::getMessage('INSTALL_TITLE_STEP_1'), __DIR__ . '/install_step1.php');
			}
		}

		if ($request['step'] == 2) {
			ModuleManager::RegisterModule($this->MODULE_ID);

			if ($isAnyTableExists) {
				if ($request['readd_tables'] == 'Y') {
					$this->UnInstallDB();
					$this->InstallDB();
				}
			} else {
				$this->InstallDB();
			}

			if ($request['add_data'] == 'Y') {
				$this->addData();
			}

			$this->InstallFiles();

			$APPLICATION->IncludeAdminFile(Loc::getMessage('INSTALL_TITLE_STEP_2'), __DIR__ . '/install_step2.php');
		}

		return true;
	}

	public function DoUninstall()
	{
		$context = Application::getInstance()->getContext();
		$request = $context->getRequest();

		global $APPLICATION;

		if ($request["step"] < 2) {
			$APPLICATION->IncludeAdminFile(Loc::getMessage('DEINSTALL_TITLE_1'), __DIR__ . '/uninstall_step1.php');
		}

		if ($request["step"] == 2) {
			if ($request["save_data"] !== "Y") {
				$this->UnInstallDB();
			}

			$this->UnInstallFiles();
			ModuleManager::UnRegisterModule($this->MODULE_ID);

			$APPLICATION->IncludeAdminFile(Loc::getMessage('DEINSTALL_TITLE_2'), __DIR__ . '/uninstall_step2.php');
		}

		return true;
	}

	public function InstallDB()
	{
		Loader::includeModule($this->MODULE_ID);

		$connection = Application::getConnection('default');

		foreach (Mrxikarosx\NotebookCatalog\Main::getTablesClass() as $table) {
			if (!$connection->isTableExists(Base::getInstance($table)->getDBTableName())) {
				Base::getInstance($table)->createDbTable();
			}
		}

		return true;
	}

	public function UnInstallDB()
	{
		Loader::includeModule($this->MODULE_ID);

		$connection = Application::getConnection('default');

		foreach (Mrxikarosx\NotebookCatalog\Main::getTablesClass() as $table) {
			$connection->queryExecute('DROP TABLE IF EXISTS ' . Base::getInstance($table)->getDBTableName());
		}

		return true;
	}

	public function InstallFiles()
	{
		CopyDirFiles(
			__DIR__ . '/components',
			$_SERVER['DOCUMENT_ROOT'] . '/local/components/mrxikarosx',
			true,
			true
		);

		return true;
	}

	public function UnInstallFiles()
	{
		DeleteDirFilesEx('/local/components/mrxikarosx/');

		return true;
	}

	public function addData()
	{
		Loader::includeModule($this->MODULE_ID);

		$tables = [];
		include(__DIR__ . '/tables_data.php');

		Mrxikarosx\NotebookCatalog\BrandTable::addMulti($tables['brand']);
		Mrxikarosx\NotebookCatalog\ModelTable::addMulti($tables['model']);
		Mrxikarosx\NotebookCatalog\NotebookTable::addMulti($tables['notebook']);
		Mrxikarosx\NotebookCatalog\OptionTable::addMulti($tables['option']);
		Mrxikarosx\NotebookCatalog\NotebookOptionTable::addMulti($tables['notebook_option']);

		return true;
	}

	public function isAnyTableExists()
	{
		Loader::includeModule($this->MODULE_ID);

		$connection = Application::getConnection('default');

		foreach ($this->getTables() as $table) {
			if ($connection->isTableExists($table)) {
				return true;
			}
		}

		return false;
	}

	public static function getTables()
	{
		return [
			'ns_brand',
			'ns_model',
			'ns_notebook',
			'ns_option',
			'ns_notebook_option'
		];
	}
}

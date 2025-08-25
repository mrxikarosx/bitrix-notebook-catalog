<?php

namespace Mrxikarosx\NotebookCatalog;

use \Bitrix\Main\ORM\Data\DataManager;
use \Bitrix\Main\ORM\Fields\{IntegerField, StringField};

class OptionTable extends DataManager
{
	public static function getTableName()
	{
		return 'ns_options';
	}

	public static function getConnectionName()
	{
		return "default";
	}
	
	public static function getMap()
	{
		return [
            (new IntegerField('ID'))
				->configurePrimary(true)
				->configureAutocomplete(true),
			(new StringField('NAME')),
			(new StringField('VALUE')),
        ];
	}
}
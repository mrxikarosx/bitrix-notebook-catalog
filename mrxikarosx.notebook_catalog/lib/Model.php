<?php

namespace Mrxikarosx\NotebookCatalog;

use \Bitrix\Main\ORM\Data\DataManager;
use \Bitrix\Main\ORM\Fields\{IntegerField, StringField};
use \Bitrix\Main\ORM\Fields\Relations\Reference;
use \Bitrix\Main\ORM\Query\Join;

class ModelTable extends DataManager
{
	public static function getTableName()
	{
		return 'ns_model';
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
			(new IntegerField('BRAND_ID')),
			(new Reference('BRAND', BrandTable::class,
				Join::on('this.BRAND_ID', 'ref.ID')
			))
        ];
	}
}
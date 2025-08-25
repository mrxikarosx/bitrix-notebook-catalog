<?php

namespace Mrxikarosx\NotebookCatalog;

use \Bitrix\Main\ORM\Data\DataManager;
use \Bitrix\Main\ORM\Fields\IntegerField;
use \Bitrix\Main\ORM\Fields\Relations\Reference;
use \Bitrix\Main\ORM\Query\Join;

class NotebookOptionTable extends DataManager
{
    public static function getTableName()
    {
        return 'ns_notebook_option';
    }

    public static function getConnectionName()
	{
		return "default";
	}

    public static function getMap()
    {
        return [
            (new IntegerField('OPTION_ID'))
                ->configurePrimary(true),
            (new Reference('OPTION', OptionTable::class,
                Join::on('this.OPTION_ID', 'ref.ID'),
            ))->configureJoinType('inner'),
            (new IntegerField('NOTEBOOK_ID'))
                ->configurePrimary(true),
            (new Reference('NOTEBOOK', NotebookTable::class,
                Join::on('this.NOTEBOOK_ID', 'ref.ID')
            ))->configureJoinType('inner')
        ];
    }
}
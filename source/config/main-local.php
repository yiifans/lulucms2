<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=question',
            'username' => 'linjiong',
            'password' => '13738425476',
            'charset' => 'utf8',
			'tablePrefix' => 'lulu_',
            'enableSchemaCache' => true,
            'schemaCache' => 'schemaCache',
        ],

    ],
];

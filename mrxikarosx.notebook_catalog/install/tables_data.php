<?php

$tables = [
    'brand' => [
        ['NAME' => 'Apple'],
    ],
    'model' => [
        [
            'NAME' => 'Apple MacBook Air',
            'BRAND_ID' => 1
        ],
        [
            'NAME' => 'Apple MacBook M4',
            'BRAND_ID' => 1
        ],
        [
            'NAME' => 'Apple MacBook Pro',
            'BRAND_ID' => 1
        ],
    ],
    'notebook' => [
        [
            'NAME' => 'Apple MacBook Air, 13.3, Серый',
            'YEAR' => '2022',
            'PRICE' => 77799,
            'MODEL_ID' => 1
        ],
        [
            'NAME' => 'Apple MacBook Air, 13.6, Черный',
            'YEAR' => '2022',
            'PRICE' => 92999,
            'MODEL_ID' => 1
        ],
        [
            'NAME' => 'Apple MacBook Air M4, Голубой',
            'YEAR' => '2025',
            'PRICE' => 123999,
            'MODEL_ID' => 2
        ],
        [
            'NAME' => 'Apple MacBook Air, 13.6, Cерый',
            'YEAR' => '2025',
            'PRICE' => 123999,
            'MODEL_ID' => 2
        ],
        [
            'NAME' => 'Apple MacBook Pro, 14.2, Черный',
            'YEAR' => '2023',
            'PRICE' => 189999,
            'MODEL_ID' => 3
        ],
        [
            'NAME' => 'Apple MacBook Pro, 14.2, Серебристый',
            'YEAR' => '2023',
            'PRICE' => 189999,
            'MODEL_ID' => 3
        ]
    ],
    'option' => [
        [
            'NAME' => 'Цвет',
            'VALUE' => 'Серый'
        ],
        [
            'NAME' => 'Цвет',
            'VALUE' => 'Черный'
        ],
        [
            'NAME' => 'Цвет',
            'VALUE' => 'Голубой'
        ],
        [
            'NAME' => 'Цвет',
            'VALUE' => 'Серебристый'
        ],
        [
            'NAME' => 'Модель процессора',
            'VALUE' => 'Apple M1'
        ],
        [
            'NAME' => 'Модель процессора',
            'VALUE' => 'Apple M2'
        ],
        [
            'NAME' => 'Модель процессора',
            'VALUE' => 'Apple M3'
        ],
        [
            'NAME' => 'Модель процессора',
            'VALUE' => 'Apple M4'
        ]
    ],
    'notebook_option' => [
        [
            'NOTEBOOK_ID' => 1,
            'OPTION_ID' => 1, 
        ],
        [
            'NOTEBOOK_ID' => 2,
            'OPTION_ID' => 2, 
        ],
        [
            'NOTEBOOK_ID' => 3,
            'OPTION_ID' => 3, 
        ],
        [
            'NOTEBOOK_ID' => 4,
            'OPTION_ID' => 4, 
        ],
        [
            'NOTEBOOK_ID' => 5,
            'OPTION_ID' => 2, 
        ],
        [
            'NOTEBOOK_ID' => 6,
            'OPTION_ID' => 4, 
        ],
        [
            'NOTEBOOK_ID' => 1,
            'OPTION_ID' => 5, 
        ],
        [
            'NOTEBOOK_ID' => 2,
            'OPTION_ID' => 8, 
        ],
        [
            'NOTEBOOK_ID' => 3,
            'OPTION_ID' => 8, 
        ],
        [
            'NOTEBOOK_ID' => 4,
            'OPTION_ID' => 8, 
        ],
        [
            'NOTEBOOK_ID' => 5,
            'OPTION_ID' => 8, 
        ],
        [
            'NOTEBOOK_ID' => 6,
            'OPTION_ID' => 8, 
        ],
    ]
];
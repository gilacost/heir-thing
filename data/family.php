<?php
return [
    [
        'name'       => 'avi',
        'birth_date' => DateTime::createFromFormat('j-M-Y', '15-Feb-1949'),
        'parent'     => null,
        'children'   => ['pare1', 'juanPare1', 'alonsoPare2'],
        'goods'      => [
            [
                'type'      => 'Land',
                'arguments' => [100, 300]
            ],
            [
                'type'      => 'Money',
                'arguments' => [100000]
            ],
            [
                'type'      => 'State',
                'arguments' => [5]
            ]
        ]

    ],
    [
        'name'       => 'pare1',
        'birth_date' => DateTime::createFromFormat('j-M-Y', '20-Jan-1979'),
        'parent'     => 'avi',
        'children'   => ['fill1', 'fill3'],
        'goods'      => [

        ]
    ],
    [
        'name'       => 'alonsoPare2',
        'birth_date' => DateTime::createFromFormat('j-M-Y', '11-Jul-1964'),
        'parent'     => 'avi',
        'children'   => [],
        'goods'      => [
            [
                'type'      => 'Land',
                'arguments' => [50, 300]
            ]
        ]
    ],
    [
        'name'       => 'juanPare1',
        'birth_date' => DateTime::createFromFormat('j-M-Y', '11-Jul-1964'),
        'parent'     => 'avi',
        'children'   => [],
        'goods'      => [

        ]
    ],
    [
        'name'       => 'fill1',
        'birth_date' => DateTime::createFromFormat('j-M-Y', '12-May-1996'),
        'parent'     => 'pare1',
        'children'   => [],
        'goods'      => [

        ]
    ],
    [
        'name'       => 'fill3',
        'birth_date' => DateTime::createFromFormat('j-M-Y', '11-Jul-1997'),
        'parent'     => 'pare1',
        'children'   => ['besnet','besnet2'],
        'goods'      => [

        ],
    ],
    [
        'name'       => 'besnet',
        'birth_date' => DateTime::createFromFormat('j-M-Y', '11-Jul-2007'),
        'parent'     => 'fill3',
        'children'   => [],
        'goods'      => [

        ]
    ],
    [
        'name'       => 'besnet2',
        'birth_date' => DateTime::createFromFormat('j-M-Y', '11-Jul-2007'),
        'parent'     => 'fill3',
        'children'   => [],
        'goods'      => [

        ]
    ]
];
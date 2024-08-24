<?php

return [
    'page_url' => env('LIVEWIRE_PAGE_URL', '/livewire'),
    'asset_url' => env('LIVEWIRE_ASSET_URL', null),
    'mounts' => [
        'bootstrap' => false,
        'livewire' => true,
    ],
    'layouts' => [
        'default' => 'components.layouts.app',
    ],
];

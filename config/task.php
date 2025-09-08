<?php

return [
    'priorityColors' => [
        'low' => 'bg-blue-500',
        'medium' => 'bg-orange-500',
        'high' => 'bg-red-500',
    ],

    'statusColors' => [
        'to do' => 'bg-gray-500',
        'in progress' => 'bg-cyan-500',
        'completed' => 'bg-green-500',
    ],

    'nextStatus' => [
        'to do' => 'in progress',
        'in progress' => 'completed',
        'completed' => 'to do',
    ],

    'icons' => [
        'software'       => 'fa-solid fa-computer',
        'cooking'        => 'fa-solid fa-utensils',
        'home'           => 'fa-solid fa-house',
        'shopping'       => 'fa-solid fa-cart-shopping',
        'exercise'       => 'fa-solid fa-dumbbell',
        'study'          => 'fa-solid fa-book',
        'meeting'        => 'fa-solid fa-handshake',
        'finance'        => 'fa-solid fa-money-bill-wave',
        'travel'         => 'fa-solid fa-plane',
        'health'         => 'fa-solid fa-heart-pulse',
        'gardening'      => 'fa-solid fa-seedling',
        'cleaning'       => 'fa-solid fa-broom',
        'entertainment'  => 'fa-solid fa-film',
    ],
];

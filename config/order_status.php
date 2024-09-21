<?php

return [
    'order_status_admin' => [
        'pending' => [
            'status' => 'Pending',
            'details' => 'Your Order is currently pending'
        ],
        'processd_and_ready_to_ship' => [
            'status' => 'Processed and ready to ship',
            'details' => 'Your Package has been processed and will be with our delivery parter soon'
        ],
        'dropped_off' => [
            'status' => 'Dropped off',
            'details' => 'Your Package has been dropped off by the seller'
        ],
        'shipped' => [
            'status' => 'Shipped',
            'details' => 'Your Package has arrived'
        ],
        'out_for_delivery' => [
            'status' => 'Out for delivery',
            'details' => 'Your Package has been out for delivery'
        ],
        'deliverd' => [
            'status' => 'Deliverd',
            'details' => 'Your Package has been Deliverd'
        ],
        'canceld' => [
            'status' => 'Canceld',
            'details' => 'The order is canceld'
        ]
    ]
];

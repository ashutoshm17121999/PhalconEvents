<?php

namespace App\Listeners;

use OrderaddController;
use Orderadd;
use ProductsaddController;
use Productsadd;
use Phalcon\Di\Injectable;
use Phalcon\Events\Event;

class NotificationsListeners extends Injectable
{
    public function beforeSend(Event $event, $values, $settings)
    {
        if ($settings[0]->time_optimization == '1') {
            $values->name = $values->name . $values->tags;
        }
        if ($values->price == '') {
            $values->price = $settings[0]->default_price;
        }
        if ($values->stocks == '') {
            $values->stocks = $settings[0]->default_stock;
        }
        return $values;
    }
    public function beforeOrder(Event $event, $values, $settings)
    {
        if ($values->zipcode == '') {
            $values->zipcode = $settings[0]->default_zipcode;
        }
        return $values;
    }
}

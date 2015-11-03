<?php
namespace app\models;

class ReservationSearch extends Reservation
{
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(),
        ['customer.name', 'customer.surname',]);
    }

    public function rules()
    {
        // add related rules to searchable attributes
        return array_merge(parent::rules(),
        [['customer.name', 'safe'], ['customer.surname', 'safe']]);
    }
}

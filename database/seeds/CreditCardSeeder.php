<?php

use Illuminate\Database\Seeder;
use App\CreditCard;

class CreditCardSeeder extends Seeder
{
    public function run() {
        $cards = [
            "Chase Sapphire Reserve",
            "Chase Sapphire Preferred",
            "Chase Freedom Unlimited",
            "Chase Freedom",
            "JetBlue Plus",
        ];

        foreach($cards as $card) {
            CreditCard::insert([
                'name' => $card,
            ]);
        }

    }
}

<?php

use Illuminate\Database\Seeder;

class NetworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('networks')->insert(array (
            0 => array("id" => 1,
                "name" => "CommissionJunction",
                "url" => "https://members.cj.com",
                "tracking_id" => "7820675",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 2,
                "name" => "ShareASale",
                "url" => "https://www.shareasale.com",
                "tracking_id" => "546669",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 3,
                "name" => "AffiliateWindow",
                "url" => "https://darwin.affiliatewindow.com",
                "tracking_id" => "139863",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 4,
                "name" => "Pepperjam",
                "url" => "http://www.pepperjamnetwork.com",
                "tracking_id" => "85479",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 5,
                "name" => "LinkSynergy",
                "url" => "http://cli.linksynergy.com",
                "tracking_id" => "AmKd0LcfKAQ",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 6,
                "name" => "TradeDoubler",
                "url" => "http://login.tradedoubler.com",
                "tracking_id" => "tradedoubler",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 7,
                "name" => "AvanGate",
                "url" => "https://secure.avangate.com/affiliates/",
                "tracking_id" => "38830",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 8,
                "name" => "FlexOffers",
                "url" => "http://www.flexoffers.com/",
                "tracking_id" => "9999",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 9,
                "name" => "AffiliateBoot",
                "url" => "http://www.affiliatebot.com",
                "tracking_id" => "655703",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 10,
                "name" => "MoreNiche",
                "url" => "http://affiliates.moreniche.com/",
                "tracking_id" => "259469",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 11,
                "name" => "MarketHealth",
                "url" => "http://www.markethealth.com/main.php",
                "tracking_id" => "111612",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 12,
                "name" => "ClickBank",
                "url" => "https://accounts.clickbank.com",
                "tracking_id" => "clickbank",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 13,
                "name" => "paydot",
                "url" => "http://affiliates.paydot.com/",
                "tracking_id" => "100832",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 14,
                "name" => "affiliatefuture",
                "url" => "http://afuk.affiliate.affiliatefuture.co.uk/default.aspx",
                "tracking_id" => "319161",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',),

            array("id" => 15,
                "name" => "Commission Junction UK",
                "url" => "https://members.cj.com/member/publisher/home.do",
                "tracking_id" => "8257866",
                'c_uid' => 0,
                'u_uid' => 0,
                'created_at' => '2017-02-28 22:06:46',
                'updated_at' => '2017-02-28 22:06:46',)
        ));
    }
}

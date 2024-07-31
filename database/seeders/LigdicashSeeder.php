<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class LigdicashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

/*    function generate_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0C2f ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0x2Aff ), mt_rand( 0, 0xffD3 ), mt_rand( 0, 0xff4B )
    );

	}*/

    public function run(): void
    {
        Transaction::create([
        	"token" => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF9hcHAiOiIxODE3OCIsImlkX2Fib25uZSI6NDI4MDA1LCJkYXRlY3JlYXRpb25fYXBwIjoiMjAyNC0wNi0yOCAxNTozMzoyMCJ9._xEwQNLPq5CxFGCS2VR4QVs0sQd_aXsJi8lfQAgouus',
        	"transaction_id" => '51B4DE29-3B71-4FD2-9E6C-071703E1FF31',
        	"status" => "pending"

        	]);

     }
 }
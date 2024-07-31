<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class LigdicashSeeder extends Seeder
{

    public function run(): void
    {
        Transaction::create([
        	"token" => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF9hcHAiOiIxODE3OCIsImlkX2Fib25uZSI6NDI4MDA1LCJkYXRlY3JlYXRpb25fYXBwIjoiMjAyNC0wNi0yOCAxNTozMzoyMCJ9._xEwQNLPq5CxFGCS2VR4QVs0sQd_aXsJi8lfQAgouus',
        	"transaction_id" => '51B4DE29-3B71-4FD2-9E6C-071703E1FF31',
        	"status" => "pending"

        	]);

     }
 }
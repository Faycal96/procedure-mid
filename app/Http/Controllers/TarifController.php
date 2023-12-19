<?php

namespace App\Http\Controllers;
use App\Repositories\TarifRepository;

use Illuminate\Http\Request;

class TarifController extends Controller
{
    public $repository;
    public function __construct(TarifRepository $repository){
        $this->repository = $repository;
    }
}

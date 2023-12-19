<?php

namespace App\Http\Controllers;
use App\Repositories\DemandePieceRepository;

use Illuminate\Http\Request;

class DemandePieceController extends Controller
{
    public $repository;
    public function __construct(DemandePieceRepository $repository){
        $this->repository = $repository;
    }
}

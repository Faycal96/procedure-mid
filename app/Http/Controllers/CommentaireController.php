<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CommentaireRepository;
class CommentaireController extends Controller
{
    public $repository;
    public function __construct(CommentaireRepository $repository){
        $this->repository = $repository;
    }
}

<?php


namespace App\Http\Controllers\Php;


use App\Http\Controllers\Controller;
use App\Jobs\Redis\Notice;
use App\Models\User;
use App\Services\Elasticsearch\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function index()
    {
        $user = User::query()->first();
        return JsonResponse::create($user);
    }

}
<?php


namespace App\Http\Controllers\Queue;


use App\Http\Controllers\Controller;
use App\Jobs\Redis\Notice;
use App\Models\User;
use App\Services\Elasticsearch\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RedisController extends Controller
{
    public function publish(User $user)
    {
        $user = User::query()->first();
        dispatch(new Notice($user));
        dd('文章发布成功');
    }

}
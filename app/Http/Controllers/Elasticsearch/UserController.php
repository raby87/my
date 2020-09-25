<?php


namespace App\Http\Controllers\Elasticsearch;


use App\Http\Controllers\Controller;
use App\Services\Elasticsearch\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function search(Request $request){
        $first_name = $request->get('first_name');
        //关键字wildcard 模糊查询
        $query = [
            'query' => [
                'bool' => [
                    'should' => [
                        'match' => [
                            'first_name' => $first_name,
                        ]
                    ]
                ]

            ]
        ];
        $user = resolve(UserService::class)->search($query);
        return new JsonResponse($user);
    }

    /**
     *
     * @param Request $request
     */
    public function add(Request $request){
        $data = $request->all();
        resolve(UserService::class)->putDoc($data);
    }

    /**
     *
     */
    public function createTable(){
        resolve(UserService::class)->createMapping();
    }

}
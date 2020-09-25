<?php

namespace App\Providers;

use App\Services\Elasticsearch\UserService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // 2、绑定到单例，传参
        $this->app->singleton(UserService::class, function ($app) {
            return new UserService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if(!Collection::hasMacro('paginate')){
            Collection::macro('paginate',function($prePage,$total=null,$page=null,$pageName='page'){
                $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
                return new LengthAwarePaginator(
                    $this->forPage($page,$prePage),
                    $total?:$this->count(),
                    $prePage,
                    $page,
                    [
                        'path'=>LengthAwarePaginator::resolveCurrentPath(),
                        'pageName'=>$pageName
                    ]
                );
            });
        }
    }
}

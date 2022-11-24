<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\View\Forms\Components\ColorComponent;
use App\View\Forms\Components\PriceComponent;
use Laraeast\LaravelBootstrapForms\Facades\BsForm;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
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
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //$allMainCategoriesWithSubCategories= Category::query()->where('parent_id', 0)->with('subCategories')->get();
       // View::share('allMainCategoriesWithSubCategories', $allMainCategoriesWithSubCategories);
        BsForm::registerComponent('price', PriceComponent::class);
        BsForm::registerComponent('color', ColorComponent::class);
        Paginator::useBootstrap();
        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        Collection::macro('paginate', function($perPage=15, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}

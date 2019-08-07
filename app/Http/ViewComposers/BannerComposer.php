<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\BannerRepository;

class BannerComposer
{
    protected $banner;
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct(BannerRepository $banner)
    {
        $this->banner = $banner;
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
//        dd($this->banner->listBannerActive());
        $view->with('banner', $this->banner->listBannerActive());
    }
}
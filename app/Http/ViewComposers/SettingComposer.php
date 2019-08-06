<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\SettingRepository;

class SettingComposer
{
    protected $setting;
    /**
     * Create a movie composer.
    *
    * @return void
    */
    public function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
    }
    /**
     * Bind data to the view.
    *
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $view->with('setting', $this->setting->settingSelect());
    }
}
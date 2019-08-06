<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\MenuRepository;
use App\Http\lib\Menu;

class MenuComposer
{
    protected $menu;
    /**
     * Create a movie composer.
    *
    * @return void
    */
    public function __construct(MenuRepository $menu)
    {
        $this->menu = $menu;
    }
    /**
     * Bind data to the view.
    *
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $menu = new Menu;
        $menu->setMenu($this->menu->listMenu());
        $menus = $menu->callMenu();
        $view->with('menus', $menus);
    }
}
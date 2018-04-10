<?php 

namespace Manager\MenuManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Manager\MenuManager\Menu;
use Manager\MenuManager\MenuItem;
use Redirect, DB, Session;

class MenuManagerController extends Controller {
    
    public function __construct() {
     $this->middleware('admin');
    }

    public function index()
    {
        $menus = Menu::all();

        return view('menu-view::index', compact(['menus']));
    }

    //Create menu function
    public function create()
    {
        return view('menu-view::create');
    }

    public function store(Request $request) {
        try {
            $request->validate(['name'=>'unique:menus|required']);
            $menu = new Menu;
            $menu->name = $request->name;
            $menu->class = $request->menu_class;
            $menu->slug = str_slug($request->name);
            $menu->save();
        } catch (Exception $e) {
            
        }

        Session::flash('success', 'Create new item successful');

        return Redirect::route('menu_manager');
    }

    public function edit($menu_id) {
        $menu = Menu::findOrFail($menu_id);

        return view('menu-view::edit_menu', compact(['menu']));
    }

    public function update(Request $request, $menu_id) {
        $request->validate(['name'  =>  'required']);
        $menu = Menu::findOrFail($menu_id);
        if ($menu->name != $request->name) {
            $request->validate(['name'  =>  'unique:menus']);
        }

        $menu->name = $request->name;
        $menu->class = $request->menu_class;
        $menu->save();

        Session::flash('success', 'Update menu successful');

        return Redirect::route('menu_manager');
    }

    //Edit Menu's element
    public function editMenuItem($menu_item_id) {
        $menu = Menu::where('id', $menu_item_id)->firstOrFail();
        $menuItems = MenuItem::where('menu_id', $menu->id)->where('parent_id', 0)->orderBy('order', 'asc')->get();
        $html = (string)$this->render2($menuItems, '');
        // dd($html);
        return view('menu-view::edit_menu_item', compact(['html', 'menu']));
    }

    public function remove($id) {
        try {
            Menu::where('id', $id)->delete();
            MenuItem::where('menu_id', $id)->delete();   

            DB::commit();
        } catch (Exception $e) {

            DB::rollback();

            return 0;
        }

        return 1;
    }

    public function createItem($id)
    {
        $menu_list = MenuItem::where('menu_id', $id)->get();

        return view('menu-view::create_item', compact(['menu_list']));
    }

    public function storeItem(Request $request, $id) {
        try {
            $menu_item = new MenuItem;
            $menu_item->parent_id = $request->parent_id;
            $menu_item->name = $request->name;
            $menu_item->link = $request->link;
            $menu_item->status = $request->status;
            $menu_item->order = $request->order;
            $menu_item->menu_id = $id;
            $menu_item->save();
        } catch (Exception $e) {
            
        }

        return Redirect::route('menu_manager');
    }

    public function getMenu($keyword, $class='nav navbar-nav', $li_class = '', $a_class='', $icon = '') {
        $menu = Menu::where('name', $keyword)->first();
        if($menu ==  null ) {
        	echo "";
        } else {
	        $menuItems = MenuItem::where('menu_id', $menu->id)->orderBy('order', 'asc')->where('parent_id', 0)->get();
	        if($menuItems ==  null ) {
		        echo "";
	        } else {
		        $html = (string)$this->render($menuItems, $li_class, $a_class, $icon);
		        //$class = $menu->class;
		        echo (string)view('menu-manager.menu', compact(['html', 'class', 'li_class', 'a_class', 'icon']));
	        }
        }
    }

    public function render($menuItems, $li_class = '', $a_class='', $icon = '') {
        return view('menu-view::menu_render', compact(['menuItems', 'li_class', 'a_class', 'icon']))->render();
    }

    public function render2($menuItems, $html) {
        foreach ($menuItems as $key => $item) {
            $html .= '<li id="'.$item->id.'"><div><span id="item_name_'.$item->id.'">'.$item->name.($item->status?'':' <i>(Hiden)</i> ').'</span><span id="item_link_'.$item->id.'"> - ('.$item->link.')</span><a href = "'.route('menu_manager.detailMenuItem', ['menu_item_id'=>$item->id]).'" class="clickable pull-right btn btn-danger btn-xs remove-menu-item">Remove</a><a href = "'.route('menu_manager.detailMenuItem', ['menu_item_id'=>$item->id]).'" class="clickable pull-right btn btn-warning btn-xs edit-menu-item">Edit</a></div>';

            if ($item->hasChildren()) {
                $html .= '<ul>'.$this->render2($item->children, '').'</ul>';
            }

            $html .= '</li>';
        }

        return $html;
        
    }

    public function createMenuItem(Request $request) {
        if (!$request->name) {
            return 0;
        }

        $menuItem = new MenuItem;
        $menuItem->menu_id = $request->menu_id;
        $menuItem->name = $request->name;
        $menuItem->li_class = $request->li_class;
        $menuItem->icon = $request->icon;
        $menuItem->status = 1;
        $menuItem->order = 999;
        $menuItem->link = $request->link;
        $menuItem->a_class = $request->a_class;
        $menuItem->save();
        $menuItem->detailMenuItemUrl = route('menu_manager.detailMenuItem', ['menu_item_id'=>$menuItem->id]);

        return $menuItem;
    }

    public function updateOrder(Request $request) {
        DB::beginTransaction();

        try {
            foreach ($request->items as $key => $item) {
                $menuItem = MenuItem::find($item['id']);
                $menuItem->parent_id = isset($item['parentId'])?$item['parentId']:0;
                $menuItem->order = $item['order'];
                $menuItem->save();
            }
            DB::commit();
        } catch (Exception $e) {

            DB::rollback();
            return 0;
        }

        return 1;
    }

    public function detailMenuItem($menu_item_id) {
        $menuItem = MenuItem::find($menu_item_id);

        if ($menuItem) {
            return $menuItem;
        }

        return 0;
    }

    public function updateMenuItem(Request $request) {
        if (!$request->name) {
            return 0;
        }

        $menuItem = MenuItem::find($request->item_id);
        if ($menuItem) {
            $menuItem->name = $request->name;
            $menuItem->li_class = $request->li_class;
            $menuItem->icon = $request->icon;
            $menuItem->link = $request->link;
            $menuItem->a_class = $request->a_class;
            $menuItem->status = $request->status;
            $menuItem->save();

            return $menuItem;
        } else {
            return 0;
        }
    }

    public function removeMenuItem(Request $request) {
        try {
            MenuItem::where('id', $request->menu_item_id)->delete();
            MenuItem::where('parent_id', $request->menu_item_id)->update(['parent_id'=>0]);

        } catch (Exception $e) {
            
            return 0;           
        }

        return 1;
    }
}
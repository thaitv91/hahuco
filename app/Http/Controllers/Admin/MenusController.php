<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductTerm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Award;
use Manager\MenuManager\Menu;
use Manager\MenuManager\MenuItem;
use PackagePage\Pages\Models\Pages;
use Redirect, Session, Auth;

class MenusController extends Controller
{
	private $image;

	public function __construct() {
		$this->image = new ImageFileController;
		$this->middleware('admin');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($id)
	{
		$title = 'Quản lý menu';

		$menu = Menu::where('id', $id)->firstOrFail();
		$menuItems = MenuItem::where('menu_id', $menu->id)->where('parent_id', 0)->orderBy('order', 'asc')->get();

		$pages = Pages::all();
		$terms = ProductTerm::all();

		$html = (string)$this->render2($menuItems, '');
		$data = [
			'title' => $title,
			'menu' => $menu,
			'menuItems' => $menuItems,
			'pages' => $pages,
			'terms' => $terms,
			'html' => $html

		];

		return view('admin.menus.index', $data);
	}

	public function render2($menuItems, $html) {
		foreach ($menuItems as $key => $item) {
			$html .= '<li id="'.$item->id.'"><div><span id="item_name_'.$item->id.'">'.$item->name.($item->status?'':' <i>(Hiden)</i> ').'</span><a href = "'.route('menu_manager.detailMenuItem', ['menu_item_id'=>$item->id]).'" class="clickable pull-right btn btn-danger btn-xs remove-menu-item">Remove</a><a href = "'.route('admin.menu.item', ['menu_item_id'=>$item->id]).'" class="clickable pull-right btn btn-warning btn-xs edit-menu-item">Edit</a></div>';

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
		$menuItem->status = 1;
		$menuItem->order = 999;
		$menuItem->link = $request->link;
		if($menuItem->save()) {
			Session::flash('message', "Tạo item thành công");
			return Redirect::back();
		}

		Session::flash('error', "Tạo item không thành công");
		return Redirect::back();
		//$menuItem->detailMenuItemUrl = route('menu_manager.detailMenuItem', ['menu_item_id'=>$menuItem->id]);
	}

	public function editMenuItem($menu_item_id) {
		$item = MenuItem::where('id', $menu_item_id)->firstOrFail();
		$tilte = 'Sửa item: ' . $item->name;
		return view('admin.menus.item', compact(['item', 'title']));
		//return view('admin.menus.index', compact(['html', 'menu']));
	}

	public function updateMenuItem(Request $request) {
		$data = $request->all();
		$item = MenuItem::where('id', $data['item_id'])->firstOrFail();
		$item->name = $data['name'];
		$item->link = $data['link'];

		if($item->save()) {
			Session::flash('message', "Sửa item thành công");
			return Redirect::to('/admin/menu/1');
		}

		Session::flash('error', "Sửa item không thành công");
		return Redirect::back();
	}
}

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
			$html .= '<li id="'.$item->id.'"><div><span id="item_name_'.$item->id.'">'.$item->name.($item->status?'':' <i>(Hiden)</i> ').'</span><span id="item_link_'.$item->id.'"> - ('.$item->link.')</span><a href = "'.route('menu_manager.detailMenuItem', ['menu_item_id'=>$item->id]).'" class="clickable pull-right btn btn-danger btn-xs remove-menu-item">Remove</a><a href = "'.route('menu_manager.detailMenuItem', ['menu_item_id'=>$item->id]).'" class="clickable pull-right btn btn-warning btn-xs edit-menu-item">Edit</a></div>';

			if ($item->hasChildren()) {
				$html .= '<ul>'.$this->render2($item->children, '').'</ul>';
			}

			$html .= '</li>';
		}

		return $html;

	}
}

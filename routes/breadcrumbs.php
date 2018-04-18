<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
	$breadcrumbs->push('Home', '/');
});

// Home > About
Breadcrumbs::register('page', function ($breadcrumbs, $page) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push($page->title, route('user.pages.index', $page->slug));
});

// Home > San pham
Breadcrumbs::register('sanpham', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Sản phẩm', '/san-pham');
});

Breadcrumbs::register('sp-cate', function ($breadcrumbs, $cate) {
	$breadcrumbs->parent('sanpham');
	$breadcrumbs->push($cate->name, route('homepage.product.term', $cate->slug));
});

Breadcrumbs::register('sp-detail', function ($breadcrumbs, $cate, $product) {
	$breadcrumbs->parent('sp-cate', $cate);
	$breadcrumbs->push($product->title, route('homepage.product.show', $product->slug));
});

// Home > Dich Vu
Breadcrumbs::register('dichvu', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Dịch vụ', '/dich-vu');
});

Breadcrumbs::register('dv-detail', function ($breadcrumbs, $dichvu) {
	$breadcrumbs->parent('dichvu');
	$breadcrumbs->push($dichvu->name, route('homepage.dichvu.show', $dichvu->slug));
});


// Home > Tin Tuc
Breadcrumbs::register('tintuc', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Tin tức', '/tin-tuc');
});

Breadcrumbs::register('tintuc-detail', function ($breadcrumbs, $new) {
	$breadcrumbs->parent('tintuc');
	$breadcrumbs->push($new->name, route('homepage.news.show', $new->slug));
});

// Home > Tuyen dung
Breadcrumbs::register('tuyendung', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Tuyển dụng', '/tuyen-dung');
});

Breadcrumbs::register('tuyendung-detail', function ($breadcrumbs, $tuyendung) {
	$breadcrumbs->parent('tuyendung');
	$breadcrumbs->push($tuyendung->title, route('recruitment.show', $tuyendung->slug));
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function ($breadcrumbs, $category) {
	$breadcrumbs->parent('blog');
	$breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::register('post', function ($breadcrumbs, $post) {
	$breadcrumbs->parent('category', $post->category);
	$breadcrumbs->push($post->title, route('post', $post));
});
<?php

Breadcrumbs::for('dashboard.menus.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('menus.plural'), route('dashboard.menus.index'));
});

Breadcrumbs::for('dashboard.menus.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.menus.index');
    $breadcrumb->push(trans('menus.actions.create'), route('dashboard.menus.create'));
});

Breadcrumbs::for('dashboard.menus.show', function ($breadcrumb, $menu) {
    $breadcrumb->parent('dashboard.menus.index');
    $breadcrumb->push($menu->title, route('dashboard.menus.show', $menu));
});

Breadcrumbs::for('dashboard.menus.edit', function ($breadcrumb, $menu) {
    $breadcrumb->parent('dashboard.menus.show', $menu);
    $breadcrumb->push(trans('menus.actions.edit'), route('dashboard.menus.edit', $menu));
});

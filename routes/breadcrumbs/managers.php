<?php

Breadcrumbs::for('dashboard.managers.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('managers.plural'), route('dashboard.managers.index'));
});

Breadcrumbs::for('dashboard.managers.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.managers.index');
    $breadcrumb->push(trans('managers.trashed'), route('dashboard.managers.trashed'));
});

Breadcrumbs::for('dashboard.managers.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.managers.index');
    $breadcrumb->push(trans('managers.actions.create'), route('dashboard.managers.create'));
});

Breadcrumbs::for('dashboard.managers.show', function ($breadcrumb, $manager) {
    $breadcrumb->parent('dashboard.managers.index');
    $breadcrumb->push($manager->name, route('dashboard.managers.show', $manager));
});

Breadcrumbs::for('dashboard.managers.edit', function ($breadcrumb, $manager) {
    $breadcrumb->parent('dashboard.managers.show', $manager);
    $breadcrumb->push(trans('managers.actions.edit'), route('dashboard.managers.edit', $manager));
});

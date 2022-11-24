<?php

Breadcrumbs::for('dashboard.policies.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('policies.plural'), route('dashboard.policies.index'));
});


Breadcrumbs::for('dashboard.policies.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.policies.index');
    $breadcrumb->push(trans('policies.trashed'), route('dashboard.policies.trashed'));
});


Breadcrumbs::for('dashboard.policies.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.policies.index');
    $breadcrumb->push(trans('policies.actions.create'), route('dashboard.policies.create'));
});

Breadcrumbs::for('dashboard.policies.show', function ($breadcrumb, $policy) {
    $breadcrumb->parent('dashboard.policies.index');
    $breadcrumb->push(isset($policy->name) ? $policy->name : $policy->id, route('dashboard.policies.show', $policy));
});

Breadcrumbs::for('dashboard.policies.edit', function ($breadcrumb, $policy) {
    $breadcrumb->parent('dashboard.policies.show', $policy);
    $breadcrumb->push(trans('policies.actions.edit'), route('dashboard.policies.edit', $policy));
});




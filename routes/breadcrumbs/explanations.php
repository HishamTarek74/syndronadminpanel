<?php

Breadcrumbs::for('dashboard.explanations.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('explanations.plural'), route('dashboard.explanations.index'));
});

Breadcrumbs::for('dashboard.explanations.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.explanations.index');
    $breadcrumb->push(trans('explanations.actions.create'), route('dashboard.explanations.create'));
});

Breadcrumbs::for('dashboard.explanations.show', function ($breadcrumb, $explanation) {
    $breadcrumb->parent('dashboard.explanations.index');
    $breadcrumb->push($explanation->title, route('dashboard.explanations.show', $explanation));
});

Breadcrumbs::for('dashboard.explanations.edit', function ($breadcrumb, $explanation) {
    $breadcrumb->parent('dashboard.explanations.show', $explanation);
    $breadcrumb->push(trans('explanations.actions.edit'), route('dashboard.explanations.edit', $explanation));
});

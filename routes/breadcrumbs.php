<?php

use \Illuminate\Support\Facades\Lang;

Breadcrumbs::for('index', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('app.index'), route('index'));
});

Breadcrumbs::for('home', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('app.home'), route('home'));
});

Breadcrumbs::for('login', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('login'), route('login'));
});

Breadcrumbs::for('logout', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('logout'), route('logout'));
});

Breadcrumbs::for('register', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('register'), route('register'));
});

Breadcrumbs::for('password.confirm', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('password.confirm'), route('password.confirm'));
});

Breadcrumbs::for('password.email', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('password.email'), route('password.email'));
});

Breadcrumbs::for('password.reset', function ($breadcrumbs) {
    $breadcrumbs->push(Lang::get('password.reset'), route('password.reset'));
});

Breadcrumbs::for('activities.index', function ($breadcrumbs) {
   $breadcrumbs->push(Lang::get('activities.index'), route('activities.index'));
});

Breadcrumbs::for('activities.create', function ($breadcrumbs) {
   $breadcrumbs->parent('activities.index');
   $breadcrumbs->push(Lang::get('activities.create'), route('activities.create'));
});

Breadcrumbs::for('activities.show', function ($breadcrumbs, $activity) {
   $breadcrumbs->parent('activities.index');
   $breadcrumbs->push(Lang::get('activities.show', ['activity' => $activity->id]), route('activities.show', $activity->id));
});

Breadcrumbs::for('activities.edit', function ($breadcrumbs, $activity) {
   $breadcrumbs->parent('activities.show', $activity);
   $breadcrumbs->push(Lang::get('activities.edit', ['activity' => $activity->id]), route('activities.edit', $activity->id));
});

Breadcrumbs::for('activities.delete', function ($breadcrumbs, $activity) {
   $breadcrumbs->parent('activities.show', $activity);
   $breadcrumbs->push(Lang::get('activities.delete', ['activity' => $activity->id]), route('activities.delete', $activity->id));
});

Breadcrumbs::for('ministers.index', function ($breadcrumbs) {
   $breadcrumbs->push(Lang::get('ministers.index'), route('ministers.index'));
});

Breadcrumbs::for('ministers.create', function ($breadcrumbs) {
   $breadcrumbs->parent('ministers.index');
   $breadcrumbs->push(Lang::get('ministers.create'), route('ministers.create'));
});

Breadcrumbs::for('ministers.show', function ($breadcrumbs, $minister) {
   $breadcrumbs->parent('ministers.index');
   $breadcrumbs->push(Lang::get('ministers.show', ['minister' => $minister->id]), route('ministers.show', $minister->id));
});

Breadcrumbs::for('ministers.edit', function ($breadcrumbs, $minister) {
   $breadcrumbs->parent('ministers.show', $minister);
   $breadcrumbs->push(Lang::get('ministers.edit', ['minister' => $minister->id]), route('ministers.edit', $minister->id));
});

Breadcrumbs::for('ministers.delete', function ($breadcrumbs, $minister) {
   $breadcrumbs->parent('ministers.show', $minister);
   $breadcrumbs->push(Lang::get('ministers.delete', ['minister' => $minister->id]), route('ministers.delete', $minister->id));
});

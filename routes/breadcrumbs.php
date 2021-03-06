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

Breadcrumbs::for('districts.index', function ($breadcrumbs) {
   $breadcrumbs->push(Lang::get('districts.index'), route('districts.index'));
});

Breadcrumbs::for('districts.create', function ($breadcrumbs) {
   $breadcrumbs->parent('districts.index');
   $breadcrumbs->push(Lang::get('districts.create'), route('districts.create'));
});

Breadcrumbs::for('districts.show', function ($breadcrumbs, $district) {
   $breadcrumbs->parent('districts.index');
   $breadcrumbs->push(Lang::get('districts.show', ['district' => $district->id]), route('districts.show', $district->id));
});

Breadcrumbs::for('districts.edit', function ($breadcrumbs, $district) {
   $breadcrumbs->parent('districts.show', $district);
   $breadcrumbs->push(Lang::get('districts.edit', ['district' => $district->id]), route('districts.edit', $district->id));
});

Breadcrumbs::for('districts.delete', function ($breadcrumbs, $district) {
   $breadcrumbs->parent('districts.show', $district);
   $breadcrumbs->push(Lang::get('districts.delete', ['district' => $district->id]), route('districts.delete', $district->id));
});

Breadcrumbs::for('comorbidities.index', function ($breadcrumbs) {
   $breadcrumbs->push(Lang::get('comorbidities.index'), route('comorbidities.index'));
});

Breadcrumbs::for('comorbidities.create', function ($breadcrumbs) {
   $breadcrumbs->parent('comorbidities.index');
   $breadcrumbs->push(Lang::get('comorbidities.create'), route('comorbidities.create'));
});

Breadcrumbs::for('comorbidities.show', function ($breadcrumbs, $comorbidity) {
   $breadcrumbs->parent('comorbidities.index');
   $breadcrumbs->push(Lang::get('comorbidities.show', ['comorbidity' => $comorbidity->id]), route('comorbidities.show', $comorbidity->id));
});

Breadcrumbs::for('comorbidities.edit', function ($breadcrumbs, $comorbidity) {
   $breadcrumbs->parent('comorbidities.show', $comorbidity);
   $breadcrumbs->push(Lang::get('comorbidities.edit', ['comorbidity' => $comorbidity->id]), route('comorbidities.edit', $comorbidity->id));
});

Breadcrumbs::for('comorbidities.delete', function ($breadcrumbs, $comorbidity) {
   $breadcrumbs->parent('comorbidities.show', $comorbidity);
   $breadcrumbs->push(Lang::get('comorbidities.delete', ['comorbidity' => $comorbidity->id]), route('comorbidities.delete', $comorbidity->id));
});

Breadcrumbs::for('sessions.index', function ($breadcrumbs) {
   $breadcrumbs->push(Lang::get('sessions.index'), route('sessions.index'));
});

Breadcrumbs::for('sessions.create', function ($breadcrumbs) {
   $breadcrumbs->parent('sessions.index');
   $breadcrumbs->push(Lang::get('sessions.create'), route('sessions.create'));
});

Breadcrumbs::for('sessions.show', function ($breadcrumbs, $session) {
   $breadcrumbs->parent('sessions.index');
   $breadcrumbs->push(Lang::get('sessions.show', ['session' => $session->id]), route('sessions.show', $session->id));
});

Breadcrumbs::for('sessions.edit', function ($breadcrumbs, $session) {
   $breadcrumbs->parent('sessions.show', $session);
   $breadcrumbs->push(Lang::get('sessions.edit', ['session' => $session->id]), route('sessions.edit', $session->id));
});

Breadcrumbs::for('sessions.delete', function ($breadcrumbs, $session) {
   $breadcrumbs->parent('sessions.show', $session);
   $breadcrumbs->push(Lang::get('sessions.delete', ['session' => $session->id]), route('sessions.delete', $session->id));
});

Breadcrumbs::for('matures.index', function ($breadcrumbs) {
   $breadcrumbs->push(Lang::get('matures.index'), route('matures.index'));
});

Breadcrumbs::for('matures.create', function ($breadcrumbs) {
   $breadcrumbs->parent('matures.index');
   $breadcrumbs->push(Lang::get('matures.create'), route('matures.create'));
});

Breadcrumbs::for('matures.show', function ($breadcrumbs, $mature) {
   $breadcrumbs->parent('matures.index');
   $breadcrumbs->push(Lang::get('matures.show', ['mature' => $mature->id]), route('matures.show', $mature->id));
});

Breadcrumbs::for('matures.edit', function ($breadcrumbs, $mature) {
   $breadcrumbs->parent('matures.show', $mature);
   $breadcrumbs->push(Lang::get('matures.edit', ['mature' => $mature->id]), route('matures.edit', $mature->id));
});

Breadcrumbs::for('matures.delete', function ($breadcrumbs, $mature) {
   $breadcrumbs->parent('matures.show', $mature);
   $breadcrumbs->push(Lang::get('matures.delete', ['mature' => $mature->id]), route('matures.delete', $mature->id));
});

Breadcrumbs::for('sicknesses.index', function ($breadcrumbs) {
   $breadcrumbs->push(Lang::get('sicknesses.index'), route('sicknesses.index'));
});

Breadcrumbs::for('sicknesses.create', function ($breadcrumbs) {
   $breadcrumbs->parent('sicknesses.index');
   $breadcrumbs->push(Lang::get('sicknesses.create'), route('sicknesses.create'));
});

Breadcrumbs::for('sicknesses.show', function ($breadcrumbs, $sickness) {
   $breadcrumbs->parent('sicknesses.index');
   $breadcrumbs->push(Lang::get('sicknesses.show', ['sickness' => $sickness->id]), route('sicknesses.show', $sickness->id));
});

Breadcrumbs::for('sicknesses.edit', function ($breadcrumbs, $sickness) {
   $breadcrumbs->parent('sicknesses.show', $sickness);
   $breadcrumbs->push(Lang::get('sicknesses.edit', ['sickness' => $sickness->id]), route('sicknesses.edit', $sickness->id));
});

Breadcrumbs::for('sicknesses.delete', function ($breadcrumbs, $sickness) {
   $breadcrumbs->parent('sicknesses.show', $sickness);
   $breadcrumbs->push(Lang::get('sicknesses.delete', ['sickness' => $sickness->id]), route('sicknesses.delete', $sickness->id));
});

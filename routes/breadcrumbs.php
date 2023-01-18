<?php

use App\Models\Blog;
use App\Models\Event;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.error'), null, ['icon' => 'fas fa-circle-exclamation fa-fw']);
});

Breadcrumbs::for('livewire.message', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.message'), null, ['icon' => 'fas fa-message fa-fw']);
});

Breadcrumbs::for('livewire.preview-file', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.preview_file'), null, ['icon' => 'fas fa-photo-film fa-fw']);
});

Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push(trans('index.home'), route('index'), ['icon' => 'fas fa-home fa-fw']);
});

Breadcrumbs::for('about.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.about'), route('about.index'), ['icon' => 'fas fa-building fa-fw']);
});

Breadcrumbs::for('our-profile.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.our_profile'), route('our-profile.index'), ['icon' => 'fas fa-users fa-fw']);
});

Breadcrumbs::for('our-values.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.our_values'), route('our-values.index'), ['icon' => 'fas fa-star fa-fw']);
});

Breadcrumbs::for('our-network.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.our_network'), route('our-network.index'), ['icon' => 'fas fa-sitemap fa-fw']);
});

Breadcrumbs::for('gallery.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.gallery'), route('gallery.index'), ['icon' => 'fas fa-image-video fa-fw']);
});

Breadcrumbs::for('online-registration.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.online_registration'), route('online-registration.index'), ['icon' => 'fas fa-home fa-fw']);
});

Breadcrumbs::for('admission-calendar.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.admission_calendar'), route('admission-calendar.index'), ['icon' => 'fas fa-pencil-alt fa-fw']);
});

Breadcrumbs::for('procedure.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.procedure'), route('procedure.index'), ['icon' => 'fas fa-list fa-fw']);
});

Breadcrumbs::for('tuition-fees.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.tuition_fees'), route('tuition-fees.index'), ['icon' => 'fas fa-money fa-fw']);
});

Breadcrumbs::for('scholarships.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.scholarships'), route('scholarships.index'), ['icon' => 'fas fa-graduation-cap fa-fw']);
});

Breadcrumbs::for('information-system.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.information_system'), route('information-system.index'), ['icon' => 'fas fa-book fa-fw']);
});

Breadcrumbs::for('event.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.event'), route('event.index'), ['icon' => 'fas fa-calendar-day fa-fw']);
});

Breadcrumbs::for('event.view', function (BreadcrumbTrail $trail, $slug) {
    $event = Event::where('slug', $slug)->active()->firstOrFail();
    $trail->parent('event.index');
    $trail->push("{$event->translate_name}", route('event.view', $slug), ['icon' => 'fas fa-eye fa-fw']);
});

Breadcrumbs::for('faq.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.faq'), route('faq.index'), ['icon' => 'fas fa-question fa-fw']);
});

Breadcrumbs::for('blog.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.blog'), route('blog.index'), ['icon' => 'fas fa-newspaper fa-fw']);
});

Breadcrumbs::for('blog.view', function (BreadcrumbTrail $trail, $slug) {
    $blog = Blog::where('slug', $slug)->active()->firstOrFail();
    $trail->parent('blog.index');
    $trail->push("{$blog->translate_name}", route('blog.view', $slug), ['icon' => 'fas fa-eye fa-fw']);
});

Breadcrumbs::for('contact-us.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.contact_us'), route('contact-us.index'), ['icon' => 'fas fa-phone fa-fw']);
});

// CMS
$subDomain = 'cms';
Breadcrumbs::for("{$subDomain}.index", function (BreadcrumbTrail $trail) use ($subDomain) {
    $trail->push(trans('index.home'), route("{$subDomain}.index"), ['icon' => 'fas fa-home fa-fw']);
});

$page = 'registration';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-pencil fa-fw']);
});

$page = 'contact';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-phone fa-fw']);
});

$page = 'newsletter';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-envelopes-bulk fa-fw']);
});

$menu = 'blog';
Breadcrumbs::for("{$subDomain}.{$menu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$menu}"), route("{$subDomain}.{$menu}.index"), ['icon' => 'fas fa-newspaper fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.blog_{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$menu = 'event';
Breadcrumbs::for("{$subDomain}.{$menu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$menu}"), route("{$subDomain}.{$menu}.index"), ['icon' => 'fas fa-calendar-day fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.event_{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$page = 'admission-calendar';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans('index.admission_calendar'), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-calendar fa-fw']);
});

$page = 'banner';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-image fa-fw']);
});

$page = 'faq';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-question fa-fw']);
});

$page = 'gallery';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-photo-film fa-fw']);
});

$page = 'network';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-sitemap fa-fw']);
});

$page = 'offer';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-gift fa-fw']);
});

$page = 'procedure';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-list fa-fw']);
});

$page = 'slider';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-sliders fa-fw']);
});

$page = 'testimony';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-comments fa-fw']);
});

$page = 'tuition-fee';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans('index.tuition_fee'), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-money-check-dollar fa-fw']);
});

$page = 'value';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-star fa-fw']);
});

// CONFIGURATION
$menu = 'configuration';
Breadcrumbs::for("{$subDomain}.{$menu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$menu}"), route("{$subDomain}.{$menu}.index"), ['icon' => 'fas fa-cogs fa-fw']);
});

$page = 'user';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-user fa-fw']);
});

$page = 'activity';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-history fa-fw']);
});

$page = 'role';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-suitcase fa-fw']);
});

$page = 'permission';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-key fa-fw']);
});

$page = 'setting';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-gear fa-fw']);
});

// PROFILE
$menu = 'profile';
Breadcrumbs::for("{$subDomain}.{$menu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$menu}"), route("{$subDomain}.{$menu}.index"), ['icon' => 'fas fa-id-card fa-fw']);
});

$page = 'activity-log';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.activity_log'), route("{$subDomain}.{$menu}.{$page}"), ['icon' => 'fas fa-user-clock fa-fw']);
});

$page = 'edit-profile';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.edit_profile'), route("{$subDomain}.{$menu}.{$page}"), ['icon' => 'fas fa-user-edit fa-fw']);
});

$page = 'change-password';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.change_password'), route("{$subDomain}.{$menu}.{$page}"), ['icon' => 'fas fa-user-lock fa-fw']);
});

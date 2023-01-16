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
    $trail->push(trans('index.our_values'), route('our-values.index'), ['icon' => 'fas fa-trophy fa-fw']);
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
    $trail->push(trans('index.event'), route('event.index'), ['icon' => 'fas fa-calendar fa-fw']);
});

Breadcrumbs::for('event.view', function (BreadcrumbTrail $trail, $event_slug) {
    $event = Event::where('slug', $event_slug)->active()->firstOrFail();
    $trail->parent('event.index');
    $trail->push("{$event->translate_name}", route('event.view', $event_slug), ['icon' => 'fas fa-eye fa-fw']);
});

Breadcrumbs::for('faq.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.faq'), route('faq.index'), ['icon' => 'fas fa-question fa-fw']);
});

Breadcrumbs::for('blog.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.blog'), route('blog.index'), ['icon' => 'fas fa-newspaper fa-fw']);
});

Breadcrumbs::for('blog.view', function (BreadcrumbTrail $trail, $blog_slug) {
    $blog = Blog::where('slug', $blog_slug)->active()->firstOrFail();
    $trail->parent('blog.index');
    $trail->push("{$blog->translate_name}", route('blog.view', $blog_slug), ['icon' => 'fas fa-eye fa-fw']);
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

$page = 'calendar';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-calendar fa-fw']);
});

$page = 'my-task';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans('index.my_task'), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-tasks fa-fw']);
});

$page = 'my-assignment';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans('index.my_assignment'), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-square-check fa-fw']);
});

$page = 'my-absent';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans('index.my_absent'), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-check-to-slot fa-fw']);
});

$page = 'my-salary';
Breadcrumbs::for("{$subDomain}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $page) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans('index.my_salary'), route("{$subDomain}.{$page}.index"), ['icon' => 'fas fa-hand-holding-usd fa-fw']);
});

// REPORT
$menu = 'report';
Breadcrumbs::for("{$subDomain}.{$menu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$menu}"), route("{$subDomain}.{$menu}.index"), ['icon' => 'fas fa-file-lines fa-fw']);
});

$page = 'absent-report';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.absent_report'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-file-circle-check fa-fw']);
});

$page = 'annual-report';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.annual_report'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-file-signature fa-fw']);
});

$page = 'balance-sheet';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.balance_sheet'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-file-invoice fa-fw']);
});

$page = 'income-statement';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.income_statement'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-file-invoice-dollar fa-fw']);
});

// DEVELOPMENT
$menu = 'development';
Breadcrumbs::for("{$subDomain}.{$menu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$menu}"), route("{$subDomain}.{$menu}.index"), ['icon' => 'fas fa-tools fa-fw']);
});

$subMenu = 'portfolio';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-th-large fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.portfolio_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$subMenu = 'product';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-boxes fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.product_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$subMenu = 'template';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-th fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.template_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$page = 'task';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-tasks fa-fw']);
});

$page = 'assignment';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-list-check fa-fw']);
});

$page = 'progress';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-bar fa-fw']);
});

$page = 'revision';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-file-check fa-fw']);
});

// HRD
$menu = 'hrd';
Breadcrumbs::for("{$subDomain}.{$menu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$menu}"), route("{$subDomain}.{$menu}.index"), ['icon' => 'fas fa-user-tie fa-fw']);
});

$page = 'absent';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-check-to-slot fa-fw']);
});

$page = 'employee';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-users fa-fw']);
});

$page = 'endorse';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-people-group fa-fw']);
});

$page = 'client';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-user-tie fa-fw']);
});

$page = 'agent';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-user-secret fa-fw']);
});

$page = 'career';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-briefcase fa-fw']);
});

$subMenu = 'procedure';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-th-large fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.procedure_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$subMenu = 'rule';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-th-large fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.rule_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$page = 'register-influencer';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.register_influencer'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-pen fa-fw']);
});

$page = 'sponsor';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-people-line fa-fw']);
});

$page = 'testimonial';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-comments fa-fw']);
});

// PURCHASING
$menu = 'purchasing';
Breadcrumbs::for("{$subDomain}.{$menu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$menu}"), route("{$subDomain}.{$menu}.index"), ['icon' => 'fas fa-cash-register fa-fw']);
});

$page = 'buy-advertisement';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.buy_advertisement'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-bullhorn fa-fw']);
});

$page = 'advertisement-provider';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.advertisement_provider'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$page = 'buy-domain-hosting';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.buy_domain_hosting'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-server fa-fw']);
});

$page = 'domain-hosting-provider';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.domain_hosting_provider'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$page = 'buy-internet';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.bu_internet'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-wifi fa-fw']);
});

$page = 'internet-provider';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.internet_provider'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$page = 'buy-phone-credit';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.buy_phone_credit'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-coins fa-fw']);
});

$page = 'phone-credit-provider';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.phone_credit_provider'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$page = 'buy-item';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.buy_item'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-box fa-fw']);
});

$page = 'buy-pln-token';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.buy_pln_token'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-plug-circle-bold fa-fw']);
});

// MARKETING
$menu = 'marketing';
Breadcrumbs::for("{$subDomain}.{$menu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$menu}"), route("{$subDomain}.{$menu}.index"), ['icon' => 'fas fa-bullhorn fa-fw']);
});

$subMenu = 'news';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-newspaper fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.news_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$subMenu = 'blog';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-note-sticky fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.blog_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$subMenu = 'game';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-gamepad fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.game_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$subMenu = 'job';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-suitcase fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.job_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$subMenu = 'forum';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-comments-dots fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.forum_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$page = 'order';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-cart-shopping fa-fw']);
});

$page = 'contact';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-phone fa-fw']);
});

$page = 'promotion';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-gift fa-fw']);
});

$page = 'price-list';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.price_list'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-list-ol fa-fw']);
});

$page = 'newsletter';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-envelopes-bulk fa-fw']);
});

$page = 'platform';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-circle-check fa-fw']);
});

$page = 'service';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-wrench fa-fw']);
});

// FINANCE
$menu = 'finance';
Breadcrumbs::for("{$subDomain}.{$menu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$menu}"), route("{$subDomain}.{$menu}.index"), ['icon' => 'fas fa-wallet fa-fw']);
});

$subMenu = 'payment';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-credit-card fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.payment_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$page = 'charge';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-money-check fa-fw']);
});

$page = 'google-adsense';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-money-bill-wave fa-fw']);
});

$page = 'salary';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-hand-holding-usd fa-fw']);
});

$page = 'loyalty';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-money-bill fa-fw']);
});

$subMenu = 'deposit';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-arrow-alt-circle-down fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.deposit_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$subMenu = 'withdraw';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-arrow-alt-circle-up fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.withdraw_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$subMenu = 'donation';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-donate fa-fw']);
});

$page = 'category';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu, $page) {
    $trail->parent("{$subDomain}.{$menu}.{$subMenu}.index");
    $trail->push(trans("index.payment_{$page}"), route("{$subDomain}.{$menu}.{$subMenu}.{$page}.index"), ['icon' => 'fas fa-tags fa-fw']);
});

$page = 'bank-interest';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.bank_interest'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-piggy-bank fa-fw']);
});

$page = 'administrative-cost';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.administrative_cost'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-money-bill-1 fa-fw']);
});

$page = 'bank-bca';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans('index.bank_bca'), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-building-flag fa-fw']);
});

$page = 'bank';
Breadcrumbs::for("{$subDomain}.{$menu}.{$page}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $page) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$page}"), route("{$subDomain}.{$menu}.{$page}.index"), ['icon' => 'fas fa-bank fa-fw']);
});

// OTHER
$menu = 'other';
Breadcrumbs::for("{$subDomain}.{$menu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu) {
    $trail->parent("{$subDomain}.index");
    $trail->push(trans("index.{$menu}"), route("{$subDomain}.{$menu}.index"), ['icon' => 'fas fa-database fa-fw']);
});

$subMenu = 'history';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-scroll fa-fw']);
});

$subMenu = 'documentation';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-photo-film fa-fw']);
});

$subMenu = 'quote';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-quote-left fa-fw']);
});

$subMenu = 'notification';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-bell fa-fw']);
});

$subMenu = 'faq';
Breadcrumbs::for("{$subDomain}.{$menu}.{$subMenu}.index", function (BreadcrumbTrail $trail) use ($subDomain, $menu, $subMenu) {
    $trail->parent("{$subDomain}.{$menu}.index");
    $trail->push(trans("index.{$subMenu}"), route("{$subDomain}.{$menu}.{$subMenu}.index"), ['icon' => 'fas fa-question fa-fw']);
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

<?php

use App\Models\Blog;
use App\Models\Event;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.error'));
});

Breadcrumbs::for('livewire.preview-file', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.preview_file'));
});

Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push(trans('index.home'), route('index'));
});

Breadcrumbs::for('about.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.about'), route('about.index'));
});

Breadcrumbs::for('our-profile.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.our_profile'), route('our-profile.index'));
});

Breadcrumbs::for('our-values.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.our_values'), route('our-values.index'));
});

Breadcrumbs::for('our-network.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.our_network'), route('our-network.index'));
});

Breadcrumbs::for('gallery.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.gallery'), route('gallery.index'));
});

Breadcrumbs::for('online-registration.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.online_registration'), route('online-registration.index'));
});

Breadcrumbs::for('admission-calendar.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.admission_calendar'), route('admission-calendar.index'));
});

Breadcrumbs::for('procedure.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.procedure'), route('procedure.index'));
});

Breadcrumbs::for('tuition-fees.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.tuition_fees'), route('tuition-fees.index'));
});

Breadcrumbs::for('scholarships.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.scholarships'), route('scholarships.index'));
});

Breadcrumbs::for('information-system.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.information_system'), route('information-system.index'));
});

Breadcrumbs::for('event.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.event'), route('event.index'));
});

Breadcrumbs::for('event.view', function (BreadcrumbTrail $trail, $event_slug) {
    $event = Event::where('slug', $event_slug)->active()->firstOrFail();
    $trail->parent('event.index');
    $trail->push("{$event->translate_name}", route('event.view', $event_slug));
});

Breadcrumbs::for('faq.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.faq'), route('faq.index'));
});

Breadcrumbs::for('blog.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.blog'), route('blog.index'));
});

Breadcrumbs::for('blog.view', function (BreadcrumbTrail $trail, $blog_slug) {
    $blog = Blog::where('slug', $blog_slug)->active()->firstOrFail();
    $trail->parent('blog.index');
    $trail->push("{$blog->translate_name}", route('blog.view', $blog_slug));
});

Breadcrumbs::for('contact-us.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.contact_us'), route('contact-us.index'));
});

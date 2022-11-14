<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', url('admin/dashboard'));
});

// Home > Announcement
Breadcrumbs::for('announcement', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Announcements', url('admin/announcement'));
});

Breadcrumbs::for('feedback', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Feedback', url('admin/feedback'));
});


Breadcrumbs::for('announcement_show', function ($trail, $announcement) {
    $trail->parent('announcement');
    $trail->push( Str::limit($announcement->title, 40) );
});

Breadcrumbs::for('announcement_create', function ($trail) {
    $trail->parent('announcement');
    $trail->push('Create');
});

Breadcrumbs::for('announcement_edit', function ($trail) {
    $trail->parent('announcement');
    $trail->push('Edit');
});


// Home > News
Breadcrumbs::for('news', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('News', url('admin/news'));
});

Breadcrumbs::for('news_create', function ($trail) {
    $trail->parent('news');
    $trail->push('Create News');
});

Breadcrumbs::for('news_edit', function ($trail) {
    $trail->parent('news');
    $trail->push('Edit News');
});

Breadcrumbs::for('news_show', function ($trail, $news) {
    $trail->parent('news');
    $trail->push( Str::limit($news->title, 40) );
});


// Home > Services
Breadcrumbs::for('services', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Services', url('admin/services'));
});

Breadcrumbs::for('services_create', function ($trail) {
    $trail->parent('services');
    $trail->push('Create Service');
});

Breadcrumbs::for('services_edit', function ($trail) {
    $trail->parent('services');
    $trail->push('Edit Service');
});

Breadcrumbs::for('services_show', function ($trail, $services) {
    $trail->parent('services');
    $trail->push( Str::limit($services->title, 40) );
});


// Home > Banner
Breadcrumbs::for('banner', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Banner', url('admin/banner'));
});

Breadcrumbs::for('banner_create', function ($trail) {
    $trail->parent('banner');
    $trail->push('Create Banner');
});

Breadcrumbs::for('banner_edit', function ($trail) {
    $trail->parent('services');
    $trail->push('Edit Banner');
});



// Home > USER
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Users', url('admin/users'));
});

Breadcrumbs::for('user_create', function ($trail) {
    $trail->parent('users');
    $trail->push('Register User');
});

Breadcrumbs::for('user_edit', function ($trail) {
    $trail->parent('users');
    $trail->push('Edit User');
});

Breadcrumbs::for('user_show', function ($trail) {
    $trail->parent('users');
    $trail->push('Profile');
});

// Dashboard -> Activity Logs
Breadcrumbs::for('logs', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Activity Logs');
});


// Dashboard -> Activity Logs
Breadcrumbs::for('events', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Events Calendar');
});




?>
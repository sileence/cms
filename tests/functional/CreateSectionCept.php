<?php
$I = new FunctionalTester($scenario);
$I->am('a CMS admin');
$I->wantTo('create a new section');

// When
$I->amOnPage('admin/sections');
// And
$I->click('Add a new section');
// Then
$I->seeCurrentUrlEquals('/admin/sections/create');
$I->see('New section', 'h1');


$I->amGoingTo('Omit the name field in order to submit an invalid form');
// When
$I->fillField('Slug URL', 'our-company');
$I->click('Create section');
// Then
$I->expectTo('See the form again with the errors');
$I->seeCurrentUrlEquals('/admin/sections/create');
$I->seeInField('slug_url', 'our-company');
$I->see('The name field is required', '.error');


$I->amGoingTo('Fill a valid form');
// When
$I->fillField('Name', 'Our company');
$I->fillField('Slug URL', 'our-company');
$I->selectOption('type', 'blog');
$I->selectOption('menu', 1);
$I->fillField('menu_order', 2);
$I->selectOption('published', 0);
// And
$I->click('Create section');

// Then
$I->seeCurrentUrlEquals('/admin/sections/1');
$I->see('Our company', 'h1');
$I->seeRecord('sections', [
    'name' => 'Our company',
    'menu_order' => 2,
    'menu' => 1,
    'published' => 0
]);
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

// When
$I->fillField('Name', 'Our company');
$I->fillField('Slug URL', 'our-company');
$I->fillField('type', 'page');
// And
$I->click('Create section');

// Then
$I->seeCurrentUrlEquals('/admin/sections/1');
$I->see('Our company', 'h1');
$I->seeRecord('sections', ['name' => 'Our company']);
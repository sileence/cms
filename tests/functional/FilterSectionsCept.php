<?php 
$I = new FunctionalTester($scenario);
$I->am('a CMS admin');
$I->wantTo('filter the section list');

// When
$I->haveSection(); // Created "Our company" section
$sections = $I->haveSections(); // Random sections
// And
$I->amOnPage('admin/sections');
// Then
$I->seeElement('input', ['name' => 'search']);

// When
$I->fillField('search', 'company');
$I->selectOption('published', '1');
// And
$I->click('Filter sections');

// Then
$I->seeCurrentUrlEquals('/admin/sections?search=company&published=1&menu=');
$I->expect('not to see the our company record');
// Then
$I->see('There are 0 sections');
$I->dontSee('Our company', 'td.name');
$I->seeInField('search', 'company');

// When
$I->selectOption('published', '0');
$I->selectOption('menu', '0');
// And
$I->click('Filter sections');
// Then
$I->see('There are 0 sections');
$I->dontSee('Our company', 'td.name');

// When
$I->selectOption('menu', '1');
// And
$I->click('Filter sections');
// Then
$I->see('Our company', 'td.name');
$I->dontSee($sections->first()->name, 'td.name');
$I->dontSee($sections->last()->name, 'td.name');
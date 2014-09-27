<?php

$I = new FunctionalTester($scenario);
$I->am('a CMS admin');
$I->wantTo('list sections');

// When
$sections = $I->haveSections();
// And
$I->amOnPage('admin/sections');

//Then
$first = $sections->first();

$I->see('Sections', 'h1');
$I->see('There are 10 sections, showing page 1 of 1');
$I->see($first->name, 'tbody tr:first-child td.name');
$I->see($sections->last()->name, 'tbody tr:last-child td.name');

// When
$I->click('Show', 'tbody tr:first-child');
// Then
$I->expectTo('see the section details');
$I->seeCurrentUrlEquals('/admin/sections/' . $first->id);
$I->see($first->name, 'h1');
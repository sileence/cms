<?php 
$I = new FunctionalTester($scenario);
$I->am('a CMS admin');
$I->wantTo('paginate the sections results');

$I->amGoingTo('Go to page 1');

// When
$sections = $I->haveSections(16);
// And
$I->amOnPage('/admin/sections');
// Then
$I->see('There are 16 sections, showing page 1 of 2');
$I->expectTo('see the first section');
$I->see($sections->first()->name, 'tbody tr:first-child td.name');
$I->expect('not to see the last section');
$I->dontSee($sections->last()->name);
$I->expectTo('see the page 2 link');
$I->see('2', '.pagination a');

$I->amGoingTo('go to page 2');
// When
$I->click('2', '.pagination a');
// Then
$I->expectTo('see the pagination parameter in the URL');
$I->seeCurrentUrlEquals('/admin/sections?page=2');
$I->expect('not to see the first section');
$I->dontSee($sections->first()->name);
$I->expectTo('see the last section');
$I->see($sections->last()->name);
$I->expectTo('See the section #15 as first item on page 2');
$I->see($sections->get(15)->name, 'tbody tr:first-child td.name');

$I->amGoingTo('go back to page 1');
// When
$I->amOnPage('/admin/sections?page=2');
$I->see('1', '.pagination a');
// And
$I->click('1', '.pagination a');
// Then
$I->seeCurrentUrlEquals('/admin/sections?page=1');
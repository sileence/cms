<?php
$I = new FunctionalTester($scenario);
$I->am('a CMS admin');
$I->wantTo('filter and paginate the section list');

// When
$sections = $I->haveSections(90); // Random sections
// And
$I->amOnPage('admin/sections');
$I->selectOption('published', '1');
$I->click('Filter sections');
$I->click('2', '.pagination a');

// Then
$I->expectTo('see published sections');
$I->see('Published', 'td');
$I->expect('not to see draft sections');
$I->dontSee('Draft', 'td');

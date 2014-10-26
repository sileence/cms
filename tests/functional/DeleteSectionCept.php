<?php 
$I = new FunctionalTester($scenario);
$I->am('a CMS admin');
$I->wantTo('delete a section');

// When
$id = $I->haveSection();
// And
$I->amOnPage('admin/sections/' . $id);
// Then
$I->see('Delete section', 'button.btn-del');

// When
$I->click('Delete section');
// Then
$I->seeCurrentUrlEquals('/admin/sections');
/*
$I->dontSeeRecord('sections', [
   'id' => $id
]);
*/
<?php
$I = new FunctionalTester($scenario);
$I->am('a CMS admin');
$I->wantTo('filter the section list');

$I->amGoingTo('check an empty section list');
// When
$I->amOnPage('/admin/sections');
// Then
$I->see('There are no sections, please create the first one');
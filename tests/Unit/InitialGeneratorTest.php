<?php

use App\Services\InitialsService;

it('genrates an inital from a two worded name', function () {
    $name = "Koussay Fridhi";
    $initial = InitialsService::generate($name);
    expect($initial)->toEqual("KF");
});

it('generates an inital from one word name', function () {
    $name = "Koussay";
    $initial = InitialsService::generate($name);
    expect($initial)->toEqual("KO");
});

it('generates an initial from three words name', function () {
    $name = "Abdoul Abd Elmajid";
    $initial = InitialsService::generate($name);
    expect($initial)->toEqual("AE");
});

it('generates initial from arabic name', function () {
    $name = "قصي فريضي";
    $initial = InitialsService::generate($name);
    expect($initial)->toEqual("قف");
});

it('generates initials from compound arabic names', function () {
    $name = "عبد الحميد أكبر";
    $initial = InitialsService::generate($name);
    expect($initial)->toEqual("عأ");
});


<?php


it('will return an ok status when the initials endpoint is called', function () {
    $response = $this->get(route('generateInitials'));
    $response->assertStatus(200);
});


it('will render an image without any params when the initials endpoint is called', function () {
    $response = $this->get(route('generateInitials'));
    $response->assertHeader('Content-Type', 'image/png');
});


it('will render a different image each time the initials endpoint is called', function () {
    $response = $this->get(route('generateInitials'));
    $fileContent = $response->getContent();
    $response2 = $this->get(route('generateInitials'));
    expect($fileContent)->not()->toEqual($response2->getContent());
});

it('will render an image with params when the initials endpoint is called', function () {
    $response = $this->get(route('generateInitials', [
        'name'=>'koussay',
        'bgcolor' => 'f44336',
        'text_color' => 'fafafa',
        'shape' => 'circle',
        'size' => 250,
    ]));
    $response->assertStatus(200);
    $response->assertHeader('Content-Type', 'image/png');
});


it('will render the same image with the same params when the initials endpoint is called', function () {
    $response = $this->get(route('generateInitials', [
        'name' => 'koussay',
        'bgcolor' => 'f44336'
    ]));
    $fileContent = $response->getContent();
    $response2 = $this->get(route('generateInitials', [
        'name' => 'koussay',
        'bgcolor' => 'f44336'
    ]));
    expect($fileContent)->toEqual($response2->getContent());
});


it('will generate different images when the bgcolor params is missing', function () {
    $response = $this->get(route('generateInitials', [
        'name' => 'koussay',
    ]));
    $fileContent = $response->getContent();
    $response2 = $this->get(route('generateInitials', [
        'name' => 'koussay',
    ]));
    expect($fileContent)->not()->toEqual($response2->getContent());
});




it('generate an image when the params are null', function () {
    $response = $this->get(route('generateInitials', [
        'name' => null,
        'bgcolor' => null,
        'color' => null,
        'size'=> NULL,
        'shape'=>null
    ]));

    $response->assertHeader('Content-Type', 'image/png');
});


it('generate an image with false data', function () {
    $response = $this->get(route('generateInitials', [
        'name'=>'     a',
        'bgcolor'=>'helloworld',
        'color' => 'doge_coin_to_the_moon',
        'size' => 555,
        'shape' => 'triangle'
    ]));
    $response->assertHeader('Content-Type', 'image/png');
});


it('generates an image with 150px size when given size is over 512px or below 50px', function () {
    $response =$this->get(route('generateInitials', [
        'size' => 150,
        'bgcolor' => 'f44f44'
    ]));

    $imageToCompare = $response->getContent();
    $response =$this->get(route('generateInitials', [
        'size' => 513,
        'bgcolor' => 'f44f44'
    ]));

    $imageOver512px = $response->getContent();

    $response2 =$this->get(route('generateInitials', [
        'size' => 49,
        'bgcolor' => 'f44f44'
    ]));

    $imageBelow50xp = $response2->getContent();

    expect($imageOver512px)->toEqual($imageToCompare);
    expect($imageBelow50xp)->toEqual($imageToCompare);
    expect($imageBelow50xp)->toEqual($imageOver512px);
});






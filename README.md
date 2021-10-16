<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Thanks again! Now go create something AMAZING! :D
***HelloWorld
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]



<!-- PROJECT LOGO -->
<br />
<p align="center">
  <h2 align="center">Avatary</h2>

  <p align="center">
    Simple avatar generator
    <br />
    <a href="https://github.com/prettifystudio/avatary"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://avatary.prettify.studio/">View Demo</a>
    ·
    <a href="https://github.com/prettifystudio/avatary/issues">Report Bug</a>
    ·
    <a href="https://github.com/prettifystudio/avatary/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

It's just a simple project to generate avatars using names. For the moment it supports only english and arabic names.


### Built With

This project is made with the awesome frameworks/packages 
* [Laravel](https://laravel.com)
* [TailwindCSS](https://tailwindcss.com/)
* [Intervention Images](http://image.intervention.io/)

And this awesome Readme is made possible with :
* [Best README Template](https://github.com/othneildrew/Best-README-Template)



<!-- GETTING STARTED -->
## Getting Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Prerequisites

Since Avatary is built using Laravel 8, so the prerequisites are the same as the framework

* PHP >= 8.0
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* GD PHP Extension



### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/prettifystudio/avatary.git
   ```
2. Install Composer packages
   ```sh
   composer install
   ```
3. Copy the environment file & edit it accordingly
   ```sh
   cp .env.example .env
   ```

4. Generate application key
   ```sh
   php artisan key:generate
   ```

5. Linking Storage folder to public
   ```sh
   php artisan storage:link
   ```
6. Serve the application
   ```sh
   php artisan serve
   ```





<!-- USAGE EXAMPLES -->
## Usage

Using the API is simple, all you have to do is hit the [Initials API](https://avatary.prettify.studio/api/initials).
Without any parameter, the endpoint will generate an image with random background color.

But you can customize it as you need.

### Name 
If you want to customize the name, you can hit the endpoint with the query param ```name``` .

The default value is "John Doe" 
```
GET https://avatary.prettify.studio/api/initials?name=Koussay Fridhi
```

### Background Color
Background colors, are generated randomly, but you can speacify it as follows:

_The Background color must be in hexadecimal form, otherwise the system will throw an exception_

```
GET https://avatary.prettify.studio/api/initials?bgcolor=f43f43
```

### Size
The default size of the generated image is 260px, but you can specify a custom size

```
GET https://avatary.prettify.studio/api/initials?size=75
```
This will generate a 75*75 px image. 
Generally you may want to use a smaller size so the request is handled quickly.


### Text Color
You may want also to specify the text color, inside the image.

The default value is <pre>#fafafa</pre> 


_The text color must be in hexadecimal form, otherwise the system will throw an exception_


```
GET https://avatary.prettify.studio/api/initials?color=fafafa
```

### Shape
The API will generate 2 shapes, a circle or a square. The default one is the circle, but you can get a square shape
```
GET https://avatary.prettify.studio/api/initials?shape=square
```

### Full request 

```
GET https://avatary.prettify.studio/api/initials?name=Koussay%20Fridhi&bgcolor=f44336&shape=circle&color=fafafa&size=250
```
This request will generate the following image

<section align="center">
    <img src="https://avatary.prettify.studio/api/initials?name=Koussay%20Fridhi&bgcolor=f44336&shape=circle&color=fafafa&size=120">
</section>

You can use any param you want, for example you want only the name and the size,

```
GET https://avatary.prettify.studio/api/initials?name=Koussay%20Fridhi&size=125
```



## Testing

This application is using PestPHP for testing. In order to run the test suite
```bash
./vendor/bin/pest
```



<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/prettifystudio/avatary/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Your Name - [@PrettifyStudio](https://twitter.com/prettifystudio) - hey@prettify.studio

Project Link: [https://github.com/prettifystudio/avatary](https://github.com/prettifystudio/avatary)









<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/prettifystudio/avatary.svg?style=for-the-badge
[contributors-url]: https://github.com/prettifystudio/avatary/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/prettifystudio/avatary.svg?style=for-the-badge
[forks-url]: https://github.com/prettifystudio/avatary/network/members
[stars-shield]: https://img.shields.io/github/stars/prettifystudio/avatary.svg?style=for-the-badge
[stars-url]: https://github.com/prettifystudio/avatary/stargazers
[issues-shield]: https://img.shields.io/github/issues/prettifystudio/avatary.svg?style=for-the-badge
[issues-url]: https://github.com/prettifystudio/avatary/issues
[license-shield]: https://img.shields.io/github/license/prettifystudio/avatary.svg?style=for-the-badge
[license-url]: https://github.com/prettifystudio/avatary/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/othneildrew
[product-screenshot]: images/screenshot.png

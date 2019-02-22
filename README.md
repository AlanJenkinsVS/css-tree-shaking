# CSS Tree Shaking
Demo setup to explore how we might leverage a Tailwind-like utility framework during latter stages of our build process.

This is just a proof of concept.

## Objective
Use a utility CSS framework like Tailwind in a multi-server environment where we need to be able to:

* Customise branding colours per site
* Minimise CSS payload on a page by page basis (by stripping out unused selectors)
* ...


## Setup
Uses PHP's built-in web server. In root directory just run:

`php -S localhost:8080`

## Dependencies
Makes use of the following dependencies loaded via Composer

* [https://github.com/leafo/scssphp](https://github.com/leafo/scssphp)
* [https://github.com/sabberworm/PHP-CSS-Parser/](https://github.com/sabberworm/PHP-CSS-Parser/)
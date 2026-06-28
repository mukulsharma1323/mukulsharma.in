# MukulSharma.in

[![Mukul Sharma portfolio](img/optimized/intro-bg.webp)](https://mukulsharma.in)

Personal portfolio and blog website for Mukul Sharma, built with PHP and hosted at **[mukulsharma.in](https://mukulsharma.in)**.

## Features

- Responsive personal portfolio
- About, expertise, portfolio, blog, and experience sections
- SQLite-powered blog
- Password-protected CMS for creating and editing posts
- Draft and published post states
- Cover-image uploads with automatic WebP optimization when supported
- SEO metadata and social sharing tags

## Tech stack

- PHP
- SQLite / PDO
- HTML5 and CSS3
- Bootstrap
- JavaScript and jQuery

## Run locally

1. Place the project inside your XAMPP `htdocs` directory.
2. Start Apache in XAMPP.
3. Make sure PHP has the `pdo_sqlite`, `sqlite3`, `fileinfo`, and `gd` extensions enabled.
4. Open the project in your browser, for example:

   ```text
   http://localhost/mukulsharma/
   ```

The blog database and tables are initialized automatically in `data/blogs.sqlite` when the application first runs.

## Blog CMS

Open the CMS at:

```text
http://localhost/mukulsharma/cms/
```

On first use, the CMS asks you to create an administrator password. From the dashboard you can create, edit, publish, and delete blog posts or update blog settings.

Uploaded JPG, PNG, and WebP images can be up to 5 MB. When the server supports WebP through PHP GD, images are resized and optimized automatically; otherwise the validated original image is retained.

## Live website

**[https://mukulsharma.in](https://mukulsharma.in)**

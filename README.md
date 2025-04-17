# OneNetly - Modern Content Platform

A professional, Medium-style blog platform with automatic content generation capabilities. This platform features a clean design, content organization by categories, and a sophisticated reading experience.

## Features

- Professional Medium-inspired design
- Automatic content generation capabilities
- Queue system for background processing
- Multiple API key support with rotation
- Image sourcing from Pixabay and Unsplash
- Category-based organization
- Visitor hit tracking and statistics
- Responsive design using Tailwind CSS
- Search functionality and random post discovery

## Setup Instructions

### 1. Database Configuration

Edit `config/app.php` to set your database credentials:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'onenetly_blog');
define('DB_USER', 'root'); // Replace with your database user
define('DB_PASS', '');     // Replace with your database password
```

### 2. API Keys Configuration

In the same `config/app.php` file, add your API keys:

```php
define('OPENROUTER_API_KEYS', [
    'key1', // Replace with your actual API keys
    'key2',
    'key3'
]);

define('PIXABAY_API_KEY', 'YOUR_PIXABAY_API_KEY');
define('UNSPLASH_API_KEY', 'YOUR_UNSPLASH_API_KEY');
```

### 3. Initial Setup

Run the setup script to create the database, tables, and add sample categories:

```bash
php utils/setup.php
```

## Content Management

### Generating New Content

The platform includes automated content generation. Use these commands to create new posts:

```bash
# Generate a single post for a random category
php cron/generate_posts.php

# Process the content generation queue
php cron/process_queue.php
```

### Force Content Generation

To immediately generate content regardless of existing queue:

```bash
# Force generate a single post
php cron/generate_posts.php --force

# Force generate posts for all categories
php cron/generate_for_all_categories.php --force

# Using convenience scripts
./cron/force_generate.sh  # On Linux/Mac
cron\force_generate.bat   # On Windows
```

### Updating Post Formatting

To enhance the formatting of existing posts:

```bash
# List all posts
php utils/regenerate_all_posts.php --list

# Regenerate a specific post (replace X with post ID)
php utils/regenerate_post.php X

# Regenerate all posts
php utils/regenerate_all_posts.php --all

# Or use the simplified batch utility on Windows
seo_refresh_posts.bat
```

## SEO Features

The platform includes multiple SEO enhancement features:

- Semantic HTML structure with proper heading hierarchy
- Schema.org structured data markup
- OpenGraph and Twitter Card meta tags
- Customizable meta descriptions and keywords
- Table of contents generation
- Reading time estimates
- Clean URL structure

## Customization

To customize the appearance:

1. Edit the CSS styles in `views/layout/header.php`
2. Modify the site name and other global settings in `config/app.php`
3. Update templates in the `views` directory

## License

This project is licensed under the MIT license.


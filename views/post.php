<?php 
$pageTitle = $post['title'];
$pageDescription = createExcerpt($post['content'], 160);
$pageKeywords = $post['keywords'];
require_once 'layout/header.php';

// Generate a table of contents from h2 headings
function generateTableOfContents($content) {
    $toc = '';
    if (preg_match_all('/<h2[^>]*>(.*?)<\/h2>/is', $content, $matches)) {
        $toc .= '<div class="table-of-contents">';
        $toc .= '<h3>In this article</h3>';
        $toc .= '<ol>';
        
        foreach ($matches[1] as $index => $heading) {
            $id = 'section-' . ($index + 1);
            $content = preg_replace(
                '/(<h2[^>]*>'.preg_quote($heading, '/').'<\/h2>)/is',
                '<h2 id="'.$id.'">'.$heading.'</h2>',
                $content, 1
            );
            $toc .= '<li><a href="#'.$id.'">'.strip_tags($heading).'</a></li>';
        }
        
        $toc .= '</ol>';
        $toc .= '</div>';
    }
    
    return ['toc' => $toc, 'content' => $content];
}

// Mark the first paragraph for drop cap styling
function addFirstParagraphClass($content) {
    return preg_replace('/<p>/', '<p class="first-paragraph">', $content, 1);
}

// Extract headings and update content with TOC
$tocData = generateTableOfContents($post['content']);
$tableOfContents = $tocData['toc'];
$enhancedContent = $tocData['content'];
$enhancedContent = addFirstParagraphClass($enhancedContent);

// Calculate reading time
$readingTime = calculateReadingTime($post['content']);

// Get post counts per category for the sidebar
$categoryCounts = [];
foreach ($categories as $cat) {
    $categoryCounts[$cat['id']] = $postModel->getTotalCountByCategory($cat['id']);
}

// Get popular posts from the last 7 days
$popularPosts = $postModel->getPopularPostsFromPeriod(7, 3);
if (empty($popularPosts)) {
    $popularPosts = array_slice($relatedPosts ?? [], 0, 3);
}

// Get trending posts from the last 24 hours
$trendingPosts = $postModel->getPopularPostsFromPeriod(1, 3);

// Sidebar helper function to generate consistent containers
function getSidebarContainer($title, $icon = null, $extraClass = '', $indicator = null) {
    $iconHtml = '';
    if ($icon) {
        $iconHtml = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 ' . $icon['color'] . '" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="' . $icon['path'] . '" />
        </svg>';
    }
    
    $indicatorHtml = '';
    if ($indicator) {
        $indicatorHtml = '<span class="ml-2 inline-block w-2 h-2 ' . $indicator['class'] . '"></span>';
    }
    
    return '
    <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6 ' . $extraClass . '">
        <div class="px-6 py-5 border-b border-gray-100">
            <h3 class="text-base font-semibold text-gray-800 flex items-center">
                ' . $iconHtml . '
                ' . $title . '
                ' . $indicatorHtml . '
            </h3>
        </div>
        <div class="p-6">';
}
?>

<div class="container mx-auto px-4 md:px-6 lg:px-8 max-w-7xl">
    <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
        <!-- Main content area -->
        <div class="lg:col-span-2 xl:col-span-3">
            <div class="mb-8">
                <img src="<?= $post['featured_image'] ?>" alt="<?= htmlspecialchars($post['title']) ?>" 
                     class="w-full h-auto object-cover rounded-lg" style="max-height: 500px;">
            </div>
            
            <article class="article-container">
                <div class="mb-4">
                    <a href="/category/<?= $post['category_slug'] ?>" 
                       class="inline-block px-3 py-1 text-sm font-medium text-white bg-green-600 rounded-full hover:bg-green-700 transition-colors">
                        <?= $post['category_name'] ?>
                    </a>
                </div>
                
                <h1 class="post-title"><?= htmlspecialchars($post['title']) ?></h1>
                
                <div class="article-meta">
                    <div>
                        <span><?= formatDate($post['created_at'], 'F j, Y') ?></span>
                        <span> · <?= $readingTime ?> min read</span>
                        <span> · <?= $post['views'] ?> views</span>
                    </div>
                    <div class="flex gap-3">
                        <a href="https://twitter.com/intent/tweet?text=<?= urlencode($post['title']) ?>&url=<?= urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>" 
                           target="_blank" rel="noopener noreferrer" 
                           aria-label="Share on Twitter">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>" 
                           target="_blank" rel="noopener noreferrer" 
                           aria-label="Share on Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>
                        <button class="copy-link" data-url="<?= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" aria-label="Copy link to article">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <?= $tableOfContents ?>
                
                <div class="content" itemscope itemtype="https://schema.org/Article">
                    <meta itemprop="headline" content="<?= htmlspecialchars($post['title']) ?>">
                    <meta itemprop="datePublished" content="<?= date('c', strtotime($post['created_at'])) ?>">
                    <meta itemprop="dateModified" content="<?= date('c', strtotime($post['updated_at'])) ?>">
                    
                    <div itemprop="articleBody">
                        <?= $enhancedContent ?>
                    </div>
                </div>
                
                <div class="article-actions">
                    <button class="action-button clap-button" aria-label="Clap for this article">
                        <svg width="24" height="24" viewBox="0 0 24 24" aria-label="clap">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.37.83L12 3.28l.63-2.45h-1.26zM15.42 1.84l-1.18-.39-.34 2.5 1.52-2.1zM9.76 1.45l-1.19.4 1.53 2.1-.34-2.5zM20.25 11.84l-2.5-4.4a1.42 1.42 0 0 0-.93-.64.96.96 0 0 0-.75.18c-.25.19-.4.42-.45.7l.05.05 2.35 4.13c1.62 2.95 1.1 5.78-1.52 8.4l-.46.41c1-.13 1.93-.6 2.78-1.45 2.7-2.7 2.51-5.59 1.43-7.38zM12.07 9.01c-.13-.69.08-1.3.57-1.77l-2.06-2.07a1.12 1.12 0 0 0-1.56 0c-.15.15-.22.34-.27.53L12.07 9z"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.74 8.3a1.13 1.13 0 0 0-.73-.5.67.67 0 0 0-.53.13c-.15.12-.59.46-.2 1.3l1.18 2.5a.45.45 0 0 1-.23.76.44.44 0 0 1-.48-.25L7.6 6.11a.82.82 0 1 0-1.15 1.15l3.64 3.64a.45.45 0 1 1-.63.63L5.83 7.9 4.8 6.86a.82.82 0 0 0-1.33.9c.04.1.1.18.18.26l1.02 1.03 3.65 3.64a.44.44 0 0 1-.15.73.44.44 0 0 1-.48-.1L4.05 9.68a.82.82 0 0 0-1.4.57.81.81 0 0 0 .24.58l1.53 1.54 2.3 2.28a.45.45 0 0 1-.64.63L3.8 13a.81.81 0 0 0-1.39.57c0 .22.09.43.24.58l4.4 4.4c2.8 2.8 5.5 4.12 8.68.94 2.27-2.28 2.71-4.6 1.34-7.1l-2.32-4.08z"></path>
                        </svg>
                    </button>
                    <div class="save-button action-button" aria-label="Save this article">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <path d="M17.5 1.25a.5.5 0 0 1 1 0v2.5H21a.5.5 0 0 1 0 1h-2.5v2.5a.5.5 0 0 1-1 0v-2.5H15a.5.5 0 0 1 0-1h2.5v-2.5zm-11 4.5a1 1 0 0 1 1-1H11a.5.5 0 0 0 0-1H7.5a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V5.75z"></path>
                        </svg>
                    </div>
                </div>
                
                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-3">Keywords:</h3>
                    <div class="tag-cloud">
                        <?php foreach (explode(',', $post['keywords']) as $keyword): ?>
                            <span class="tag"><?= trim($keyword) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </article>
            
            <div class="my-10 py-4">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515"
                     crossorigin="anonymous"></script>
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9354746037074515"
                     data-ad-slot="4878379783"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            
            <!-- Disqus Comments -->
            <div class="my-10 bg-white rounded-lg shadow-sm p-6">
                <div id="disqus_thread"></div>
                <script>
                    var disqus_config = function () {
                        this.page.url = '<?= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>';
                        this.page.identifier = '<?= $post['id'] ?>';
                        this.page.title = '<?= htmlspecialchars($post['title'], ENT_QUOTES) ?>';
                    };
                    (function() {
                        var d = document, s = d.createElement('script');
                        s.src = 'https://<?= DISQUS_SHORTNAME ?>.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
            </div>

            <?php if (!empty($relatedPosts)): ?>
            <div class="mt-12 mb-10">
                <h2 class="text-2xl font-bold mb-6 font-serif">More like this</h2>
                <div class="card-grid">
                    <?php foreach ($relatedPosts as $relatedPost): ?>
                    <div class="card">
                        <a href="/post/<?= $relatedPost['slug'] ?>">
                            <img src="<?= $relatedPost['featured_image'] ?>" alt="<?= htmlspecialchars($relatedPost['title']) ?>" class="card-image">
                            <div class="card-content">
                                <h3 class="card-title"><?= htmlspecialchars($relatedPost['title']) ?></h3>
                                <p class="text-sm text-gray-500 mt-2"><?= formatDate($relatedPost['created_at']) ?> · <?= calculateReadingTime($relatedPost['content']) ?> min read</p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="sidebar">
                <!-- Trending Posts -->
                <div class="sidebar-box">
                    <div class="flex items-center mb-4 pb-2 border-b border-gray-100">
                        <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <h3 class="font-semibold text-gray-900">Trending Now</h3>
                    </div>
                    <div class="divide-y divide-gray-100">
                        <?php foreach ($trendingPosts as $index => $trendingPost): ?>
                            <a href="/post/<?= $trendingPost['slug'] ?>" class="block py-4 group hover:bg-gray-50 transition-colors first:pt-0 last:pb-0">
                                <div class="flex gap-4">
                                    <span class="text-2xl font-serif text-gray-200 group-hover:text-gray-300 transition-colors"><?= sprintf('%02d', $index + 1) ?></span>
                                    <div>
                                        <h4 class="font-medium text-gray-900 group-hover:text-green-600 transition-colors line-clamp-2"><?= htmlspecialchars($trendingPost['title']) ?></h4>
                                        <p class="text-sm text-gray-500 mt-1">
                                            <?= formatDate($trendingPost['created_at']) ?> · <?= calculateReadingTime($trendingPost['content']) ?> min read
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Popular Posts -->
                <div class="sidebar-box">
                    <div class="flex items-center mb-4 pb-2 border-b border-gray-100">
                        <svg class="w-5 h-5 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        <h3 class="font-semibold text-gray-900">Most Popular</h3>
                    </div>
                    <div class="divide-y divide-gray-100">
                        <?php foreach ($popularPosts as $popularPost): ?>
                            <a href="/post/<?= $popularPost['slug'] ?>" class="block py-4 group hover:bg-gray-50 transition-colors first:pt-0 last:pb-0">
                                <h4 class="font-medium text-gray-900 group-hover:text-green-600 transition-colors line-clamp-2"><?= htmlspecialchars($popularPost['title']) ?></h4>
                                <p class="text-sm text-gray-500 mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <?= $popularPost['views'] ?> views · <?= calculateReadingTime($popularPost['content']) ?> min read
                                </p>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Categories -->
                <div class="sidebar-box">
                    <div class="flex items-center mb-4 pb-2 border-b border-gray-100">
                        <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <h3 class="font-semibold text-gray-900">Discover Topics</h3>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($categories as $category): ?>
                            <a href="/category/<?= $category['slug'] ?>" class="tag">
                                <?= $category['name'] ?>
                                <?php if (isset($categoryCounts[$category['id']])): ?>
                                    <span class="opacity-60"><?= $categoryCounts[$category['id']] ?></span>
                                <?php endif; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.copy-link')?.addEventListener('click', function() {
        const url = this.getAttribute('data-url');
        navigator.clipboard.writeText(url).then(function() {
            alert('Link copied to clipboard!');
        });
    });
    
    document.querySelector('.clap-button')?.addEventListener('click', function() {
        this.classList.toggle('active');
        if (this.classList.contains('active')) {
            this.style.backgroundColor = 'rgba(3, 168, 124, 0.1)';
            this.style.borderColor = 'rgba(3, 168, 124, 1)';
        } else {
            this.style.backgroundColor = 'transparent';
            this.style.borderColor = 'var(--border-light)';
        }
    });
});
</script>

<?php require_once 'layout/footer.php'; ?>

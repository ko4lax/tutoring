     1|<?php
     2|
     3|namespace Config;
     4|
     5|use CodeIgniter\Config\Filters as BaseFilters;
     6|use CodeIgniter\Filters\Cors;
     7|use CodeIgniter\Filters\CSRF;
     8|use CodeIgniter\Filters\DebugToolbar;
     9|use CodeIgniter\Filters\ForceHTTPS;
    10|use CodeIgniter\Filters\Honeypot;
    11|use CodeIgniter\Filters\InvalidChars;
    12|use CodeIgniter\Filters\PageCache;
    13|use CodeIgniter\Filters\PerformanceMetrics;
    14|use CodeIgniter\Filters\SecureHeaders;
    15|use App\Filters\AuthFilter;
    16|
    17|class Filters extends BaseFilters
    18|{
    19|    /**
    20|     * Configures aliases for Filter classes to
    21|     * make reading things nicer and simpler.
    22|     *
    23|     * @var array<string, class-string|list<class-string>>
    24|     *
    25|     * [filter_name => classname]
    26|     * or [filter_name => [classname1, classname2, ...]]
    27|     */
    28|    public array $aliases = [
    29|        'csrf'          => CSRF::class,
    30|        'toolbar'       => DebugToolbar::class,
    31|        'honeypot'      => Honeypot::class,
    32|        'invalidchars'  => InvalidChars::class,
    33|        'secureheaders' => SecureHeaders::class,
    34|        'cors'          => Cors::class,
    35|        'forcehttps'    => ForceHTTPS::class,
    36|        'pagecache'     => PageCache::class,
    37|        'performance'   => PerformanceMetrics::class,
    38|        'auth'          => AuthFilter::class,
    39|    ];
    40|
    41|    /**
    42|     * List of special required filters.
    43|     *
    44|     * The filters listed here are special. They are applied before and after
    45|     * other kinds of filters, and always applied even if a route does not exist.
    46|     *
    47|     * Filters set by default provide framework functionality. If removed,
    48|     * those functions will no longer work.
    49|     *
    50|     * @see https://codeigniter.com/user_guide/incoming/filters.html#provided-filters
    51|     *
    52|     * @var array{before: list<string>, after: list<string>}
    53|     */
    54|    public array $required = [
    55|        'before' => [
    56|            'forcehttps', // Force Global Secure Requests
    57|            'pagecache',  // Web Page Caching
    58|        ],
    59|        'after' => [
    60|            'pagecache',   // Web Page Caching
    61|            'performance', // Performance Metrics
    62|            // 'toolbar',     // Debug Toolbar
    63|        ],
    64|    ];
    65|
    66|    /**
    67|     * List of filter aliases that are always
    68|     * applied before and after every request.
    69|     *
    70|     * @var array{
    71|     *     before: array<string, array{except: list<string>|string}>|list<string>,
    72|     *     after: array<string, array{except: list<string>|string}>|list<string>
    73|     * }
    74|     */
    75|    public array $globals = [
    76|        'before' => [
    77|            // 'honeypot',
    78|            // 'csrf',
    79|            // 'invalidchars',
    80|        ],
    81|        'after' => [
    82|            // 'honeypot',
    83|            // 'secureheaders',
    84|        ],
    85|    ];
    86|
    87|    /**
    88|     * List of filter aliases that works on a
    89|     * particular HTTP method (GET, POST, etc.).
    90|     *
    91|     * Example:
    92|     * 'POST' => ['foo', 'bar']
    93|     *
    94|     * If you use this, you should disable auto-routing because auto-routing
    95|     * permits any HTTP method to access a controller. Accessing the controller
    96|     * with a method you don't expect could bypass the filter.
    97|     *
    98|     * @var array<string, list<string>>
    99|     */
   100|    public array $methods = [];
   101|
   102|    /**
   103|     * List of filter aliases that should run on any
   104|     * before or after URI patterns.
   105|     *
   106|     * Example:
   107|     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
   108|     *
   109|     * @var array<string, array<string, list<string>>>
   110|     */
   111|    public array $filters = [
   112|        'auth' => ['before' => ['admin', 'admin/*']],
   113|    ];
   114|}
   115|
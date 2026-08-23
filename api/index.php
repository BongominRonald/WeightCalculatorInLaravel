<?php

/*
|--------------------------------------------------------------------------
| Vercel Serverless Entry Point
|--------------------------------------------------------------------------
| Vercel's vercel-php runtime executes PHP through functions in /api.
| Requiring Laravel's standard front controller keeps a single request
| pipeline; all HTTP traffic is rewritten here via vercel.json while
| static assets continue to be served straight from /public.
|
| The lambda filesystem is READ-ONLY except for /tmp, and the generated
| bootstrap/cache manifests are never part of the bundle. Before Laravel
| boots we therefore seed a writable bootstrap directory (so package and
| service manifests can regenerate there) and pre-create the storage
| folders the framework expects. Paths are controlled by the
| APP_BOOTSTRAP_PATH and APP_STORAGE environment variables.
*/
$sourceBootstrap = __DIR__ . '/../bootstrap';

if (($targetBootstrap = getenv('APP_BOOTSTRAP_PATH')) && $targetBootstrap !== $sourceBootstrap) {
    if (! is_dir($targetBootstrap)) {
        @mkdir($targetBootstrap, 0777, true);
    }

    // PackageManifest requires this exact subdirectory to exist and be
    // writable so it can regenerate packages.php / services.php.
    if (! is_dir($targetBootstrap.'/cache')) {
        @mkdir($targetBootstrap.'/cache', 0777, true);
    }

    // The framework loads application providers from this file.
    foreach (['providers.php'] as $file) {
        if (! file_exists($targetBootstrap.'/'.$file) && is_file($sourceBootstrap.'/'.$file)) {
            @copy($sourceBootstrap.'/'.$file, $targetBootstrap.'/'.$file);
        }
    }
}

if ($storage = getenv('APP_STORAGE')) {
    foreach (['framework/cache', 'framework/sessions', 'framework/views', 'logs'] as $dir) {
        if (! is_dir($storage.'/'.$dir)) {
            @mkdir($storage.'/'.$dir, 0777, true);
        }
    }
}

require __DIR__ . '/../public/index.php';

<?php

/*
|--------------------------------------------------------------------------
| Vercel Serverless Entry Point
|--------------------------------------------------------------------------
| Vercel's vercel-php runtime executes PHP through functions in /api.
| Requiring Laravel's standard front controller keeps a single request
| pipeline; all HTTP traffic is rewritten here via vercel.json while
| static assets continue to be served straight from /public.
*/
require __DIR__ . '/../public/index.php';

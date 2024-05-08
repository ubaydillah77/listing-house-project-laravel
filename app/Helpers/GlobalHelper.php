<?php

// setSidebarActive
if (!function_exists('setSidebarActive')) {
    function setSidebarActive(array $routes): ?string
    {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }

        return null;
    }
}


// Get Youtube Thumbnail
if (!function_exists('getYtThumbnail')) {
    function getYtThumbnail(string $url): ?string
    {
        // The regex is from chatgpt
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';

        if (preg_match($pattern, $url, $matches)) {
            $id = $matches[1];

            return "https://img.youtube.com/vi/$id/mqdefault.jpg";
        }

        return null;
    }
}

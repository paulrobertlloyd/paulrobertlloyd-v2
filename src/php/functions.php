<?php
    // Specify a character set in HTTP header
    header("Content-Type: text/html; charset=UTF-8");

    // Specify an expires value in header
    $seconds_to_cache = 4800; // 80 minutes
    $ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
    header("Expires: $ts");
    header("Pragma: cache");
    header("Cache-Control: max-age=$seconds_to_cache");

    // Compile LESS styles
    function autoCompileLess($inputFile, $outputFile) {
        $cacheFile = $inputFile.".cache";

        if (file_exists($cacheFile)) {
            $cache = unserialize(file_get_contents($cacheFile));
        } else {
            $cache = $inputFile;
        }

        require_once($_SERVER['DOCUMENT_ROOT']."/_php/lessphp/lessc.inc.php");
        $less = new lessc;
        $newCache = $less->cachedCompile($cache);

        if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
            file_put_contents($cacheFile, serialize($newCache));
            file_put_contents($outputFile, $newCache["compiled"]);
        }
    }
    autoCompileLess($_SERVER['DOCUMENT_ROOT']."/_less/presentation.less", $_SERVER['DOCUMENT_ROOT']."/_css/presentation.css");
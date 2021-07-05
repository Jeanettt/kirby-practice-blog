<?php

use Kirby\Cms\App;
use ScssPhp\ScssPhp\Compiler;

Kirby::plugin('bartvandebiezen/kirby-scssphp', [
   'components' => [
	  'css' => function (App $kirby, string $url, $options = null): string {

			$root = realpath(__DIR__ . '/../../..');
			$CSSRelativeURL = Url::path($url, false);
			$CSSRootURL = $root . DS . $CSSRelativeURL;
			$SCSSRelativeURL = str_replace('/css/', '/scss/', str_replace('.css', '.scss', $CSSRelativeURL));
			$SCSSRootURL = $root . DS . $SCSSRelativeURL;
			$SCSSDirectory = $root . DS . 'assets/scss/';
			$CSSDirectory = $root . DS . 'assets/css/';

			// If CSS and SCSS cannot be found, change to default.
			if(!file_exists($SCSSRootURL) && !file_exists($CSSRootURL)) {
				$CSSRelativeURL = 'assets/css/default.css';
				$CSSRootURL = $root . DS . $CSSRelativeURL;
				$SCSSRelativeURL = str_replace('/css/', '/scss/', str_replace('.css', '.scss', $CSSRelativeURL));
				$SCSSRootURL = $root . DS . $SCSSRelativeURL;
			}

			// If the SCSS file doesn't exist, copy contents of CSS file for nice on boarding.
			if(!file_exists($SCSSRootURL)) {
				if (!file_exists($SCSSDirectory)) {
					mkdir($SCSSDirectory, 0755, true);
				}
				touch($SCSSRootURL, mktime(0, 0, 0, date("m"), date("d"),  date("Y")-10));
				if(file_exists($CSSRootURL)) {
					$buffer = file_get_contents($CSSRootURL);
					file_put_contents($SCSSRootURL, $buffer);
				}
			}

			// If the CSS file doesn't exist create it so we can write to it.
			if(!file_exists($CSSRootURL)) {
				if (!file_exists($CSSDirectory)) {
					mkdir($CSSDirectory, 0755, true);
				}
				touch($CSSRootURL, mktime(0, 0, 0, date("m"), date("d"),  date("Y")-10));
			}

			// For when the plugin should check if partials are changed. If any partial is newer than the main SCSS file, the main SCSS file will be 'touched'. This will trigger the compiler later on, on this server and also on another environment when synced.
			if(option('scssNestedCheck') === true) {
				$SCSSPartials = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($SCSSDirectory));
				foreach ($SCSSPartials as $SCSSPartial) {
					if (pathinfo($SCSSPartial, PATHINFO_EXTENSION) == "scss" && filemtime($SCSSPartial) > filemtime($SCSSRootURL)) {
						touch ($SCSSRootURL);
						clearstatcache();
						break;
					}
				}
			}

			// Update CSS when needed.
			if(filemtime($SCSSRootURL) > filemtime($CSSRootURL)) {

				// Activate library.
				require_once 'vendor/scssphp/scss.inc.php';
				$parser = new Compiler();

				// Setting compression provided by library.
				$parser->setFormatter('ScssPhp\ScssPhp\Formatter\Compressed');

				// Setting relative @import paths.
				$importPath = $root . '/assets/scss';
				$parser->addImportPath($importPath);

				// Place SCSS file in buffer.
				$buffer = file_get_contents($SCSSRootURL);

				// Compile content in buffer.
				$buffer = $parser->compile($buffer);

				// Minify the CSS even further.
				require_once 'vendor/minify-css/minify.php';
				$buffer = minifyCSS($buffer);

				// Update CSS file.
				file_put_contents($CSSRootURL, $buffer);
			}

			if(file_exists($CSSRootURL)) {
				return url($CSSRelativeURL . '?' . filemtime($CSSRootURL));
			}

			return $CSSRelativeURL;
		}
	]
]);
?>

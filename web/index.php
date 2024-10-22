<?php

require_once 'vendor/autoload.php';

if( ! empty( $_FILES[ 'file' ][ 'tmp_name' ] ) ) {

	$filename = str_replace( '.po', '-converted.po', $_FILES[ 'file' ][ 'name' ] );
	$po       = file_get_contents( $_FILES[ 'file' ][ 'tmp_name' ] );

	convert( $po, $filename );

}

if ( ! empty( $_POST['url'] ) ) {

	// Parse URL and build URL for export.
	$parsed_url         = parse_url( $_POST['url'] );
	$parsed_url['path'] = rtrim($parsed_url['path'], '/\\');

	$export_url = "{$parsed_url['scheme']}://{$parsed_url['host']}{$parsed_url['path']}/export-translations/";

	// Provide the converted filename for download.
	$project_path = str_replace( [ '/projects/', '/' ], [ '', '-' ], $parsed_url['path'] );
	$filename     = "{$project_path}-converted.po";

	if(isset($parsed_url['query'])) {
		$export_url .= '?' . $parsed_url['query'];
	}

	if(false === strpos($export_url, '?')) {
		$export_url .= '?format=po';
	} else {
		$export_url .= '&format=po';
	}

	// Get the PO content.
	$po = file_get_contents($export_url);

	convert( $po, $filename );

}

function convert( $po, $filename ): void {

	if(empty($po)) {
		die('no input');
	}

	// Convert translations into a Translations collection.
	$translations = new Gettext\Translations();
	Gettext\Extractors\Po::fromString( $po, $translations );

	$project         = $translations->getHeader( 'Project-Id-Version' );
	$is_core_project = 0 === strpos( $project, 'WordPress - ' );

	// Do special replacement for WordPress core projects.
	if ( $is_core_project ) {
		$number_format_thousands_sep = $translations->find( '', 'number_format_thousands_sep' );
		if ( $number_format_thousands_sep ) {
			$number_format_thousands_sep->setTranslation( '\'' );
		}

		$number_format_decimal_point = $translations->find( '', 'number_format_decimal_point' );
		if ( $number_format_decimal_point ) {
			$number_format_decimal_point->setTranslation( '.' );
		}

		$html_lang_attribute = $translations->find( '', 'html_lang_attribute' );
		if ( $html_lang_attribute ) {
			$html_lang_attribute->setTranslation( 'de-CH' );
		}
	}

	// Loop over translations and do the replacements.
	foreach ( $translations as $translation ) {
		$translation_singular = $translation->getTranslation();
		$translation_singular = do_replacements( $translation_singular );

		$translation->setTranslation( $translation_singular );

		if ( $translation->hasPlural() ) {
			$plural_translations = $translation->getPluralTranslations();
			foreach ( $plural_translations as &$plural_translation ) {
				$plural_translation = do_replacements( $plural_translation );
			}

			$translation->setPluralTranslations( $plural_translations );
		}
	}

	// Customize headers.
	$translations->setLanguage( 'de-CH' );
	$translations->setHeader( 'X-Generator', 'PO Converter for de_DE 2 de_CH' );

	header( 'Content-Description: File Transfer' );
	header( 'Content-Disposition: attachment; filename=' . $filename );
	header( 'Content-Type: text/x-gettext-translation; charset=UTF-8' );

	echo Gettext\Generators\Po::toString( $translations );
	exit;

}

/**
 * Do the replacement dance.
 *
 * @param string $string String to convert.
 * @return string Converted strings.
 */
function do_replacements( string $string ): string {

    return str_replace(
		[
			'ß',
			'Fahrrad',
			'Europe/Berlin', // Timezone.
			'Berlin, Köln, Stuttgart', // Events dashboard widget.
			'Berlin, Hamburg, Stuttgart', // Events dashboard widget.
			'Berlin', // First page content.
			'Hamburg', // Events dashboard widget
			'https://de.wordpress.org/plugins/', // Plugin directory.
			'https://de.wordpress.org/themes/', // Theme directory.
			'„',
			'“',
			'&#8218;', // opening curly single quote ‚
			'&#8216;', // closing curly single quote ‘
			'&#8222;', // opening curly double quote „
			'&#8220;', // closing curly double quote “
		],
		[
			'ss',
			'Velo',
			'Europe/Zurich',
			'Bern, Basel, Zürich',
			'Bern, Biel, Zürich',
			'Zürich',
			'Bern',
			'https://de-ch.wordpress.org/plugins/',
			'https://de-ch.wordpress.org/themes/',
			'«',
			'»',
			'&#8249;', // ‹
			'&#8250;', // ›
			'&#171;', // «
			'&#187;', // »
		],
		$string
	);

}

?>
<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <title>PO Converter for de_DE 2 de_CH</title>
    <style>
      .footer {
        background-color: #f5f5f5;
      }
    </style>
</head>
<body class="d-flex flex-column h-100">
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">PO Converter for de_DE 2 de_CH</h1>
        <p>Enter the project URL or upload your local po file.</p>
        <form method="post" action="" class="mt-5" enctype="multipart/form-data">
            <div class="form-group">
                <label for="url">Project URL</label>
                <input type="url" class="form-control" id="url" name="url" aria-describedby="url-help" placeholder="Enter URL">
                <small id="url-help" class="form-text text-muted">Example: <code>https://translate.wordpress.org/projects/wp/dev/de/default/</code></small>
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="file">Upload po-file</label>
                <input type="file" class="form-control" id="file" name="file" aria-describedby="file-help" accept=".po">
                <small id="url-help" class="form-text text-muted">Example: <code>wordpress-seo-de.po</code></small>
                <div id="fileInfo"></div>
                <script>
                    document.getElementById('file').addEventListener('change', function(event) {
                        const file = event.target.files[0];
                        document.getElementById('fileInfo').innerHTML = `<p>File Size: ${file.size} bytes</p>`;
                    });
                </script>
            </div>
            <button type="submit" class="btn btn-primary">Start converting</button>
        </form>
    </div>
</main>
<footer class="footer mt-auto py-3">
    <div class="container text-center">
        <span class="text-muted">🇨🇭 WordCamp Zurich 2019 | <a href="https://github.com/WPSwitzerland/wordpress-de-ch">GitHub</a></span><br>
        <span class="text-muted">🇨🇭 Openstream Internet Solutions 2024 | <a href="https://github.com/WPSwitzerland/wordpress-de-ch">GitHub</a></span>
    </div>
</footer>
</body>
</html>

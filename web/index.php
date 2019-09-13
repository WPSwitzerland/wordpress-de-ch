<?php
require_once 'vendor/autoload.php';

/**
 * Do the replacement dance.
 *
 * @param string $string String to convert.
 * @return string Converted strings.
 */
function do_replacements( string $string ): string {
	$string = str_replace(
		[
			'ß',
			'Fahrrad',
			'„',
			'“',
			'‚',
			'‘',
			'&#8218;', // opening curly single quote ‚
			'&#8216;', // closing curly single quote ‘
			'&#8222;', // opening curly double quote „
			'&#8220;', // closing curly double quote “
		],
		[
			'ss',
			'Velo',
			'«',
			'»',
			'‹',
			'›',
			'&#8249;', // ‹
			'&#8250;', // ›
			'&#171;', // «
			'&#187;', // »
		],
		$string
	);

	return $string;
}

if ( ! empty( $_POST ) ) {
	$url = $_POST['url'] ?? '';

	if ( empty( $url ) ) {
		die( 'no url' );
	}

	$parsed_url         = parse_url( $url );
	$parsed_url['path'] = rtrim( $parsed_url['path'], '/\\' );

	$export_url = "{$parsed_url['scheme']}://{$parsed_url['host']}{$parsed_url['path']}/export-translations/";

	if ( isset( $parsed_url['query'] ) ) {
		$export_url .= '?' . $parsed_url['query'];
	}

	if ( false === strpos( $export_url, '?' ) ) {
		$export_url .= '?format=po';
	} else {
		$export_url .= '&format=po';
	}

	$po = file_get_contents( $export_url );

	if ( empty( $po ) ) {
		die( 'no input' );
	}

	$translations = new Gettext\Translations();
	Gettext\Extractors\Po::fromString( $po, $translations );

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

	$translations->setLanguage( 'de-CH' );
	$translations->setHeader( 'X-Generator', 'PO Converter for de_DE 2 de_CH' );

	$project_path = str_replace( [ '/projects/', '/' ], [ '', '-' ], $parsed_url['path'] );
	$filename     = "{$project_path}-converted.po";

	header( 'Content-Description: File Transfer' );
	header( 'Content-Disposition: attachment; filename=' . $filename );
	header( 'Content-Type: text/x-gettext-translation; charset=UTF-8' );

	echo Gettext\Generators\Po::toString( $translations );
	exit;
}

?>
<!doctype html>
<html lang="en" class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
			<form method="post" action="" class="mt-5">
			<div class="form-group">
				<label for="url">Project URL</label>
				<input type="url" class="form-control" id="url" name="url" aria-describedby="url-help" placeholder="Enter URL">
				<small id="url-help" class="form-text text-muted">Example: <code>https://translate.wordpress.org/projects/wp/dev/de/default/</code></small>
			</div>
			<button type="submit" class="btn btn-primary">Download converted file</button>
		</form>
		</div>
	</main>
	<footer class="footer mt-auto py-3">
		<div class="container text-center">
			<span class="text-muted">🇨🇭 WordCamp Zurich 2019 | <a href="https://github.com/wpswitzerland">GitHub</a></span>
		</div>
	</footer>
</body>
</html>

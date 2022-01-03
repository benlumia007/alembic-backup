<?php 

function app_title() {
	$route = Benlumia007\Alembic\App::resolve( 'routes' )->currentRoute();
	$paged = '';
	$title_tag = 'p';

	if ( false !== strpos( $route, 'page/{number}' ) ) {
		$p = explode( '/', Benlumia007\Alembic\App::resolve( 'request' )->uri() );
		$paged = ': Page ' . e( array_pop( $p ) );
	}

	if ( '/' === $route || 'page/{number}' === $route ) {
		echo ! empty( $title ) ? e( $title ) . $paged : e( site_title() );
		$title_tag = 'h1';
	} else {
		echo ! empty( $title ) ? e( $title ) . $paged . ' &mdash; ' . e( site_title() ) : e( site_title() );
	}
}

function app_head() { ?>
    <title><?php e( app_title() ); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= e( asset( 'assets/css/screen.css' ) ) ?>" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script rel="javascript" src="<?= e( asset( 'assets/js/app.js' ) ) ?>"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Merriweather:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
<?php }

function app_categories() { ?>
	<div class="categories">
		<?php $categories = new Benlumia007\Alembic\ContentTypes\Entry\Entries( new Benlumia007\Alembic\ContentTypes\Entry\Locator( Benlumia007\Alembic\ContentTypes::get( 'category' )->path() ) ); ?>
		<h2 class="categories-title">Categories</h2>
		<?php foreach( $categories->all() as $category ) : ?>
			<ul>
					<li><a href="<?= $category->uri(); ?>"><?= $category->title(); ?></a></li>
				</ul>
		<?php endforeach; ?>
	</div>
<?php }

function app_archives() { ?>
	<div class="archives">
		<?php $current_year = $current_month = $current_day = '';
			$posts = new Benlumia007\Alembic\ContentTypes\Entry\Entries( new Benlumia007\Alembic\ContentTypes\Entry\Locator( Benlumia007\Alembic\ContentTypes::get( 'post' )->path() ),
				[
					'order' => 'desc',
					'number' => PHP_INT_MAX
				] 
			);
		?>
		<h2 class="archives-title">Archives</h2>

		<div class="o-content-width mt-8">

		<?php foreach ( $posts->all() as $post ) : ?>

		<?php
		$timestamp = is_numeric( $post->meta( 'date' ) ) ? $post->meta( 'date' ) : strtotime( $post->meta( 'date' ) );

		// Get the post's year and month. We need this to compare it with the previous post date.
		$year   = date( 'Y', $timestamp );
		$month  = date( 'm', $timestamp );
		$daynum = date( 'd', $timestamp );

		// If the current date doesn't match this post's date, we need extra formatting.
		if ( $current_year !== $year || $current_month !== $month ) :

		// Set the current year and month to this post's year and month.
		$current_year  = $year;
		$current_month = $month;
		$current_day   = '';

		echo '<ul>';
		printf(
		'<li><a class="text-gray-700 no-underline hover:underline border-0" href="%s">%s</a></li>',
		\Benlumia007\Alembic\App::resolve( 'content/types' )->get( 'post' )->uri( "{$year}/{$month}" ),
		date( 'F Y', $timestamp )
		);
		echo '</ul>';


		endif;
		endforeach
		?>
	</div>
<?php }
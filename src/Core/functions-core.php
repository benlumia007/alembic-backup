<?php 

function app_categories() { ?>
	<div class="categories">
		<?php
			$cats = [];
			$posts = new Benlumia007\Alembic\ContentTypes\Entry\Entries( new Benlumia007\Alembic\ContentTypes\Entry\Locator( Benlumia007\Alembic\ContentTypes::get( 'post' )->path() ) ); 
			
			foreach ( $posts->all() as $post ) {
				$metas = ( array ) $post->meta( 'category' );

				if ( $metas ) {
					$cats = array_merge( $cats, $metas );
				}
			}

			$cats = array_unique( $cats );

			$categories = new Benlumia007\Alembic\ContentTypes\Entry\Entries( new Benlumia007\Alembic\ContentTypes\Entry\Locator( Benlumia007\Alembic\ContentTypes::get( 'category' )->path(), [ 'slug' => $cats ] ) );
		?>

		<h2 class="categories-title">Categories</h2>
		<ul>
			<?php 
				foreach( $categories->all() as $category ) {
					foreach ( $cats as $cat ) {
						if ( $cat === strtolower( $category->title() ) ) {
							echo '<li><a href="' . $category->uri() . '">' . $category->title() . '</a></li>';
						}
					}
				}
			?>
		</ul>
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
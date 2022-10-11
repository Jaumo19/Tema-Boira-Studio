<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Curs_estiu_Sofia_Corradi
 */
get_header();

?>
	

	<main id="primary" class="site-main">
	<script>
		function descargar(){
			document.getElementById('boton_descargar').click();
		}
	</script>
	<?php
		
		$id = get_the_ID();
		$img = get_the_post_thumbnail_url($id,'medium_large');
		$nombre_img = 'prueba.png';
		echo "<figure><img src='".$img."' alt=''></figure>";
		echo "<h1>".get_field('titulo')."</h1>";
		echo "<p>".get_field('descripcion')."</p>";
		echo "<a name='descargar_img' id='boton_descargar' href='".$img."' download >Descargar Imagen</a>";
		?>
		<form method="post" onclick="descargar()">
			<input type="submit" value="Sum" name="Submit1"><br/><br/>
		</form>
		<?php
		if ($_POST){
			do_shortcode('[descarga-custom]');
			if (wp_get_current_user()->user_login != ""){
				do_shortcode('[descarga-custom]');
			}
		}
		?>
	

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

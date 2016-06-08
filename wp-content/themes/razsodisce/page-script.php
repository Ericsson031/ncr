<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package razsodisce
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );
				//$file = file_get_contents(get_template_directory().'/pages.xml');
				//$xml = simplexml_load_string($file);
				//$counter=0;
				/*
				
				$args = array(
				'posts_per_page'   => -1,
				'post_type'        => 'post',
				'suppress_filters' => true 
				);
				
				$posts_array = get_posts( $args );
				$xml = array('Miro Petek, SDS, proti novinarki RTV Slovenija Jeleni Aščič',
'Festival Ljubljana, zanj Darko Brlek, proti Tini Lešničar (Delo)',
'Katarina Jenko proti Bojanu Požarju (pozareport) in M. P. (Nova24TV)',
'Odvetniška zbornica Slovenije, zanjo predsednik Roman Završek, proti Kseniji Koren (K.K.) Slovenske novice',
'Leo Oblak, Infonet media d.d., proti internetnemu portalu www.slovenskenovice.si',
'KIK Textilien und Non-Food, zanj odvetniška pisarna Vladimir Bilić (v nadaljevanju KIK) ',
'proti novinarki POP TV Barbari Golub, odgovorni urednici informativnega in športnega programa ',
'Tjaši Slokar Kos in odgovornemu uredniku spletne strani 24ur.com Denisu Oštirju',
'Odvetniška zbornica proti Petri Janša, Demokracija',
'Leo Oblak, Infonet media d. d., proti spletnemu portalu www.vecer.com',
'Center za socialno delo Celje proti Simoni Šolinič',
'Matej Gačnik proti Urošu Urbasu Planet siol.net',
'Mestna občina Velenje proti novinarjema Dela Brigite Ferlič Žgajnar in Urbanu Červeku',
'Polka Boškovič proti Sebastjanu Jeretiču, odgovornemu uredniku spletnega portala Ekoper',
'Jaka Elikan proti odgovorni urednici Financ Simoni Toplak (Finance)',
'Boris Popovič proti novinarki RTV Slovenija Eugeniji Carl',
'Siapro d.o.o. in Franc Jezeršek, zanj odvetniška družba Avbreht, Zajc in partnerji, proti Tini Kodre, Dnevnik',
'Jožef Kerneža proti novinarju spletnega portala Požareport Bojanu Požarju',
'IGOR SAMOBOR, ki ga zastopa Pirc Musar ODVETNIŠKA DRUŽBA, proti ELVIRI MIŠE MIKLAVČIČ, novinarki tednika Reporter',
'Varuh človekovih pravic proti novinarki Petri Čertanc Mavsar in odgovornemu uredniku informativnega programa Tomažu Peroviču POP TV',
'Tatjana Kozel proti novinarju Slovenskih novic Alešu Andloviču',
'Avtohiša Kolmanič proti novinarju Svet24 Gabrijela Toplaka',
'Edi Mavsar, TV SLO, proti Portal Plus oz. odgovornemu uredniku Borisu Megliču',
'Polka Boškovič proti neimenovanemu avtorju in odgovornemu uredniku spletnega portala ekoper.si Sebastjanu Jeretiču',
'Hokejska zveza Slovenije proti Mateju Grošlju (Dnevnik)',
'Stranka Zares proti novinarki Suzani Perman in odgovorni urednici informativnega in športnega programa  POP TV Tjaši Slokar Kos',
'Poslanska skupina SMC (pritožnik) proti novinarjema Tomažu Bratožu in Urošu Slaku ter odgovornemu uredniku Bojanu Travnu, vsi Planet TV',
'Radio 1 d.o.o. (zanj Andrej Vodušek) proti Iztoku Umerju, Slovenske novice',
'Stranka SDS proti novinarju Pop TV Martinu Tomažinu in odgovorni urednici Tjaši Slokar Kos',
'Dejan Padovac proti Anuški Deliæ in Roku Kajzerju, Delo',
'Gregor Eller, zanj odvetnik Aleš Novak, proti novinarjema Slovenskih novic, podpisanima z inicialkama P. Š. in U. P.',
'Odvetniška pisarna Platovšek proti novinarki 24ur.com Špeli Zupan',
'Zavrnitev predloga za obnovo postopka',
'Božidar Špan (zanj odvetniška družba Vesel, Zupančič, Devjak, odvetnik Luka Zupančič) proti Mihi Drozgu, Darji Zgonc, Petri Kerčmar, Janiju Muhiču in Tjaši Slokar Kos – vsi Pro Plus.',
'Leo Oblak proti novinarki Dnevnika Mojci Furlan-Rus',
'Leo Oblak proti novinarju Dela Marku Jakopcu ',
'Univerzitetni klinični center Ljubljana proti Požareport.si',
'Leo Oblak proti novinarju Slovenskih novic A. K.',
'Janez Kurbus proti Dejanu Karbi in Romani Dobnikar Šeruga (Delo)',
'Univerzitetni klinični center Ljubljana proti Andreji Rednak in Dejanu Steinbuchu, Finance',
'Društvo Iskra proti Portalu Plus in avtorju, podpisanem kot Kizo',
'Jože Novak proti Jeleni Aščiæ (RTV SLO), Kseniji Horvat Petrovčič (RTV SLO), Ireni Ulčar (RTV SLO), Barbari Štrukelj (STA), Mojci Zorko (STA) in Sergeji Kotnik (STA)',
'Milan Aksentijeviæ proti Osteju Bakalu in Bojanu Budji (Slovenske novice)',
'Univerzitetni klinični center Ljubljana proti Urši Trebušak, Kanal A',
'Ahmed Pašiæ proti Sandri Ezgeta in Bojanu Travnu (Planet TV)',
'Združenje SAZAS proti Borutu Megliču, novinarju, uredniku in ustanovitelju družbe NSM, neodvisni spletni medij, d. o. o., ki izdaja portalplus.si',
'Aleš Novak (direktor Javne agencije za knjigo) proti novinarki Dnevnika Mojci Pišek',
'Dnevnik in Blaž Žibret proti Evgeniji Carl (TV Slovenija)',
'Iztok Šterbenc proti novinarki Ireni Divkoviæ Milanoviæ, Slovenske novice ',
'Društvo Iskra proti Biserki Karneža Cerjak, Reporter',
'Jože Novak proti Tomažu Šavliju, Evi Furlan in Ljerki Bizilj (vsi TV Slovenija)',
'UO DNS proti avtorjem z inicialkami J. Z., S. H. H., A. Š., Ir. K., novinarki Anji Zupanc in odgovornemu uredniku spletnega portala Žurnal24 Mateju Koširju',
'UO DNS proti Mojci Hanžič, Nuši P. Lesar in Gregorju Trebušaku, Kanala A',
'UO DNS proti novinarkam Danici Ksela, Barbari Bašič, Tjaši Dugolin, voditelju/avtorju Janiju Muhiču, odgovornemu uredniku informativnega programa POP TV Tomažu Peroviču in urednici oddaje 24 ur Tjaši Slokar',
'UO DNS proti avtorjema, podpisanima z inicialkami S. N., S. U., ter proti odgovornemu uredniku Bojanu Budji (slovenskenovice.si)',
'UO DNS proti Kseniji Horvat Petrovčič, Nadi Lavrič, Rosviti Pesek, Saši Krajncu in Ani Mariji Bosak (vsi TV Slovenija)',
'UO DNS proti novinarkam Maji Mastnak, Anji Ciglarič in Sandri Ezgeta, voditeljema oddaje Danes Mirku Mayerju in Urošu Slaku ter direktorju in uredniku informativnega programa in športa Bojanu Travnu (Planet TV)',
'UO DNS proti novinarkama Maji Mastnak in Anji Ciglarič ter odgovornem uredniku portala Planet Siol.net Urošu Urbasu',
'UO DNS proti novinarjema Gabrijelu Toplaku, Sašu Avramoviču, avtorjem podpisanim z inicialkami R. T., P. R., M. J. in T. C. (vsi svet24.si in Svet24) ter odgovornima urednicama portala svet24.si Karmen Špacapan in časopisa Svet24 Sonči Nered Čebašek.',
'UO DNS proti novinarju z inicialkama N. J. in odgovornemu uredniku spletnega medija moskisvet.com Pavlu Vrabcu',
'UO DNS proti novinarju M. C. (Aljaž Pogorelčnik)  in odgovornemu uredniku spletnega portala moski.si Marijanu Jurencu',
'UO DNS proti neimenovani voditeljici, voditeljema Klemnu Bunderli in Primožu Siterju ter odgovornemu uredniku Radia Aktual Simonu Prelesniku ',
'UO DNS proti voditelju Denisu Avdiču in njegovemu asistentu Mihi Deželaku, drugim avtorjem jutranjega programa Radia 1, ustvarjalcem rubrike Zjutranja kronika in odgovornemu uredniku Radia 1 Andrej Vodušku ',
'Ida Vindiš Belšak proti Jožetu Šmigocu, Štajerski tednik',
'Judovska skupnost Slovenije proti uredništvu Večera',
'Perutnina Ptuj, zanjo Roman Glaser, proti novinarjema Dnevnika Primožu Cirmanu in Vesni Vukoviæ ',
'Amela Taliæ, zanjo odvetniška pisarna Zidar Klemenčič, proti Mileni Zupanič, Delo',
'Greta Ivanuš proti Helena Peternel Pečauer, Delo ',
'Onkološki inštitut Ljubljana proti novinarki POP TV Urški Šestan',
'Gregor Kos proti novinarju Igorju Kršinarju in odgovornemu uredniku Silvestru Šurli, Reporter',
);
				
				foreach($xml as $item)
				{
					foreach($posts_array as $post)
					{
						if(strtolower($post->post_title)==strtolower($item))
						{
							echo $post->post_title."  --> ".$item."</br>";
							  $my_post = array(
								  'ID'           => $post->ID,
								  'post_title'   => $item,
							  );
							  wp_update_post($my_post);
						}
					}
				}
				
				
				foreach(get_terms( 'medij', array('hide_empty' => false,)) as $term)
				{
					wp_update_term( $term->term_id, 'medij', array('slug' => sanitize_title($term->name)));
					echo $term->term_id." ".$term->name." ".sanitize_title($term->name)."<br>";
				}
				*/
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

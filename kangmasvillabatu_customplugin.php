<?php 

//====================================================================================
// By : Taufan Pramono
// Update : 26/10/2023
// Web : https://www.kangmasvillabatu.com/
// title : call wp dash icon to frontend
//====================================================================================

function ww_load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons');



//====================================================================================
// By : Taufan Pramono
// Update : 26/10/2023
// Web : https://www.kangmasvillabatu.com/
// title : call checkbox to frontend
//====================================================================================


function fitur_internal_count() {
	if (get_field('fitur_internal_jual')) {
		$data = get_field('fitur_internal_jual');
		//var_dump ($data);
		echo '<h5> Fitur Internal </h5>';
		echo '<ul>';
		foreach ($data as $dat) {
			echo '<li><span class="dashicons dashicons-yes-alt"></span>  <span class="nama-fitur">'.$dat['label'] .'</span></li>';
		}
		echo '</ul>';	
	} 
	
}
add_shortcode('fitur_internal_shortcode','fitur_internal_count');

function fitur_eksternal_count() {
	if (get_field('fitur_diluar_dijual')) {
		$data = get_field('fitur_diluar_dijual');
		//var_dump ($data);
		echo '<h5> Fitur Eksternal </h5>';
		echo '<ul>';
		foreach ($data as $dat) {
			echo '<li><span class="dashicons dashicons-yes-alt"></span>  <span class="nama-fitur">'.$dat['label'] .'</span></li>';
		}
		echo '</ul>';
		
	} 
}
add_shortcode('fitur_eksternal_shortcode','fitur_eksternal_count');




//====================================================================================
// By : Taufan Pramono
// Update : 26/10/2023
// Web : https://www.kangmasvillabatu.com/
// title : list random number (rotator whatsapp ) jual beli villa from acf repeater
//====================================================================================

function random_contact_from_acf_to_jual_beli_villa() {
	if( get_field('nomor_whatsapp_jual_beli_villa', 'option') ) {
		 $tampung_data_kontak_to_jual_beli_villa = [];
		 while( the_repeater_field('nomor_whatsapp_jual_beli_villa', 'option') ) {
		 	$tampung_data_kontak_to_jual_beli_villa[] = '<a href="https://wa.me/62'.get_sub_field('nomor_whatsapp_jual_beli_villa').'?text=halo '.get_sub_field('nama_kontak_whatsapp_jual_beli_villa').', saya ingin bertanya mengenai *'.the_condition_title().'* yang sedang dijual | '.get_the_permalink().'" target="_blank">+62'.get_sub_field('nomor_whatsapp_jual_beli_villa').'</a>';
		 }
// 		var_dump ($tampung_data_kontak_to_jual_beli_villa);
		$the_random_whatsapp_contact_jual_beli_villa =  array_rand($tampung_data_kontak_to_jual_beli_villa, 1);
		return $tampung_data_kontak_to_jual_beli_villa[$the_random_whatsapp_contact_jual_beli_villa];
	} else {
		
		$kontak_catadangan_format_chat_jual_beli_villa = '<a href="https://wa.me/62'.get_field('nomor_wa_jika_kotak_kosong_jual_beli_villa','option').'?text=halo, saya ingin bertanya mengenai *'.the_condition_title().'* yang sedang dijual | '.get_the_permalink().'" target="_blank">+62'.get_field('nomor_wa_jika_kotak_kosong_jual_beli_villa','option').'</a>';
		return $kontak_catadangan_format_chat_jual_beli_villa;
				
	}
}
add_shortcode('shortcode_nomor_whatsapp_jual_beli_villa','random_contact_from_acf_to_jual_beli_villa');


//====================================================================================
// By : Taufan Pramono
// Update : 26/10/2023
// Web : https://www.kangmasvillabatu.com/
// title : button survey (rotator whatsapp ) jual beli villa from acf repeater
//====================================================================================

function random_contact_button_jual_beli_villa() {
	if( get_field('nomor_whatsapp_jual_beli_villa', 'option') ) {
		 $array_data_kontak = [];
		 while( the_repeater_field('nomor_whatsapp_jual_beli_villa', 'option') ) {
		 	$array_data_kontak[] = 'https://wa.me/62'.get_sub_field('nomor_whatsapp_jual_beli_villa').'?text=halo *'.get_sub_field('nama_kontak_whatsapp_jual_beli_villa').'*, saya ingin informasi lebih lanjut mengenai *'.the_condition_title().'* yang sedang dijual |  '.get_the_permalink();
		 }
		
		$random_contact_jual_beli_villa = array_rand($array_data_kontak, 1);
		return $array_data_kontak[$random_contact_jual_beli_villa];
	} else {
		$kontak_cadangan_dan_backup = 'https://wa.me/62'.get_field('nomor_wa_jika_kotak_kosong_jual_beli_villa','option').'?text=halo, saya ingin informasi lebih lanjut mengenai *'.the_condition_title().'* yang sedang dijual | '.get_the_permalink();
		return $kontak_cadangan_dan_backup;
	}
}
add_shortcode('shortcode_button_jual_beli','random_contact_button_jual_beli_villa');



//====================================================================================
// By : Taufan Pramono
// Update : 26/10/2023
// Web : https://www.kangmasvillabatu.com/
// title : get harga jual villa 
//====================================================================================

function harga_penjualan_villa() {
	$dapatkan_harga = get_field('harga_jual_villa');
	$change_value = floatval($dapatkan_harga);
	$harga_jual_villa_string_bilangan_bulat = number_format($change_value, 0, ',', '.');
    return 'Rp. '. $harga_jual_villa_string_bilangan_bulat .',-';
}
add_shortcode('shortcode_harga_jual_villa','harga_penjualan_villa');

function harga_jual_villa(){
	$values  = get_field('harga_jual_villa');	
//  var_dump ($values);
	$change_values 	= floatval($values);
	$harga_villa 	= number_format($change_values, 0, ',', '.');
 	return 'Rp. '. $harga_villa .',-';
}
add_shortcode('harga_villa','harga_jual_villa');



//====================================================================================
// By : Taufan Pramono
// Update : 26/10/2023
// Web : https://www.kangmasvillabatu.com/
// title : redirect post type team-kami
//====================================================================================

function post_type_redirect() {
    global $wp_query;
    // redirect from 'slideshow' CPT to home page
    if ( is_post_type_archive('team-kami') || is_singular('team-kami') ) :
        $url   = 'https://www.kangmasvillabatu.com/tentang-kami/';
        wp_redirect( esc_url_raw( $url ), 301 );
        exit();
    endif;
}

add_action ( 'template_redirect', 'post_type_redirect', 1);



//====================================================================================
// By : Taufan Pramono
// Update : 26/10/2023
// Web : https://www.kangmasvillabatu.com/
// title : get views
//====================================================================================


function get_views_of_product(){
	$ambil_views  = get_post_custom();	
// 	var_dump ($ambil_views);
 	$the_views_value = $ambil_views['ekit_post_views_count'][0];
 	$change_float_type = floatval($the_views_value);
	$output = number_format($change_float_type, 0, ',', '.');
 	return $output. ' Views';
	
}

add_shortcode('shortcode_views','get_views_of_product'); //output harus berupa angka 


//====================================================================================
// By : Taufan Pramono
// Update : 26/10/2023
// Web : https://www.kangmasvillabatu.com/
// title : get ratting
//====================================================================================
function get_ratting_starts(){
	$ambil_nilai  = get_post_custom();	
// 	var_dump ($ambil_nilai);
	$the_ratting_value = $ambil_nilai['hb_average_rating'][0];
	$change_float = floatval($the_ratting_value);
	return $change_float;
	
}
add_shortcode('shortcode_ratting','get_ratting_starts'); //output harus berupa angka 1 - 5

//====================================================================================
// By : Taufan Pramono
// Update : 26/10/2023
// Web : https://www.kangmasvillabatu.com/
// title : get harga weekend
//====================================================================================

function dapatkan_hb_harga_weekend() {
	$values  = get_post_custom();	
	// var_dump ($value);
	$string_harga_weekend  = $values['hb_harga_villa_weekend'][0];
	$angka_float = floatval($string_harga_weekend);
	$final_output_weekend = number_format($angka_float, 0, ',', '.');
    return 'Rp. '. $final_output_weekend .',-';
}

add_shortcode ('shortcode_harga_weekend','dapatkan_hb_harga_weekend');


//====================================================================================
// By : Taufan Pramono
// Update : 26/10/2023
// Web : https://www.kangmasvillabatu.com/
// title : get harga weekdays
//====================================================================================

function dapatkan_hb_harga_weekdays() {
	$value  = get_post_custom();	
// 	var_dump ($value);
	$string_harga  = $value['hb_harga_villa_weekdays'][0];
	$angka_float = floatval($string_harga);
	$final_output = number_format($angka_float, 0, ',', '.');
    return 'Rp. '. $final_output .',-';
}

add_shortcode ('shortcode_harga','dapatkan_hb_harga_weekdays');
 ?>
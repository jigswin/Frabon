<?php
	header("Content-type: text/css; charset: UTF-8");
	include "../config/config.php";

	$query = mysqli_query($con, "SELECT * FROM theme where status = 1 ");
	$row = mysqli_fetch_assoc($query);
?>
<style>
	
a, a:hover
{
	text-decoration: none;
}

/*******************************************************************************
* All Variables 
*******************************************************************************/

:root{

	/* header */
	
	--header_bg: <?php echo $row['header_bg'] ?>;
	--com_name_color: <?php echo $row['com_name_color'] ?>;
	--add_gst_color: <?php echo $row['add_gst_color'] ?>;
	--btn_bg_h: <?php echo $row['btn_bg_h'] ?>;
	--btn_color_h: <?php echo $row['btn_color_h'] ?>;
	--menu_color: <?php echo $row['menu_color'] ?>;

	/* footer */

	--footer_bg: <?php echo $row['footer_bg'] ?>;
	--footer_color: <?php echo $row['footer_color'] ?>;
	--footer_title_color: <?php echo $row['footer_title_color'] ?>;

	/* category index */

	--category_sec_bg: <?php echo $row['category_sec_bg'] ?>;
	--cat_title_color: <?php echo $row['cat_title_color'] ?>;
	--category_bg: <?php echo $row['category_bg'] ?>;
	--cat_name_color: <?php echo $row['cat_name_color'] ?>;

	/* gallery index */

	--gallery_bg_i: <?php echo $row['gallery_bg_i'] ?>;
	--gallery_color_i: <?php echo $row['gallery_color_i'] ?>;

	/* category page */

	--cat_color: <?php echo $row['cat_color'] ?>;
	--pro_bg: <?php echo $row['pro_bg'] ?>;
	--pro_name_color: <?php echo $row['pro_name_color'] ?>;
	--pro_price_color: <?php echo $row['pro_price_color'] ?>;

	/* product page */

	--product_bg: <?php echo $row['product_bg'] ?>;
	--pro_detail_color: <?php echo $row['pro_detail_color'] ?>;
	--pro_button_bg: <?php echo $row['pro_button_bg'] ?>;
	--pro_button_color: <?php echo $row['pro_button_color'] ?>;

	/* about us */

	--about_bg: <?php echo $row['about_bg'] ?>;
	--about_title_color: <?php echo $row['about_title_color'] ?>;
	--about_detail_color: <?php echo $row['about_detail_color'] ?>;

	/* services */

	--services_bg: <?php echo $row['services_bg'] ?>;
	--services_title_color: <?php echo $row['services_title_color'] ?>;
	--services_detail_color: <?php echo $row['services_detail_color'] ?>;

	/* contact us */

	--contact_bg: <?php echo $row['contact_bg'] ?>;
	--contact_title_color: <?php echo $row['contact_title_color'] ?>;
	--contact_detail_color: <?php echo $row['contact_detail_color'] ?>;
	--contact_button_bg: <?php echo $row['contact_button_bg'] ?>;
	--contact_button_color: <?php echo $row['contact_button_color'] ?>;

	/* enquiry */

	--enquiry_bg: <?php echo $row['enquiry_bg'] ?>;
	--enquiry_title_bg: <?php echo $row['enquiry_title_bg'] ?>;
	--enquiry_title_color: <?php echo $row['enquiry_title_color'] ?>;
	--enquiry_form_bg: <?php echo $row['enquiry_form_bg'] ?>;
	--enquiry_form_color: <?php echo $row['enquiry_form_color'] ?>;
	--enquiry_button_bg: <?php echo $row['enquiry_button_bg'] ?>;
	--enquiry_button_color: <?php echo $row['enquiry_button_color'] ?>;

	/* privacy policy */

	--privacy_bg: <?php echo $row['privacy_bg'] ?>;
	--privacy_title_color: <?php echo $row['privacy_title_color'] ?>;
	--privacy_detail_color: <?php echo $row['privacy_detail_color'] ?>;

	/* terms & conditions */

	--terms_bg: <?php echo $row['terms_bg'] ?>;
	--terms_title_color: <?php echo $row['terms_title_color'] ?>;
	--terms_detail_color: <?php echo $row['terms_detail_color'] ?>;

	/* testimony */

	--testi_bg: <?php echo $row['testi_bg'] ?>;
	--testi_title_bg: <?php echo $row['testi_title_bg'] ?>;
	--testi_title_color: <?php echo $row['testi_title_color'] ?>;
	--testi_box_bg: <?php echo $row['testi_box_bg'] ?>;
	--testi_text_color: <?php echo $row['testi_text_color'] ?>;
	--testi_name_color: <?php echo $row['testi_name_color'] ?>;

	/* appointment */

	--appoint_bg: <?php echo $row['appoint_bg'] ?>;
	--appoint_title_bg: <?php echo $row['appoint_title_bg'] ?>;
	--appoint_title_color: <?php echo $row['appoint_title_color'] ?>;
	--appoint_form_bg: <?php echo $row['appoint_form_bg'] ?>;
	--appoint_form_color: <?php echo $row['appoint_form_color'] ?>;
	--appoint_button_bg: <?php echo $row['appoint_button_bg'] ?>;
	--appoint_button_color: <?php echo $row['appoint_button_color'] ?>;

	/* feedback */

	--feedback_bg: <?php echo $row['feedback_bg'] ?>;
	--feedback_title_bg: <?php echo $row['feedback_title_bg'] ?>;
	--feedback_title_color: <?php echo $row['feedback_title_color'] ?>;
	--feedback_form_bg: <?php echo $row['feedback_form_bg'] ?>;
	--feedback_form_color: <?php echo $row['feedback_form_color'] ?>;
	--feedback_button_bg: <?php echo $row['feedback_button_bg'] ?>;
	--feedback_button_color: <?php echo $row['feedback_button_color'] ?>;

	/* brochure */

	--brochure_bg: <?php echo $row['brochure_bg'] ?>;
	--brochure_title_bg: <?php echo $row['brochure_title_bg'] ?>;
	--brochure_title_color: <?php echo $row['brochure_title_color'] ?>;
	--brochure_box_bg: <?php echo $row['brochure_box_bg'] ?>;
	--brochure_name_color: <?php echo $row['brochure_name_color'] ?>;
	--brochure_button_bg: <?php echo $row['brochure_button_bg'] ?>;
	--brochure_button_color: <?php echo $row['brochure_button_color'] ?>;

	/* gallery */

	--gallery_bg: <?php echo $row['gallery_bg'] ?>;
	--gallery_title_bg: <?php echo $row['gallery_title_bg'] ?>;
	--gallery_title_color: <?php echo $row['gallery_title_color'] ?>;

	/* post */

	--post_bg: <?php echo $row['post_bg'] ?>;
	--post_title_bg: <?php echo $row['post_title_bg'] ?>;
	--post_title_color: <?php echo $row['post_title_color'] ?>;
	--post_box_bg: <?php echo $row['post_box_bg'] ?>;
	--post_text_color: <?php echo $row['post_text_color'] ?>;
}

</style>
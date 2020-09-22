<?php

class ValueBriefIndividualController
{
	public function value_brief_hero()
	{  
	    View::make("value-brief/individual/value-header", [
	      "vb_background_color"  => get_field(vb_background_color),
	      "vb_background_image"  => get_field(vb_background_image),
	      "vertical_padding" => get_field("vertical_padding"),
	      "heading" => get_field("heading"),
	      "top_text_content" => get_field("top_text_content"),
	      "text_content" => get_field("text_content"),
	      "link" => (get_field("show_link") === true) ? ContentFormatter::link(get_field("link")) : null,
	    ]);
	}

	public function value_brief_overview()
	{
		View::make("value-brief/individual/value-brief-overview", [
			"vb_heading" => get_field("vbheading"),
			"vb_overview" => get_field("vboverview"),
		]);
	}

	public function value_brief_intro()
	{
		View::make("value-brief/individual/value-brief-intro", [
			"vb_capability_heading" => get_field("vbcapabilityheading"),
			"vb_capability" => get_field("vbcapability"),
			"vb_overview_image" => get_field("vbimage"),
		]);
	}

	public function value_brief_image()
	{
		View::make("value-brief/individual/value-brief-image", [
			"vb_image" => get_field("add_an_image"),
			//"vb_image" => ["url" => "http://via.placeholder.com/1600x400"],
		]);
	}

	public function value_brief_fexible()
	{
		$heading_fields = get_field("vb_flexible_heading");
		View::make("value-brief/individual/value-brief-flexible", [
			"vb_flexible_heading" => ContentFormatter::heading($heading_fields['seo_tag'], $heading_fields['size'], $heading_fields['tag'], $heading_fields['heading']),
			"vb_flexible_content" => get_field("vbflexible_content"),
            "vb_summary_l" => get_field("value_brief_summary_l"),
            "vb_summary_r" => get_field("value_brief_summary_r"),
		]);
	}

	public function value_brief_cta()
	{
		View::make("value-brief/individual/value-brief-cta", [
			"vb_cta_content_text" => get_field("cta_content_text"),
			"vb_cta_button_text" => get_field("cta_button_text"),
		]);
	}

}
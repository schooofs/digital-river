<?php
class CaseStudyIndividualController
{

  public static function case_study_company_info()
   { 
     
    View::make("case-study/individual/case-study-company-info", [
      "cs_intro" => get_field("pull_quote_text"),
      "cs_intro_auth" => get_field("pull_quote_author"),
      "cs_company_name" => get_field("case_study_company_name"),
      "cs_industry" => get_field("case_study_industry"),
      "cs_the_customer" => get_field("case_study_the_customer"),
      "cs_challenge" => get_field("case_study_challenge"),
      "cs_solution" => get_field("case_study_solution"),
      "cs_summary_l" => get_field("case_study_summary_l"),
      "cs_summary_r" => get_field("case_study_summary_r"),
      "cs_featured_image" => get_field("case_study_featured_image"), 
      "cs_logo" => ContentFormatter::svg("logo/".get_field("logo", get_field("cs_logo")), ['color'=>"#002C57"])

      ]);
  }



  public static function case_study_two_column_text()
  { 
      
    View::make("case-study/individual/case-study-two-col-text", [
      "cs_summary_l" => get_field("case_study_summary_l"),
      "cs_summary_r" => get_field("case_study_summary_r"),
    ]);
  }
    

    
  public static function case_study_results()
    
  {   

      $results = get_field("cs_results_benefits");
      foreach ($results as $result) {
        if($result['acf_fc_layout'] === "3_stats") {

        View::make("case-study/individual/case-study-text-three-data", [
          "cs_lead_paragraph" => $result['3_stats_case_study_lead_paragraph'], 
          "cs_data" => $result['3_stats_case_study_data'],
            
        ]);

            }
        if($result['acf_fc_layout'] === "quote") {

        View::make("case-study/individual/case-study-quote", [
          "cs_lead_paragraph" => $result['quote_case_study_quote_lead_paragraph'],
          "cs_author" => $result['quote_case_study_quote_author'],
        ]);

            }
        if($result['acf_fc_layout'] === "video") {

           View::make("case-study/individual/case-study-imageVideo", [
           "cs_description" => $result['video_case_study_description'],  
           "cs_default_image" => $result['video_case_study_default_image'],
           "case_study_video_id" => $result['video_case_study_video_id'] 
        ]);

            }
        if($result['acf_fc_layout'] === "2_stats") {

           View::make("case-study/individual/case-study-text-two-data", [
            "cs_lead_paragraph" => $result['2_stats_case_study_lead_paragraph'],  
            "cs_data" => $result['2_stats_case_study_data'],
        ]);

            }
    }

  }

  public static function case_study_more()
  {
    $clients = get_posts([
      'posts_per_page' => 3,
      'post_type' => ClientsPostType::$post_type_key,
      'orderby'        => 'rand',
      'meta_query' => [
          'relation' => 'AND',
          ['key' => 'case_study','compare'=>'EXISTS'],
          ['key' => 'case_study', 'compare' => '!=', 'value' => '']
       ]
    ]);


    foreach($clients as $client) {
      $formatted_clients[] = ClientBox::make(["client"=>$client]);
    }

    View::make("case-study/individual/case-study-more", [
      "clients" => $formatted_clients
    ]);

  }

  public static function case_study_cross_sell()
  {
    $clients = get_field("clients", 'option');
    foreach($clients as $client):
      $case_study = get_field("case_study", $client['client']);
      $formatted_clients[] = [
        "name" => $client['client']->post_title,
        "link" => ($case_study !== false) ? get_permalink($case_study) : null,
        "logo" => ContentFormatter::svg("logo/".get_field("logo", $client['client']), ['color'=>"#ffffff"])
      ];
    endforeach; 

    View::make("bricks/case-study-cross-sell", [
      "clients" => $formatted_clients
    ]);
  }
}
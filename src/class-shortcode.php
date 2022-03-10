<?php
/**
 * Class Shortcode.
 *
 * @file
 * class-shortcode.php
 *
 * @package Bw
 */

namespace BW;

/**
 * Security purposes
 * Aborts if this file is called directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class Shortcode.
 *
 * Defines Shortcode, that
 * allows the user to insert the form into pages, posts, page builders etc.
 *
 * @since   1.0.0
 */
class Shortcode {

	/**
	 * Class constructor.
	 *
	 * @see https://developer.wordpress.org/reference/functions/add_shortcode/
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_shortcode( 'bw_plugin', array( $this, 'bw_shortcode' ) );
	}

	/**
	 * Gets the output data.
	 * This function is used on the add_shortcode WordPress hook.
	 *
	 * @see https://developer.wordpress.org/reference/functions/add_shortcode/
	 *
	 * @return String The HTML/Js output that comes from format_output function.
	 * @since 1.0.0
	 */
	public function bw_shortcode() {
		return $this->format_output();
	}

	/**
	 * Builds the output data.
	 *
	 * @return String The HTML/Js output to print on the Frontend through Shortcode.
	 * @since 1.0.0
	 */
	public function format_output() {
		// To modularize things here and make more readable,
		// I'd created a separated function for the Hubspot Snippet.
		$hubspot_snippet = $this->hubspot_snippet();

		$output = " 
            <div class='container'>
                <!--Row with two equal columns-->
                <div class='row align-items-center'>
                    <div class='col-md-6'>
                        <div class='demo-content'>
                        <h1 class='title'>Schedule a demo</h1>
                        <h6 class='subtitle'>See how brightwheel can help you manage attendance, collect tuition and communicate with families all in one place.</h6>
                        <div class='listing text-lg-start text-xl-start text-md-start text-center'>
                            <p>       
                                <div class='row'>
                                    <div class='col-md-1'>
                                        <i class='bi bi-check-circle check-icon'></i>
                                    </div>                            
                                    <div class='col-md-11'>
                                        <span class='listing-bold'> Save each staff member up to 20 hours a month</span>, focusing their time on students, not busywork
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class='row'>
                                    <div class='col-md-1'>
                                        <i class='bi bi-check-circle check-icon'></i>
                                    </div>                            
                                    <div class='col-md-11'>
                                        <span class='listing-bold'> Centralize messaging, newsletters, and billing</span> to ensure families never miss important updates and ensure tou get paid on time.
                                    </div>
                                </div>
                            </p>
                            <p>
                                <div class='row'>
                                    <div class='col-md-1'>
                                        <i class='bi bi-check-circle check-icon'></i>
                                    </div>                            
                                    <div class='col-md-11'>
                                        <span class='listing-bold'> Stay safe and COVID-19 compliant</span> with contactless check-in, health checks, and room ratio tracking.
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                    </div>
                    <div class='col-md-6 div-form'>
                        <div class='div-contact-form bg-alt' >            
                            {$hubspot_snippet}
                        </div>
                    </div>
                </div>
            </div>
        ";

		return $output;
	}

	/**
	 * Builds the Form output data.
	 *
	 * @return String The Hubspot API Snippet.
	 * @since 1.0.0
	 */
	public function hubspot_snippet() {
		return "
            <!--[if lte IE 8]>
            <script charset='utf-8' type='text/javascript'
            src='//js.hsforms.net/forms/v2-legacy.js'></script>
            <![endif]-->
            <script charset='utf-8' type='text/javascript' src='//js.hsforms.net/forms/v2.js'></script>
            <script>
                hbspt.forms.create({
                    region: 'na1',
                    portalId: '2716595',
                    formId: '7ce26e6b-c41c-46b1-acf5-879dedf86f87',
                    cssClass: 'container-test',
                    inlineMessage: 'Data sent successfully. Thank you very much! We will contact you soon.'      
                });
            </script>
       ";
	}
}

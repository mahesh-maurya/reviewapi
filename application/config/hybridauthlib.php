<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------


	
$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		'base_url' => '/hauth/endpoint',

		"providers" => array (
			// openid providers
			"OpenID" => array (
				"enabled" => false
			),

			"Yahoo" => array (
				"enabled" => false,
				"keys"    => array ( "id" => "", "secret" => "" ),
			),

			"AOL"  => array (
				"enabled" => false
			),

			"Google" => array (
				"enabled" => false,
				"keys"    => array ( "id" => "292283797689-vautjiuv0ou3off2lfkh1k8feva6kt1l.apps.googleusercontent.com", "secret" => "A4cmWD8O-1Qy_0MGxApErN0K" ),
			),

			"Facebook" => array (
//				"enabled" => true,
//				"keys"    => array ( "id" => "1616427095257529", "secret" => "a78798da626f2b8c9f1a54bc1887f2a9" ),
				"enabled" => true,
				"keys"    => array ( "id" => "838827639545034", "secret" => "0a00b4e195a24f1236f8406e57ef468d" ),
//                "scope"   => "email, user_about_me, user_birthday, user_friends ,user_hometown, user_website, offline_access, read_stream"
               "scope"   => "email, user_about_me, user_birthday, user_friends ,user_hometown, user_website"
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "cJlkukYOZmuTpeDNogHVPtYrf", "secret" => "G2lDMBlcu2Z69jNyaymX0Xe7JsBYGSs2W4Jqw2UUS94c0H6bHC" )
			),

			// windows live
			"Live" => array (
				"enabled" => false,
				"keys"    => array ( "id" => "", "secret" => "" )
			),

			"MySpace" => array (
				"enabled" => false,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"LinkedIn" => array (
				"enabled" => false,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"Foursquare" => array (
				"enabled" => false,
				"keys"    => array ( "id" => "", "secret" => "" )
			),
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,

		"debug_file" => APPPATH.'/logs/hybridauth.log',
	);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */
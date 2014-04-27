<?php
/**
 * Odsea POT Generator
 *
 * Contains the methods for generating the odsea.pot and odsea-admin.pot files.
 * Code is based on: http://i18n.trac.wordpress.org/browser/tools/trunk/makepot.php
 *
 * @class ODSEA_Makepot
 * @since 2.0
 * @package Odsea
 * @author Geert De Deckere
 */
class ODSEA_Makepot {

	/**
	 * @var string Filesystem directory path for the Odsea plugin (with trailing slash)
	 */
	public $odsea_path;

	/**
	 * @var array All available projects with their settings
	 */
	public $projects;

	/**
	 * @var object StringExtractor
	 */
	public $extractor;

	/**
	 * @var array Rules for StringExtractor
	 */
	public $rules = array(
		'_'               => array( 'string' ),
		'__'              => array( 'string' ),
		'_e'              => array( 'string' ),
		'_c'              => array( 'string' ),
		'_n'              => array( 'singular', 'plural' ),
		'_n_noop'         => array( 'singular', 'plural' ),
		'_nc'             => array( 'singular', 'plural' ),
		'__ngettext'      => array( 'singular', 'plural' ),
		'__ngettext_noop' => array( 'singular', 'plural' ),
		'_x'              => array( 'string', 'context' ),
		'_ex'             => array( 'string', 'context' ),
		'_nx'             => array( 'singular', 'plural', null, 'context' ),
		'_nx_noop'        => array( 'singular', 'plural', 'context' ),
		'_n_js'           => array( 'singular', 'plural' ),
		'_nx_js'          => array( 'singular', 'plural', 'context' ),
		'esc_attr__'      => array( 'string' ),
		'esc_html__'      => array( 'string' ),
		'esc_attr_e'      => array( 'string' ),
		'esc_html_e'      => array( 'string' ),
		'esc_attr_x'      => array( 'string', 'context' ),
		'esc_html_x'      => array( 'string', 'context' ),
	);

	/**
	 * Constructor
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		// Default path
		$this->set_odsea_path( '../../trunk/app' );

		// All available projects with their settings
		$this->projects = array(
			'odsea' => array(
				'title'    => 'Front-end',
				'file'     => $this->odsea_path . 'Locale/default.po',
				'excludes' => array( 'Plugin/.*', 'Controller/.*' , 'Model/.*' ),
				'includes' => array(),
			),
		);

		// Ignore some strict standards notices caused by extract/extract.php
		error_reporting(E_ALL);

		// Load required files and objects
		require_once './not-gettexted.php';
		require_once './pot-ext-meta.php';
		require_once './extract/extract.php';
		$this->extractor = new StringExtractor( $this->rules );
	}

	/**
	 * Sets the Odsea filesystem directory path
	 *
	 * @param string $path
	 * @return void
	 */
	public function set_odsea_path( $path ) {
		$this->odsea_path = realpath( $path ) . '/';
	}

	/**
	 * POT generator
	 *
	 * @param string $project "odsea" or "odsea-admin"
	 * @return bool true on success, false on error
	 */
	public function generate_pot( $project = 'odsea' ) {
		// Unknown project
		if ( empty( $this->projects[ $project ] ) )
			return false;

		// Project config
		$config = $this->projects[ $project ];

		// Extract translatable strings from the Odsea plugin
		$originals = $this->extractor->extract_from_directory( $this->odsea_path, $config['excludes'], $config['includes'] );

		// Build POT file
		$pot = new PO;
		$pot->entries = $originals->entries;
		$pot->set_header( 'Project-Id-Version', 'Odsea ' . $this->odsea_version() . ' ' . $config['title'] );
		$pot->set_header( 'Report-Msgid-Bugs-To', 'https://github.com/woothemes/odsea/issues' );
		$pot->set_header( 'POT-Creation-Date', gmdate( 'Y-m-d H:i:s+00:00' ) );
		$pot->set_header( 'MIME-Version', '1.0' );
		$pot->set_header( 'Content-Type', 'text/plain; charset=UTF-8' );
		$pot->set_header( 'Content-Transfer-Encoding', '8bit' );
		$pot->set_header( 'PO-Revision-Date', gmdate( 'Y' ) . '-MO-DA HO:MI+ZONE' );
		$pot->set_header( 'Last-Translator', 'FULL NAME <EMAIL@ADDRESS>' );
		$pot->set_header( 'Language-Team', 'LANGUAGE <EMAIL@ADDRESS>' );

		// Write POT file
		return $pot->export_to_file( $config['file'] );
	}

	/**
	 * Retrieves the Odsea version from the odsea.php file.
	 *
	 * @access public
	 * @return string|false Odsea version number, false if not found
	 */
	public function odsea_version() {
		// Only run this method once
		static $version;
		if ( null !== $version )
			return $version;

		// File that contains the Odsea version number
		$file = $this->odsea_path . 'odsea.php';

 		if ( is_readable( $file ) && preg_match( '/\bVersion:\s*+(\S+)/i', file_get_contents( $file ), $matches ) )
			$version = $matches[1];
		else
			$version = false;

		return $version;
	}

}
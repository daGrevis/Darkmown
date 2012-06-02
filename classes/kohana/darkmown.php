<?php

/**
 * Markdown / Markdown Extra wrapper for Kohana 3.
 * 
 * @version 0.2.1
 * @author  daGrevis dagrevis@gmail.com
 */
class Kohana_Darkmown {

	/**
	 * Markdown's instance.
	 * 
	 * @var object
	 */
	static $markdown = null;

	/**
	 * Last options from 2nd param.
	 * 
	 * @var array
	 */
	static $last_options_from_2nd_param = null;

	/**
	 * Inits Markdown or Markdown Extra based on options.
	 * 
	 * @param array $options Optional options
	 */
	static function init(array $options = null) {

		/**
		 * Updates last options from 2nd param.
		 */
		
		self::$last_options_from_2nd_param = $options;

		/**
		 * Loads default option from config file.
		 */
		
		$default_options = Kohana::$config->load('darkmown');
		$default_options = $default_options->as_array();
		
		/**
		 * If exists, merges methods 2nd param with loaded config.
		 */
		
		if ($options) {

			$options =
				array_merge($default_options, $options);

		} else {

			$options = $default_options;

		}

		/**
		 * Loads Markdown or Markdown Extra.
		 */

		require_once Kohana::find_file('classes', 'markdown');

		if ($options['markdown_extra']) {

			require_once Kohana::find_file('classes', 'markdown/extra');

			self::$markdown = new Markdown_Extra($options);

		} else {

			self::$markdown = new Markdown($options);

		}

	}

	/**
	 * Parses Markdown.
	 * 
	 * @param  string $text    Text containing Markdown syntax
	 * @param  array  $options Optional options
	 * @return string          Parsed text in which Markdown syntax is converted to HTML or XHTML
	 */
	static function parse($text, array $options = null) {

		/**
		 * If instance isn't inited yet or there are different options from current passed in, create / re-create instance.
		 */
		
		if (!self::$markdown || ($options !== null && $options !== self::$last_options_from_2nd_param)) {

			self::init($options);

		}

		return self::$markdown->transform($text);

	}

}
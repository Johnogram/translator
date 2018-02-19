<?php
/**
 * Core translator class
 */
class Translator {

    /**
     * Set the default (fallback) language
     */
    private $default_lang;

    /**
     * Instantiate
     */
    public function __construct() {
        $this->default_lang = 'en';
    }

    /**
     * Define the languages and locate the files
     * 
     * To add new languages, define below
     */
    private function set_the_languages() {

        $languages = array(
            'en'        => 'english.json',
            'fr'        => 'french.json',
            'de'        => 'german.json',
            'pirate'    => 'pirate.json'
        );

        return $languages;
    }

    /**
     * Return a single language
     */
    private function get_the_language( $handle ) {

        $language = $this->set_the_languages();

        return $language[$handle];
    }

    /**
     * Get the language option (URL variable)
     * 
     * If URL var is not set, or doesn't match available languages, fallback to default
     */
    private function get_selected_language() {

        // Get available language for reference
        $available_lang = $this->set_the_languages();

        // If URL var is empty or unset
        if ( empty( $_GET['lang'] ) || !isset( $_GET['lang'] ) )
            return $this->default_lang;

        // Use the URL var (sanitize it)
        $language = $this->sanitize_data( $_GET['lang'], 'url' );

        // Check URL var against available langs
        if ( !array_key_exists( $language, $available_lang ) )
            return $this->default_lang;

        return $language;
    }

    /**
     * Return the contents of the JSON file
     */
    private function get_json_contents( $lang, $string = null ) {

        $filename = $this->get_the_language( $lang );

        // Sanitize it
        $filename = $this->sanitize_data( $filename, 'url' );

        // Open file
        $contents = file_get_contents( __DIR__ . '/../json/' . $filename );

        // JSON to PHP object
        $contents = json_decode( $contents );

        // Return all content if string is not defined
        if ( empty( $string ) )
           return $contents;

        // Return false if no string or empty string in JSON (for fallback)
        if ( empty( $contents->$string ) || !isset( $contents->$string ) )
            return;

        // Return the string
       return $contents->$string;
    }

    /**
     * Get the translated content
     */
    public function _gt( $string ) {

        // Bail out if empty
        if ( empty( $string ) )
            return;

        $language = $this->get_selected_language();

        // Get the string
        $content = $this->get_json_contents( $language, $string );

        // If no content in JSON file, fallback to default
        if ( empty( $content ) ) {
            $content = $this->get_json_contents( $this->default_lang, $string );
        }

        // Sanitize it
        $content = $this->sanitize_data( $content, 'string' );

        // And return it
        return $content;
    }

    /**
     * Echo the translated content
     * 
     * Alias of _gt for quality of life
     */
    public function _et( $string ) {
        
        // Bail out if empty
        if ( empty( $string ) )
            return;

        echo $this->_gt( $string );
    }

    /**
     * Sanitize
     */
    private function sanitize_data( $string, $type ) {

        switch ( $type ) {
            case "url":
                $string = filter_var( $string, FILTER_SANITIZE_URL );
                break;
            case "string":
                $string = filter_var( $string, FILTER_SANITIZE_SPECIAL_CHARS );
                break;
            default:
            $string = filter_var( $string, FILTER_SANITIZE_SPECIAL_CHARS );
        }

        return $string;
    }
}

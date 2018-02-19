<?php
/**
 * Core translator class
 */
class Translator {

    /**
     * 
     */
    public function __construct() {

    }

    /**
     * Define the languages and locate the files
     * 
     * To add new languages, define below
     */
    private function get_the_languages() {

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

        $language = get_the_languages();

        return $language[$handle];

    }


}
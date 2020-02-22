<?php

	// search_mr hydro-part.com.ua Ключ: de8e417368a2cdfd291db995c61e5ba8
	// search_mr hydro-part.com.ua Ключ: 840f9a2bad05c2197c49cf131a5918ee
	
	

	/**
	* Вариант - 1
	* $key == md5(md5($domain . $secret_key) . $secret_key)
	* $key == md5(md5($subdomains . $secret_key) . $secret_key)
	*/
	
	
    private function valid()
    {
        $secret_key = "smr3.0_cOWdDbk3+.4HmB2k6N|74lft6-G;7o.#";
        $options = $this->config->get("module_search_mr_options");
        if (!isset($options["key"])) {
            return false;
        }
        $key = $options["key"];
        $key_arr = array_map("trim", explode(",", $key));
        $domain = $_SERVER["SERVER_NAME"];
        if (strpos($domain, "www.") === 0) {
            $domain = str_replace("www.", "", $domain);
        }
        if (2 <= substr_count($domain, ".")) {
            $parent_domain = substr($domain, strpos($domain, ".") + 1);
            $subdomains = "x." . $parent_domain;
        } else {
            $subdomains = "x." . $domain;
        }
        foreach ($key_arr as $key) {
            if ($key == md5(md5($domain . $secret_key) . $secret_key)) {
                return true;
            }
            if ($key == md5(md5($subdomains . $secret_key) . $secret_key)) {
                return true;
            }
        }
        return false;
    }
	
	/**
	* Вариант - 2
	* $key == md5(md5($domain . $secret_key) . $secret_key)
	*/
	private function valid()
    {
        $secret_key = "smr_OWdk+.B2N|4ft6-G7.h8;Aem+Wj%|kY";
        $options = $this->config->get("search_mr_options");
        if (!isset($options["key"])) {
            return false;
        }
        $key = $options["key"];
        $key_arr = array_map("trim", explode(",", $key));
        $domain = $_SERVER["SERVER_NAME"];
        if (strpos($domain, "www.") === 0) {
            $domain = str_replace("www.", "", $domain);
        }
        foreach ($key_arr as $key) {
            if ($key == md5(md5($domain . $secret_key) . $secret_key)) {
                return true;
            }
        }
        return false;
    }
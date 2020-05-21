<?
	function makeAuth() {
		return[
			"localhost",
			"SyrenaJing",
			"jingwenxin520",
			"SyrenaProduct"
		];
	}

	function makePDOAuth() {
        return[
            "mysql:host=localhost;dbname=SyrenaProduct",
            "SyrenaJing",
            "jingwenxin520",
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
        ];
    }
?>
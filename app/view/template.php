<?php
namespace View;

class Template {
    public static function render($page_location, $page_title = "Untitled Document") {
        // \F3::instance()->set("page.title", $page_title);
        // \F3::instance()->set("page.loation", $page_location);
        \F3::mset([
            "page.title"   => $page_title,
            "page.location" => $page_location
        ]);
        echo \Template::instance()->render("layout.html");
    }
}
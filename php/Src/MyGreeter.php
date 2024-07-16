<?php
namespace Src;

class MyGreeter {
    public function greeting() {
        $current_hour = date("H"); // Get the current hour (24-hour format)
        
        // Return different greetings by $current_hour
        if ($current_hour >= 6 && $current_hour < 12) {
            return "Good morning";
        } elseif ($current_hour >= 12 && $current_hour < 18) {
            return "Good afternoon";
        } else {
            return "Good evening";
        }
    }
}
?>
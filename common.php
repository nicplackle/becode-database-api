<?php
// function to escape HTML.  with this function we can wrap any variable in the escape() function, and the HTML entities will be protected

function escape($html) {
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
  };


?>
<?php
ob_start();
session_start();

echo "[{";
echo "\"POST\":".json_encode($_POST). ",";
echo "\"FILES\":".json_encode($_FILES). ",";
echo "\"GET\":".json_encode($_GET). ",";
echo "\"SESSION\":".json_encode($_SESSION);
echo "}]";

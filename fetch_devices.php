<?php
echo "PHP script executed.<br>";
$output = shell_exec('sadpcli command');
if ($output === null) {
    echo "Failed to execute SADP command.";
} else {
    echo "<pre>$output</pre>";
}
?>

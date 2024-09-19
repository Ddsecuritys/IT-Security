<?php
echo "Welcome to PHP Command Line Interface (CLI)\n";
echo "Type 'exit' to quit.\n\n";

while (true) {
    // Prompt the user for input
    echo "> ";
    $command = trim(fgets(STDIN));

    // Exit the loop if the user types 'exit'
    if (strtolower($command) === 'exit') {
        echo "Exiting...\n";
        break;
    }

    // Execute the command and capture the output
    $output = shell_exec($command);

    // Check if the command produced any output
    if ($output === null) {
        echo "Command not found or execution failed.\n";
    } else {
        // Print the output
        echo $output . "\n";
    }
}

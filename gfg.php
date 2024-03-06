<?php 
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $conments = $_POST['conments'];

    // Validate form data
    if (empty($conments)) {
        // Handle invalid data (e.g., display error message or redirect back to form)
        header("Location: index.html"); // Redirect to index.html
        exit; // Terminate script execution
    }

    // Create an associative array with the form data
    $data = array(
        'name' => $name,
        'conments' => $conments
    );

    // If name is not empty, add it to the data array
    // if (!empty($name)) {
    //     $data['name'] = $name;
    // }

    // Specify the path to the JSON file
    $jsonFilePath = 'users.json';

    // Check if the JSON file exists
    if (file_exists($jsonFilePath)) {
        // Read the existing JSON file
        $existingData = json_decode(file_get_contents($jsonFilePath), true);

        // Append the new data to the existing data
        $existingData[] = $data;
    } else {
        // Create a new array with the form data
        $existingData = array($data);
    }

    // Convert the data to JSON with pretty print formatting
    $jsonData = json_encode($existingData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // Save the JSON data to the file
    file_put_contents($jsonFilePath, $jsonData);

    // Redirect back to the index.html page
    header("Location: index.html");
    exit; // Terminate script execution
}
?>

<?php
session_start();


if (isset($_POST['hashname'])) {
  $picType = $_POST['picType'];
  $blob_name = $_POST['hashname'];
}


$tmp_file = $_FILES['file']['tmp_name'];
// get upload directory


// $target_path = $uploads_dir. '/'.$blob_name. '.jpg';

if(!empty($_FILES)){
    if(move_uploaded_file($tmp_file, "../AzureBackups/panoramas/$blob_name.jpg")){
        $_SESSION['uploadSuccessful'] = true;
    }
}




// Azure Blob storag upload:
/*
Source: https://www.startutorial.com/articles/view/how-to-build-a-file-upload-form-using-dropzonejs-and-php

1 Store directory separator (DIRECTORY_SEPARATOR) to a simple variable. This is just a personal preference as we hate to type long variable name.
2 Declare a variable for destination folder.
3 If file is sent to the page, store the file object to a temporary variable.
4 Create the absolute path of the destination folder.
5 Create the absolute path of the uploaded file destination.
6 Move uploaded file to destination.

// TODO
https://github.com/Azure/azure-storage-php

*/
//
// require_once '../vendor/autoload.php';
//
// use WindowsAzure\Common\ServicesBuilder;
// use WindowsAzure\Common\ServiceException;
// use MicrosoftAzure\Storage\Blob\Models\CreateBlobOptions;
//
//
// $ds          = DIRECTORY_SEPARATOR;  //1
//
// $storeFolder = "images/profilepics";   // 1 Destination folder
//
// if (!empty($_FILES)) {
//
// // Access to db
// $primaryAccessKey = "2Ong0J03Oq1totyrEhRe5pZJ1X2/fer0M1K4w2vIoDJWnUwgZ/8k+beVLBLhMQywyoUG+VqV2edDJ+Ckbjnupg==";
// $blobAccountName = "apppanoblob";
// $containerName = $picType;
//
// $connectionString = "DefaultEndpointsProtocol=https;AccountName=".$blobAccountName.";AccountKey=".$primaryAccessKey;
//
// // Create blob REST proxy.
// $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
//
// // Get the file
// $content = fopen($_FILES['file']['tmp_name'], "r");
// // hash a name for the picture using the current userid and current tidy_get_html_ver
//
//
// // Formatting
// $options = new CreateBlobOptions();
// $options->setBlobContentType("image/jpeg");
//
// try    {
//     //Upload blob
//     $blobRestProxy->createBlockBlob($picType , $blob_name.".jpg", $content, $options);
//     $_SESSION['uploadSuccessful'] = true;
// }
// catch(ServiceException $e){
//     // Handle exception based on error codes and messages.
//     // Error codes and messages are here:
//     // http://msdn.microsoft.com/library/azure/dd179439.aspx
//     $code = $e->getCode();
//     $error_message = $e->getMessage();
//     echo $code.": ".$error_message."<br />";
// }
// }


?>

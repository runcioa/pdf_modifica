<?php

use setasign\Fpdi\Fpdi;

require_once('vendor/autoload.php');

echo $_SERVER['DOCUMENT_ROOT'];

if(isset($_FILES['file1']) && isset($_FILES['file2'])) {
    // Get uploaded file details
    $file1_name = $_FILES['file1']['name'];
    $file1_tmp = $_FILES['file1']['tmp_name'];
    $file1_ext = strtolower(pathinfo($file1_name, PATHINFO_EXTENSION));
    
    $file2_name = $_FILES['file2']['name'];
    $file2_tmp = $_FILES['file2']['tmp_name'];
    $file2_ext = strtolower(pathinfo($file2_name, PATHINFO_EXTENSION));
    
    // Check if uploaded files are PDFs
    if($file1_ext === 'pdf' && $file2_ext === 'pdf') {
  
    $pdf1 = new Fpdi();
    $pageCount=$pdf1->setSourceFile($file1_tmp);

    $skipPages = [1];

    //  Add all pages of source to new document
    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        //  Skip undesired pages
        if (in_array($pageNo, $skipPages))
            continue;

        //  Add page to the document
        $templateID = $pdf1->importPage($pageNo);
        $size = $pdf1->getTemplateSize($templateID);
        $pdf1->addPage($size['orientation'], [$size[0], $size[1]]);
        $pdf1->useTemplate($templateID);
    }

    // Save the modified PDF file
    $output_file1 = 'output1.pdf';
    $pdf1->Output($output_file1, 'F');

     // Load the second PDF file with FPDI
     $pdf2 = new Fpdi();
     $pdf2->setSourceFile($file2_tmp);

     // Merge the two PDF files
     $new_pdf2 = new Fpdi;

     foreach (array($file2_tmp, $output_file1) as $file) {
         $page_count = $new_pdf2->setSourceFile($file);
         for ($i = 1; $i <= $page_count; $i++) {
             
             $tpl_idx = $new_pdf2->importPage($i);
             $size = $new_pdf2->getTemplateSize($tpl_idx);
             $new_pdf2->addPage($size['orientation'], [$size[0], $size[1]]);
             $new_pdf2->useTemplate($tpl_idx);
         }
     }

     // Save the merged PDF file
     $output_file = $_SERVER['DOCUMENT_ROOT'].$file1_name;
     $new_pdf2->Output($output_file, 'F');

     // Output a link to download the merged PDF file
     echo '<a href="' . $file1_name . '">Download merged PDF</a>';
 } else {
     echo 'Invalid file type, please upload two PDF files.';
 }
}
?>


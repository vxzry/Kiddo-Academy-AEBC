<?php
require('fpdf_merge.php');

$merge = new FPDF_Merge();
$merge->add('outputAdmissionNotice.pdf');
$merge->add('outputListofFees.pdf');
$merge->output();
?>
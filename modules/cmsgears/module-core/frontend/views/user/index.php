<?php
$coreProperties	= $this->context->getCoreProperties();

// Page
$this->title = 'Home | ' . $coreProperties->getSiteTitle();

// Sidebar
$this->context->sidebar	= [ 'parent' => 'sidebar-dashboard' ];
?>

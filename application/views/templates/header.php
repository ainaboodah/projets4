<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="keywords" content="<?php echo $keywords; ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>">
</head>
<body>
<div class="header">
    <input type="search" name="search" id="search">
    <input type="submit" value="search" class="search" style="background-color: #333;">
    <div class="menu">
        <a href="<?php echo site_url('home') ?>">Home</a>
        <a href="<?php echo site_url('produit_controller') ?>">Nos Produits</a>
        <a href="<?php echo site_url('produit_controller') ?>">Catégories</a>
        <a href="<?php echo site_url('importexport') ?>">Import/Export</a>
        <?php if ($this->session->userdata('logged_in')): ?>
            <li><a href="<?php echo site_url('auth/logout'); ?>">Logout</a></li>
        <?php else: ?>
            <li><a href="<?php echo site_url('login'); ?>">Login</a></li>
        <?php endif; ?>
    </div>
</div>
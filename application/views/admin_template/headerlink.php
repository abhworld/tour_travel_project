<?php $page_segment = $this->uri->segment(2);?>

<base href="<?php echo base_url();?>">
<title>
    <?php echo $title; ?>
</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<!-- Framework Stylesheets Start-->

<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" type="text/css" href="assets/admin_asset/css/bootstrap.min4.2.1.css">
<link rel="stylesheet" type="text/css" href="assets/admin_asset/css/bootstrap-reboot4.2.1.css">

<link rel="stylesheet" type="text/css" href="assets/admin_asset/vendors/dropzone-5.5.0/dist/min/dropzone.min.css">
<!-- Framework Stylesheets End-->
<!-- Font Awsome Stylesheet -->
<link rel="stylesheet" href="assets/admin_asset/vendors/fontawesome5.7.2/css/all.min.css">

<!-- Data Tables Stylesheet -->
<link rel="stylesheet" type="text/css" href="assets/admin_asset/vendors/datatables/datatables.min.css">
<link rel="stylesheet" type="text/css" href="assets/admin_asset/css/custom.datatables.css">

<!-- Custom Stylesheet Start-->
<?php if($page_segment == 'home-page' || $page_segment == 'about-us' || $page_segment == 'contact-us' || $page_segment == 'footer-content') {?>
    <!--<link href="assets/frontend_asset/css/bootstrap.min.css" rel="stylesheet">-->
    <!--font-awesome.min.css -->
    <link href="assets/frontend_asset/css/font-awesome.min.css" rel="stylesheet">
    <!--material-design-iconic-font.min.css -->
    <link href="assets/frontend_asset/css/material-design-iconic-font.min.css" rel="stylesheet">
    <!--owl.carousel.min.css -->
    <link href="assets/frontend_asset/css/owl.carousel.min.css" rel="stylesheet">
    <!--magnific-popup.css -->
    <link href="assets/frontend_asset/css/magnific-popup.css" rel="stylesheet">
    <!--nice-select.css -->
    <link href="assets/frontend_asset/css/nice-select.css" rel="stylesheet">
    <!--slicknav.min.css -->
    <link href="assets/frontend_asset/css/slicknav.min.css" rel="stylesheet">
    <!--style.css -->
    <link href="assets/frontend_asset/css/style.css" rel="stylesheet">
    <!--responsive.css -->
    <link href="assets/frontend_asset/css/responsive.css" rel="stylesheet">
<?php }?>
<link rel="stylesheet" type="text/css" href="assets/admin_asset/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/admin_asset/css/responsive.css">
<link href="assets/admin_asset/css/select2.css" rel="stylesheet" type="text/css"/>
<!-- Custom Stylesheet End-->
<link href="assets/admin_asset/css/dropify.css" rel="stylesheet" type="text/css"/>
<script src="assets/admin_asset/js/jquery-3.3.1.min.js"></script>

<style>
    table.dataTable thead th, table.dataTable thead td{
        padding: 10px 10px;
        text-align: left;
    }
    
    table.dataTable tbody tr td{
        text-align: left;
    }
    
    .content table thead th:last-child{
        text-align: right;
    }
    
</style>
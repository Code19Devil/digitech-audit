<?php require 'base_header.php'; ?>
<?php $role != 1
    ? print "<script>alert('You are Lost');window.location.href ='index.php';</script>"
    : ''; ?>
<?php require 'base_sidebar.php'; ?>
<section class="content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2 mt-3">
                <div class="col-12 col-lg-12 mt-1">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title font-weight-bold">Admin Dashboard</h2>
                        </div>

                        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">No Of Outbound Audit</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">30</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">No Of Inbound Audit</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">40</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">No Of Email Audit</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">No Of Management Audit</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">60</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
</section>
</body>
<?php include 'base_footer.php'; ?>

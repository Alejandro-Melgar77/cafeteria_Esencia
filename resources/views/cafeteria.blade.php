@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sales Ratio</h4>
                        <div class="sales ct-charts mt-3"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-1">Referral Earnings</h5>
                        <h3 class="font-light">$769.08</h3>
                        <div class="mt-3 text-center">
                            <div id="earnings"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Users</h4>
                        <h2 class="font-light">35,658 <span class="font-16 text-success font-medium">+23%</span>
                        </h2>
                        <div class="mt-4">
                            <div class="row text-center">
                                <div class="col-6 border-right">
                                    <h4 class="mb-0">58%</h4>
                                    <span class="font-14 text-muted">New Users</span>
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-0">42%</h4>
                                    <span class="font-14 text-muted">Repeat Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Latest Sales</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="border-top-0">NAME</th>
                                    <th class="border-top-0">STATUS</th>
                                    <th class="border-top-0">DATE</th>
                                    <th class="border-top-0">PRICE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td class="txt-oflo">Elite admin</td>
                                    <td><span class="label label-success label-rounded">SALE</span> </td>
                                    <td class="txt-oflo">April 18, 2021</td>
                                    <td><span class="font-medium">$24</span></td>
                                </tr>
                                <tr>

                                    <td class="txt-oflo">Real Homes WP Theme</td>
                                    <td><span class="label label-info label-rounded">EXTENDED</span></td>
                                    <td class="txt-oflo">April 19, 2021</td>
                                    <td><span class="font-medium">$1250</span></td>
                                </tr>
                                <tr>

                                    <td class="txt-oflo">Ample Admin</td>
                                    <td><span class="label label-purple label-rounded">Tax</span></td>
                                    <td class="txt-oflo">April 19, 2021</td>
                                    <td><span class="font-medium">$1250</span></td>
                                </tr>
                                <tr>

                                    <td class="txt-oflo">Medical Pro WP Theme</td>
                                    <td><span class="label label-success label-rounded">Sale</span></td>
                                    <td class="txt-oflo">April 20, 2021</td>
                                    <td><span class="font-medium">-$24</span></td>
                                </tr>
                                <tr>

                                    <td class="txt-oflo">Hosting press html</td>
                                    <td><span class="label label-success label-rounded">SALE</span></td>
                                    <td class="txt-oflo">April 21, 2021</td>
                                    <td><span class="font-medium">$24</span></td>
                                </tr>
                                <tr>

                                    <td class="txt-oflo">Digital Agency PSD</td>
                                    <td><span class="label label-danger label-rounded">Tax</span> </td>
                                    <td class="txt-oflo">April 23, 2021</td>
                                    <td><span class="font-medium">-$14</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection

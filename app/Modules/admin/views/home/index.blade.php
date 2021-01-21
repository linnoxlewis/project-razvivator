@extends('admin::layouts.master')
@section('content')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Monthly Earnings</h5>
                    <div id="apex1"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Trending Services</h5>
                    <div class="trending-services">
                        <ul class="list-unstyled slimscroll">
                            <li>Social Network
                                <div class="text-success float-right">32%<i class="fa fa-level-up"></i></div>
                            </li>
                            <li>File Management
                                <div class="text-success float-right">25%<i class="fa fa-level-up"></i></div>
                            </li>
                            <li>Search Engine
                                <div class="text-success float-right">16%<i class="fa fa-level-up"></i></div>
                            </li>
                            <li>Calendar
                                <div class="text-danger float-right">4%<i class="fa fa-level-down"></i></div>
                            </li>
                            <li>Todo App
                                <div class="text-danger float-right">17%<i class="fa fa-level-down"></i></div>
                            </li>
                            <li>Mailbox
                                <div class="text-success float-right">14%<i class="fa fa-level-up"></i></div>
                            </li>
                            <li>Travel Guide
                                <div class="text-danger float-right">9%<i class="fa fa-level-down"></i></div>
                            </li>
                            <li>Finances App
                                <div class="text-danger float-right">27%<i class="fa fa-level-down"></i></div>
                            </li>
                            <li>Online Wallet
                                <div class="text-success float-right">16%<i class="fa fa-level-up"></i></div>
                            </li>
                            <li>Others
                                <div class="text-success float-right">9%<i class="fa fa-level-up"></i></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissible fade show m-b-md" role="alert">
                Activity reports have been updated 2 days ago. <a href="#" class="alert-link">Click here</a> to see the
                old
                data.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="info-card">
                        <h4 class="info-title">Sales Today<span class="info-stats">45.6k</span></h4>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="info-card">
                        <h4 class="info-title">Support Questions<span class="info-stats">1.2k</span></h4>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 45%"
                                 aria-valuenow="45"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <div class="info-card">
                        <h4 class="info-title">New Members<span class="info-stats">2.4k</span></h4>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Last Orders</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">07809</th>
                                <td>Alpha - Angular 8</td>
                                <td>Chritopher Palmer</td>
                                <td>Dec 15, 2019</td>
                                <td><span class="badge badge-info">In Progress</span></td>
                            </tr>
                            <tr>
                                <th scope="row">07068</th>
                                <td>Modern - PSD</td>
                                <td>Stuart Woodley</td>
                                <td>Nov 29, 2019</td>
                                <td><span class="badge badge-info">In Progress</span></td>
                            </tr>
                            <tr>
                                <th scope="row">08392</th>
                                <td>Mobile App Theme</td>
                                <td>Murphy Cartwright</td>
                                <td>Nov 12, 2019</td>
                                <td><span class="badge badge-success">Finished</span></td>
                            </tr>
                            <tr>
                                <th scope="row">09415</th>
                                <td>CRM Application</td>
                                <td>Gurpreet Holder</td>
                                <td>Jul 8, 2019</td>
                                <td><span class="badge badge-danger">Canceled</span></td>
                            </tr>
                            <tr>
                                <th scope="row">08678</th>
                                <td>Crypto Exchange</td>
                                <td>Marshall Wheeler</td>
                                <td>Feb 17, 2019</td>
                                <td><span class="badge badge-danger">Canceled</span></td>
                            </tr>
                            <tr>
                                <th scope="row">08446</th>
                                <td>Alpha - Bootstrap Version</td>
                                <td>Nikki Blanchard</td>
                                <td>Dec 26, 2018</td>
                                <td><span class="badge badge-success">Finished</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

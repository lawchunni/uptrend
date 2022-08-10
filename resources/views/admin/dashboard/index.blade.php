@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                {{ $title }}
            </h1>
        </div>

        <h2 class="h4 text-gray-800">Order</h2>
        <!-- Content Row -->
        <div class="row">

            {{-- order --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Order
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orderCount }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto"> <i class="fas fa-clipboard fa-fw me-3 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- pending orders --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Order
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingOrderCount }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto"> <i class="fa fa-clock-o fa-fw me-3 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- delivered orders --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Delivered Order
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $deliveredOrderCount }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto"> <i class="fas fa-shipping-fast fa-fw me-3 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- average order value --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Average Order Value
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            ${{ number_format($avgOrderValue, 2) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-percent  fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="h4 text-gray-800">Summary</h2>
        <!-- Content Row -->
        <div class="row">
            {{-- category --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Category
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categoryCount }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-bar fa-fw me-3 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- product --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Product
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $productCount }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shirt fa-fw me-3 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- user --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userCount }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-person fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Inquiry  -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Inquiry</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $inquiryCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-question fa-fw me-3 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="row g-2">
            <div class="col-md-6">
                <h2 class="h4 text-gray-800">Product by Category</h2>
                <div id="productByCategory"></div>
            </div>
            <div class="col-md-6">
                <h2 class="h4 text-gray-800">Product by Gender</h2>
                <div id="productByGender"></div>
            </div>
            <!-- line Chart -->
            <div class="col-md-6">
                <h2 class="h4 text-gray-800">Monthly Sales</h2>
                <div id="salesLineChart"></div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@section('footer-script')
    {{-- google chart library --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        /** 
         * product By category pie chart
         */
        function productByCategoryChart() {
            let productByCategoryData = google.visualization.arrayToDataTable([
                ['Category', 'Product Count'],
                @php
                    foreach ($productByCategory as $cat) {
                        echo "['" . $cat->title . "', " . $cat->products_count . '],';
                    }
                @endphp
            ]);
            let options = {
                title: '',
                is3D: false,
            };
            let productByCategory = new google.visualization.PieChart(document.getElementById('productByCategory'));
            productByCategory.draw(productByCategoryData, options);
        }

        /** 
         * product By gender pie chart
         */
        function productByGenderChart() {
            let productByGenderData = google.visualization.arrayToDataTable([
                ['Gender', 'Product Count'],
                @php
                    foreach ($productByGender as $gender) {
                        echo "['" . ucfirst($gender->name) . "', " . $gender->products_count . '],';
                    }
                @endphp
            ]);
            let options = {
                title: '',
                is3D: false,
            };
            let productByGender = new google.visualization.PieChart(document.getElementById('productByGender'));
            productByGender.draw(productByGenderData, options);
        }

        /** 
         * line chart of sales By delivered and confirmend order 
         */
        function salesChart() {

            let salesData = google.visualization.arrayToDataTable([
                ['Month', 'Sales'],
                @php
                    if (count($sales)) {
                        foreach ($sales as $month) {
                            echo "['" . ucfirst($month->month) . "', " . number_format($month->sales, 2) . '],';
                        }
                    } else {
                        echo "['No Data', 0]";
                    }
                @endphp
            ]);
            let options = {
                title: '',
            };
            let salesLineChart = new google.visualization.LineChart(document.getElementById('salesLineChart'));
            salesLineChart.draw(salesData, options);
        }

        /** 
         * on load draw chart and call function to generate chart
         */
        function drawChart() {
            // pie chart
            productByCategoryChart();
            productByGenderChart();

            // line chart
            salesChart();
        }
    </script>
@endsection

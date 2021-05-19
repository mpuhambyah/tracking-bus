<!-- Begin Page Content -->
<div class="panelbus container-fluid h-100">
    <div class="row h-100">
        <div class="col-1 d-flex align-items-center justify-content-center">
            <div class="navigation d-flex flex-column">
                <a href="<?= base_url('panelbus/databus') ?>">
                    <i class="fas fa-tachometer-alt"></i>
                </a>
                <a href="<?= base_url('panelbus/databusv2') ?>">
                    <i class="fas fa-tachometer-alt aktif"></i>
                </a>
            </div>
        </div>

        <div class="col-11 pt-4 mid-data">
            <!-- Content Row -->
            <div class="row h-100">
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Speed</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">35</h3>
                            <span>Km/h</span>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">RPM</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">60</h3>
                            <span>Revolution</span>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Battery</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">55</h3>
                            <span>%</span>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Voltage</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">220</h3>
                            <span>Volt</span>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">State of Charge</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">1</h3>
                            <span>%</span>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Engine Load</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">90</h3>
                            <span>%</span>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Throttle Position</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">15</h3>
                            <span>%</span>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Distance</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">120</h3>
                            <span>Km</span>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Elapsed</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">12:12</h3>
                            <span>hh:mm</span>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">GPS Position</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3" style="font-size: 40px">7.123441, 123.012983</h3>
                            <span>Lat, Long</span>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">GPS Speed</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">35</h3>
                            <span>Km/h</span>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">GPS Alt</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">35</h3>
                            <span>m</span>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">GPS Sat</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">35</h3>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Vehicle Status</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">35</h3>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Vehicle Health</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">35</h3>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">Sensor Health</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center show-data">
                            <h3 class="mb-3">35</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
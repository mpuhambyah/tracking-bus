<!-- Begin Page Content -->
<div class="panelbus container-fluid h-100">
    <div class="row h-100">
        <div class="col-1 d-flex align-items-center justify-content-center">
            <div class="navigation d-flex flex-column">
                <a href="<?= base_url('panelbus/databus') ?>">
                    <i class="fas fa-tachometer-alt aktif"></i>
                </a>
                <a href="<?= base_url('panelbus/databusv2') ?>">
                    <i class="fas fa-tachometer-alt"></i>
                </a>
            </div>
        </div>
        <div class="col-9 pt-4 mid-data">
            <!-- Content Row -->

            <div class="row h-100">

                <!-- Speedo Chart -->
                <div class="col-4 align-self-center">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">SPEED</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div id="canvas-holder" style="width:100%" class="py-5">
                                <canvas id="rpmchart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Chart -->
                <div class="col-8 align-self-center">
                    <h4>CONDITION</h4>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td class="tab-left" style="width: 20%"><i class="fas fa-circle" style="color: #d1d4e4;"></i></td>
                                <td>
                                    <h6>Engine Load</h6>
                                </td>
                                <td class="tab-right" style="width: 40%">
                                    <p id="engineLoad">8%</p>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-circle" style="color: #a1afff;"></i></td>
                                <td>
                                    <h6>Throttle Position</h6>
                                </td>
                                <td>
                                    <p id="throttlePosition">9%</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="tab-left"><i class="fas fa-circle" style="color: #d1d4e4;"></i></td>
                                <td>
                                    <h6>Distance</h6>
                                </td>
                                <td class="tab-right">
                                    <p id="distance">20.000 Km</p>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-circle" style="color: #a1afff;"></i></td>
                                <td>
                                    <h6>Heading</h6>
                                </td>
                                <td>
                                    <p id="heading">100</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Speedo Chart -->
                <div class="col-4 align-self-center">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                            <h6 class="m-0 font-weight-bold text-primary">RPM</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div id="canvas-holder" style="width:100%" class="py-5">
                                <canvas id="speedchart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Chart -->
                <div class="col-8 align-self-center">
                    <h4>GPS</h4>
                    <table class="table table-striped">
                        <tr>
                            <td class="tab-left" style="width: 20%"><i class="fas fa-circle" style="color: #d1d4e4;"></i></td>
                            <td>
                                <h6>GPS Position</h6>
                            </td>
                            <td class="tab-right" style="width: 40%">
                                <p id="gpsPosition">7.123441, 123.012983</p>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-circle" style="color: #a1afff;"></i></td>
                            <td>
                                <h6>GPS Speed</h6>
                            </td>
                            <td>
                                <p id="gpsSpeed">20 Km/h</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="tab-left"><i class="fas fa-circle" style="color: #d1d4e4;"></i></td>
                            <td>
                                <h6>GPS Alt</h6>
                            </td>
                            <td class="tab-right">
                                <p id="gpsAlt">321 m</p>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-circle" style="color: #a1afff;"></i></td>
                            <td>
                                <h6>GPS Sat</h6>
                            </td>
                            <td>
                                <p id="gpsSat">3</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-2 pt-5 side-data">
            <div class="d-flex flex-column justify-content-around" style="height: 90%">
                <div class="card shadow">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="mr-2 text-center">
                            <i id="battery" class="fas fa-battery-full text-success ikon-baterai"></i>
                            <h6 id="batteryState">100%</h6>
                        </div>
                    </div>
                </div>
                <div class="">
                    <h5>Battery Status</h5>
                    <div class="card shadow">
                        <div class="card-body bat-kon">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style="width: 13%"><i class="fas fa-bolt"></i></td>
                                        <td>
                                            <h6>Voltage</h6>
                                        </td>
                                        <td>
                                            <p id="voltage">5%</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-charging-station"></i></td>
                                        <td>
                                            <h6>State of Charge</h6>
                                        </td>
                                        <td>
                                            <p id="soc">9%</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="">
                    <table class="table table-borderless table-kondisi">
                        <tbody>
                            <tr>
                                <td style="width: 13%"><i class="fas fa-star"></i></td>
                                <td class="text-kondisi">
                                    <h6>Vehicle Status</h6>
                                    <p>ini isinya</p>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-bell"></i></td>
                                <td class="text-kondisi">
                                    <h6>Vehicle Health</h6>
                                    <p>ini isinya</p>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-tint"></i></td>
                                <td class="text-kondisi">
                                    <h6>Sensor Health</h6>
                                    <p>ini isinya</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <h5>Message</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
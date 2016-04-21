        <section class="content-header">
          <h1>
            DASHBOARD
          </h1>
          <ol class="breadcrumb">
            <li class="active">Home</li>
          </ol>
        </section>
<!-- Main content -->
        <section class="content">
          <h3>Total Receivables</h3>
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-12">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Total Receivables : Rp xxx,xx</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <div class="col-sm-2">
                    <h3> Current </h3>
                    Rp xxx,xx
                  </div>
                  <div class="col-sm-2">
                    <h3> Overdue </h3>
                    Rp xxx,xx <br/>
                    1-15 days
                  </div>

                  <div class="col-sm-2">
                    <br/><br/><br/>
                    Rp xxx,xx <br/>
                    15-30 days
                  </div>
                  <div class="col-sm-2">
                    <br/><br/><br/>
                    Rp xxx,xx <br/>
                    30-45 days
                  </div>
                  <div class="col-sm-2">
                    <br/><br/><br/>
                    Rp xxx,xx <br/>
                    above 45 days
                  </div>
                  <div style="width:1px; height:100px; background-color:#D8D8D8; margin-left:140px;"></div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sales and Expense</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">This Fiscal Year</a></li>
                        <li><a href="#">Previous Fiscal Year</a></li>
                        <li><a href="#">Last 12 Months</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <!--<p class="text-center">
                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                      </p>-->
                      <div class="chart-responsive">
                        <!-- Sales Chart Canvas -->
                        <canvas id="salesChart" height="180"></canvas>
                      </div><!-- /.chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                      <p class="text-center">
                        <strong>Goal Completion</strong>
                      </p>
                      <div class="progress-group">
                        <span class="progress-text">Quotation</span>
                        <span class="progress-number"><b>160</b>/200</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Invoice</span>
                        <span class="progress-number"><b>310</b>/400</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Payment Received</span>
                        <span class="progress-number"><b>480</b>/800</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Nota</span>
                        <span class="progress-number"><b>250</b>/500</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Delivery Notice</span>
                        <span class="progress-number"><b>250</b>/500</span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-blue" style="width: 80%"></div>
                        </div>
                      </div><!-- /.progress-group -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <!--<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> </span>-->
                        <h5 class="description-header">Rp 35,210.43</h5>
                        <span class="description-text">TOTAL INVOICES</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <!--<span class="description-percentage text-red"><i class="fa fa-caret-down"></i> </span>-->
                        <h5 class="description-header">Rp 35,210.43</h5>
                        <span class="description-text">TOTAL NOTA</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <!--<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> </span>-->
                        <h5 class="description-header">Rp 10,390.90</h5>
                        <span class="description-text">TOTAL RECEIPTS</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <!--<span class="description-percentage text-blue"><i class="fa fa-caret-right"></i> </span>-->
                        <h5 class="description-header">123</h5>
                        <span class="description-text">TOTAL DELIVERIES</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-8">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Sales, Receipts and Dues</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Sales</th>
                          <th>Receipts</th>
                          <th>Dues</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Today</a></td>
                          <td><a href="<?php echo site_url('invoice') ?>">Rp xxx,xx</a></td>
                          <td><a href="<?php echo site_url('payment_received') ?>">Rp xxx,xx</a></td>
                          <td><a href="<?php echo site_url('invoice') ?>">Rp xxx,xx</a></td>
                        </tr>
                        <tr>
                          <td>This Week</a></td>
                          <td><a href="<?php echo site_url('invoice') ?>">Rp xxx,xx</a></td>
                          <td><a href="<?php echo site_url('payment_received') ?>">Rp xxx,xx</a></td>
                          <td><a href="<?php echo site_url('invoice') ?>">Rp xxx,xx</a></td>
                        </tr>
                        <tr>
                          <td>This Month</a></td>
                          <td><a href="<?php echo site_url('invoice') ?>">Rp xxx,xx</a></td>
                          <td><a href="<?php echo site_url('payment_received') ?>">Rp xxx,xx</a></td>
                          <td><a href="<?php echo site_url('invoice') ?>">Rp xxx,xx</a></td>
                        </tr>
                        <tr>
                          <td>This Quarter</a></td>
                          <td><a href="<?php echo site_url('invoice') ?>">Rp xxx,xx</a></td>
                          <td><a href="<?php echo site_url('payment_received') ?>">Rp xxx,xx</a></td>
                          <td><a href="<?php echo site_url('invoice') ?>">Rp xxx,xx</a></td>
                        </tr>
                        <tr>
                          <td>This Year</td>
                          <td><a href="<?php echo site_url('invoice') ?>">Rp xxx,xx</a></td>
                          <td><a href="<?php echo site_url('payment_received') ?>">Rp xxx,xx</a></td>
                          <td><a href="<?php echo site_url('invoice') ?>">Rp xxx,xx</a></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class='col-md-4'>
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Statistic Sales</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="chart-responsive">
                        <canvas id="pieChart" height="150"></canvas>
                      </div><!-- ./chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                      <ul class="chart-legend clearfix">
                        <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                        <li><i class="fa fa-circle-o text-green"></i> IE</li>
                        <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                        <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                        <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                        <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                      </ul>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">United States of America <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                    <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a></li>
                    <li><a href="#">China <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                  </ul>
                </div><!-- /.footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
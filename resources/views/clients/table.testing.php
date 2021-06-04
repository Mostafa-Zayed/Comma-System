<div class="row layout-top-spacing layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <div id="column-filter_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="column-filter" class="table dataTable" role="grid" aria-describedby="column-filter_info" style="width: 1213px;">
                                    <thead>
                                    <tr role="row">
                                        <th class="checkbox-column sorting_asc" rowspan="1" colspan="1" aria-label=" Record No. " style="width: 59px;">
                                            <label class="new-control new-checkbox checkbox-primary m-auto">
                                                <input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">
                                                <span class="new-control-indicator"></span>
                                                <span style="visibility:hidden">c</span>
                                            </label>
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="column-filter" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending" style="width: 199px;">
                                            First Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="column-filter" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 189px;">
                                            Last Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="column-filter" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 276px;">
                                            Email
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="column-filter" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 152px;">
                                            Status
                                        </th>
                                        <th class="text-center sorting" tabindex="0" aria-controls="column-filter" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 139px;">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr role="row" class="active">
                                        <td class="checkbox-column sorting_1">
                                            <label class="new-control new-checkbox checkbox-primary" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                                <input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </td>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>johndoe@yahoo.com</td>
                                        <td><span class="shadow-none badge badge-primary">Approved</span></td>
                                        <td class="text-center"><button class="btn btn-outline-primary">View</button></td>
                                    </tr>
                                    <tr role="row" class="active">
                                        <td class="checkbox-column sorting_1"><label class="new-control new-checkbox checkbox-primary" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                                <input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </td>
                                        <td>Andy</td>
                                        <td>King</td>
                                        <td>andyking@gmail.com</td>
                                        <td><span class="shadow-none badge badge-warning">Pending</span></td>
                                        <td class="text-center"><button class="btn btn-outline-primary">View</button></td>
                                    </tr>
                                    <tr role="row" class="active">
                                        <td class="checkbox-column sorting_1"><label class="new-control new-checkbox checkbox-primary" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                                <input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </td>
                                        <td>Lisa</td>
                                        <td>Doe</td>
                                        <td>lisadoe@live.com</td>
                                        <td><span class="shadow-none badge badge-danger">Suspended</span></td>
                                        <td class="text-center"><button class="btn btn-outline-primary">View</button></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th class="checkbox-column" rowspan="1" colspan="1"></th>
                                        <th rowspan="1" colspan="1">Firt Name</th>
                                        <th rowspan="1" colspan="1">Last Name</th>
                                        <th rowspan="1" colspan="1">Email</th>
                                        <th rowspan="1" colspan="1">Status</th>
                                        <th rowspan="1" colspan="1"></th>
                                        <th><button class="btn btn-danger">Delete*</button></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="column-filter_info" role="status" aria-live="polite">Showing page 1 of 1</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="column-filter_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="column-filter_previous">
                                            <a href="#" aria-controls="column-filter" data-dt-idx="0" tabindex="0" class="page-link">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                                                    <line x1="19" y1="12" x2="5" y2="12"></line>
                                                    <polyline points="12 19 5 12 12 5"></polyline>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="paginate_button page-item active">
                                            <a href="#" aria-controls="column-filter" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                        </li>
                                        <li class="paginate_button page-item next disabled" id="column-filter_next">
                                            <a href="#" aria-controls="column-filter" data-dt-idx="2" tabindex="0" class="page-link">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

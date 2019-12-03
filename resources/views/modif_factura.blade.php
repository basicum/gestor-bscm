@extends('layouts.app')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">


                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs justify-content-end mb-4" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="true">Invoice</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Edit</a>
                            </li>

                        </ul>
                        <div class="card">

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                    <div class="d-sm-flex mb-5" data-view="print">
                                        <span class="m-auto"></span>
                                        <button class="btn btn-primary mb-sm-0 mb-3 print-invoice">Print Invoice</button>
                                    </div>
                                    <!---===== Print Area =======-->
                                    <div id="print-area">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="font-weight-bold">Order Info</h4>
                                                <p>#106</p>
                                            </div>
                                            <div class="col-md-6 text-sm-right">
                                                <p><strong>Order status: </strong> Delivered</p>
                                                <p><strong>Order date: </strong> 10 Dec, 2018</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-4 border-top"></div>
                                        <div class="row mb-5">
                                            <div class="col-md-6 mb-3 mb-sm-0">
                                                <h5 class="font-weight-bold">Bill From</h5>
                                                <p>New Age Inc.</p>
                                                <span style="white-space: pre-line">
                                                rodriguez.trent@senger.com
                                                61 Johnson St. Shirley, NY 11967.

                                                +202-555-0170
                                            </span>
                                            </div>
                                            <div class="col-md-6 text-sm-right">
                                                <h5 class="font-weight-bold">Bill To</h5>
                                                <p>UI Lib</p>
                                                <span style="white-space: pre-line">
                                                sales@ui-lib.com
                                                8254 S. Garfield Street. Villa Rica, GA 30180.

                                                +1-202-555-0170
                                            </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover mb-4">
                                                    <thead class="bg-gray-300">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Item Name</th>
                                                        <th scope="col">Unit Price</th>
                                                        <th scope="col">Unit</th>
                                                        <th scope="col">Cost</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Product 1</td>
                                                        <td>300</td>
                                                        <td>2</td>
                                                        <td>600</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Product 2</td>
                                                        <td>200</td>
                                                        <td>3</td>
                                                        <td>600</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="invoice-summary">
                                                    <p>Sub total: <span>$1200</span></p>
                                                    <p>Vat: <span>$120</span></p>
                                                    <h5 class="font-weight-bold">Grand Total: <span> $1320</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--==== / Print Area =====-->
                                </div>
                                <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                    <!--==== Edit Area =====-->
                                    <div class="d-flex mb-5">
                                        <span class="m-auto"></span>
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="font-weight-bold">Order Info</h4>
                                                <div class="col-sm-4 form-group mb-3 pl-0">
                                                    <label for="orderNo">Order Number</label>
                                                    <input type="text" class="form-control" id="orderNo" placeholder="Enter order number">
                                                </div>
                                            </div>
                                            <div class="col-md-3 offset-md-3 text-right">
                                                <label class="d-block text-12 text-muted">Order Status</label>
                                                <div class="col-md-6 offset-md-6 pr-0 mb-4">
                                                    <label class="radio radio-reverse radio-danger">
                                                        <input type="radio" name="orderStatus" value="Pending">
                                                        <span>Pending</span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="radio radio-reverse radio-warning">
                                                        <input type="radio" name="orderStatus" value="Processing">
                                                        <span>Processing</span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="radio radio-reverse radio-success">
                                                        <input type="radio" name="orderStatus" value="Delivered">
                                                        <span>Delivered</span>
                                                        <span class="checkmark"></span>
                                                    </label>

                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="order-datepicker">Order Date</label>
                                                    <input id="order-datepicker" class="form-control text-right picker__input" placeholder="yyyy-mm-dd" name="dp" readonly="" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="order-datepicker_root"><div class="picker" id="order-datepicker_root" aria-hidden="true"><div class="picker__holder" tabindex="-1"><div class="picker__frame"><div class="picker__wrap"><div class="picker__box"><div class="picker__header"><div class="picker__month">December</div><div class="picker__year">2019</div><div class="picker__nav--prev" data-nav="-1" role="button" aria-controls="order-datepicker_table" title="Previous month"> </div><div class="picker__nav--next" data-nav="1" role="button" aria-controls="order-datepicker_table" title="Next month"> </div></div><table class="picker__table" id="order-datepicker_table" role="grid" aria-controls="order-datepicker" aria-readonly="true"><thead><tr><th class="picker__weekday" scope="col" title="Sunday">Sun</th><th class="picker__weekday" scope="col" title="Monday">Mon</th><th class="picker__weekday" scope="col" title="Tuesday">Tue</th><th class="picker__weekday" scope="col" title="Wednesday">Wed</th><th class="picker__weekday" scope="col" title="Thursday">Thu</th><th class="picker__weekday" scope="col" title="Friday">Fri</th><th class="picker__weekday" scope="col" title="Saturday">Sat</th></tr></thead><tbody><tr><td role="presentation"><div class="picker__day picker__day--infocus picker__day--today picker__day--highlighted" data-pick="1575154800000" role="gridcell" aria-label="1 December, 2019" aria-activedescendant="true">1</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1575241200000" role="gridcell" aria-label="2 December, 2019">2</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1575327600000" role="gridcell" aria-label="3 December, 2019">3</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1575414000000" role="gridcell" aria-label="4 December, 2019">4</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1575500400000" role="gridcell" aria-label="5 December, 2019">5</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1575586800000" role="gridcell" aria-label="6 December, 2019">6</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1575673200000" role="gridcell" aria-label="7 December, 2019">7</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1575759600000" role="gridcell" aria-label="8 December, 2019">8</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1575846000000" role="gridcell" aria-label="9 December, 2019">9</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1575932400000" role="gridcell" aria-label="10 December, 2019">10</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1576018800000" role="gridcell" aria-label="11 December, 2019">11</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1576105200000" role="gridcell" aria-label="12 December, 2019">12</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1576191600000" role="gridcell" aria-label="13 December, 2019">13</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1576278000000" role="gridcell" aria-label="14 December, 2019">14</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1576364400000" role="gridcell" aria-label="15 December, 2019">15</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1576450800000" role="gridcell" aria-label="16 December, 2019">16</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1576537200000" role="gridcell" aria-label="17 December, 2019">17</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1576623600000" role="gridcell" aria-label="18 December, 2019">18</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1576710000000" role="gridcell" aria-label="19 December, 2019">19</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1576796400000" role="gridcell" aria-label="20 December, 2019">20</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1576882800000" role="gridcell" aria-label="21 December, 2019">21</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1576969200000" role="gridcell" aria-label="22 December, 2019">22</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1577055600000" role="gridcell" aria-label="23 December, 2019">23</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1577142000000" role="gridcell" aria-label="24 December, 2019">24</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1577228400000" role="gridcell" aria-label="25 December, 2019">25</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1577314800000" role="gridcell" aria-label="26 December, 2019">26</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1577401200000" role="gridcell" aria-label="27 December, 2019">27</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1577487600000" role="gridcell" aria-label="28 December, 2019">28</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1577574000000" role="gridcell" aria-label="29 December, 2019">29</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1577660400000" role="gridcell" aria-label="30 December, 2019">30</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1577746800000" role="gridcell" aria-label="31 December, 2019">31</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1577833200000" role="gridcell" aria-label="1 January, 2020">1</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1577919600000" role="gridcell" aria-label="2 January, 2020">2</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1578006000000" role="gridcell" aria-label="3 January, 2020">3</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1578092400000" role="gridcell" aria-label="4 January, 2020">4</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1578178800000" role="gridcell" aria-label="5 January, 2020">5</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1578265200000" role="gridcell" aria-label="6 January, 2020">6</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1578351600000" role="gridcell" aria-label="7 January, 2020">7</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1578438000000" role="gridcell" aria-label="8 January, 2020">8</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1578524400000" role="gridcell" aria-label="9 January, 2020">9</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1578610800000" role="gridcell" aria-label="10 January, 2020">10</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1578697200000" role="gridcell" aria-label="11 January, 2020">11</div></td></tr></tbody></table><div class="picker__footer"><button class="picker__button--today" type="button" data-pick="1575154800000" disabled="" aria-controls="order-datepicker">Today</button><button class="picker__button--clear" type="button" data-clear="1" disabled="" aria-controls="order-datepicker">Clear</button><button class="picker__button--close" type="button" data-close="true" disabled="" aria-controls="order-datepicker">Close</button></div></div></div></div></div></div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3 mb-4 border-top"></div>
                                        <div class="row mb-5">
                                            <div class="col-md-6">
                                                <h5 class="font-weight-bold">Bill From</h5>
                                                <div class="col-md-10 form-group mb-3 pl-0">
                                                    <input type="text" class="form-control" id="billFrom" placeholder="Bill From">
                                                </div>
                                                <div class="col-md-10 form-group mb-3 pl-0">
                                                    <textarea class="form-control" placeholder="Bill From Address"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6 text-right">
                                                <h5 class="font-weight-bold">Bill To</h5>
                                                <div class="col-md-10 offset-md-2 form-group mb-3 pr-0">
                                                    <input type="text" class="form-control text-right" id="billFrom2" placeholder="Bill From">
                                                </div>
                                                <div class="col-md-10 offset-md-2 form-group mb-3 pr-0">
                                                    <textarea class="form-control text-right" placeholder="Bill From Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 table-responsive">
                                                <table class="table table-hover mb-3">
                                                    <thead class="bg-gray-300">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Item Name</th>
                                                        <th scope="col">Unit Price</th>
                                                        <th scope="col">Unit</th>
                                                        <th scope="col">Cost</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                            <input value="Product 1" type="text" class="form-control" placeholder="Item Name">
                                                        </td>
                                                        <td>
                                                            <input value="300" type="number" class="form-control" placeholder="Unit Price">
                                                        </td>
                                                        <td>
                                                            <input value="2" type="number" class="form-control" placeholder="Unit">
                                                        </td>
                                                        <td>600</td>
                                                        <td>
                                                            <button class="btn btn-outline-secondary float-right">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>
                                                            <input value="Product 1" type="text" class="form-control" placeholder="Item Name">
                                                        </td>
                                                        <td>
                                                            <input value="300" type="number" class="form-control" placeholder="Unit Price">
                                                        </td>
                                                        <td>
                                                            <input value="2" type="number" class="form-control" placeholder="Unit">
                                                        </td>
                                                        <td>600</td>
                                                        <td>
                                                            <button class="btn btn-outline-secondary float-right">Delete</button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <button class="btn btn-primary float-right mb-4">Add Item</button>
                                            </div>

                                            <div class="col-md-12">

                                                <div class="invoice-summary invoice-summary-input">
                                                    <p>Sub total: <span>$1200</span></p>
                                                    <p class="d-flex align-items-center">Vat(%):<span>
                                                        <input type="text" class="form-control small-input" value="10">$120</span>
                                                    </p>
                                                    <h5 class="font-weight-bold d-flex align-items-center">Grand Total:
                                                        <span>
                                                        <input type="text" class="form-control small-input" value="$">
                                                        $1320
                                                    </span>
                                                    </h5>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <!--==== / Edit Area =====-->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
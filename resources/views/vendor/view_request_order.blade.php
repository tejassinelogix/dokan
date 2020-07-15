@extends('vendor.layouts.master')
@section('content')
@include('vendor.include.top')
<body>
   <div class="main-content" id="panel">
      <!-- Topnav -->
      <!-- Header -->
      <!-- Header -->
      @include('vendor.include.sidebar')
      <!-- Page content -->
      <div class="container-fluid mt--6">
   <div class="row">
      <div class="col-xl-12">
         <div class="card dasbdr_wrapper">
            <div class="cph">
               <div class="row section-header justify-content-between">
                  <div class="cus_title col-md-4">
                     <font style="vertical-align: inherit;">View Order Details</font>
                  </div>
                  <!-- <div class="options float-right">
                     <button type="submit" name="save" value="save" class="btn btn-warning">
                     <i class="fa fa-check"></i>
                     <span><font style="vertical-align: inherit;">Save</font></span>
                     </button>
                     <button type="submit" name="save" value="save-continue" class="btn btn-secondary">
                     <span><font style="vertical-align: inherit;">Save and continue Editing</font></span>
                     </button>
                  </div> -->
               </div>
               <div class="cus_dashboard">
                  <div class="row mt-2">
                     <div class="col-xl-12">
                        <div class="card shadow-sm mb-4">
                           <div class="tabbable tabs-left tabs-autoselect row new_horizon_tab_outer">
                              <div class="col-lg-12 nav-aside">
                                 <ul class="nav nav-tabs nav-tabs-line">
                                    <li class="nav-item"><a href="#tab-1" data-toggle="tab" data-loaded="true" class="nav-link active show"><span class="tab-caption"><font style="vertical-align: inherit;">General</font></span></a></li>
                                    <li class="nav-item"><a href="#tab-2" data-toggle="tab" data-loaded="true" class="nav-link"><span class="tab-caption"><font style="vertical-align: inherit;">Billing & Shipping</font></span></a></li>
                                    <li class="nav-item"><a href="#tab-3" data-toggle="tab" data-loaded="true" class="nav-link"><span class="tab-caption"<font style="vertical-align: inherit;">Products</font></span></a></li>
                                 </ul>
                              </div>
                              <div class="col-lg-12 nav-content">
                                 <div class="tab-content">
                                    <div class="tab-pane fade active show" role="tabpanel" id="tab-1">
                                       <table class="add_new_tbl">
                                          <tbody>
                                             <tr>
                                                <td class="adminTitle">
                                                   <div class="ctl-label">
                                                      <label><font style="vertical-align: inherit;">Order Status</font>
                                                      </label><a class="hint" href="#" onclick="return false;" tabindex="-1" data-toggle="tooltip" data-placement="left" title="The name of the specification attribute."><i class="fa fa-question-circle"></i></a>
                                                   </div>
                                                </td>
                                                <td class="adminData">
                                                   <div class="form-control-plaintext">{{ $RequestOrder->payment_status }}
                                                   </div>
                                                  <div>
                                                    <button type="submit" name="cancelorder" id="cancelorder" data-url="{{ url('vendor/order/cancel') }}" data-id="{{$RequestOrder->id}}" class="btn btn-sm btn-danger ask-to-proceed" value="Cancel order">
                                                      <span>Cancel order</span>
                                                    </button>

                                                    <button type="submit" name="completeorder" id="completeorder"  data-url="{{ url('vendor/order/complete') }}" data-id="{{$RequestOrder->id}}" class="btn btn-sm btn-warning ask-to-proceed" value="Complete">
                                                      <i class="fa fa-check"></i>
                                                      <span>Complete</span>
                                                    </button>
                                                  </div>                                
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="adminTitle">
                                                   <div class="ctl-label">
                                                      <label><font style="vertical-align: inherit;">Order Number</font>
                                                      </label><a class="hint" href="#" onclick="return false;" tabindex="-1" data-toggle="tooltip" data-placement="left" title="The name of the specification attribute."><i class="fa fa-question-circle"></i></a>
                                                   </div>
                                                </td>
                                                <td class="adminData">
                                                   <div class="form-control-plaintext">{{ $data[0]->id }}
                                                   </div>                                
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="adminTitle">
                                                   <div class="ctl-label">
                                                      <label><font style="vertical-align: inherit;">Order Refrence Number</font>
                                                      </label><a class="hint" href="#" onclick="return false;" tabindex="-1" data-toggle="tooltip" data-placement="left" title="The name of the specification attribute."><i class="fa fa-question-circle"></i></a>
                                                   </div>
                                                </td>
                                                <td class="adminData">
                                                   <div class="form-control-plaintext">ORD000001
                                                   </div>                                
                                                </td>
                                             </tr>
                                             <tr class="brek"></tr>
                                             <tr>
                                                <td class="adminTitle">
                                                   <div class="ctl-label">
                                                      <label><font style="vertical-align: inherit;">Customer</font>
                                                      </label><a class="hint" href="#" onclick="return false;" tabindex="-1" data-toggle="tooltip" data-placement="left" title="The name of the specification attribute."><i class="fa fa-question-circle"></i></a>
                                                   </div>
                                                </td>
                                                <td class="adminData">
                                                   <div class="form-control-plaintext">{{ $RequestOrder->buyer_name }}
                                                   </div>                                
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="adminTitle">
                                                   <div class="ctl-label">
                                                      <label><font style="vertical-align: inherit;">Order SubTotal</font>
                                                      </label><a class="hint" href="#" onclick="return false;" tabindex="-1" data-toggle="tooltip" data-placement="left" title="The name of the specification attribute."><i class="fa fa-question-circle"></i></a>
                                                   </div>
                                                </td>
                                                <td class="adminData">
                                                   <div class="form-control-plaintext">{{ $data[0]->product_price }}
                                                   </div>                                
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="adminTitle">
                                                   <div class="ctl-label">
                                                      <label><font style="vertical-align: inherit;">Order Total</font>
                                                      </label><a class="hint" href="#" onclick="return false;" tabindex="-1" data-toggle="tooltip" data-placement="left" title="The name of the specification attribute."><i class="fa fa-question-circle"></i></a>
                                                   </div>
                                                </td>
                                                <td class="adminData">
                                                   <div class="form-control-plaintext">{{ $data[0]->product_price }}
                                                   </div>                                
                                                </td>
                                             </tr>
                                             <tr class="brek"></tr>
                                             <tr>
                                                <td class="adminTitle">
                                                   <div class="ctl-label">
                                                      <label><font style="vertical-align: inherit;">Payment Method</font>
                                                      </label><a class="hint" href="#" onclick="return false;" tabindex="-1" data-toggle="tooltip" data-placement="left" title="The name of the specification attribute."><i class="fa fa-question-circle"></i></a>
                                                   </div>
                                                </td>
                                                <td class="adminData">
                                                   <div class="form-control-plaintext">XYZ
                                                   </div>                                
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="adminTitle">
                                                   <div class="ctl-label">
                                                      <label><font style="vertical-align: inherit;">Payment Status</font>
                                                      </label><a class="hint" href="#" onclick="return false;" tabindex="-1" data-toggle="tooltip" data-placement="left" title="The name of the specification attribute."><i class="fa fa-question-circle"></i></a>
                                                   </div>
                                                </td>
                                                <td class="adminData">
                                                   <div class="form-control-plaintext">Pending
                                                   </div>                                
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="adminTitle">
                                                   <div class="ctl-label">
                                                      <label><font style="vertical-align: inherit;">Created on</font>
                                                      </label><a class="hint" href="#" onclick="return false;" tabindex="-1" data-toggle="tooltip" data-placement="left" title="The name of the specification attribute."><i class="fa fa-question-circle"></i></a>
                                                   </div>
                                                </td>
                                                <td class="adminData">
                                                   <div class="form-control-plaintext">{{ $RequestOrder->created_at }}
                                                   </div>                                
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="adminTitle">
                                                   <div class="ctl-label">
                                                      <label><font style="vertical-align: inherit;">Updated on</font>
                                                      </label><a class="hint" href="#" onclick="return false;" tabindex="-1" data-toggle="tooltip" data-placement="left" title="The name of the specification attribute."><i class="fa fa-question-circle"></i></a>
                                                   </div>
                                                </td>
                                                <td class="adminData">
                                                   <div class="form-control-plaintext">{{ $RequestOrder->updated_at }}
                                                   </div>                                
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="tab-2">
                                       <div class="locale-editor">
                                          <div class="nav-locales tabbable" id="category-seo-localized">
                                             <div class="tab-content">
                                                <div class="locale-editor-content tab-pane fade show active" data-lang="de-DE" data-rtl="false" role="tabpanel" id="category-seo-localized-1">  
                                                   <div class="row">
                                                    <div class="card-deck card-cols-sm-1 card-cols-lg-3 col-md-12">
                                                      <div class="card">
                                                        <div class="card-body">
                                                          <h3 class="card-title">Billing Address</h3>
                                                            <div class="mb-2">
                                                              Max Mustermann<br>Max Mustermann<br>Musterweg 1<br>12345 Musterstadt<br>DEUTSCHLAND
                                                            </div>
                                                            <div class="email">
                                                              Email: admin@meineshopurl.de
                                                            </div>
                                                            <div class="phone">
                                                              Phone: 12345678
                                                            </div>
                                                          </div>
                                                        </div>     
                                                        <div class="card">
                                                            <div class="card-body">
                                                              <h3 class="card-title">Shipping Address</h3>
                                                                <div class="mb-2">
                                                                  Max Mustermann<br>Max Mustermann<br>Musterweg 1<br>12345 Musterstadt<br>DEUTSCHLAND
                                                                </div>
                                                                <div class="email">
                                                                  Email: admin@meineshopurl.de
                                                                </div>
                                                                  <div class="phone">
                                                                    Phone: 12345678
                                                                  </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                
                                             </div>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="tab-pane fade" role="tabpanel" id="tab-3">
                                       <div class="table-responsive">
                                          <table id="OrderItemTable" class="table admin-table">
                                             <thead>
                                                <tr>
                                                   <th>
                                                      Product name
                                                   </th>
                                                   <th class="text-center">
                                                      Price
                                                   </th>
                                                   <th class="text-center">
                                                      Quantity
                                                   </th>
                                                   <th class="text-center">
                                                      Discount
                                                   </th>
                                                   <th class="text-center">
                                                      Total
                                                   </th>
                                                   <th></th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr>
                                                   <td style="width: 25%;" class="align-top">
                                                      <div>
                                                         <div class="mb-2">
                                                            <span class="badge badge-secondary d-none mr-1"></span><a href="/backend/Admin/Product/Edit/254" title="Ladies’ Sports Jacket">Ladies’ Sports Jacket</a>
                                                         </div>
                                                            <br>
                                                            <span class="font-weight-medium">SKU</span>:
                                                         112348                                        </div>
                                                   </td>
                                                   <td style="width: 15%;" class="align-top">
                                                      <div class="text-center">
                                                         52,00 € incl tax                    
                                                      </div>
                                                   </td>
                                                   <td align="center" style="width: 5%" class="align-top">
                                                      <div>
                                                         1
                                                      </div>
                                                   </td>
                                                   <td align="center" style="width: 14%;" class="align-top">
                                                      <div>
                                                         0,00 € incl tax                     
                                                      </div>
                                                   </td>
                                                   <td align="center" style="width: 14%" class="align-top">
                                                      <div>
                                                         52,00 € incl tax                    
                                                      </div>
                                                   </td>
                                                   
                                                </tr>
                                                <tr>
                                                   <td style="width: 25%;" class="align-top">
                                                      <div>
                                                         <div class="mb-2">
                                                            <span class="badge badge-secondary d-none mr-1"></span><a href="/backend/Admin/Product/Edit/254" title="Ladies’ Sports Jacket">Ladies’ Sports Jacket</a>
                                                         </div>
                                                            <br>
                                                            <span class="font-weight-medium">SKU</span>:
                                                         112348                                        </div>
                                                   </td>
                                                   <td style="width: 15%;" class="align-top">
                                                      <div class="text-center">
                                                         52,00 € incl tax                    
                                                      </div>
                                                   </td>
                                                   <td align="center" style="width: 5%" class="align-top">
                                                      <div>
                                                         1
                                                      </div>
                                                   </td>
                                                   <td align="center" style="width: 14%;" class="align-top">
                                                      <div>
                                                         0,00 € incl tax                     
                                                      </div>
                                                   </td>
                                                   <td align="center" style="width: 14%" class="align-top">
                                                      <div>
                                                         52,00 € incl tax                    
                                                      </div>
                                                   </td>
                                                   
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Footer -->
   @include('vendor.include.footer')
</div>
   </div>
   @include('vendor.include.bottom')
</body>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
         $('#completeorder').on('click', function(e) {
                    var join_selected_values = $(this).attr('data-id'); 
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            setTimeout("window.location.href='http://127.0.0.1:8000/vendor/order_request'",1000);
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });  
        });

         $('#cancelorder').on('click', function(e) {
                    var join_selected_values = $(this).attr('data-id'); 
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            setTimeout("window.location.href='http://127.0.0.1:8000/vendor/order_request'",1000);
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });  
        });
    });
</script>

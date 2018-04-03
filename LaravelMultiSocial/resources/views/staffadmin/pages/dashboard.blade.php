@extends('staffadmin.layouts.app')

@section('admincontent')
<div class="app-title">
<div>
<h1><i class="fa fa-dashboard"></i> Dashboard</h1>
</div>
<ul class="app-breadcrumb breadcrumb">
<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
</ul>
</div>
<div class="row">
<div class="col-md-6 col-lg-3">
<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
  <div class="info">
    <h4>Users</h4>
    <p><b>21</b></p>
  </div>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="widget-small info coloured-icon"><i class="icon fa fa-user-secret"></i>
  <div class="info">
    <h4>Staff</h4>
    <p><b>5</b></p>
  </div>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
  <div class="info">
    <h4>Categories</h4>
    <p><b>5</b></p>
  </div>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
  <div class="info">
    <h4>Products</h4>
    <p><b>500</b></p>
  </div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-2 vcenter" align="middle">
<div class="tile" >
  <div class="tile-title-w-btn">
    <h4 class="title">Select Date</h4>
  </div>
  <div class="tile-body">
    <p>Select Date to see the Inventory:</p>
    <input class="form-control" id="demoDate" type="text" placeholder="Select Date">
  </div>
  <br>
  <button class="btn btn-primary" >Next</button>
</div>
</div>
<div class="col-md-4" align="middle">
<div class="tile">
  <div class="tile-title-w-btn">
    <h3 class="title">Select Category</h3>
  </div>
  <div class="title-body">
    <p>Select Suitable category to see Inventory:</p>
  </div>
  <div class="bs-component">
    <div class="list-group" id="highlight1">
      <a class="list-group-item list-group-item-action active" id="Instruments" onclick="hone('Instruments')" href="#" >Instruments</a>
      <a class="list-group-item list-group-item-action" id="Music" onclick="hone('Music')" href="#">Music</a>
      <a class="list-group-item list-group-item-action" id="Utensils" onclick="hone('Utensils')" href="#">Utensils</a>
      <a class="list-group-item list-group-item-action" id="Electronics" onclick="hone('Electronics')" href="#">Electronics</a>
      <a class="list-group-item list-group-item-action" id="Costumes" onclick="hone('Costumes')" href="#">Costumes</a>
    </div>
    <script type="text/javascript">
    function hone(idval)
    {
      var x= document.getElementById("highlight1");
      Array.prototype.forEach.call(x.children, i => {
        i.classList.remove("active");});
        var x= document.getElementById(idval);
        x.classList.add("active");
      };
      </script>
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="tile">
    <h3 class="tile-title">Products Stock</h3>
    <div class="embed-responsive embed-responsive-16by9">
      <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
    </div>
  </div>
</div>
</div>
<div class="row">
<div class="col-md-6">
  <div class="tile">
    <h3 class="tile-title">Outgoing Products</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Product Name</th>
          <th>Society Name</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
              Collect
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Collect product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- Collect products logic -->
                    <div class="form-group">
                      {{ csrf_field() }}
                      <label class="control-label" for="prodID"><b>Product ID:</b></label>
                      <input type="prodID" class="form-control collect-from" value="{{ old('product_id', $collectData->product_id) }}" onkeypress="SendTab('studID', event);"id="prodID" placeholder="Enter product ID" name="prodID" required disabled>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="studID"><b>Student ID:</b></label>
                      <input type="studID"  class="form-control collect-from" onkeypress="SendTab('bookID', event);" id="studID" placeholder="Enter student ID" name="studID" required>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="bookID"><b>Booking ID:</b></label>
                      <input type="bookID"  class="form-control collect-from" id="bookID" value="{{ old('booking_id', $collectData->booking_id) }}" name="bookID" required disabled>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="staff"><b>Staff Incharge:</b></label>
                      <select class="form-control collect-from" id="staff" name="staff">
                        <option value="" selected disabled hidden>Please select</option>
                        <option>1234</option>
                        <option>5678</option>
                        <option>9876</option>
                        <option>5432</option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="submitform()" class="btn btn-info"><b>Collect</b></button>
                  </div>
                </div>
              </div>
            </div>

          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>

<div class="col-md-6">
  <div class="tile">
    <h3 class="tile-title">Incoming Products</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Product Name</th>
          <th>Society Name</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
              Return
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Return product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <form class="form-horizontal" action="/collecting" method="post" id="returnfrom">
                        <div class="form-group">
                          {{ csrf_field() }}
                          <label class="control-label" for="prodID"><b>Product ID:</b></label>
                          <input type="prodID" class="form-control" id="prodID" value="{{ old('prod_id', $collectData->product_id) }}" name="prodID" readonly>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="bookID"><b>Booking ID:</b></label>
                          <input type="bookID" class="form-control" id="bookID" value="{{ old('booking_id', $collectData->booking_id) }}" name="bookID" readonly>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="staff"><b>Staff Incharge:</b></label>
                          <select class="form-control" id="staff" name="staff">
                            <option value="" selected disabled hidden>Please select</option>
                            <option>1234</option>
                            <option>5678</option>
                            <option>9876</option>
                            <option>5432</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="bookID"><b>Comments:</b></label>
                          <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" onclick="document.getElementById('returnfrom').submit();"class="btn btn-primary"><b>Return</b></button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
      function SendTab( strField, evtKeyPress){
        var aKey = evtKeyPress.keyCode ?
        evtKeyPress.keyCode :evtKeyPress.which ?
        evtKeyPress.which : evtKeyPress.charCode;

        if (aKey == 13){
          document.getElementById(strField).focus();
        }
      }


      function submitform(){
        method = "post";
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", "/insert");

        var x=document.getElementsByClassName("collect-from")
        try{
          Array.prototype.forEach.call(x, i => {
            var j=i.value;
            if(j.length == 0)
            {
              i.focus();
              throw "Enter all values";
            }
            var Field = document.createElement("input");
            Field.setAttribute("type", "hidden");
            Field.setAttribute("name", i.name);
            Field.setAttribute("value", i.value);
            form.appendChild(Field);
          });

          var Field = document.createElement("input");
          Field.setAttribute("type", "hidden");
          Field.setAttribute("name", "_token");
          Field.setAttribute("value", <?php echo "'".csrf_token()."'"; ?>);
          form.appendChild(Field);
          document.body.appendChild(form);
          form.submit();
        }
        catch(err)
        {
          alert(err);
        }
      }
      </script>
@endsection

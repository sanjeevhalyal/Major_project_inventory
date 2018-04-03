@extends('staffadmin.layouts.app')

@section('admincontent')
<div class="app-title">
         <div>
           <h1><i class="fa fa-address-book-o"></i> UserList</h1>
         </div>
         <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
         </ul>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="tile">
             <div class="tile-body">
               <table class="table table-hover table-bordered" id="sampleTable">
                 <thead>
                   <tr>
                     <th></th>
                     <th>UserId</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Position</th>
                     <th>Society</th>
                     <th>Role</th>
                     <th>Status</th>
                   </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <td><input type="checkbox"></td>
                     <td>1</td>
                     <td>Sagar</td>
                     <td>s.gantyala1@nuigalway.ie</td>
                     <td>System Administrator</td>
                     <td>CompSoc</td>
                     <td>User</td>
                     <td>Pending</td>
                   </tr>
                   <tr>
                     <td><input type="checkbox"></td>
                     <td>2</td>
                     <td>Sagar</td>
                     <td>Gantyala</td>
                     <td>System Secretary</td>
                     <td>CompSoc</td>
                     <td>User</td>
                     <td>Pending</td>
                   </tr>
                   <tr>
                     <td><input type="checkbox"></td>
                     <td>3</td>
                     <td>Sagar</td>
                     <td>Gantyala</td>
                     <td>System Secretary</td>
                     <td>CompSoc</td>
                     <td>User</td>
                     <td>Pending</td>
                   </tr>
                   <tr>
                     <td><input type="checkbox"></td>
                     <td>4</td>
                     <td>Sagar</td>
                     <td>Gantyala</td>
                     <td>System Secretary</td>
                     <td>CompSoc</td>
                     <td>User</td>
                     <td>Pending</td>
                   </tr>
                   <tr>
                     <td><input type="checkbox"></td>
                     <td>22</td>
                     <td>Sagar</td>
                     <td>Gantyala</td>
                     <td>System Secretary</td>
                     <td>CompSoc</td>
                     <td>Staff</td>
                     <td>Pending</td>
                   </tr>
                 </tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-4" align="center">
           <button class="btn btn-primary btn-lg" type="button">Make Staff</button>
         </div>
         <div class="col-lg-4" align="center">
           <button class="btn btn-primary btn-lg" type="button">Export Users List</button>
         </div>
         <div class="col-lg-4" align="center">
           <button class="btn btn-primary btn-lg" type="button">Remove User</button>
         </div>
       </div>
       @endsection

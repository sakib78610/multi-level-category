@extends('admin.layouts.master')
@section('body')
     <div class="app-main__inner">
         <div class="app-page-title">
             <div class="page-title-wrapper">
                 <div class="page-title-heading">
                     <div class="page-title-icon">
                         <i class="fa fa-user" aria-hidden="true"></i>
                     </div>
                     <div>All Users
                     </div>
                 </div>
             </div>
         </div>            
         <div class="row">
             <div class="col-lg-12">
                 <div class="main-card mb-3 card">
                     <div class="card-body">
                        <h5 class="card-title">All Users</h5>
                         <table class="mb-0 table">
                             <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>User Type</th>
                             </tr>
                             </thead>
                             <tbody>
                            @foreach($all_users as $key => $user)
                             <tr>
                                 <th scope="row">{{ $user->id }}</th>
                                 <td>{{ $user->name }}</td>
                                 <td>{{ $user->email }}</td>
                                 @if($user->user_type==1)
                                 <td>Admin</td>
                                 @else
                                 <td>User</td>
                                 @endif
                             </tr>
                            @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         
     </div>
 </div>

 <div style="margin-left: 820px;">
 	{{$all_users->links("pagination::bootstrap-4")}}
 </div>

@section('js')

@endsection
@endsection



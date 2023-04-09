@extends('admin.layouts.master')
@section('body')
<div class="app-main__inner">
@if(Auth::user()->user_type==Config::get('constants.const.admin'))
{{-- Admin dashboard --}}
           <div class="row">
               <div class="col-md-6 col-xl-4">
                   <div class="card mb-3 widget-content bg-midnight-bloom">
                       <div class="widget-content-wrapper text-white">
                           <div class="widget-content-left">
                               <div class="widget-heading">Admin</div>
                           </div>
                           <div class="widget-content-right">
                               <div class="widget-numbers text-white"><span>{{ $admin_count }}</span></div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-6 col-xl-4">
                   <div class="card mb-3 widget-content bg-arielle-smile">
                       <div class="widget-content-wrapper text-white">
                           <div class="widget-content-left">
                               <div class="widget-heading">Users</div>
                           </div>
                           <div class="widget-content-right">
                               <div class="widget-numbers text-white"><span>{{ $users_count }}</span></div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-6 col-xl-4">
                   <div class="card mb-3 widget-content bg-grow-early">
                       <div class="widget-content-wrapper text-white">
                           <div class="widget-content-left">
                               <div class="widget-heading">Categories</div>
                           </div>
                           <div class="widget-content-right">
                               <div class="widget-numbers text-white"><span>3</span></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div> 
@else
{{-- Users dashboard --}}
           <div class="row">
               <div class="col-md-6 col-xl-4">
                   <div class="card mb-3 widget-content bg-grow-early">
                       <div class="widget-content-wrapper text-white">
                           <div class="widget-content-left">
                               <div class="widget-heading">Categories</div>
                           </div>
                           <div class="widget-content-right">
                               <div class="widget-numbers text-white"><span>3</span></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
@endif 

<div class="row">
<div class="col-md-12">
  <ul>
    @foreach ($categories as $category)
        <li>{{ $category->name }}</li>
        <ul>
        @foreach ($category->childrenCategories as $childCategory)
            @include('admin.category.view', ['child_category' => $childCategory])
        @endforeach
        </ul>
    @endforeach
 </ul>
</div>
</div>
  
</div>
        

        


@section('js')
@endsection
@endsection
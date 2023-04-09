@extends('admin.layouts.master')
@section('body')
     <div class="app-main__inner">
         <div class="app-page-title">
             <div class="page-title-wrapper">
                 <div class="page-title-heading">
                     <div class="page-title-icon">
                         <i class="fa fa-list" aria-hidden="true"></i>
                     </div>
                     <div>Categories
                     </div>

                 </div>
             </div>
             <span style="float: right;"><button type="button" class="btn btn-primary add-parent" data-toggle="modal" data-target="#addParentCategoryModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Parent Category</button></span><br>
         </div>            
          <div class="row">
            <div class="col-md-12">
              <div class="card"><br>
                <div class="card-header">
                  <h3>Categories</h3>
                </div>
                <div class="card-body">
                  <ul>
                  @foreach ($categories as $category)
                      <li class="list-group-item">
                       <div class="d-flex justify-content-between">
                                        <h6><b>{{ $category->name }}</b></h6>
                                        <div class="button-group d-flex">
                                          <button type="button" style="height: 24px;" class="btn btn-sm btn-secondary mr-1 add-sub-category" data-toggle="modal" data-target="#addSubCategoryModal" data-id="{{ $category->id }}" data-name="{{ $category->name }}"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>              

                                          <button type="button" style="height: 24px;" class="btn btn-sm btn-secondary mr-1 edit-category" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $category->id }}" data-name="{{ $category->name }}"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                          <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                          </form>
                                        </div>
                                      </div>
                      </li>
                      <ul>
                      @foreach ($category->childrenCategories as $childCategory)
                          @include('admin.category.child_category', ['child_category' => $childCategory])
                      @endforeach
                      </ul>
                  @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
     </div>
@endsection
{{-- Add parent category --}}
<div class="modal fade" id="addParentCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Parent Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Category Name" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Add sub category --}}
<div class="modal fade" id="addSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sub Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                 <label>Main Category</label>
                 <input type="text" name="main_cat" class="form-control" value="" disabled>
                </div>
                <div class="form-group">
                 <label>Sub Category</label>
                 <input type="text" name="name" class="form-control" value="" placeholder="Enter Sub Category Name" required>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary close-update" data-bs-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit category --}}
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                 <input type="text" name="name" class="form-control" value="" placeholder="Category Name" required>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary close-update" data-bs-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

@section('js')
        <script type="text/javascript">  
          $('.edit-category').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var url = "{{ url('admin/category') }}/"+id;
            $('#editCategoryModal form').attr('action', url);
            $('#editCategoryModal form input[name="name"]').val(name);
          });

          $('.add-sub-category').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var url = "{{ url('admin/sub-category') }}/"+id;
            $('#addSubCategoryModal form').attr('action', url);
            $('#addSubCategoryModal form input[name="main_cat"]').val(name);
          });
        </script>
@endsection




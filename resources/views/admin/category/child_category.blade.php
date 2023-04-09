<li class="list-group-item">
      <div class="d-flex justify-content-between">
        {{ $child_category->name }}
        <div class="button-group d-flex">
          <button type="button" style="height: 24px;" class="btn btn-sm btn-secondary mr-1 add-sub-category" data-toggle="modal" data-target="#addSubCategoryModal" data-id="{{ $child_category->id }}" data-name="{{ $child_category->name }}"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
          
        <button type="button" style="height: 24px;" class="btn btn-sm btn-secondary mr-1 edit-category" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $child_category->id }}" data-name="{{ $child_category->name }}"><i class="fa fa-edit" aria-hidden="true"></i></button>
        <form action="{{ route('category.destroy', $child_category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
          </form>
        </div>
      </div>
</li>
@if ($child_category->categories)
    <ul>
        @foreach ($child_category->categories as $childCategory)
            @include('admin.category.child_category', ['child_category' => $childCategory])
        @endforeach
    </ul>
@endif
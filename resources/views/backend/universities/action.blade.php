<div class="d-flex">
    @can('university-show')
    <a href="{{ route('universities.show', $id) }}" class="show btn btn-sm btn-outline-primary mr-2">
        <i class="fas fa-eye"></i>
    </a>
    @endcan
     @can('university-edit')
        <a href="{{ route('universities.edit', $id) }}" class="edit btn btn-sm btn-outline-warning mr-2">
            <i class="fas fa-edit"></i>
        </a>
     @endcan
     @can('university-delete')
        <a href="#" data-id="{{ $id }}" class="delete-btn btn btn-sm btn-outline-danger">
            <i class="fas fa-trash-alt"></i>
        </a>
     @endcan
</div>

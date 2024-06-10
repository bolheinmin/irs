<div class="d-flex">
    @can('company-show')
    <a href="{{ route('companies.show', $id) }}" class="show btn btn-sm btn-outline-primary mr-2">
        <i class="fas fa-eye"></i>
    </a>
    @endcan
     @can('company-edit')
        <a href="{{ route('companies.edit', $id) }}" class="edit btn btn-sm btn-outline-warning mr-2">
            <i class="fas fa-edit"></i>
        </a>
     @endcan
     @can('company-delete')
        <a href="#" data-id="{{ $id }}" class="delete-btn btn btn-sm btn-outline-danger">
            <i class="fas fa-trash-alt"></i>
        </a>
     @endcan
</div>

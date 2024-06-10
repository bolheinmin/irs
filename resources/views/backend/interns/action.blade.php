<div class="d-flex">
@can('intern-show')
        <a href="{{ route('interns.show', $id) }}" class="show btn btn-sm btn-outline-primary mr-2">
            <i class="fas fa-eye"></i>
        </a>
     @endcan

     @can('intern-edit')
        <a href="{{ route('interns.edit', $id) }}" class="edit btn btn-sm btn-outline-warning mr-2">
            <i class="fas fa-edit"></i>
        </a>
     @endcan
     @can('intern-delete')
        <a href="#" data-id="{{ $id }}" class="delete-btn btn btn-sm btn-outline-danger">
            <i class="fas fa-trash-alt"></i>
        </a>
     @endcan
</div>

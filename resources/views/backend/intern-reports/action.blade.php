<div class="d-flex">
    <a href="{{ route('intern-reports.export-pdf', $id) }}" class="btn btn-sm btn-outline-danger mr-2">
        <i class="fas fa-file-pdf"></i>
    </a>
    @can('intern-report-show')
        <a href="{{ route('intern-reports.show', $id) }}" class="show btn btn-sm btn-outline-primary mr-2">
            <i class="fas fa-eye"></i>
        </a>
     @endcan

     @can('intern-report-edit')
        <a href="{{ route('intern-reports.edit', $id) }}" class="edit btn btn-sm btn-outline-warning mr-2">
            <i class="fas fa-edit"></i>
        </a>
     @endcan
</div>



@if($data->active == 1)
    <span class="badge bg-success">Active</span>
@endif
@if($data->active == 0)
    <span class="badge bg-danger">Not Active</span>
@endif
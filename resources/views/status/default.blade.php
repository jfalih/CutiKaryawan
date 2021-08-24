@if($data->status == 'pending')
    <span class="badge bg-warning">Pending</span>
@endif
@if($data->status == 'success')
    <span class="badge bg-success">Sukses</span>
@endif
@if($data->status == 'canceled')
    <span class="badge bg-danger">Rejected</span>
@endif
@if($data->status == 'confirmed')
    <span class="badge bg-info">Confirmed</span>
@endif
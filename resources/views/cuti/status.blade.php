@if ($item->status === 'pending')
    <span class="badge bg-warning">Pending</span>
@endif
@if ($item->status === 'declined')
    <span class="badge bg-danger">Declined</span>
@endif
@if ($item->status === 'processing')
    <span class="badge bg-info">Processing</span>
@endif
@if ($item->status === 'confirmed')
    <span class="badge bg-success">Confirmed</span>
@endif

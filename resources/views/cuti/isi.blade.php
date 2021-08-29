@if($id == 1)
<div class="mb-3 row">
    <label class="form-label">Tanggal Cuti</label>
    <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-m-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
        <input type="text" class="form-control" name="from" placeholder="Tanggal Mulai" />
        <input type="text" class="form-control" name="to" placeholder="Tanggal Akhir" />
    </div>
</div>
<div class="mb-3 row">
    <label class="form-label" id="alasan">Alasan Cuti</label>
    <div class="input-group">
        <input class="form-control" type="text" name="alasan" placeholder="Alasan Cuti" id="alasan">
    </div>
</div>
@elseif($id == 2)
<div class="mb-3 row">
    <label id="subcategory" class="form-label">Kategori Cuti</label>
    <div class="col-md-12">
        <select name="subcategory" id="subcategory" class="form-select">
            <option value="0">Pilih Kategori</option>
            @foreach($subcategory as $val)
            <option value="{{$val->id}}">{{$val->title}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="mb-3 row">
    <label class="form-label">Tanggal Cuti</label>
    <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-m-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
        <input type="text" class="form-control" name="from" placeholder="Tanggal Mulai" />
        <input type="text" class="form-control" name="to" placeholder="Tanggal Akhir" />
    </div>
</div>
<div class="mb-3 row">
    <label class="form-label" id="alasan">Alasan Cuti</label>
    <div class="input-group">
        <input class="form-control" type="text" name="alasan" placeholder="Alasan Cuti" id="alasan">
    </div>
</div>
<div class="mb-3 row">
    <label class="form-label" id="alasan">Surat Cuti</label>
    <div class="input-group">
        <input class="form-control" type="file" name="file" placeholder="Alasan Cuti" id="alasan">
    </div>
</div>
@else
<span>Silahkan Pilih Kategory</span>
@endif
<form method="get" action="{{ route('guest.reservasi.create') }}" class="row bg-white py-4 px-2 form-pesan border shadow">
    <div class="col-md">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white border-0">Check In</span>
            </div>
            <input type="date" name="checkin" class="form-control rounded" placeholder="Check In">
        </div>
    </div>
    <div class="col-md">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white border-0">Check Out</span>
            </div>
            <input type="date" name="checkout" class="form-control rounded" placeholder="Check Out">
        </div>
    </div>
    <div class="col-md-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white border-0">Jumlah Kamar</span>
            </div>
            <input type="text" name="jumlah" class="form-control rounded" maxlength="3">
        </div>
    </div>
    <div class="col-md-1">
        <button type="submit" class="btn btn-block btn-info">Pesan</button>
    </div>
</form>

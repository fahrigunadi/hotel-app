@section('modal')
  <!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
      <form class="modal-content" method="post" action="#">
          @method('DELETE')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
              <i class="fas fa-trash"></i> Hapus
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah yakin akan di hapus?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        </div>
    </form>
    </div>
  </div>
@endsection

@push('js')

<script>
    $(function(){
        $('#modalDelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('link')
        var modal = $(this)
        modal.find('.modal-content').attr('action', recipient)
        })
    });
</script>

@endpush

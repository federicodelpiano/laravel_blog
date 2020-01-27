<div class="modal fade" id="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-0 rounded-0">
      <div class="modal-header">
        <h5 class="modal-title">Delete Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this entry?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancel-button" data-dismiss="modal">Cancel</button>
        <form method="post" action="/entries/{{ $entry->id }}" id="delete-entry">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger delete-button" form="delete-entry"><i class="far fa-trash-alt"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
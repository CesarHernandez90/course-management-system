<td class="actions text-right">

    <a rel="tooltip" 
        class="btn btn-success btn-sm"
        href="{{route($route . '.edit', $id)}}">
        <i class="material-icons">edit</i>
    </a>

    <button 
        type="button" 
        rel="tooltip" 
        class="btn btn-danger btn-sm"
        data-toggle="modal"
        data-target="#deleteModal"
        data-id="{{$id}}"
        data-name="{{$name}}">
        <i class="material-icons">close</i>
    </button>  

</td>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="deleteName"></p>
            </div>
            <div class="modal-footer">
            <form action="{{route($route . '.destroy', 'null')}}" , method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deleteId" name="id">
                    <input type="hidden" id="deleteName" name="name">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="deleteButton">Si, eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
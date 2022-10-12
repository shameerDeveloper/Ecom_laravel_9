<div>
    

    <!-- Modal -->
    <div wire:ignore.self class="modal fade"  id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form wire:submit.prevent="destroyCategory">
             
               <div class="modal-body">
                <h6>Are You Sure You Want To Delete This Data ?</h6>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Yes , Delete</button>
              </div>
   
        </form>
       


      </div>
    </div>
  </div>

<div class="row">
    <div class="col-md-12 ">

        @if(session('message'))

          <div class="alert alert-success">
            {{session('message')}}
          </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>
                    Category
                    <a href="{{url('admin/category/create')}}" class="btn btn-success btn-sm float-end">Add Category</a>
                </h3>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoies as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->status == '1' ? "Hidden" :  "Visible"}}</td>
                            <td>
                                <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-warning">Edit</a>
                                <a href="#" wire:click ="deleteCategory({{$category->id}})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

                

            </table>
            <div>
                {{$categoies->links()}}
            </div>
        </div>
    </div>
</div>
      
</div>

@push('script')

<script>
    window.addEventListener('close-modal',event =>{
        $('#deleteModal').modal('hide');
    });
</script>

@endpush



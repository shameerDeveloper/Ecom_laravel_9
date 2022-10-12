<div>
  
    @include('livewire.admin.brand.modal-form')
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
                        Brands List
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-success btn-sm float-end ">Add Brand</a>
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
                       
                            <tr>
                              <td>1</td> 
    
                            </tr>
                       
                    </tbody>
    
                    
    
                </table>
               
            </div>
        </div>
    </div>

</div>

<div class="container mt-4">

   
 <div class="col-sm-12">
        <div class="card  ">
            <div class="card-header-custom d-flex justify-content-between p-4 mb-0">
                <div class="header-title">
                    <h4 class="card-title">Doctors List</h4>
                </div>
            </div>
        </div>
    </div>
    @foreach($doctors as $doc)
    <div class="col-sm-6 col-md-3">
        <div class="card  ">
            <div class="card-body text-center">
                <div class="doc-profile">
                    <img class="rounded-circle img-fluid avatar-80" src="../assets/images/user/12.jpg"
                        alt="profile">
                </div>
                <div class="doc-info mt-3">
                    <h4> Dr. {{ $doc->user->name }}</h4>
                    <p class="mb-0">{{ $doc->specialization }}</p>
                    <a href="javascript:void(0);">{{ $doc->phone }}</a>
                </div>
                <div class="iq-doc-description mt-2">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam auctor non erat non
                        gravida. In id ipsum consequat</p>
                </div>
                <div class="doc-social-info mt-3 mb-3">
                    <ul class="m-0 p-0 list-group list-group-horizontal justify-content-center">
                        <li class="list-group-item border-0 p-0"><a href="#"><i class="ri-facebook-fill"></i></a></li>
                        <li class="list-group-item border-0 p-0"><a href="#"><i class="ri-twitter-fill"></i></a> </li>
                        <li class="list-group-item border-0 p-0"><a href="#"><i class="ri-google-fill"></i></a></li>
                    </ul>
                </div>
                <a href="/doctor/{{$doc->PK_DoctorID }}" class="btn btn-primary-subtle">View Profile</a>
                
            </div>
        </div>
    </div> 
     @endforeach
    {{-- TABLE --}}
    {{-- <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Specialization</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($doctors as $doc)
                <tr>
                    <td>{{ $doc->user->name }}</td>
                    <td>{{ $doc->user->email }}</td>
                    <td>{{ $doc->specialization }}</td>
                    <td>{{ $doc->phone }}</td>
                    <td>
                        <button wire:click="edit({{ $doc->id }})" class="btn btn-sm btn-info">Edit</button>
                        <button wire:click="delete({{ $doc->id }})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

</div>

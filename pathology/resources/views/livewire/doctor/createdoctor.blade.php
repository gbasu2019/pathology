<div class="row">

    {{-- LEFT: Profile Upload --}}
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Doctor</h4>
            </div>

            <div class="card-body text-center">
               {{-- IMAGE PREVIEW --}}
    @if ($ProfileImage)
        <img src="{{ $ProfileImage->temporaryUrl() }}"
             class="img-fluid rounded-circle mb-3"
             style="object-fit:cover;" width="80px" height="80px">
             @elseif($existingImage)
    <img src="{{ asset('storage/'.$existingImage) }}" style="object-fit:cover;" width="80px" height="80px">
    @else
        <img src="../assets/images/user/11.png"
             class="img-fluid rounded-circle mb-3"
              >
    @endif

   

                 {{-- FILE INPUT --}}
    <input type="file" wire:model="ProfileImage" class="form-control">

    {{-- LOADING --}}
    <div wire:loading wire:target="ProfileImage" class="text-primary mt-2">
        Uploading...
    </div>

    {{-- ERROR --}}
    @error('ProfileImage')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror

    <div class="mt-2 small text-muted">
        Only .jpg .png .jpeg allowed (Max: 2MB)
    </div>
            </div>
        </div>
    </div>

    {{-- RIGHT: FORM --}}
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Doctor Details</h4>
            </div>

            <div class="card-body">

                {{-- SUCCESS MESSAGE --}}
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="store">

                    <div class="row">

                        {{-- FIRST NAME --}}
                        <div class="col-md-6 mb-2">
                            <label>First Name</label>
                            <input type="text" class="form-control"
                                   wire:model="FirstName">
                        </div>

                        {{-- LAST NAME --}}
                        <div class="col-md-6 mb-2">
                            <label>Last Name</label>
                            <input type="text" class="form-control"
                                   wire:model="LastName">
                        </div>

                        {{-- ADDRESS 1 --}}
                        <div class="col-md-6 mb-2">
                            <label>Address 1</label>
                            <input type="text" class="form-control"
                                   wire:model="Address">
                        </div>

                        {{-- ADDRESS 2 --}}
                        <div class="col-md-6 mb-2">
                            <label>Address 2</label>
                            <input type="text" class="form-control"
                                   wire:model="Address2">
                        </div>

                        {{-- DEPARTMENT --}}
                        <div class="col-md-12 mb-2">
                            <label>Department</label>
                            <input type="text" class="form-control"
                                   wire:model="DepartmentName">
                        </div>

                        {{-- MOBILE --}}
                        <div class="col-md-6 mb-2">
                            <label>Mobile</label>
                            <input type="text" class="form-control"
                                   wire:model="MobileNo">
                        </div>

                        {{-- ALT CONTACT --}}
                        <div class="col-md-6 mb-2">
                            <label>Alternate Contact</label>
                            <input type="text" class="form-control"
                                   wire:model="AltContactNo">
                        </div>

                        {{-- PIN --}}
                        <div class="col-md-6 mb-2">
                            <label>Pin Code</label>
                            <input type="text" class="form-control"
                                   wire:model="PinCode">
                        </div>

                        {{-- CITY --}}
                        <div class="col-md-6 mb-2">
                            <label>City</label>
                            <input type="text" class="form-control"
                                   wire:model="City">
                        </div>

                        {{-- SPECIALIZATION --}}
                        <div class="col-md-6 mb-2">
                            <label>Specialization</label>
                            <input type="text" class="form-control"
                                   wire:model="Specialization">
                        </div>

                        {{-- QUALIFICATION --}}
                        <div class="col-md-6 mb-2">
                            <label>Qualification</label>
                            <input type="text" class="form-control"
                                   wire:model="Qualification">
                        </div>

                    </div>

                    <hr>

                    <h5>Login Details</h5>

                    <div class="row">

                        {{-- EMAIL --}}
                        <div class="col-md-12 mb-2">
                            <label>Email</label>
                            <input type="email" class="form-control"
                                   wire:model="email">
                        </div>

                        {{-- PASSWORD --}}
                        <div class="col-md-6 mb-2">
                            <label>Password</label>
                            <input type="password" class="form-control"
                                   wire:model="password">
                        </div>

                    </div>

                    <div class="mt-3 d-flex gap-2">
                        <button type="reset" class="btn btn-danger-subtle">
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-primary-subtle">
    {{ $isEdit ? 'Update Doctor' : 'Save Doctor' }}
</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>
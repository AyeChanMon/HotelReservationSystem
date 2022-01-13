@extends('layouts.app')

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item" aria-current="page" active>Users</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-responsive-md mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Control</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id  }}</td>
                                <td>{{ $user->name  }}</td>
                                <td>{{ $user->email  }}</td>
                                <td>{{ $user->role == 0 ? "Admin" : ($user->role == 2 ? "Manager": "User") }}</td>
                                <td class="text-wrap">
                                    <!-- Admin can give manager or admin role and change password -->
                                    @if($user->role == 1)
                                    <form class="d-inline-block" action="{{ route('user-manager.makeAdmin') }}" id="form{{$user->id}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Make Admin</button>
                                    </form>

                                    <form class="d-inline-block" action="{{ route('user-manager.makeManager') }}" id="form{{$user->id}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Make Manager</button>
                                    </form>
                                    <button class="btn btn-sm btn-outline-warning" onclick="changePassword({{ $user->id  }},'{{ $user->name }}')">Change Password</button>
                                    @endif

                                    @if($user->role == 2)
                                    <form class="d-inline-block" action="{{ route('user-manager.makeAdmin') }}" id="form{{$user->id}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Make Admin</button>
                                    </form>

                                    <button class="btn btn-sm btn-outline-warning" onclick="changePassword({{$user->id}},'{{$user->name}}')">Change Password</button>

                                    @endif
                                </td>
                                <td>
                                    <small>
                                        <i class="feather-calendar"></i>
                                        {{ $user->created_at->format("d F Y")  }}
                                        <br>
                                        <i class="feather-clock"></i>
                                        {{ $user->created_at->format("h:i a")  }}
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        <i class="feather-calendar"></i>
                                        {{ $user->updated_at->format("d F Y")  }}
                                        <br>
                                        <i class="feather-clock"></i>
                                        {{ $user->updated_at->format("h:i a")  }}
                                    </small>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('foot')
    <script>

        function changePassword(id,name){
            let url = "{{ route('user-manager.changeUserPassword') }}";
            Swal.fire({
                title: 'Change Password for '+name,
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off',
                    required : "required",
                    minLength : 8
                },
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Change',
                showLoaderOnConfirm: true,
                preConfirm : function (newPassword){
                    $.post(url,{
                        id : id,
                        password : newPassword,
                        _token : "{{ csrf_token() }}"
                    }).done(function (data){
                        console.log("data >>",JSON.stringify(data));
                        if(data.status == 200){
                            Swal.fire({
                                icon : "success",
                                title : "Password Change",
                                text : data.message
                            });
                        }else{
                            console.log(data);
                            Swal.fire("error",data.message.password[0],"error");
                        }
                    })
                }
            });
        }
    </script>
@endsection

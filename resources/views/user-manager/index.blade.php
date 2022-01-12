@extends('layouts.app')

@section("title") User Manager @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="fs-4 fw-bold mb-5">
                        <i class="feather-users"></i>
                        Users List
                    </p>
                    <table class="table table-hover mb-0">
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
                                @if($user->role == 1)
                                <form class="d-inline-block" action="{{ route('user-manager.makeAdmin') }}" id="form{{$user->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return askConfirm({{$user->id}},'Admin')">Make Admin</button>
                                </form>

                                <form class="d-inline-block" action="{{ route('user-manager.makeManager') }}" id="form{{$user->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary" onclick="return askConfirm({{$user->id}},'Manager')">Make Manager</button>
                                </form>

                                <button class="btn btn-sm btn-outline-warning" onclick="changePassword({{ $user->id  }},'{{ $user->name }}')">Change Password</button>

                                @endif

                                @if($user->role == 2)
                                <form class="d-inline-block" action="{{ route('user-manager.makeAdmin') }}" id="form{{$user->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="return askConfirm({{$user->id}},'Admin')">Make Admin</button>
                                </form>

                                <button class="btn btn-sm btn-outline-warning" onclick="changePassword({{ $user->id  }},'{{ $user->name }}')">Change Password</button>

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
        function askConfirm(id,$message){
            Swal.fire({
                title: 'Are you sure <br> to upgrade role?',
                text: "role ချိန်လိုက်ရင် "+$message+" လုပ်ပိုင်ခွင့်များကို ရရှိမှာဖြစ်ပါတယ်။",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Role Updated',
                        'အကောင့်မြှင်တင်ချင်း အောင်မြင်ပါသည်။',
                        'success'
                    )
                    setTimeout(function (){
                        $("#form"+id).submit();
                    },1000)
                }
            })
        }

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
                confirmButtonText: 'Change',
                showLoaderOnConfirm: true,
                preConfirm : function (newPassword){
                    // console.log(id,newPassword);
                    $.post(url,{
                        id : id,
                        password : newPassword,
                        _token : "{{ csrf_token() }}"
                    }).done(function (data){
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
            })
        }
    </script>
@endsection

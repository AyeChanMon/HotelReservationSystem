@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
            </div>
        </div>
    </div>
</div>


@endsection
@section('foot')
    <script>
        $(".test").click(function (){
            alert("hello");
        })

        $(".test-alert").click(function (){

            Swal.fire({
                icon: 'success',
                title: 'Min Ga Lar Par',
                text: 'san kyi tar par. hello hello',
            })

        });

        $(".test-toast").click(function (){
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Signed in successfully'
            })
        })
    </script>
@endsection

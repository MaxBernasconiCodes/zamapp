@if ($errors->any())
    <div {{ $attributes }}>            
                @foreach($errors->all() as $error)
                <script>
                    toastr.error("{{ $error }}");
                </script>
                @endforeach
    </div>
@endif

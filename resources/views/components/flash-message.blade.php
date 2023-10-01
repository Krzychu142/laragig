@if(session()->has('message'))
    <div id="flashMessage" class="fixed top-0 transform left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-48 py-3">
        <p>
        {{session('message')}}
        </p>
    </div>

    <script>
        setTimeout(function() {
            let flashMessage = document.getElementById('flashMessage');
            if (flashMessage) {
                flashMessage.style.display = 'none';
            }
        }, 5000);
    </script>
@endif

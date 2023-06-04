<!-- Toast with Placements -->
<div class="bs-toast toast m-2 position-fixed bottom-0 end-0 bg-primary" role="alert" aria-live="assertive"
    aria-atomic="true" data-delay="4000" id="myToast" style="z-index: 1000">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold" id="titleToast"></div>
        <small>Baru Saja</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body"></div>
</div>
<!-- Toast with Placements -->

@if (session('dangerToast'))
@push('js')
<script>
    const mytoast = document.getElementById('myToast')
    mytoast.classList.replace('bg-primary', 'bg-danger')
    var bsAlert = new bootstrap.Toast(mytoast);//inizialize it
    const toastBody = mytoast.querySelector('.toast-body')
    const titleToast = mytoast.querySelector('#titleToast')

    titleToast.innerHTML = 'Kesalahan'
    toastBody.innerHTML = '{{ session("dangerToast") }}'
    bsAlert.show();//show it
</script>
@endpush
@endif

@if ($message = session('success'))
@push('js')
<script>
    const mytoast = document.getElementById('myToast')
    mytoast.classList.replace('bg-primary', 'bg-success')
    var bsAlert = new bootstrap.Toast(mytoast);

    const toastBody = mytoast.querySelector('.toast-body')
    const titleToast = mytoast.querySelector('#titleToast')

    titleToast.innerHTML = 'Berhasil'
    toastBody.innerHTML = '{{ session("success") }}'
    bsAlert.show();//show it
</script>
@endpush
@endif
@if ($message = session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Toast with Placements -->
<div class="bs-toast toast m-2 position-absolute bottom-0 end-0 bg-primary" role="alert" aria-live="assertive"
    aria-atomic="true" data-delay="2000" id="myToast" style="z-index: 1000">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Bootstrap</div>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.</div>
</div>
<!-- Toast with Placements -->
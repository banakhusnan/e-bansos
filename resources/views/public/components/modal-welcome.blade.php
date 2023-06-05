<!-- Welcome to E-Bansos -->
<div class="modal fade" id="modalWelcome" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalWelcome" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                {{-- <img src="{{ asset('/assets/img/welcome.png') }}" width="80%">
                <span class="fs-3 fw-bold">Welcome to E-Bansos</span> --}}
            </div>
        </div>
    </div>
</div>

@if (session('welcome'))
@push('js')
<script>
    const modal = document.querySelector('#modalWelcome')
    const modalBody = modal.querySelector('.modal-body')
    const modalBootstrap = new bootstrap.Modal(modal)

    // create image element
    const newImage = document.createElement('img')
    newImage.setAttribute('src', '{{ asset("/assets/img/welcome.png") }}')
    newImage.setAttribute('width', '80%')

    // create span
    const newSpan = document.createElement('span')
    newSpan.classList.add('fs-3', 'fw-bold')
    newSpan.textContent = "{{ session('welcome') }}"

    modalBody.appendChild(newImage)
    modalBody.appendChild(newSpan)

    modalBootstrap.show()
</script>
@endpush
@endif
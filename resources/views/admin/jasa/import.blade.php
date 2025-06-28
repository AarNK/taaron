<!-- Tombol untuk membuka modal -->
<button class="btn btn-sm m-1 btn-primary" data-toggle="modal" data-target="#importJasaModal">
    <i class="fa fa-file-excel"></i> Import Excel
</button>

<!-- Create Modal -->
<div class="modal fade" id="importJasaModal" tabindex="-1" role="dialog" aria-labelledby="importJasaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('admin.jasa.import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFormLabel">{{ __('Upload Data Jasa') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-left">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-1">
                                    <label class="form-label">{{ __('Upload File') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="form-control @error('file') is-invalid @enderror"
                                        placeholder="file" name="file" id="file" required>
                                    @error('file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-success" href="{{ asset('template/template-jasa.xlsx') }}"
                            download="template-jasa.xlsx">{{ __('Download Format') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

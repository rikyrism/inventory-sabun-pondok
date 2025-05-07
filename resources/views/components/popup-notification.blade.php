{{-- Popup notification component untuk konfirmasi hapus --}}
<div id="popup-notification" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center pb-5">
                <div class="d-flex justify-content-center mb-4">
                    {{-- Delete Confirmation Icon (X) --}}
                    <div id="delete-icon" class="popup-icon rounded-circle" style="background-color: #f25961; width: 80px; height: 80px; box-shadow: 0 0 20px rgba(242, 89, 97, 0.4);">
                        <i class="fas fa-times text-white" style="font-size: 40px; line-height: 80px;"></i>
                    </div>
                </div>
                
                <h3 id="popup-title" class="font-weight-bold">Konfirmasi</h3>
                <p id="popup-message" class="mt-3 mb-4 h5">Anda yakin ingin menghapus data ini?</p>
                
                <div class="d-flex justify-content-center mt-4">
                    <button id="popup-cancel-btn" type="button" class="btn btn-light btn-round px-4 mx-2" data-dismiss="modal">Batal</button>
                    <button id="popup-confirm-btn" type="button" class="btn btn-danger btn-round px-4 mx-2">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Popup Success/Error Result --}}
<div id="popup-result" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center pb-5">
                <div class="d-flex justify-content-center mb-4">
                    {{-- Success Icon (Check) --}}
                    <div id="result-success-icon" class="popup-icon rounded-circle" style="display: none; background-color: #67c963; width: 80px; height: 80px; box-shadow: 0 0 20px rgba(103, 201, 99, 0.4);">
                        <i class="fas fa-check text-white" style="font-size: 40px; line-height: 80px;"></i>
                    </div>
                    
                    {{-- Error Icon (X) --}}
                    <div id="result-error-icon" class="popup-icon rounded-circle" style="display: none; background-color: #f25961; width: 80px; height: 80px; box-shadow: 0 0 20px rgba(242, 89, 97, 0.4);">
                        <i class="fas fa-times text-white" style="font-size: 40px; line-height: 80px;"></i>
                    </div>
                </div>
                
                <h3 id="result-title" class="font-weight-bold">Success!</h3>
                <p id="result-message" class="mt-3 mb-4 h5">Data berhasil disimpan.</p>
                
                <div class="d-flex justify-content-center mt-4">
                    <button type="button" class="btn btn-success btn-round px-4 mx-2" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Animation for popup icons */
    @keyframes popup-scale {
        0% { transform: scale(0.5); opacity: 0; }
        70% { transform: scale(1.1); }
        100% { transform: scale(1); opacity: 1; }
    }
    
    /* Apply animation to icons when they appear */
    #result-success-icon, #result-error-icon, #delete-icon {
        animation: popup-scale 0.5s cubic-bezier(0.18, 0.89, 0.32, 1.28) forwards;
    }
    
    /* Make modal backdrop darker */
    .modal-backdrop.show {
        opacity: 0.7;
    }
    
    /* Enhance modal design */
    .modal-content {
        border: none;
        border-radius: 4px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
</style>
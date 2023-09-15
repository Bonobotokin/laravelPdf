<div class="modal fade " tabindex="-1" role="dialog" id="myModal" aria-modal="true">
    <div class="modal-dialog">
        <form class="modal-content" action="{{ route('pdf-extraction.extract') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateFileSize()">
            @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Importation des fichier</h4>
            </div>
            <div class="modal-body">
                <p>Veuillez selectionner votre fichier pdf.</p>
                <input type="file" name="pdfFile" id="pdfFile" required placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
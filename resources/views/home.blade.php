@extends('layouts.base')

@section('content')
<h3><i class="fa fa-angle-right"></i> Liste des Pdf enregistrer</h3>
<div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
            <div class="content">

                <a class="btn btn-primary" data-toggle="modal" href="#myModal"> Forgot Password</a>
            </div>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Titre</th>
                            <th class="numeric">Date</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </section>
        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-lg-4 -->
</div>
<x-modal id="my-modal">
    <x-slot name="title">Title</x-slot>
    <x-slot name="body">
        <!-- Body of the modal -->
    </x-slot>
    <x-slot name="footer">
        <!-- Footer of the modal -->
    </x-slot>
</x-modal>
@endsection
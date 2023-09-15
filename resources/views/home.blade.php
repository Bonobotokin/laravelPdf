@extends('layouts.base')

@section('content')
<h3><i class="fa fa-angle-right"></i> Liste des Pdf enregistrer</h3>
<div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="notika-icon notika-close"></i></span>
                </button>Bien jouer,{{ $message }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">
                        <i class="notika-icon notika-close"></i></span>
                </button> Ooops! @foreach ($errors->all() as $error)
                <ul>
                    <ol>{{ $error }}</ol>
                </ul>

                @endforeach
            </div>
            @endif
            <div class="content">

                <a class="btn btn-primary" data-toggle="modal" href="#myModal"> Nouveaux Extraction</a>
            </div>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Titre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($liste as $data)
                        <tr>
                            <td>{{$data['id']}}</td>
                            <td>{{$data['titre']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
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
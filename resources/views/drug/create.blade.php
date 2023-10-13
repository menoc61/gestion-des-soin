@extends('layouts.master')

@section('title')
    {{ __('sentence.Add Drug') }}
@endsection

@section('content')
    {{-- Upload product.csv Open --}}
    <div class="row">
        <div class="col">
            <div class="alert alert-warning">
                Il est important de savoir que vous devez utiliser des produits provenant de l'application de gestion des
                stocks pour créer un nouveau soin. Vous pouvez
                <br>
                <a href="#" id="importCSVLink" data-toggle="modal" data-target="#importCSVModal"><b>Importez le fichier
                        "product.csv"</b></a> pour commencer.
                <br><b>Note:</b> ce fichier se télécharge sur la liste des produits de l'application de gestion de stock.
            </div>
        </div>
    </div>

    <!-- Modal for CSV Import -->
    <div class="modal fade" id="importCSVModal" tabindex="-1" role="dialog" aria-labelledby="importCSVModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header btn-primary">
                    <h5 class="modal-title " id="importCSVModalLabel">Importer la dernière version <b>"product.csv"</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('process.csv') }}">
                    @csrf
                    <div class="modal-body">
                        <!-- Input field for CSV file upload -->
                        <div class="form-group">
                            <label for="csvFile">Sélectionnez le fichier CSV :</label>
                            <input type="file" name="csvFile" id="csvFile" accept=".csv">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" id="importCSVButton">Importer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Upload product.csv End --}}

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('sentence.Add Drug') }}</h6>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ route('drug.store') }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('sentence.Trade Name') }} <font color="red">*</font>
                            </label>
                            <input type="text" class="form-control" name="trade_name" id="TradeName"
                                aria-describedby="TradeName">
                            {{ csrf_field() }}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">{{ __('sentence.Generic Name') }}<font color="red">*
                                </font></label>
                            <select name="generic_name[]" multiple id="GenericName" class="form-control">
                                @foreach ($products as $product)
                                    <option value="{{ $product['name'] }}">{{ $product['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">{{ __('sentence.Note') }}</label>
                            <input type="text" class="form-control" name="note" id="Note" placeholder="Description...">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('sentence.Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Display Products Section --}}
    <div class="row">
        <div class="col">
            <h2>{{ __('sentence.Product List') }}</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>SKU</th>
                        <th>Name</th>
                        <th>Product Category</th>
                        <th>Updated At</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product['id'] }}</td>
                                <td>{{ $product['sku'] }}</td>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['product_category'] }}</td>
                                <td>{{ $product['updated_at'] }}</td>
                                <td>
                                    @if (!empty($product['imageUrl']))
                                        <img src="{{ $product['imageUrl'] }}" alt="Unable to reach backend"
                                            style="max-width: 100px;">
                                    @else
                                        le produit n'as pas d'image
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">No data available.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
    {{-- End Display Products Section --}}
@endsection

@section('footer')
<script type="text/javascript"
src="https://davidstutz.github.io/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
<!-- Initialize the plugin: -->
<script type="text/javascript">
$('#GenericName').multiselect({
    includeSelectAllOption: true,
    enableFiltering: true,
    filterPlaceholder: 'Recherche un Hôte...',
    buttonContainer: '<div class="btn-group w-100" />'
});
</script>
@endsection

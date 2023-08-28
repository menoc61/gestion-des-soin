@extends('layouts.master')
@section('header')
    <style>
        .hidden-section {
            display: none;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://davidstutz.github.io/bootstrap-multiselect/dist/css/bootstrap-multiselect.css">
@endsection
@section('title')
{{ __('sentence.New Patient') }}
@endsection
@section('content')
<div class="row justify-content-center">
   <div class="col-md-10">
      <div class="card shadow mb-4">
         <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('sentence.New Patient') }}</h6>
         </div>
         <div class="card-body">
            <form method="post" action="{{ route('patient.create') }}" enctype="multipart/form-data">
               @csrf
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="inputEmail4">{{ __('sentence.Full Name') }}<font color="red">*</font></label>
                     <input type="text" class="form-control" id="Name" name="name">
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputPassword4">{{ __('sentence.Email Adress') }}<font color="red">*</font></label>
                     <input type="email" class="form-control" id="Email" name="email">
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="inputAddress2">{{ __('sentence.Phone') }}</label>
                     <input type="text" class="form-control" id="Phone" name="phone">
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputAddress">{{ __('sentence.Birthday') }}<font color="red">*</font></label>
                     <input type="date" class="form-control" id="Birthday" name="birthday" autocomplete="off">
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label for="inputAddress2">{{ __('sentence.Address') }}</label>
                      <input type="text" class="form-control" id="Address" name="adress">
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-2">
                     <label for="inputCity">{{ __('sentence.Gender') }}<font color="red">*</font></label>
                     <select class="form-control" name="gender" id="Gender">
                        <option value="Male">{{ __('sentence.Male') }}</option>
                        <option value="Female">{{ __('sentence.Female') }}</option>
                     </select>
                  </div>
                  <div class="form-row col-md-10 ml-10" >
                    <div class="form-group col-md-3">
                      <label for="morphology_patient">{{ __('sentence.Morphology') }}<font color="red">*</font></label>
                      <div class="col-md-3">
                          <select class="form-control" id="morphology_patient" multiple="multiple" name="morphology[]">
                              <option value="Aucune">Aucune</option>
                              <option value="Grand(e)">Grand(e)</option>
                              <option value="Svelte">Svelte</option>
                              <option value="Petit(e)">Petit(e)</option>
                              <option value="Mince">Mince</option>
                              <option value="Maigre">Maigre</option>
                              <option value="Rondeur">Rondeur</option>
                              <option value="Enveloppé(e)">Enveloppé(e)</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="alimentation_patient">{{ __('sentence.Alimentation') }}<font color="red">*</font></label>
                      <div class="col-md-3">
                          <select class="form-control" id="alimentation_patient" multiple="multiple" name="alimentation[]">
                              <option value="Aucune">Aucune</option>
                              <option value="Viande">Viande</option>
                              <option value="Poisson">Poisson</option>
                              <option value="Légumes">Légumes</option>
                              <option value="Céréales">Céréales</option>
                              <option value="Tubercules">Tubercules</option>
                              <option value="Fruits">Fruits</option>
                              <option value="Alcool">Alcool</option>
                              <option value="Pas d'alcool">Pas d'alcool</option>
                              <option value="Fumeur">Fumeur</option>
                              <option value="Non-fumeur">Non-fumeur</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="digestion_patient">{{ __('sentence.Digestion') }}<font color="red">*</font></label>
                      <div class="col-md-3">
                          <select class="form-control" id="digestion_patient" multiple="multiple" name="digestion[]">
                              <option value="Aucune">Aucune</option>
                              <option value="Bonne">Bonne</option>
                              <option value="Alternée">Alternée</option>
                              <option value="Médiocre">Médiocre</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="typ_patient">{{ __('sentence.Type of patient') }}<font color="red">*</font></label>
                        <div class="col-md-3">
                            <select class="form-control" id="typ_patient" multiple="multiple" name="type_patient[]">
                                <option value="Aucun">Aucun</option>
                                <option value="Elancé(e)">Elancé(e)</option>
                                <option value="Mince">Mince</option>
                                <option value="Amazone">Amazone</option>
                                <option value="Forte">Forte</option>
                            </select>
                        </div>
                      </div>
                    </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="hobbie">{{ __('sentence.Hobbies') }}<font color="red">*</font></label>
                    <input type="text" class="form-control" id="hobbie" name="hobbie">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="medication">{{ __('sentence.Medication') }}<font color="red">*</font></label>
                    <input type="text" class="form-control" id="medication" name="medication">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="allergie">{{ __('sentence.Allergies') }}<font color="red">*</font></label>
                    <input type="text" class="form-control" id="allergie" name="allergie">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="request">{{ __('sentence.Special Requests') }}<font color="red">*</font></label>
                    <input type="text" class="form-control" id="request" name="demande">
                  </div>
               </div>
               <div class="form-row">
                <div class="form-group col-md-6">
                   <label for="inputState">{{ __('sentence.Profil') }}</label>
                   <label for="file-upload" class="custom-file-upload">
                   <i class="fa fa-cloud-upload"></i> Sélectionnez une Photo
                   </label>
                   <input type="file" class="form-control" id="file-upload" name="image">
                </div>
               </div>
               <div class="form-group row">
                  <div class="col-sm-9">
                     <button type="submit" class="btn btn-primary">{{ __('sentence.Save') }}</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
@section('header')
<style type="text/css">
   input[type="file"] {
   display: none;
   }
   .custom-file-upload {
   border: 1px solid #ccc;
   display: inline-block;
   padding: 6px 12px;
   cursor: pointer;
   }
</style>

@section('footer')
<script type="text/javascript" src="https://davidstutz.github.io/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
<!-- Initialize the plugin: -->
<script type="text/javascript">
    $('#morphology_patient, #alimentation_patient, #digestion_patient, #typ_patient').multiselect();
</script>
@endsection

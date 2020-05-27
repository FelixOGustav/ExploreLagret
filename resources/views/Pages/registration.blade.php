@extends('Layouts/template')
@section('content')
<div>

    <!-- Modal efter registrering val-->
    <div class="modal fade" id="registerChoiseModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="text-center">Deltagare Eller Ledare?</h4>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <button class="col modalButtonStyle lateRegTypeChoice" data-toggle="modal" data-target="#registerModal" data-dismiss="modal" data-regtype="participant"><h3 class="whiteColor">Deltagare</h3></button>
                        <button class="col modalButtonStyle lateRegTypeChoice" data-toggle="modal" data-target="#registerModal" data-dismiss="modal" data-regtype="leader"><h3 class="whiteColor">Ledare</h3></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal efter registrering-->
    <div class="modal fade" id="registerModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="text-center">Intresseanmälan</h4>
                </div>
                <div class="modal-body ">
                    <div class="row" style="padding: 10px; text-align:center;">
                        <p>Platserna är slut, men det går att skriva upp sig på kö ifall det blir en ledig plats.<p>
                        <p>Vi Kontaktar er via email för vidare instruktioner för riktiga anmälan om en plats skulle bli ledig.</p>
                    </div>
                    <div class="row" style="padding: 10px;">
                        <form style="width: 100%" method="POST" action="/lateregistrationsignup">
                            {{ csrf_field() }}
                            <table style="width: 100%">
                                <tbody>
                                    <tr>
                                        <td style="width: 15%;">
                                                <label for="name" style="float:right; margin-right: 10px">Namn</label>
                                        </td>
                                        <td style="width: 85%; padding-right: 40px;">
                                                <input type="text" id="name" name="name" style="width: 100%" placeholder="Namn Namnsson">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%;">
                                            <label for="email" style="float:right; margin-right: 10px">Epost</label>
                                        </td>
                                        <td style="width: 85%; padding-right: 40px;">
                                            <input type="email" name="email" id="email"  style="width: 100%" placeholder="namn.namnsson@namn.se">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%;">
                                            <label for="phoneNumber" style="float:right; margin-right: 10px">Telefonnummer</label>
                                        </td>
                                        <td style="width: 85%; padding-right: 40px;">
                                            <input type="text" name="phoneNumber" id="phoneNumber"  style="width: 100%" placeholder="0713-371337">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 15%;">
                                            <label for="place" style="float:right; margin-right: 10px">Önskad Ort</label>
                                        </td>
                                        <td style="width: 85%; padding-right: 40px;">
                                            <select id="place" name="place" class="form-control"  required>
                                                <option value="">Välj...</option>
                                            @foreach($places as $place)
                                                <option value="{{$place->placeID}}" {{old("place") == $place->placeID ? "selected":""}}>{{$place->placename}}</option>
                                            @endforeach
                                        </select>
                                        </td>
                                    </tr>
                                    
                                    <input type="hidden" id="leader" name="leader">
                                </tbody>                                    
                            </table>
                            <div class="container-fluid" style="text-align: center;">
                                <i style="color: #606569">OBS!!! Se till epost addressen är rätt ifylld! Om den är fel kommer vi inte kunna kontakta er och ni kommer förlora platsen</i>
                            </div>
                            <div class="container-fluid d-flex justify-content-center">
                                <button type="submit" class="buttonStyle" style="background-color: #606569">
                                    <p>Ställ mig i kö!</p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($key)
    <form method="POST" action="/registration/{{$key}}/done">
    @else
    <form method="POST" action="/registration/done">
    @endif
    
        {{ csrf_field() }}
        <div class="container" style="margin-top:10%">
            <h1 style=" margin-top: 3rem; text-align: center; color:#EAC15B;" class="anmalan">Anmälan</h1>
            
        @if($errors->any())
            <div class="invalidFormInputContainer">
                <h2>Följande information du angivigt är ej giltig</h2>
                @foreach ($errors->all() as $error)
                    <li>- {{$error}}</li> 
                @endforeach
            </div>
        @endif
            <div>
                <ul class="progressbar" style="padding-inline-start: 0px;">
                    <li class="active">Info deltagare</li>
                    <li>Adress</li>
                    <li>Övrigt</li>
                    <li>Målsman</li>
                    <li>Vilkor och pris</li>
                </ul>
            </div>
            <div class="register">
                <div id="formPageContainer">
                    <div class="formPage current" form-index="0">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="registerLabel" for="firstName">Förnamn</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Namn" value="{{ old('firstName') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="registerLabel" for="lastName">Efternamn</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Namnsson" value="{{ old('lastName') }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                    <label class="registerLabel" for="year">Personnummer</label>
                                <input type="text" class="form-control" maxlength="10" id="socialSecurityNumber" name="socialSecurityNumber" placeholder="ÅÅMMDDXXXX" value="{{ old('socialSecurityNumber') }}" required>
                            </div>
                        </div>
                        <div>
                            <label class="registerLabel" for="inputState">Vilken ort vill du åka med?</label>
                            <select id="place" name="place" class="form-control"  required>
                                    <option value="">Välj...</option>
                                @foreach($places as $place)
                                    <option value="{{$place->placeID}}" {{old("place") == $place->placeID ? "selected":""}} {{$takenMap[$place->placeID] ? "disabled":""}}>{{$place->placename}} {{$takenMap[$place->placeID] ? "(Fullt)":""}}</option>
                                @endforeach
                            </select>
                            <button class="buttonStyle linkHover" data-toggle="modal" data-target="#registerChoiseModal">
                                <p style="font-family: ChampagneLimousines; font-weight: bold; font-size: 20px; color: #EAC15B; margin-top: 5px;">Plattserna slut i den ort du ville åka med? intresseanmäl dig här</p>
                            </button>
                        </div>
                    </div>

                    <div class="formPage" form-index="1">
                        <div class="form-group container-fluid noPadding">
                            <label class="registerLabel" for="inputCity">Adress</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Sommargatan 42" value="{{ old('address') }}" required> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                        <label class="registerLabel" for="inputZip">Postnummer</label>
                                        <input type="text" class="form-control" id="zip" name="zip" placeholder="13337" value="{{ old('zip') }}" required>
                            </div>
                            <div class="form-group col-md-8">
                                <label class="registerLabel" for="inputCity">Postort</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Sommargårda" value="{{ old('city') }}" required>
                            </div>
                        </div>
                            <div class="form-group col-md-12 noPadding">
                                <label class="registerLabel" for="firstName">E-post</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="namn.namnsson@mail.se" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group container-fluid noPadding">
                                    <label class="registerLabel" for="inputCity">Telefon</label>
                                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="0713-371337" value="{{ old('phoneNumber') }}" required>
                            </div>
                    </div>
                    <div class="formPage" form-index="2">
                            <div class="form-group container-fluid noPadding" >
                                    <label class="registerLabel" for="member">Är du med i en Equmeniaförening</label>
                                    <select id="memberPlace" name="memberPlace" class="form-control" required>
                                            <option value="null">Nej, jag är inte medlem i någon Equmeniaförening</option>
                                        @foreach($places as $place)
                                            <option value="{{$place->placeID}}" {{old("memberPlace") == $place->placeID ? "selected":""}}>Ja, jag är med i {{$place->placename}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        <div>
                            <label class="registerLabel" for="allergy">Allergi</label>
                            <textarea class="form-control container-fluid" name="allergy" id="allergy" cols="165" rows="5" value="{{ old('allergy') }}"></textarea>
                        </div>
                        <div>
                            <label class="registerLabel" for="other">Övrigt</label>
                            <textarea class="form-control container-fluid" name="other" id="other" cols="165" rows="5" value="{{ old('other') }}"></textarea>
                        </div>
                    </div>
                    <div class="formPage" form-index="3">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="registerLabel" for="firstNameAdvocate">Förnamn målsman</label>
                                <input type="text" class="form-control" id="firstNameAdvocate" name="firstNameAdvocate" placeholder="Namn" value="{{ old('firstNameAdvocate') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="registerLabel" for="lastNameAdvocate">Efternamn målsman</label>
                                <input type="text" class="form-control" id="lastNameAdvocate" name="lastNameAdvocate" placeholder="Namnsson" value="{{ old('lastNameAdvocate') }}" required>
                            </div>
                        </div>
                        <div class="form-group col-md-12 noPadding">
                                <label class="registerLabel" for="firstName">E-post</label>
                                <input type="email" class="form-control" id="emailAdvocate" name="emailAdvocate" placeholder="namn.namnsson@namn.se" value="{{ old('emailAdvocate') }}" required>
                        </div>
                        <div class="form-group container-fluid noPadding">
                                <label class="registerLabel" for="inputCity">Telefon</label>
                                <input type="text" class="form-control" id="phoneNumberAdvocate" name="phoneNumberAdvocate" placeholder="0713-371337" value="{{ old('phoneNumberAdvocate') }}" required> 
                        </div>
                        <div class="form-group container-fluid noPadding">
                                <label class="registerLabel" for="inputCity">Hemtelefon</label>
                                <input type="text" class="form-control" id="homeNumberAdvocate" name="homeNumberAdvocate" placeholder="0713-371337" value="{{ old('homeNumberAdvocate') }}"> 
                        </div>
                    </div>

                    <div class="formPage" form-index="last">
                        <div class="invalidFormInputContainer">
                            <h2><strong>Observera<strong></h2>
                            <ul>
                                <li style="color: red">På grund av Covid-19 kommer Explorelägret 2020 se lite annorlunda ut. Läs mer om hur vi hanterar Covid-19 <a href="{{$links['infoLink'] ?? "/#branaslagretInfo"}}" id="scrollToInfoBtn">här.</a></li>
                                <li style="color: red">Betalningen för lägret kommer skötas av varje ort för sig. Kontakta ortsansvarig för mer infomration</li>
                                <li style="color: red">Varje ort har 35 deltagare som maxtak</li>
                            </ul>
                        </div>
                        <div class="form-row">    
                            <div class="form-group col-md-6">   
                                <h4 style="color: #EAC15B;">
                                    <ul>
                                        <li>OM DU KÄNNER DIG SJUK, STANNA HEMMA</li>
                                        <li>TIDER SKA FÖLJAS</li>
                                        <li>LEDARNA ÄR DE SOM BESTÄMMER</li> 
                                        <li>DU SKA VARA MED På DE OBLIGATORISKA AKTIVITETERNA </li>
                                        <li>NOLLTOLERANS MOT ALKOHOL OCH DROGER</li>
                                        <li>ANMÄLAN ÄR BINDANDE</li>
                                        <li>ATT DELTAGAREN ÄR MED I BILD OCH VIDEO SOM SEDAN PUBLICERAS PÅ SOCIALMEDIER (OM DETTA SKULLE VARA ETT PROBLEM, KONTAKTA INFO@EXPLORELAGRET.SE)</li>
                                    </ul>
                                </h4>
                            </div>
                            <div class="form-group col-md-6">
                                <div>
                                    <h1 style=" color:#EAC15B;">Priset för lägret:<br>250kr</h1>
                                </div>
                                <p style=" color:#EAC15B; ">Jag har läst förstått och godkänt vilkoren och <a href="https://equmenia.se/personuppgiftspolicy/" target="_blank">hanteringen</a> av personuppgifter inför lägret</p>
                                <label class="switch">
                                    <input type="checkbox" id="terms" name="terms" value="1" required>
                                    <span class="slider round"></span>
                                </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align:center">
                    <span>
                        <button type="back" style="background-color: white; display: none;"class="bottonRegister" id="formPrevPage">Bak</button>
                        <button type="next" class="bottonRegister" id="formNextPage">Nästa</button>
                    </span>
                </div>
                    
            </div>
        </div>
    </form>
    <!-- Reference to js helper-->
    <script src="{{URL::asset('js/registrationHelper.js')}}"></script>
    
</div>                 
@endsection

@extends('Layouts/template')
@section('content')
<div>
    <!--@if($key)
    <form method="POST" action="/registration/{{$key}}/done">
    @else
    <form method="POST" action="/registration/done">
    @endif -->
    
        {{ csrf_field() }}
        <div class="container" style="margin-top:10%">
            <h1 style=" margin-top: 3rem; text-align: center; color:#EAC15B;" class="anmalan">Anmälan</h1>
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
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Namn" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="registerLabel" for="lastName">Efternamn</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Namnsson" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-9">
                                    <label class="registerLabel" for="year">Föddelseår<Span><button type="info" class="bottonInfo" data-toggle="popover" data-placement="right" data-content="För att kunna få bidrag för ditt deltagande behöver Equmenia redovisa ett personnummer" data-trigger="focus hover" data-original-title title>?</button></Span></label>
                                <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="1337-13-37" required>
                            </div>
                            <div class="form-group col-3">
                                <label class="registerLabel" for="inputAddress2">Fyra sista</label>
                                <input type="text" class="form-control" id="fourLast" name="fourLast" placeholder="XXXX" required>
                            </div>
                        </div>
                        <div>
                            <label class="registerLabel" for="inputState">Vilken ort vill du åka med? <Span><button type="info" class="bottonInfo" data-toggle="popover" data-placement="right" data-content="För att kunna få bidrag för ditt deltagande behöver Equmenia redovisa ett personnummer" data-trigger="focus hover" data-original-title title>?</button></Span></label>
                            <select id="place" name="place" class="form-control"  required>
                                    <option value="">Välj...</option>
                                @foreach($places as $place)
                                    <option value="{{$place->placeID}}">{{$place->placename}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="formPage" form-index="1">
                        <div class="form-group container-fluid noPadding">
                            <label class="registerLabel" for="inputCity">Adress</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Sommargatan 42" required> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                        <label class="registerLabel" for="inputZip">Postnummer</label>
                                        <input type="text" class="form-control" id="zip" name="zip" placeholder="13337" required>
                            </div>
                            <div class="form-group col-md-8">
                                <label class="registerLabel" for="inputCity">Postort</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Sommargårda" required>
                            </div>
                        </div>
                            <div class="form-group col-md-12 noPadding">
                                <label class="registerLabel" for="firstName">E-post</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="namn.namnsson@mail.se" required>
                            </div>
                            <div class="form-group col-md-12 noPadding">
                                <label class="registerLabel" for="firstName">Bekräfta E-post</label>
                                <input type="email" class="form-control" id="emailconfirm" name="emailConfirm" placeholder="namn.namnsson@mail.se" onpaste="return false;" required>
                            </div>
                            <div class="form-group container-fluid noPadding">
                                    <label class="registerLabel" for="inputCity">Telefon</label>
                                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="0713-371337" required>
                            </div>
                    </div>
                    <div class="formPage" form-index="2">
                            <div class="form-group container-fluid noPadding" >
                                    <label class="registerLabel" for="member">Är du med i en Equmeniaförening</label>
                                    <select id="memberPlace" name="memberPlace" class="form-control" required>
                                            <option value="null">Nej, jag är inte medlem i någon Equmeniaförening</option>
                                        @foreach($places as $place)
                                            <option value="{{$place->placeID}}">Ja, jag är med i {{$place->placename}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        <div>
                            <label class="registerLabel" for="allergy">Allergi</label>
                            <textarea class="form-control container-fluid" name="allergy" id="allergy" cols="165" rows="5"></textarea>
                        </div>
                        <div>
                            <label class="registerLabel" for="other">Övrigt</label>
                            <textarea class="form-control container-fluid" name="other" id="other" cols="165" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="formPage" form-index="3">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="registerLabel" for="firstNameAdvocate">Förnamn målsman</label>
                                <input type="text" class="form-control" id="firstNameAdvocate" name="firstNameAdvocate" placeholder="Namn" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="registerLabel" for="lastNameAdvocate">Efternamn målsman</label>
                                <input type="text" class="form-control" id="lastNameAdvocate" name="lastNameAdvocate" placeholder="Namnsson" required>
                            </div>
                        </div>
                        <div class="form-group col-md-12 noPadding">
                                <label class="registerLabel" for="firstName">E-post</label>
                                <input type="email" class="form-control" id="emailAdvocate" name="emailAdvocate" placeholder="namn.namnsson@namn.se" required>
                        </div>
                        <div class="form-group col-md-12 noPadding">
                                <label class="registerLabel" for="firstName">Berkäfta E-post</label>
                                <input type="email" class="form-control" id="emailAdvocateConfirm" name="emailAdvocateConfirm" placeholder="namn.namnsson@namn.se" onpaste="return false;" required>
                        </div>
                        <div class="form-group container-fluid noPadding">
                                <label class="registerLabel" for="inputCity">Telefon</label>
                                <input type="text" class="form-control" id="phoneNumberAdvocate" name="phoneNumberAdvocate" placeholder="0713-371337" required> 
                        </div>
                        <div class="form-group container-fluid noPadding">
                                <label class="registerLabel" for="inputCity">Hemtelefon</label>
                                <input type="text" class="form-control" id="homeNumberAdvocate" name="homeNumberAdvocate" placeholder="0713-371337"> 
                        </div>
                    </div>

                    <div class="formPage" form-index="last">
                        <div class="form-row">    
                            <div class="form-group col-md-6">   
                                <h4 style="color: #EAC15B;">
                                    <ul>
                                        <li>TIDER SKA FÖLJAS</li>
                                        <li>LEDARNA ÄR DE SOM BESTÄMMER</li>
                                        <li>KILLAR OCH TJEJER SOVER ÅTSKILJT </li>
                                        <li>DU SKA VARA MED På DE OBLIGATORISKA AKTIVITETERNA </li>
                                        <li>NOLLTOLERANS MOT ALKOHOL OCH DROGER</li>
                                        <li>DET GÅR EJ AVANMÄLAN EFTER SISTA ANMÄLNINGSDAGEN UTAN GILTIGT LÄKARINTYG </li>
                                        <li>ANMÄLAN ÄR BINDANDE </li>
                                        <li>ATT DELTAGAREN ÄR MED I BILD OCH VIDEO SOM SEDAN PUBLICERAS PÅ SOCIALMEDIER (OM DETTA SKULLE VARA ETT PROBLEM, KONTAKTA INFO@EXPLORELAGRET.SE)</li>
                                    </ul>
                                </h4>
                            </div>
                            <div class="form-group col-md-6">
                                <div>
                                    <h1 style=" color:#EAC15B;">Priset för lägret:<br>900kr</h1>
                                </div>
                                <div>
                                        <p style=" color:#EAC15B; ">Jag vill ansöka om syskonrabatt</p>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                        </div>
                                <div>
                                <p style=" color:#EAC15B; ">Jag har läst förstått och godkänt vilkoren och <a href="https://equmenia.se/personuppgiftspolicy/">hanteringen<a> av personuppgifter inför lägret</p>
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="formPage" form-index="last">
                        <p>Bajs!</p>
                    </div>
                </div>
                <div style="text-align:center">
                    <span>
                        <button type="back" style="background-color: white; display: none;"class="bottonRegister" id="formPrevPage">Bak</button>
                        <button type="submit" class="bottonRegister" id="formNextPage">Nästa</button>
                    </span>
                </div>
                    
            </div>
        </div>
        <!--
        <h1 style=" margin-top: 3rem; text-align: center;" class="anmalan">Anmälan</h1>
        Start deltagare
        <div style="margin-top: 5rem;"><h2 style="text-align: center;" class="rubrikerAnmalan">Deltagare</h2></div>
            <div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName">Förnamn</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Namn" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName">Efternamn</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Namnsson" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-9">
                        <label for="year">Föddelseår</label>
                        <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="1337-13-37" required>
                    </div>
                    <div class="form-group col-3">
                        <label for="inputAddress2">Fyra sista</label>
                        <input type="text" class="form-control" id="fourLast" name="fourLast" placeholder="XXXX" required>
                    </div>
                </div>
            </div>    
                <div class="form-group container-fluid noPadding">
                    <label for="inputCity">Adress</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Vintergatan 42" required> 
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                                <label for="inputZip">Postnummer</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="13337" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="inputCity">Postort</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Vintergårda" required>
                    </div>
                </div>
                    <div class="form-group col-md-12 noPadding">
                        <label for="firstName">E-post</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="namn.namnsson@namn.se" required>
                    </div>
                    <div class="form-group container-fluid noPadding">
                            <label for="inputCity">Telefon</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="0713-371337" required> 
                    </div>
                    <div>
                        <label for="allergy">Allergi</label>
                        <textarea class="form-control container-fluid" name="allergy" id="allergy" cols="165" rows="5"></textarea>
                    </div>
                    <div>
                        <label for="other">Övrigt</label>
                        <textarea class="form-control container-fluid" name="other" id="other" cols="165" rows="5"></textarea>
                    </div>
                </div>
            <Slut deltagare 
            Start Ort 
            <div style="margin-top: 3rem;" >
                    
                <div ><h2 style="text-align: center; " class="rubrikerAnmalan">Ort</h2></div>
                <div class="form-group container-fluid noPadding" >
                    <label for="inputState">Orten</label>
                    <select id="place" name="place" class="form-control" required>
                            <option value="">Välj...</option>
                        @foreach($places as $place)
                            <option value="{{$place->placeID}}">{{$place->placename}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            Slut Ort 
             Skidhyra 
    </div>
            <div class="BGGrey" style="padding-bottom: 3rem; padding-top: 3rem; margin-top:3rem; ">
                <h3 style="text-align:center;" class="whiteColor">OBS! Information om att köpa liftkort och hyra utrustning, kommer skickas ut i början av december.</h3>
            </div>
            
    <div class="container">
           Start Målsman
            <div style="padding-top: 3rem;">    
                <div><h2 style="text-align: center;" class="rubrikerAnmalan">Kontaktuppgifter målsman</h2></div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstNameAdvocate">Förnamn målsman</label>
                        <input type="text" class="form-control" id="firstNameAdvocate" name="firstNameAdvocate" placeholder="Namn" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastNameAdvocate">Efternamn målsman</label>
                        <input type="text" class="form-control" id="lastNameAdvocate" name="lastNameAdvocate" placeholder="Namnsson" required>
                    </div>
                </div>
                <div class="form-group col-md-12 noPadding">
                        <label for="firstName">E-post</label>
                        <input type="email" class="form-control" id="emailAdvocate" name="emailAdvocate" placeholder="namn.namnsson@namn.se" required>
                </div>
                <div class="form-group container-fluid noPadding">
                        <label for="inputCity">Telefon</label>
                        <input type="text" class="form-control" id="phoneNumberAdvocate" name="phoneNumberAdvocate" placeholder="0713-371337" required> 
                </div>
                <div class="form-group container-fluid noPadding">
                        <label for="inputCity">Hemtelefon</label>
                        <input type="text" class="form-control" id="homeNumberAdvocate" name="homeNumberAdvocate" placeholder="0713-371337"> 
                </div>
            </div>
            <!-- Slut Målsman

            <!-- Start Equmenia
                </label>
            <div style="margin-top: 3rem;">
                    <div><h2 style="text-align: center;" class="rubrikerAnmalan">Equmenia</h2></div>
                <div class="form-group container-fluid noPadding" >
                        <label for="member">Är du med i en Equmeniaförening</label>
                        <select id="memberPlace" name="memberPlace" class="form-control" required>
                                <option value="null">Nej, jag är inte medlem i någon Equmeniaförening</option>
                            @foreach($places as $place)
                                <option value="{{$place->placeID}}">Ja, jag är med i {{$place->placename}}</option>
                            @endforeach
                        </select>
                </div>
            </div>
            <!--Slut Equmenia 
    </div>
            <!-- Start regler
    <div class="BGGrey" style="padding-bottom: 3rem; padding-top: 3rem; margin-top: 3rem;">
        <div class="container">
        <h2 style="text-align: center;" class="whiteColor" class="rubrikerAnmalan">Regler och vilkor:</h2>
        <h4 style="text-align: center;" class="whiteColor">-TIDER SKA FÖLJAS</h4>
        <h4 style="text-align: center;" class="whiteColor">-LEDARNA ÄR DE SOM BESTÄMMER</h4>
        <h4 style="text-align: center;" class="whiteColor">-KILLAR OCH TJEJER SOVER ÅTSKILJT</h4>
        <h4 style="text-align: center;" class="whiteColor">-DU SKA VARA MED På DE OBLIGATORISKA AKTIVITETERNA</h4>
        <h4 style="text-align: center;" class="whiteColor">-NOLLTOLERANS MOT ALKOHOL OCH DROGER</h4>
        <h4 style="text-align: center;" class="whiteColor">-DET GÅR EJ AVANMäLAN EFTER SISTA ANMäLNINGSDAGEN UTAN GILTIGT LäKARINTYG</h4>
        <h4 style="text-align: center;" class="whiteColor">-Anmälan är bindande</h4>
        <h4 style="text-align: center;" class="whiteColor">-Att deltagaren är med i bild och video som sedan publiceras på socialmedier (Om detta skulle vara ett problem, kontakta info@branaslagret.se)</h4>
        </div> 
        <!--Slut regler
    </div>
        <!-- Start anmäningsknapp
            <div style="padding:5rem;">
                <div style="text-align:center;">
                        <h2 class="rubrikerAnmalan">Pris = 1500kr</h2>
                        <p>(Eventuell syskonrabatt hanteras av din medlemsförsamling, kontakta ortsansvariga för mer information)</p>
                        <br>
                        <input type="checkbox"  id="terms" name="terms"  value="1" required>
                        <label  for="checkbox"><h4> Jag har läst, förstått och godkänt reglerna. </h4></label>
                </div>
                <button type="submit" style="margin-top: 10px; font-family: elkwood;" class="btn btn-primary centerImg whiteColor">Slutför Anmälan</button>
            </div>
        <!-- Slut anmäningsknap   
        </form>
    --> 

    <!-- Reference to js helper-->
    <script src="{{URL::asset('js/registrationHelper.js')}}"></script>
</div>                 
@endsection

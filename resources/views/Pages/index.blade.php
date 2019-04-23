@extends('Layouts/template')
@section('content')
    
    

    @if($camp->open > 0)
        <!-- Modal normal registration-->
        <div class="modal fade" id="registerChoiseModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h4 class="text-center">Deltagare Eller Ledare?</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="row">
                            <a href="/registration" class="col modalButtonStyle"><h3 class="whiteColor">Deltagare</h3></a>
                            <a href="/registration/leader" class="col modalButtonStyle"><h3 class="whiteColor">Ledare</h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else 
        <!-- Modal efter registration-->
        <div class="modal fade" id="registerChoiseModal" role="dialog">
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
                                                    <label for="name" style="float:right">Namn</label>
                                            </td>
                                            <td style="width: 85%; padding-right: 40px;">
                                                    <input type="text" id="name" name="name" style="width: 100%" placeholder="Namn Namnsson">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 15%;">
                                                <label for="email" style="float:right">Epost</label>
                                            </td>
                                            <td style="width: 85%; padding-right: 40px;">
                                                <input type="email" name="email" id="email"  style="width: 100%" placeholder="namn.namnsson@namn.se">
                                            </td>
                                        </tr>
                                    </tbody>                                    
                                </table>
                                <div class="container-fluid" style="text-align: center;">
                                    <i>OBS!!! Se till epost addressen är rätt ifylld! Om den är fel kommer vi inte kunna kontakta er och ni kommer förlora platsen</i>
                                </div>
                                <div class="container-fluid d-flex justify-content-center">
                                    <button type="submit" class="buttonStyle" >
                                        <p>Efteranmäl mig!</p>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
        
        <div class="landingDiv">            
            <div class="landingContentContainer">
                <!-- Logo btns -->
                <div class="logoTxt hideOnMobile">
                    <h1>{{$camp->name}}</h1>
                </div>
                <!-- Logo btns -->
                
                <div class="landingInfo">
                    <!-- Registration btns -->
                    <div class="container-fluid d-flex justify-content-center mobileRegistrationBtn">
                        @if($camp->open > 0)
                            <button class="buttonStyle linkHover" data-toggle="modal" data-target="#registerChoiseModal"><p>Anmäl dig</p></button>
                        @elseif($camp->late_open > 0)
                            <button class="buttonStyle linkHover" data-toggle="modal" data-target="#registerChoiseModal"><p>Efteranmälan</p></button>
                        @else
                            <p class="buttonStyle" style="color: white; cursor: default;">Anmälan är stängd</p>
                        @endif
                    </div>
                    <!-- Registration btns end -->

                    <div class="mobileDate">
                        <p>{{$camp->dates}}</p>
                    </div>
                </div>

                <div class="chevronContainer" onclick="(function(){$('html,body').animate({scrollTop: $('#explorelagretInfo').offset().top},'1300');})();">
                    <div class="chevron"></div> 
                </div>
                

                
                
            </div>
        </div>

        <!-- Explore info row -->
        <div class="ContentRow">
            <div class="contentContainer">
                <div class="containerItem contentImg" style="order: 1">
                    <img  src="{{URL::asset('img/fun_laugh.jpg')}}">
                </div>
                <div class="containerItem contentTxt"  style="order: 0" id="explorelagretInfo">
                    <h2>Vad är EXPLORE?</h2>
                    <p>Explore är ett sommarläger som varje år arrangeras av Equmeniaförsamlingarna i Vårgårda och Herrljungtrakten.
                        Lägret bjuder på en vecka av bad, snack om Gud och bibel, gamla och nya vänner, aktiviteter av olika slag
                        och mängder med tillfällen att njuta av livet
                    </p>
                </div>
            </div>
        </div>
        <!-- Explore info row end -->

        <!-- Explore info row -->
        <div class="ContentRow">
            <div class="contentContainer">
                <div class="containerItem contentImg"  style="order: 0">
                    <img src="{{URL::asset('img/storsjostran_2.jpg')}}">
                </div>
                <div class="containerItem contentTxt"  style="order: 1" id="">
                    <h2>Var?</h2>
                    <p>Lägret ligger på Storsjöstrand, i metropolen Horla tio min från Vårgårda. 
                        <br><br>
                        Kyrkan är nyrenoverad och riktigt fina lokaler som är som gjort för Explorelägret.
                    </p>
                </div>
            </div>
        </div>
        <!-- Explore info row end -->

        <!-- Explore info row -->
        <div class="ContentRow">
            <div class="contentContainer">
                <div class="containerItem contentImg" style="order: 1">
                    <img src="{{URL::asset('img/wheet.jpg')}}">
                </div>
                <div class="containerItem contentTxt"  style="order: 0" id="prisInfo">
                    <h2>Pris?</h2>
                    <p>För att lägret ska gå runt måste vi tyvärr ta en liten för att man ska kunna delta på lägret. 
                        Lägret bygger på ideella ledare och pengarna går mat, hyra av lokaler och annat för att lägret ska 
                        bli så grymt som möjligt.
                    </p>
                </div>
            </div>
        </div>
        <!-- Explore info row end -->

        <!-- Explore info row -->
        <div class="ContentRow">
            <div class="contentContainer">
                <div class="containerItem contentImg"  style="order: 0">
                    <img src="{{URL::asset('img/andakt.jpg')}}">
                </div>
                <div class="containerItem contentTxt"  style="order: 1">
                    <h2>Andakter</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas bibendum sodales varius.
                    </p>
                </div>
            </div>
        </div>
        <!-- Explore info row end -->
        
        <div class="ContentRow">
            <div class="contentTxt" style="background-color: #EBEBEB;">
                <h2>För föräldrar</h2>
                <p>En vanlig dag börjar med gemensam frukost i mattältet. Därefter träffas tonåringar och ledare från 
                    respektive ort för att snacka om hur tonåringarna upplever lägret, presentera dagens aktiviteter 
                    och tema och kanske leka en lek tillsammans. På förmiddagen hålls ofta ett bibelstudie som följs av 
                    samtal i tvärgrupperna. Tvärgruppen består av en grupp av tonåringar från olika orter men i ungefär 
                    samma åldrar. Tillsammans med ett par ledare summerar grupperna bibelstudiet, lär känna varandra, 
                    pratar och har roligt. Sen är det lunch, varpå deltagarna har fritid och sedan kan välja mellan ett 
                    antal dagsaktiviteter. Dagsaktiviteterna är vitt skilda och kan innebära allt ifrån tennis och trädklättring 
                    till pyssel och filmskapande. Mycket kul händer på dagarna men det finns också fritid då det är fritt 
                    fram att ta det lugnt, spela fotboll, beachvolley eller bada. Under kvällen är det ofta spex och något 
                    roligt program i stora salen innan det är dags för en andakt. Andakterna är delade i två delar. 
                    Under den första stunden vill vi att alla detagare är med, sedan följer en frivillig del för dem som 
                    vill stanna lite längre. På andakterna sjunger man tillsammans och lyssnar på någon som snackar. 
                    För den som är hungrig finns det kvällsmacka efter andakten, och sen är det läggdags som gäller! 
                    <br><br>
                    Explore är ett läger med kristen grund. Alla som hjälper till med lägret har en relation till kyrkan 
                    och en personlig tro till Gud. För oss är den kristna tron en central byggsten i våra liv, men oavsett 
                    vilken tro eller livsåskådning du har är du alltid välkommen på våra läger!</p>
            </div>
            
        </div>

        <div class="inlineImgBanner">
            <img src="{{URL::asset('img/canoe.jpg')}}">
        </div>

        <div class="ContentRow">
            <div class="contentTxt" style="background-color: #EBEBEB;">
                <h2>För föräldrar</h2>
                <p>Explore är ett läger som anordnas av flera Equmeniaförsamlingar i Vårgårdatrakten. 
                    Lägret är en plats där ungdomar får lära känna nya vänner i sin egen ålder, men också skapar viktiga 
                    relationer till ledare och vuxna, vilket kan bli till ett stort stöd för tonåringarna. 
                    <br><br>
                    Detta lägret har funnits i många år men förekommit under olika namn. Lägret har fått vara en mötesplats 
                    för nya bekantskaper och en plats där tonåringar och unga vuxna fått möjlighet att växa i sig själv och 
                    i en eventuell tro. Explore är ett läger med kristen grund. Alla som hjälper till med lägret har en 
                    relation till kyrkan och en personlig tro till Gud. För oss är den kristna tron en central byggsten i 
                    våra liv, men oavsett tro eller livsåskådning är alla givetvis välkomna på våra läger! Vi ledare som är 
                    med och jobbar inför lägret är väldigt förväntansfulla och ser fram emot ännu ett härligt sommarläger med 
                    mycket bad, glädje, kärlek och Gud. Vi hoppas att alla som vill ska hänga med oss till Explore!</p>
            </div>
            
        </div>

        <div class="inlineImgBanner">
            <img src="{{URL::asset('img/tents.jpg')}}">
        </div>

        <!-- QnA -->

        <div class="ContentRow">
            <div class="contentTxt" id="faqInfo">
                <h2>Frågor och svar</h2>
            </div>
            <div class="">
                <div class="qnaRow">
                    <!-- Left row -->
                   <div class="qnaBound">
                        <!-- Question 1-->
                        <div class="col qnaBtnSize">
                            <div class="">
                                <div>
                                    <h2 data-toggle="collapse" href="#question1" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Vad är Explorelägret för något? +</h2>
                                </div>
                                <div class="collapse faqBody" id="question1">
                                    <p>Till årets läger är syskonrabatten borttagen för att lägeravgiften är sänkt. Skulle ekonomin vara ett problem så kontakta din equmeniaförening så hjälper de till. Ekonomin ska inte vara ett hinder för att åka med på lägret.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Question 1 end-->
                        <!-- Question 2-->
                        <div class="col qnaBtnSize">
                            <div class="">
                                <div>
                                    <h2 data-toggle="collapse" href="#question2" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Var är lägret? +</h2>
                                </div>
                                <div class="collapse faqBody" id="question2">
                                    <p>Betalningen görs via faktura som skickas till den epost som anges vid anmälan. Detta sker innan lägret och ska betalas innan lägret. OBS! Kan du av någon anledning inte ta emot fakturan via epost så måste du kontakta antingen lägerledningen eller webbansvarig.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Question 2 end-->
                        <!-- Question 3-->
                        <div class="col qnaBtnSize">
                                <div class="">
                                    <div>
                                        <h2 data-toggle="collapse" href="#question3" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Får mamma, pappa eller min kompis komma ut och hälsa på en dag? +</h2>
                                    </div>
                                    <div class="collapse faqBody" id="question3">
                                        <p>Betalningen görs via faktura som skickas till den epost som anges vid anmälan. Detta sker innan lägret och ska betalas innan lägret. OBS! Kan du av någon anledning inte ta emot fakturan via epost så måste du kontakta antingen lägerledningen eller webbansvarig.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Question 3 end-->
                            <!-- Question 4-->
                        <div class="col qnaBtnSize">
                                <div class="">
                                    <div>
                                        <h2 data-toggle="collapse" href="#question4" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Hur går betalningen till? +</h2>
                                    </div>
                                    <div class="collapse faqBody" id="question4">
                                        <p>Betalningen görs via faktura som skickas till den epost som anges vid anmälan. Detta sker innan lägret och ska betalas innan lägret. OBS! Kan du av någon anledning inte ta emot fakturan via epost så måste du kontakta antingen lägerledningen eller webbansvarig.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Question 4 end-->
                            <!-- Question 5-->
                        <div class="col qnaBtnSize">
                            <div class="">
                                <div>
                                    <h2 data-toggle="collapse" href="#question5" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Varför kostar det pengar att vara med? +</h2>
                                </div>
                                <div class="collapse faqBody" id="question5">
                                    <p>Betalningen görs via faktura som skickas till den epost som anges vid anmälan. Detta sker innan lägret och ska betalas innan lägret. OBS! Kan du av någon anledning inte ta emot fakturan via epost så måste du kontakta antingen lägerledningen eller webbansvarig.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Question 5 end-->
                        <!-- Question 6-->
                        <div class="col qnaBtnSize">
                            <div class="">
                                <div>
                                    <h2 data-toggle="collapse" href="#question6" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Vilka åldrar får vara med? +</h2>
                                </div>
                                <div class="collapse faqBody" id="question6">
                                    <p>Betalningen görs via faktura som skickas till den epost som anges vid anmälan. Detta sker innan lägret och ska betalas innan lägret. OBS! Kan du av någon anledning inte ta emot fakturan via epost så måste du kontakta antingen lägerledningen eller webbansvarig.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Question 6 end-->
                        <!-- Question 7-->
                        <div class="col qnaBtnSize">
                            <div class="">
                                <div>
                                    <h2 data-toggle="collapse" href="#question7" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Jag har anmält mig men inte fått något bekräftelse-mail? +</h2>
                                </div>
                                <div class="collapse faqBody" id="question7">
                                    <p>Betalningen görs via faktura som skickas till den epost som anges vid anmälan. Detta sker innan lägret och ska betalas innan lägret. OBS! Kan du av någon anledning inte ta emot fakturan via epost så måste du kontakta antingen lägerledningen eller webbansvarig.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Question 7 end-->
                        <!-- Question 8-->
                        <div class="col qnaBtnSize">
                            <div class="">
                                <div>
                                    <h2 data-toggle="collapse" href="#question8" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Jag har inte fått någon faktura? +</h2>
                                </div>
                                <div class="collapse faqBody" id="question8">
                                    <p>Betalningen görs via faktura som skickas till den epost som anges vid anmälan. Detta sker innan lägret och ska betalas innan lägret. OBS! Kan du av någon anledning inte ta emot fakturan via epost så måste du kontakta antingen lägerledningen eller webbansvarig.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Question 8 end-->
                        <!-- Add more questions here. Dont forget to change href and id for the collapse-->
                    </div>
                    <!-- Left row end-->
                    <!-- Right row-->

                    <div  class="qnaBound">
                        <!-- Question 9-->
                        <div class="col qnaBtnSize">
                            <div class="">
                                <div>
                                    <h2 data-toggle="collapse" href="#question9" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Vad händer på lägret? +</h2>
                                </div>
                                <div class="collapse" id="question9">
                                    <p class="">Den tjänst som hemsidan använder för att leverera säkra mail, kan ibland vara belastad. Därför kan det dröja mellan 5-10 minuter innan mailet kommer fram. I övrigt, ta en titt i alla de olika inkorgarna, kanske har det hamnat i skräpposten. Om mailet fortfarande inte kommit fram efter några timmar så kontakta din ungdomsledare, hen kan logga in och se om du är anmäld.</p>
                                </div>
                            </div>
                        </div>            
                        <!-- Question 9 end-->

                        <!-- Question 10-->
                        <div class="col qnaBtnSize">
                            <div class="">
                                <div>
                                    <h2 data-toggle="collapse" href="#question10" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">När är lägret? +</h2>
                                </div>
                                <div class="collapse" id="question10">
                                    <p class="">Ett mejl kommer att skickas ut med mer information angående lägret i mitten av december. Där kommer du få information om bland annat avgång, packlista m.m.</p>
                                </div>
                            </div>
                        </div>                    
                        <!-- Question 10 end-->

                        <!-- Question 11-->
                        <div class="col qnaBtnSize">
                                <div class="">
                                    <div>
                                        <h2 data-toggle="collapse" href="#question11" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">När kan man anmäla sig? +</h2>
                                    </div>
                                    <div class="collapse" id="question11">
                                        <p class="">Ett mejl kommer att skickas ut med mer information angående lägret i mitten av december. Där kommer du få information om bland annat avgång, packlista m.m.</p>
                                    </div>
                                </div>
                            </div>                    
                            <!-- Question 11 end-->

                            <!-- Question 12-->
                        <div class="col qnaBtnSize">
                                <div class="">
                                    <div>
                                        <h2 data-toggle="collapse" href="#question12" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Hur fungerar det med boende? +</h2>
                                    </div>
                                    <div class="collapse" id="question12">
                                        <p class="">Ett mejl kommer att skickas ut med mer information angående lägret i mitten av december. Där kommer du få information om bland annat avgång, packlista m.m.</p>
                                    </div>
                                </div>
                            </div>                    
                            <!-- Question 12 end-->

                            <!-- Question 13-->
                        <div class="col qnaBtnSize">
                                <div class="">
                                    <div>
                                        <h2 data-toggle="collapse" href="#question13" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Syskonrabatt +</h2>
                                    </div>
                                    <div class="collapse" id="question13">
                                        <p class="">Ett mejl kommer att skickas ut med mer information angående lägret i mitten av december. Där kommer du få information om bland annat avgång, packlista m.m.</p>
                                    </div>
                                </div>
                            </div>                    
                            <!-- Question 13 end-->

                            <!-- Question 14-->
                        <div class="col qnaBtnSize">
                                <div class="">
                                    <div>
                                        <h2 data-toggle="collapse" href="#question14" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Bekräfta epost och anmälan +</h2>
                                    </div>
                                    <div class="collapse" id="question14">
                                        <p class="">Ett mejl kommer att skickas ut med mer information angående lägret i mitten av december. Där kommer du få information om bland annat avgång, packlista m.m.</p>
                                    </div>
                                </div>
                            </div>                    
                            <!-- Question 14 end-->

                            <!-- Question 15-->
                        <div class="col qnaBtnSize">
                                <div class="">
                                    <div>
                                        <h2 data-toggle="collapse" href="#question15" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Viktig information inför lägret +</h2>
                                    </div>
                                    <div class="collapse" id="question15">
                                        <p class="">Ett mejl kommer att skickas ut med mer information angående lägret i mitten av december. Där kommer du få information om bland annat avgång, packlista m.m.</p>
                                    </div>
                                </div>
                            </div>                    
                            <!-- Question 15 end-->

                            <!-- Question 16-->
                        <div class="col qnaBtnSize">
                                <div class="">
                                    <div>
                                        <h2 data-toggle="collapse" href="#question16" aria-expanded="false" aria-controls="collapseExample" class="faqTitle" style="cursor: pointer;">Jag ska inte längre med på lägret, vad ska jag göra? +</h2>
                                    </div>
                                    <div class="collapse" id="question16">
                                        <p class="">Ett mejl kommer att skickas ut med mer information angående lägret i mitten av december. Där kommer du få information om bland annat avgång, packlista m.m.</p>
                                    </div>
                                </div>
                            </div>                    
                            <!-- Question 16 end-->
                        <!-- Add more questions here. Dont forget to change href and id for the collapse-->
                    </div>
                    <!-- Right row end -->
                </div>
            </div>
        </div>

        <!-- QnA End -->
        
        <!-- Kontakt info -->
        <div class="ContentRow" id="KontaktInfo">
                <div class="contentTxt centerTextInDiv">
                    <h2>Kontakt</h2>
                    <div>
                        <h1>info@explorelagret.se</h1>
                    </div>
                    <!-- Kontakt lägerchefer -->
                    <div>
                        <h2><br>Lägerledning</h2>
                        <table style="display: flex; justify-content: center;">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 style="margin-right: 5px;">Jonatan Davidsson</h5>
                                    </td>
                                    <td>
                                        <p style="margin-top: 8px; margin-left: 5px;">0703 27 40 31</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 style="margin-right: 5px;">Louise Persson</h5>
                                    </td>
                                    <td>
                                        <p style="margin-top: 8px; margin-left: 5px;">0709-80 90 14</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 style="margin-right: 5px;">Alice Rydsom</h5>
                                    </td>
                                    <td>
                                        <p style="margin-top: 8px; margin-left: 5px;">0767-07 19 95</p>
                                    </td>
                                </tr>
                           </tbody>
                        </table>
                    </div>
                    <!-- Kontakt lägerchefer end -->

                    <!-- Kontakt krisgrupp -->
                    <div>
                        <h2><br>krisgrupp</h2>
                        <table style="display: flex; justify-content: center;">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 style="margin-right: 5px;">Alice Marinder</h5>
                                    </td>
                                    <td>
                                        <p style="margin-top: 8px; margin-left: 5px;">0730-81 88 89</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Kontakt krisgrupp end -->
                    <!-- Kontakt webbadmin start -->
                    <div>
                        <h2><br>Webb-admin</h2>
                        <table style="display: flex; justify-content: center;">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 style="margin-right: 5px;">Gustav Råkeberg och Felix Brunnegård</h5>
                                    </td>
                                    <td>
                                        <p style="margin-top: 8px; margin-left: 5px;">webb@explorelagret.se</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Kontakt webbadmin end -->
                    <!-- Kontakt Uthyrning -->
                    <div>
                        <h2><br>Uthyrning Utrustning</h2>
                        <table style="display: flex; justify-content: center;">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 style="margin-right: 5px;">Rickard Martinsson</h5>
                                    </td>
                                    <td>
                                        <p style="margin-top: 8px; margin-left: 5px;">0706-30 30 88</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Kontakt Uthyrning end -->

                    <!-- Kontakt Liftkort -->
                    <div>
                        <h2><br>Liftkort</h2>
                        <table style="display: flex; justify-content: center;">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 style="margin-right: 5px;">Martin Olausson</h5>
                                    </td>
                                    <td>
                                        <p style="margin-top: 8px; margin-left: 5px;">0709-61 98 46</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Kontakt Liftkort end -->

                    <!-- Kontakt sjukvårdsansvarig -->
                    <div>
                        <h2><br>Sjukvårdsansvarig</h2>
                        <table style="display: flex; justify-content: center;">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 style="margin-right: 5px;">Joakim Alriksson</h5>
                                    </td>
                                    <td>
                                        <p style="margin-top: 8px; margin-left: 5px;">0707 44 10 51</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Kontakt sjukvårdsansvarig end -->

                    
                    <!-- Kontakt köksansvarig -->
                    <div>
                        <h2><br>Köksansvarig</h2>
                        <table style="display: flex; justify-content: center;">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 style="margin-right: 5px;">Markus Andersson</h5>
                                    </td>
                                    <td>
                                        <p style="margin-top: 8px; margin-left: 5px;">0702 84 88 85</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Kontakt köksansvarig end -->
                </div>
            </div>
            <!-- Kontakt info end -->

    </div>

    <!-- Main Site Content End -->

   

    <!-- scroll to top btn -->

    <script>

        // Called every time the window is resized.
        // Makes sure the info blocks with images aligns properly
        $(window).resize(CheckOrder);

        function CheckOrder() {            
            var infoBlocks = $('.ContentRow');
            var i = 0;

            infoBlocks.each(function(){
                if(i % 2 == 0){
                    if(window.innerWidth < 992){
                        $(this).find('.contentImg').css("order", "0");
                        $(this).find('.contentTxt').css("order", "1");
                    }
                    else {
                        $(this).find('.contentImg').css("order", "1");
                        $(this).find('.contentTxt').css("order", "0");
                    }
                }
                i++; 
            });
        }
       

        // Scroll to top logo
        $(function(){
            $("#scrollToTopLogo").click(function(){
                $("html,body").animate({scrollTop:0},"1300");
                return false
            })
        })
        
        // Scroll to pris
        $(function(){
            $("#scrollToPrisBtn").click(function(){
                $("html,body").animate({scrollTop: $("#prisInfo").offset().top},"1300");
                toggleHiddenSidebarClass();
                return false
            })
        })
        
        // Scroll to "var är explore?"
        $(function(){
            $("#scrollToInfoBtn").click(function(){
                $("html,body").animate({scrollTop: $("#explorelagretInfo").offset().top},"1300");
                toggleHiddenSidebarClass();
                return false
            })
        })
        
        // Scroll to Regler
        $(function(){
            $("#scrollToReglerBtn").click(function(){
                $("html,body").animate({scrollTop: $("#ReglerInfo").offset().top},"1300");
                toggleHiddenSidebarClass();
                return false 
            })
        })

        
        // Scroll to faq
        $(function(){
            $("#scrollTofaqBtn").click(function(){
                $("html,body").animate({scrollTop: $("#faqInfo").offset().top},"1300");
                toggleHiddenSidebarClass();
                return false
            })
        })

        
        // Scroll to kontakt
        $(function(){
            $("#scrollToKontaktBtn").click(function(){
                $("html,body").animate({scrollTop: $("#KontaktInfo").offset().top},"1000");
                toggleHiddenSidebarClass();
                return false
            })
        })

        $(document).ready(function(){
            CheckOrder();
        });
    </script>
    <!-- scroll to top btn end -->
    
    @endsection
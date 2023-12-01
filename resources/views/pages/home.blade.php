{{-- resources/views/pages/home.blade.php --}}

<!-- Status : factorisation -->

@extends('layouts.app', ['title' => 'Accueil'])

@section('content')
    <section class="min-h-screen flex flex-col justify-between bg-white dark:bg-gray-900">
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-center space-y-8 md:space-y-0 md:space-x-32 py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
            <main class="flex-1">
                <h1 class="mb-8 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
                    Bienvenue aux <br> <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-pink-500">Jeux de
                        l'URCA 2024</span>
                </h1>
                <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400 mb-8 md:mb-0">
                Participez aux Jeux de l'URCA 2024, une fusion de passion, performance et camaraderie, pour vivre des compétitions vibrantes et des célébrations mémorables.
                </p>
                <button type="button" onClick="document.getElementById('aventure').scrollIntoView();"
                    class="text-white bg-gradient-to-r from-blue-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 mt-4 flex items-center animate-pulse">
                    L'aventure commence ici !                
                    <svg class="ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                </button>
            </main>
            <div class="flex-1">
                <img src="{{ asset('img/acceuilurcagames') }}" alt="Image Acceuil UrcaGames"
                    class="w-96 h-auto rounded-lg shadow-xl" />
            </div>
        </div>
        
        <figure class="max-w-screen-md mx-auto text-center">
        <svg class="w-10 h-10 mx-auto mb-3 text-gray-400 dark:text-gray-600" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
            <path
                d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
        </svg>
        <blockquote>
            <p class="text-2xl italic font-medium text-gray-900 dark:text-white">"C'est dans le sport et plus
                particulièrement dans le triathlon que je vis une grande partie de mes plus beaux moment. C'est un
                honneur d'être parrain des jeux universitaires de l'URCA."</p>
        </blockquote>
        <figcaption class="flex items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
            <img class="w-6 h-6 rounded-full" src="{{ asset('img/nathan-simionato.jpg') }}" alt="profile picture">
            <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-500 dark:divide-gray-700">
                <cite class="pe-3 font-medium text-gray-900 dark:text-white">Nathan Simionato</cite>
                <cite class="ps-3 text-sm text-gray-500 dark:text-gray-400">Parrain des Jeux de l'URCA</cite>
            </div>
        </figcaption>
    </figure>
    </section>


    
    <section class="bg-white dark:bg-gray-900 min-h-screen flex flex-col justify-between" id="aventure">
        <div
            class="grid grid-cols-1 lg:grid-cols-2 items-center gap-16 py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">

            <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Programme
                    sportif sur deux semaines</h2>
                <p>En semaine 1, défiez-vous au handball, sumo, touch rugby, laser run, futsal et palets
                    bretons. La semaine 2 fait place au badminton, relais crossfit, volley, marathon, tournois
                    e-sport, basket et escalade de vitesse.
                    </br> Rejoignez l'esprit d'équipe et la compétition !</p>
                <button
                    class="animate-pulse relative inline-flex items-center justify-center p-0.5 m-4 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-blue-500 to-pink-500 group-hover:from-blue-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 animate-pulse ">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Infos sports
                    </span>
                </button>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <div>
                    <h3 class="text-lg font-bold dark:text-white">Semaine 1</h3>
                    <img class="w-full rounded-lg shadow-xl" src="{{ asset('img/acceuilsemaine1.png') }}"
                        alt="Programme de la Semaine 1">
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">Campus Moulin de la Housse.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-bold dark:text-white mt-4 lg:mt-10">Semaine 2</h3>
                    <img class="w-full rounded-lg shadow-xl" src="{{ asset('img/acceuilsemaine2.png') }}"
                        alt="Programme de la Semaine 2">
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">Campus Croix-Rouge.</p>
                </div>
            </div>
        </div>

        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div id="accordion-color" data-accordion="collapse open" class="">
                <!-- Semaine 1 -->
<h2 id="accordion-color-heading-1">
    <button type="button"
        class="flex items-center justify-between w-full p-5 font-medium text-gray-500  rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
        data-accordion-target="#accordion-color-body-1" aria-expanded="true" aria-controls="accordion-color-body-1">
        <span>Programme Semaine 1 (12 au 15 février)</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5 5 1 1 5" />
        </svg>
    </button>
</h2>
<section id="accordionPrograme">
<div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
        <!-- Accordéon pour Lundi -->
        <div id="accordion-lundi" data-accordion="collapse">
            <h3 id="accordion-lundi-heading">
                <button type="button"
                    class="flex items-center justify-between w-full p-4 font-medium text-gray-500 border border-b-0 border-gray-200 rounded-t-md focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-lundi-body" aria-expanded="true"
                    aria-controls="accordion-lundi-body">
                    <span>Lundi 12 février</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h3>
            <div id="accordion-lundi-body" class="block" aria-labelledby="accordion-lundi-heading">
                <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    <h4>Handball</h4>
                    <ul class="list-disc pl-5 mb-3 dark:text-gray-400">
                        <li>Nombre d'équipes : 12 équipes</li>
                        <li>Joueurs par équipes : 6 joueurs</li>
                        <li>De 18h à 22h</li>
                        <li>Au Gymnase Universitaire (plateau C) sur le campus Moulin de la Housse</li>
                        <li>Inscriptions obligatoires</li>
                    </ul>
                </div>
                <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    <h4>Sumo</h4>
                    <ul class="list-disc pl-5 mb-3">
                        <li>Nombre d'équipes : 6 équipes</li>
                        <li>Joueurs par équipes : 6 joueurs</li>
                        <li>De 18h à 22h</li>
                        <li>Au Gymnase Universitaire (plateau C) sur le campus Moulin de la Housse</li>
                        <li>Inscriptions obligatoires</li>
                    </ul>
                    <p>Les participants se tiendrons en tenue de sport. Il faudra faire sortir d'une
                        zone délimitée (un cercle au sol) son adversaire ou lui faire poser un genou/les
                        mais au sol.</p>
                </div>
            </div>
        </div>
        <!-- Accordéon pour Mardi -->
        <div id="accordion-mardi" data-accordion="collapse">
            <h3 id="accordion-mardi-heading">
                <button type="button"
                    class="flex items-center justify-between w-full p-4 font-medium text-gray-500 border border-b-0 border-gray-200 rounded-t-md focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-mardi-body" aria-expanded="false"
                    aria-controls="accordion-mardi-body">
                    <span>Mardi 13 février</span>
                    <svg data-accordion-icon class="w-3 h-3 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h3>
            <div id="accordion-mardi-body" class="hidden" aria-labelledby="accordion-mardi-heading">
                <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    <h4>Touch Rugby</h4>
                    <ul class="list-disc pl-5 mb-3">
                        <li>Nombre d'équipes : 12 équipes</li>
                        <li>Joueurs par équipes : 4 joueurs</li>
                        <li>De 18h à 22h</li>
                        <li>Au terrain de rugby sur le campus Moulin de la Housse</li>
                        <li>Inscriptions obligatoires</li>
                    </ul>
                </div>
                <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    <h4>Laser mini-bandeau</h4>
                    <ul class="list-disc pl-5 mb-3">
                        <li>Nombre d'équipes : 6 équipes</li>
                        <li>Joueurs par équipes : 3 à 6 joueurs</li>
                        <li>De 18h à 22h</li>
                        <li>En extérieur sur le campus Moulin de la Housse</li>
                        <li>Inscriptions obligatoires</li>
                    </ul>
                    <p>Dans l'esprit du biathlon : le principe sera de faire monter le cardio d'une
                        façon spécifique (courir rapidement sur une distance, rameur, etc.) puis de
                        tirer sur une cible factice à l'aide d'un laser.</p>
                </div>
                <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    <h4>Tournoi E-Sport</h4>
                    <ul class="list-disc pl-5 mb-3">
                        <li>Nombre d'équipes : 10 équipes</li>
                        <li>Joueurs par équipes : 6 joueurs</li>
                        <li>De 18h à 22h</li>
                        <li>Salle d'examen campus Moulin de la Housse</li>
                        <li>Inscriptions obligatoires</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Accordéon pour Mercredi -->
        <div id="accordion-mercredi" data-accordion="collapse">
            <h3 id="accordion-mercredi-heading">
                <button type="button"
                    class="flex items-center justify-between w-full p-4 font-medium text-gray-500 border border-b-0 border-gray-200 rounded-t-md focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-mercredi-body" aria-expanded="false"
                    aria-controls="accordion-mercredi-body">
                    <span>Mercredi 14 février</span>
                    <svg data-accordion-icon class="w-3 h-3 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h3>
            <div id="accordion-mercredi-body" class="hidden" aria-labelledby="accordion-mercredi-heading">
                <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    <h4>Futsal</h4>
                    <ul class="list-disc pl-5 mb-3">
                        <li>Nombre d'équipes : 12 équipes</li>
                        <li>Joueurs par équipes : 6 joueurs</li>
                        <li>De 18h à 22h</li>
                        <li>Au Gymnase Universitaire sur le campus Moulin de la Housse</li>
                        <li>Inscriptions obligatoires</li>
                    </ul>
                </div>
                <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    <h4>Palets Bretons</h4>
                    <ul class="list-disc pl-5 mb-3">
                        <li>Nombre d'équipes : 6 équipes</li>
                        <li>Joueurs par équipes : 3 à 6 joueurs</li>
                        <li>De 18h à 22h</li>
                        <li>Campus Moulin de la Housse</li>
                        <li>Inscriptions obligatoires</li>
                    </ul>
                    <p>C'est un jeu qui consiste à lancer des palets en métal sur une planche en bois
                        afin
                        de les rapprocher le plus possible d'un autre palet appelé "maître".</p>
                </div>
            </div>
        </div>
        <!-- Accordéon pour Jeudi -->
        <div id="accordion-jeudi" data-accordion="collapse">
            <h3 id="accordion-jeudi-heading">
                <button type="button"
                    class="flex items-center justify-between w-full p-4 font-medium text-gray-500 border border-b-0 border-gray-200 rounded-t-md focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-jeudi-body" aria-expanded="false"
                    aria-controls="accordion-jeudi-body">
                    <span>Jeudi 15 février</span>
                    <svg data-accordion-icon class="w-3 h-3 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h3>
            <div id="accordion-jeudi-body" class="hidden" aria-labelledby="accordion-jeudi-heading">
                <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    <h4>Finales des "sports olympiques" Handball, Touch Rubgy, Futsal :</h4>
                    <ul class="list-disc pl-5 mb-3">
                        <li>De 13h à 18h</li>
                        <li>Même règles que lors des qualifications</li>
                        <li>Même lieux que lors des qualifications</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div id="accordion-color" data-accordion="collapse open" class="">
    <!-- Semaine 2 -->
    <h2 id="accordion-color-heading-2">
        <button type="button"
            class="flex items-center justify-between w-full p-5 font-medium text-gray-500 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
            data-accordion-target="#accordion-color-body-2" aria-expanded="false"
            aria-controls="accordion-color-body-2">
            <span>Programme Semaine 2 (19 au 22 février)</span>
            <svg data-accordion-icon class="w-3 h-3 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5 5 1 1 5" />
            </svg>
        </button>
    </h2>
    <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <!-- Accordéon pour Lundi (Semaine 2) -->
            <div id="accordion-lundi2" data-accordion="collapse">
                <h3 id="accordion-lundi2-heading">
                    <button type="button"
                        class="flex items-center justify-between w-full p-4 font-medium text-gray-500 border border-b-0 border-gray-200 rounded-t-md focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-lundi2-body" aria-expanded="false"
                        aria-controls="accordion-lundi2-body">
                        <span>Lundi 19 février</span>
                        <svg data-accordion-icon class="w-3 h-3 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h3>
                <div id="accordion-lundi2-body" class="hidden" aria-labelledby="accordion-lundi2-heading">
                    <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        <h4>Badminton</h4>
                        <ul class="list-disc pl-5 mb-3">
                            <li>Nombre d'équipes : 36 équipes</li>
                            <li>Joueurs par équipes : 6 joueurs, à l'italienne 3x2</li>
                            <li>De 18h à 22h</li>
                            <li>À la Halle Croix Rouge plateau principal</li>
                            <li>Inscriptions obligatoires</li>
                        </ul>
                    </div>
                    <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        <h4>Relais Crossfit</h4>
                        <ul class="list-disc pl-5 mb-3">
                            <li>Nombre d'équipes : 6 équipes</li>
                            <li>Joueurs par équipes : 6 joueurs</li>
                            <li>De 18h à 22h</li>
                            <li>À la Halle Croix Rouge salle fitness</li>
                            <li>Inscriptions obligatoires</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Accordéon pour Mardi (Semaine 2) -->
            <div id="accordion-mardi2" data-accordion="collapse">
                <h3 id="accordion-mardi2-heading">
                    <button type="button"
                        class="flex items-center justify-between w-full p-4 font-medium text-gray-500 border border-b-0 border-gray-200 rounded-t-md focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-mardi2-body" aria-expanded="false"
                        aria-controls="accordion-mardi2-body">
                        <span>Mardi 20 février</span>
                        <svg data-accordion-icon class="w-3 h-3 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h3>
                <div id="accordion-mardi2-body" class="hidden" aria-labelledby="accordion-mardi2-heading">
                    <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        <h4>Volley</h4>
                        <ul class="list-disc pl-5 mb-3">
                            <li>Nombre d'équipes : 20 équipes</li>
                            <li>Joueurs par équipes : 6 joueurs</li>
                            <li>De 18h à 22h</li>
                            <li>À la Halle Croix Rouge plateau principal</li>
                            <li>Inscriptions obligatoires</li>
                        </ul>
                    </div>
                    <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        <h4>Relais marathon par équipe</h4>
                        <ul class="list-disc pl-5 mb-3">
                            <li>Nombre d'équipes : 6 équipes</li>
                            <li>Coureurs par équipes : 4 à 6 coureurs</li>
                            <li>De 18h à 22h</li>
                            <li>À la Halle Croix Rouge</li>
                            <li>Inscriptions obligatoires</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Accordéon pour Mercredi (Semaine 2) -->
            <div id="accordion-mercredi2" data-accordion="collapse">
                <h3 id="accordion-mercredi2-heading">
                    <button type="button"
                        class="flex items-center justify-between w-full p-4 font-medium text-gray-500 border border-b-0 border-gray-200 rounded-t-md focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-mercredi2-body" aria-expanded="false"
                        aria-controls="accordion-mercredi2-body">
                        <span>Mercredi 21 février</span>
                        <svg data-accordion-icon class="w-3 h-3 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h3>
                <div id="accordion-mercredi2-body" class="hidden" aria-labelledby="accordion-mercredi2-heading">
                    <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        <h4>Basket 3c3</h4>
                        <ul class="list-disc pl-5 mb-3">
                            <li>Nombre d'équipes : 12 équipes</li>
                            <li>Joueurs par équipes : 6 joueurs</li>
                            <li>De 18h à 22h</li>
                            <li>À la Halle Croix Rouge plateau principal</li>
                            <li>Inscriptions obligatoires</li>
                        </ul>
                    </div>
                    <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        <h4>Relais bloc escalade</h4>
                        <ul class="list-disc pl-5 mb-3">
                            <li>Nombre d'équipes : 6</li>
                            <li>Grimpeurs par équipes : 3 à 6 grimpeurs</li>
                            <li>De 18h à 22h</li>
                            <li>À la Halle Croix Rouge mur d'escalade</li>
                            <li>Inscriptions obligatoires</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Accordéon pour Jeudi (Semaine 2) -->
            <div id="accordion-jeudi2" data-accordion="collapse">
                <h3 id="accordion-jeudi2-heading">
                    <button type="button"
                        class="flex items-center justify-between w-full p-4 font-medium text-gray-500 border border-b-0 border-gray-200 rounded-t-md focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-jeudi2-body" aria-expanded="false"
                        aria-controls="accordion-jeudi2-body">
                        <span>Jeudi 22 février</span>
                        <svg data-accordion-icon class="w-3 h-3 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h3>
                <div id="accordion-jeudi2-body" class="hidden" aria-labelledby="accordion-jeudi2-heading">
                    <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        <h4>Finales des "sports olympiques" Badminton, Volley, Basket</h4>
                        <ul class="list-disc pl-5 mb-3">
                            <li>De 13h à 18h</li>
                            <li>Même règles que lors des qualifications</li>
                            <li>Même lieux que lors des qualifications</li>
                        </ul>
                    </div>
                    <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                        <h4>Cérémonie de cloture - culture en fête</h4>
                        <ul class="list-disc pl-5 mb-3">
                            <li>De 18h à 22h</li>
                            <li>Halle Croix Rouge plateau principal</li>
                            <li>Set DJ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>



<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="max-w-screen-md mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Règlement Global
                d’Inscription aux Jeux URCA</h2>
            <p class="text-gray-500 sm:text-xl dark:text-gray-400">Voici les règles détaillées pour une participation
                équitable et organisée aux Jeux de l'URCA 2024.</p>
            <a href="#"
                class="inline-flex items-center font-medium text-blue-500 hover:text-primary-800 dark:text-primary-500 dark:hover:text-primary-700  px-5 py-2.5 text-center mr-2 mb-2 mt-4  ">
                <span>En savoir plus</span>
                <svg class="ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
        <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
            <!-- Règle 1: Mixité Obligatoire -->
            <div>
                <div
                    class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                    </svg>
                </div>
                <h3 class="mb-2 text-xl font-bold dark:text-white">Mixité Obligatoire</h3>
                <p class="text-gray-500 dark:text-gray-400">Les équipes de 6 personnes doivent être mixtes et
                    représenter une composante, indépendamment de la provenance de leurs membres.</p>
            </div>
            <!-- Règle 2: Inscriptions Multiples -->
            <div>
                <div
                    class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 14h6m-3 3v-6M1.857 1h4.286c.473 0 .857.384.857.857v4.286A.857.857 0 0 1 6.143 7H1.857A.857.857 0 0 1 1 6.143V1.857C1 1.384 1.384 1 1.857 1Zm10 0h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857h-4.286A.857.857 0 0 1 11 6.143V1.857c0-.473.384-.857.857-.857Zm-10 10h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H1.857A.857.857 0 0 1 1 16.143v-4.286c0-.473.384-.857.857-.857Z" />
                    </svg>
                </div>
                <h3 class="mb-2 text-xl font-bold dark:text-white">Inscriptions Multiples</h3>
                <p class="text-gray-500 dark:text-gray-400">Les équipes peuvent s'inscrire à plusieurs activités, en
                    spécifiant leur ordre de préférence pour chaque activité.</p>
            </div>
            <!-- Règle 3: Participation aux Finales -->
            <div>
                <div
                    class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m11.479 1.712 2.367 4.8a.532.532 0 0 0 .4.292l5.294.769a.534.534 0 0 1 .3.91l-3.83 3.735a.534.534 0 0 0-.154.473l.9 5.272a.535.535 0 0 1-.775.563l-4.734-2.49a.536.536 0 0 0-.5 0l-4.73 2.487a.534.534 0 0 1-.775-.563l.9-5.272a.534.534 0 0 0-.154-.473L2.158 8.48a.534.534 0 0 1 .3-.911l5.294-.77a.532.532 0 0 0 .4-.292l2.367-4.8a.534.534 0 0 1 .96.004Z" />
                    </svg>
                </div>
                <h3 class="mb-2 text-xl font-bold dark:text-white">Participation aux Finales</h3>
                <p class="text-gray-500 dark:text-gray-400">Les équipes qualifiées lors des journées régulières
                    participeront aux finales, avec une seule finale par jeudi pour chaque équipe.</p>
            </div>
            <!-- Ajoutez d'autres blocs de règles si nécessaire -->
        </div>

    </div>
</section>




</section>

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
        <h2
            class="mb-8 lg:mb-16 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 dark:text-white md:text-4xl">
            Événement organisé par</h2>
        <div class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-12 md:grid-cols-3 lg:grid-cols-3 dark:text-gray-400">
            <div class="flex justify-center items-center">
                <img src="{{ asset('img/logo-urca.png') }}"
                    class="h-20 filter grayscale hover:grayscale-0  transition duration-300" alt="Urca Logo" />
            </div>
            <div class="flex justify-center items-center">
                <img src="{{ asset('img/jeuxdelurcaclrweb.png') }}"
                    class="h-20 filter grayscale hover:grayscale-0 transition duration-300" alt="UrcaGames Logo" />
            </div>
            <div class="flex justify-center items-center">
                <img src="{{ asset('img/Republique-Francaise-Liberte-Egalite-Fratermite-1024x768-546024944.png') }}"
                    class="h-20 filter grayscale hover:grayscale-0 transition duration-300"
                    alt="République Française Logo" />
            </div>
        </div>
    </div>
</section>



@endsection
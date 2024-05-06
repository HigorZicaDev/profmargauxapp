
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mr-12 w-52">
                {{ __('Agenda de Aulas') }}
            </h2>
            <!-- Filter Teacher Schedules Search -->
            <select id="small" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Selecione um Professor</option>
                @foreach ($teachers as $teacher)
                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
            @endforeach
              </select>
        </div>
    </x-slot>
  
    <!-- Main modal -->
    <div id="crud-modal-schedules" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full opacity-0">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Novo Agendamento
                    </h3>
                    <div class="modal-close">
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
                <!-- Modal body -->
                <form action="{{route('schedules.store')}}" method="POST" class="p-4 md:p-5">
                    @csrf()
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Digite o titulo de referência da aula ..." required="">
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição/Observações</label>
                            <textarea id="description" name="description" placeholder="Digite informações sobre a aula, conteúdo e lembretes do aluno..." rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agendar para o Aluno</label>
                            <select id="student_id" name="student_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Escolha um Aluno</option>
                                @foreach ($students as $student)
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agendar para o Professor</label>
                            <select id="teacher_id" name="teacher_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Escolha o Professor</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="txt-date_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Inicio da Aula:</label>
                            <input type="datetime" name="date_start_schedule" id="date_start_schedule" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="XX/XX/XXXX" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="txt-date_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Termino da Aula:</label>
                            <input type="datetime" name="date_end_schedule" id="date_end_schedule" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="XX/XX/XXXX" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="txt-color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cor:</label>
                            <input type="color" name="color_schedule" id="color_schedule" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <button type="submit" class="ml-4 mt-4 text-white inline-flex items-center bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Salvar
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div> 

    <!-- Details modal -->
    <div id="details-modal-schedules" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full opacity-0">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Detalhes do Agendamento <span id="details_date_start">  </span>
                    </h3>
                    <div class="modal-details-close">
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
                <!-- Modal body -->

                    <div class="grid gap-4 mb-4 grid-cols-2 my-4 px-4">
                        <div class="col-span-2">
                            <label for="title">Titulo:</label>
                            <p id="details_title"></p>
                        </div>
                        <div class="col-span-2">
                            <label for="description">Observações:</label>
                            <p id="details_description"></p>
                        </div>
                        <div class="col-span-2">
                            <label for="teacher">Professor:</label>
                            <p id="details_professor"></p>
                        </div>
                        <div class="col-span-2 mb-6">
                            <a href="#" id="modal_details_delete" class="text-white inline-flex items-center justify-end bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                <svg class="me-1 -ms-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="#fff" x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48">
                                    <path d="M 24 4 C 20.491685 4 17.570396 6.6214322 17.080078 10 L 10.238281 10 A 1.50015 1.50015 0 0 0 9.9804688 9.9785156 A 1.50015 1.50015 0 0 0 9.7578125 10 L 6.5 10 A 1.50015 1.50015 0 1 0 6.5 13 L 8.6386719 13 L 11.15625 39.029297 C 11.427329 41.835926 13.811782 44 16.630859 44 L 31.367188 44 C 34.186411 44 36.570826 41.836168 36.841797 39.029297 L 39.361328 13 L 41.5 13 A 1.50015 1.50015 0 1 0 41.5 10 L 38.244141 10 A 1.50015 1.50015 0 0 0 37.763672 10 L 30.919922 10 C 30.429604 6.6214322 27.508315 4 24 4 z M 24 7 C 25.879156 7 27.420767 8.2681608 27.861328 10 L 20.138672 10 C 20.579233 8.2681608 22.120844 7 24 7 z M 11.650391 13 L 36.347656 13 L 33.855469 38.740234 C 33.730439 40.035363 32.667963 41 31.367188 41 L 16.630859 41 C 15.331937 41 14.267499 40.033606 14.142578 38.740234 L 11.650391 13 z M 20.476562 17.978516 A 1.50015 1.50015 0 0 0 19 19.5 L 19 34.5 A 1.50015 1.50015 0 1 0 22 34.5 L 22 19.5 A 1.50015 1.50015 0 0 0 20.476562 17.978516 z M 27.476562 17.978516 A 1.50015 1.50015 0 0 0 26 19.5 L 26 34.5 A 1.50015 1.50015 0 1 0 29 34.5 L 29 19.5 A 1.50015 1.50015 0 0 0 27.476562 17.978516 z"></path>
                                </svg>
                                Excluir
                            </a>
                        </div>
                    </div>

            </div>
        </div>
    </div> 



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="container">
                        <div id='calendar'></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script> 
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            const timeElapsed = Date.now();
            const today = new Date(timeElapsed);
            const dataAtual = today.toISOString();
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                initialView: 'timeGridWeek',
                locale: 'pt-br',
                navLinks: true,
                selectable: true,
                selectMirror: true,
                editable: true,
                buttonText: {
                    today: "Hoje",
                    month: "Mês",
                    week: "Semana",
                    day: "Dia",
                    list: "Lista",
                    prev: "Anterior",
                    next: "Próximo"
        },
                initialDate: dataAtual,
                slotMinTime: '08:00:00',
                slotMaxTime: '21:00:00',
                slotDuration: '01:00:00',
                weekends: false,
                allDaySlot: false,
                dateClick: function(info) {
                    openModalInsert(info);
                },
                eventClick: function(info){
                    openModalDetails(info);
                    console.log(info.event);
                },
                eventDrop: function(info){
                    moveEvent(info);
                },
                events: @json($dados)
            });
            

            calendar.render();

            // modal insert
            const modalDetails = document.getElementById('details-modal-schedules');
            const modalInsert = document.getElementById('crud-modal-schedules');
            const appBG = document.getElementById('calendar');
            const dateStartElement = document.getElementById('date_start_schedule');
            const dateEndElement = document.getElementById('date_end_schedule');

            // modal details
            const txtTitle = document.getElementById('details_title');
            const txtDescription = document.getElementById('details_description');
            const txtProfessor = document.getElementById('details_professor');
            const txtDateStart = document.getElementById('details_date_start');
            const btnModalDelete = document.getElementById('modal_details_delete');

            const openModalDetails = (info) => {
                appBG.classList.add('inbackground');
                let startDateModal = info.event.startStr.slice(0, 10).split(' ');
                // console.log(startDateModal);
                let data = startDateModal[0].split('-').reverse().join('/');
                let startTimeModal = info.event.startStr.slice(11, 16);
                let endTimeModal = info.event.endStr.slice(11, 16);
                if(modalDetails.classList.contains('hidden')){
                    modalDetails.classList.remove('hidden');

                    txtTitle.innerText = info.event.title;
                    txtDescription.innerText = info.event.extendedProps.description;
                    txtProfessor.innerText = info.event.extendedProps.teacher;
                    txtDateStart.innerText = `${data} - ${startTimeModal} até ${endTimeModal}`;

                    modalDetails.style.transition = 'opacity 300ms';

                    btnModalDelete.href = `http://localhost:8090/schedules/${info.event.id}`

                    setTimeout(() => modalDetails.style.opacity = 1, 100);
                }
            }

            const openModalInsert = (info) => {
                appBG.classList.add('inbackground');
                let dayTimeaModal = info.dateStr.slice(0, 16);
                let dayTime = info.dateStr.slice(0, 11);
                if(modalInsert.classList.contains('hidden')){
                    modalInsert.classList.remove('hidden');
                    let dataTeste = dayTimeaModal.slice(11,16);
                    dataTeste = dataTeste.split(":");
                    dataTeste[0] = +dataTeste[0] + 1;
                    let dataFormatada = ("0" + dataTeste[0]).slice(-2);
                    let dataEnd = `${dayTime}${dataFormatada}:00`;
                    dateStartElement.value = dayTimeaModal.replace("T", " - ");
                    dateEndElement.value = dataEnd.replace("T", " - ");

                    modalInsert.style.transition = 'opacity 300ms';

                    setTimeout(() => modalInsert.style.opacity = 1, 100);
                }
            }

            const moveEvent = (info) => {
                // setTimeout(() => appBG.classList.add('inbackground'), 100);
                
                console.log(info.event);
                var positionTitle = info.event.title.indexOf("(");
                var startDateTime = info.event.startStr.substring(0,19);
                var endDateTime = info.event.endStr.substring(0,19);

                let _token = '{!! csrf_token() !!}';
                let id = info.event.id;
                let title = info.event.title.substring(0, positionTitle);
                let description = info.event.extendedProps.description;
                let color = info.event.backgroundColor;
                let date_start_schedule = startDateTime.replace("T", " ");
                let date_end_schedule = endDateTime.replace("T", " ");
                let done = info.event.extendedProps.done;

                let dadosMoveEvent = { _token, id, title, description, color, date_start_schedule, date_end_schedule, done };
                

                function getCookie(cookieName) {
                    var decodedCookie = decodeURIComponent(document.cookie);
                    var ca = decodedCookie.split(';');
                    for(var i = 0; i <ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                            c = c.substring(1);
                        }
                        if (c.indexOf(cookieName) == 0) {
                            return c.substring(cookieName.length+1, c.length);
                        }
                    }
                    return "";
                }

                var ajax = new XMLHttpRequest();
                var token = getCookie('XSRF-TOKEN');
                ajax.open('PUT', `http://localhost:8090/schedules/update/${info.event.id}`, false);
                ajax.setRequestHeader('Content-type', 'application/json');
                ajax.setRequestHeader('X-XSRF-TOKEN', token);
                ajax.send(JSON.stringify(dadosMoveEvent));

                ajax.onreadystatechange = function () {
                    if(ajax.readyState == 4 && ajax.status == 200){
                        var dados = ajax.responseText;
                    }
                }


            }

            document.querySelector('.modal-details-close').addEventListener('click', () => closeModal());
            document.querySelector('.modal-close').addEventListener('click', () => closeModal());
            document.addEventListener('keydown', function(event) {
                if(event.key === 'Escape'){
                    dateStartElement.value = "";
                    dateEndElement.value = "";
                    closeModal();
                }
            });

            const closeModal = () => {
                appBG.classList.remove('inbackground');
                if(!modalInsert.classList.contains('hidden') || !modalDetails.classList.contains('hidden')){
                    dateStartElement.value = "";
                    dateEndElement.value = "";
                    modalInsert.style.transition = 'opacity 300ms';
                    modalDetails.style.transition = 'opacity 300ms';

                    setTimeout(() => modalInsert.style.opacity = 1, 100);
                    setTimeout(() => modalInsert.classList.add('hidden'), 200);
                    setTimeout(() => modalDetails.style.opacity = 1, 100);
                    setTimeout(() => modalDetails.classList.add('hidden'), 200);
                }
            }

        }); 
    </script>
@endpush

</x-app-layout>
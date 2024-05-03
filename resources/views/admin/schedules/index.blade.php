
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mr-12">
                {{ __('Agenda de Aulas') }}
            </h2>
            <!-- Filter Teacher Schedules Search -->
            <select id="small" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Selecione um Professor</option>
                <option value="Margaux de Pinho">Margaux de Pinho</option>
                <option value="Professor Teste 1">Professor Teste 1</option>
                <option value="Professor Teste 2">Professor Teste 2</option>
                <option value="Professor Teste 3">Professor Teste 3</option>
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
                            <label for="txt-date_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data da Aula:</label>
                            <input type="date" name="date_schedule" id="date_schedule" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="XX/XX/XXXX" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Horário:</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <input type="time" name="time_schedule" id="time_schedule" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="08:00" max="21:00" value="00:00" required />
                            </div>
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

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                initialView: 'dayGridMonth',
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
                initialDate: '2024-05-02',
                slotMinTime: '08:00:00',
                slotMaxTime: '21:00:00',
                dateClick: function(info) {
                    openModal(info);
                    // alert('Date: ' + info.dateStr);
                    // console.log(info);
                },
                eventClick: function(info){
                    console.log(info);
                },
                eventDrop: function(info){
                    console.log(info);
                },
                events: @json($dados)
            });
            

            calendar.render();

            const modal = document.getElementById('crud-modal-schedules');
            const appBG = document.getElementById('calendar');

            const openModal = (info) => {
                appBG.classList.add('inbackground');
                if(modal.classList.contains('hidden')){
                    modal.classList.remove('hidden');
                    modal.style.transition = 'opacity 300ms';

                    setTimeout(() => modal.style.opacity = 1, 100);
                }
            }

            document.querySelector('.modal-close').addEventListener('click', () => closeModal());
            document.addEventListener('keydown', function(event) {
                if(event.key === 'Escape'){
                    closeModal();
                }
            });

            const closeModal = () => {
                appBG.classList.remove('inbackground');
                if(!modal.classList.contains('hidden')){
                    
                    modal.style.transition = 'opacity 300ms';

                    setTimeout(() => modal.style.opacity = 1, 100);
                    setTimeout(() => modal.classList.add('hidden'), 200);
                }
            }

        }); 
    </script>
@endpush

</x-app-layout>
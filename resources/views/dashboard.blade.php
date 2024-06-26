<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- // Inicio dos cards --}}
                    <div class="flex flex-col">
                        <h2 class="mb-4 text-2xl font-bold">Informações do Sistema Prof. Margaux Francês</h2>
                    
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50" style="width: 3rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            </div>
                    
                            <div class="ml-4">
                                <h2 class="font-semibold">{{$students}} Alunos</h2>
                                {{-- INICIO DO MEU PRIMEIRO COMPONENT COM PROPS E ALPINE JS --}}
                                <x-toggle-dashboard>
                                    <x-slot name="toggle">
                                        <button>
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABVElEQVR4nO2WsU7DMBCGv5dgANqKkaFMsMELVIKK1wBKeRY2UBEDI3uBN2l4AVDYaNhoFWTpIkWRa58dgxj6S78UxY6/3OV8Dqz1D9UDLoEXIAO+xJncGwHdlMBt4BZYAKXHS+AR2GkLPQUKBbDpOTCMhV5JBKHQevTjmEiXLaB1uDryTmR6XWnf0oDvE0IrTzRbRlO9oV5IJldq/AvQyhcu8LPlgUPgAMgVi5s5+8CRZWzqAr9aHjALGfU98FzmIC/aHM9cYFs1fwB7Mr4LvCnmvFvmFKFgH1wDLYHP0FS74FpoCcxCi2vVd+w3rn3FN3WBR4rKrUepibTymQvcVTaQXCpXu82+fQ3E6C5Bs2j6BuXBP08INdW8iVKDRD3bHIsnWmi9b7f9ETD/aFEaRqbdpPeYltoArqUyNVE+hHxTjTpytD1JFyrEM2kO55otsxZ/rR/urptHRM5dtwAAAABJRU5ErkJggg==">
                                        </button>
                                        
                                    </x-slot>
                                    <x-slot name="conteudo">
                                        <p class="mx-4 mt-2 text-sm text-gray-500">Ultimo aluno cadastrado: Joao Zica</p>
                                    </x-slot>

                                </x-toggle-dashboard>
                                {{-- FINAL DO MEU PRIMEIRO COMPONENT COM PROPS E ALPINE JS --}}
                            </div>
                        </div>
                    
                        <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-orange-50" style="width: 3rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            </div>
                    
                            <div class="ml-4">
                                <h2 class="font-semibold">{{$teachers}}  Professores</h2>
                                <x-toggle-dashboard>
                                    <x-slot name="toggle">
                                        <button>
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABVElEQVR4nO2WsU7DMBCGv5dgANqKkaFMsMELVIKK1wBKeRY2UBEDI3uBN2l4AVDYaNhoFWTpIkWRa58dgxj6S78UxY6/3OV8Dqz1D9UDLoEXIAO+xJncGwHdlMBt4BZYAKXHS+AR2GkLPQUKBbDpOTCMhV5JBKHQevTjmEiXLaB1uDryTmR6XWnf0oDvE0IrTzRbRlO9oV5IJldq/AvQyhcu8LPlgUPgAMgVi5s5+8CRZWzqAr9aHjALGfU98FzmIC/aHM9cYFs1fwB7Mr4LvCnmvFvmFKFgH1wDLYHP0FS74FpoCcxCi2vVd+w3rn3FN3WBR4rKrUepibTymQvcVTaQXCpXu82+fQ3E6C5Bs2j6BuXBP08INdW8iVKDRD3bHIsnWmi9b7f9ETD/aFEaRqbdpPeYltoArqUyNVE+hHxTjTpytD1JFyrEM2kO55otsxZ/rR/urptHRM5dtwAAAABJRU5ErkJggg==">
                                        </button>
                                        
                                    </x-slot>
                                    <x-slot name="conteudo">
                                        <p x-show="open" class="mx-4 mt-2 text-sm text-gray-500">Ultimo professor cadastrado: Fernando Zica</p>
                                    </x-slot>

                                </x-toggle-dashboard>
                            </div>
                        </div>
                        <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full border border-red-100 bg-red-50" style="width: 3rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            </div>
                    
                            <div class="ml-4">
                                <h2 class="font-semibold">Nº agendamentos: {{$schedules}} </h2>
                                <x-toggle-dashboard>
                                    <x-slot name="toggle">
                                        <button>
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABVElEQVR4nO2WsU7DMBCGv5dgANqKkaFMsMELVIKK1wBKeRY2UBEDI3uBN2l4AVDYaNhoFWTpIkWRa58dgxj6S78UxY6/3OV8Dqz1D9UDLoEXIAO+xJncGwHdlMBt4BZYAKXHS+AR2GkLPQUKBbDpOTCMhV5JBKHQevTjmEiXLaB1uDryTmR6XWnf0oDvE0IrTzRbRlO9oV5IJldq/AvQyhcu8LPlgUPgAMgVi5s5+8CRZWzqAr9aHjALGfU98FzmIC/aHM9cYFs1fwB7Mr4LvCnmvFvmFKFgH1wDLYHP0FS74FpoCcxCi2vVd+w3rn3FN3WBR4rKrUepibTymQvcVTaQXCpXu82+fQ3E6C5Bs2j6BuXBP08INdW8iVKDRD3bHIsnWmi9b7f9ETD/aFEaRqbdpPeYltoArqUyNVE+hHxTjTpytD1JFyrEM2kO55otsxZ/rR/urptHRM5dtwAAAABJRU5ErkJggg==">
                                        </button>
                                        
                                    </x-slot>
                                    <x-slot name="conteudo">
                                        <p x-show="open" class="mx-4 mt-2 text-sm text-gray-500">Ultimo aula agendada : <br> Aluno = Fernando Zica <br> Professor = Margaux de Pinho</p>
                                    </x-slot>

                                </x-toggle-dashboard>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

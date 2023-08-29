@extends('layouts.main')
@section('title')
    Главная @parent
@stop
@section('content')
    <div class="container">
        <button type="button" class="btn btn-primary admin" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Admin панель
        </button>
        <div class="list">
            <div>
                <h1>Ответы на вопросы</h1>
            </div>

            @forelse ($questions as $questionItem)
                <div class="col item" id="answer{{ $questionItem->id }}">
                    <div class="title">
                        <h3>{!! $questionItem->question !!}</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="cornflowerblue"
                             class="bi bi-chevron-down open" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-chevron-up close" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                        </svg>
                    </div>

                    <p class="answer">{!! $questionItem->answer !!}</p>
                </div>
            @empty
                <h2>Вопросы отсутствуют</h2>
            @endforelse
        </div>
    </div>

    <!-- Модальное окно -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Админ панель</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>

                <div class="modal-body">
                    <div class="menu">
                        <h2 class="contents">Контент</h2>
                        <h2 class="design">Дизайн</h2>
                    </div>

                    <div class="admin_list">
                        <!-- Редактирование контента -->
                        <div class="contents_block">
                            @forelse ($questions as $questionItem)
                                <div class="col content-item" id="content-item{{ $questionItem->id }}">
                                    <div class="title">
                                        <h3>Вопрос {{ $questionItem->id }}</h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             fill="cornflowerblue"
                                             class="bi bi-chevron-down open" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             fill="currentColor"
                                             class="bi bi-chevron-up close" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                                        </svg>

                                        <a class="edit" id="edit{{ $questionItem->id }}" data-index="{{ $questionItem->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd"
                                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>

                                        <!-- Удаление -->
                                        <a class="delete" href="javascript:;" rel="{{$questionItem->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="#dc3545"
                                                 class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="admin_item">
                                        <h4>Вопрос</h4>
                                        <p class="admin_question">{!! $questionItem->question !!}</p>
                                        <h4>Ответ</h4>
                                        <p class="admin_answer">{!! $questionItem->answer !!}</p>
                                    </div>
                                </div>

                                <!-- Форма редактирования вопрос-ответа -->
                                <div class="form-edit" id="form-edit{{ $questionItem->id }}">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                        <h1 class="h2">Редактировать вопрос</h1>
                                    </div>

                                    <form method="post" action="{{ route('main.update', ['main' => $questionItem->id])}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="question">Вопрос</label>
                                            <input type="text" name="question" id="question" class="form-control"
                                                   value="{{ $questionItem->question }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="answer">Ответ</label>
                                            <textarea class="form-control" name="answer"
                                                      id="answer">{{ $questionItem->answer }}</textarea>
                                        </div>
                                        <br/>
                                        <button type="submit" class="btn btn-success">Cохранить</button>
                                    </form>
                                </div>
                            @empty
                                <h2>Вопросы отсутствуют</h2>
                            @endforelse
                            <hr/>
                            <div class="btn-toolbar mb-2 mb-md-0 btn-create">
                                <div class="btn-group me-2">
                                    <a href="#" type="button"
                                       class="btn btn-sm btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                        </svg>
                                        Добавить ещё
                                    </a>
                                </div>
                            </div>

                            <!-- Добавление вопрос-ответа -->
                            <div class="form-create">
                                <div
                                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2">Добавить вопрос</h1>
                                </div>

                                <form method="post" action="{{ route('main.store', ['query' => 'test']) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="question">Вопрос</label>
                                        <input type="text" name="question" id="question" class="form-control"
                                               value="question?"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="answer">Ответ</label>
                                        <textarea class="form-control" name="answer" id="answer"
                                                  placeholder="answer"></textarea>
                                    </div>
                                    <br/>
                                    <button type="submit" class="btn btn-success">Cохранить</button>
                                </form>
                            </div>

                        </div>

                        <!-- Редактирование дизайна -->
                        <div class="design_block">
                            <div class="top_indent">
                                <p class="text_indent">Отступ сверху</p>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="btn-check" name="top_options" id="option1"
                                           autocomplete="off" checked>
                                    <label class="btn btn_top-indent btn-secondary" for="option1"></label>
                                    <input type="radio" class="btn-check" name="top_options" id="option2"
                                           autocomplete="off" checked>
                                    <label class="btn btn_top-indent btn-secondary" for="option2"></label>
                                    <input type="radio" class="btn-check" name="top_options" id="option3"
                                           autocomplete="off" checked>
                                    <label class="btn btn_top-indent btn-secondary" for="option3"></label>
                                    <input type="radio" class="btn-check" name="top_options" id="option4"
                                           autocomplete="off" checked>
                                    <label class="btn btn_top-indent btn-secondary" for="option4"></label>
                                </div>
                            </div>
                            <div class="bottom_indent">
                                <p class="text_indent">Отступ снизу</p>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="btn-check" name="bottom_options" id="option5"
                                           autocomplete="off" checked>
                                    <label class="btn btn_top-indent btn-secondary" for="option5"></label>
                                    <input type="radio" class="btn-check" name="bottom_options" id="option6"
                                           autocomplete="off" checked>
                                    <label class="btn btn_top-indent btn-secondary" for="option6"></label>
                                    <input type="radio" class="btn-check" name="bottom_options" id="option7"
                                           autocomplete="off" checked>
                                    <label class="btn btn_top-indent btn-secondary" for="option7"></label>
                                    <input type="radio" class="btn-check" name="bottom_options" id="option8"
                                           autocomplete="off" checked>
                                    <label class="btn btn_top-indent btn-secondary" for="option8"></label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function () {
            let itemsToOpen = document.querySelectorAll(".open");
            let itemsToClose = document.querySelectorAll(".close");

            //Раскрытие содержимого
            itemsToOpen.forEach(function (item, key) {
                item.addEventListener('click', function () {
                    item.parentNode.parentNode.lastElementChild.style.display = "block";
                    item.style.visibility = "hidden";
                    item.parentNode.querySelector('.close').style.visibility = "visible";
                })
            })

            //Скрытие содержимого
            itemsToClose.forEach(function (item, key) {
                item.addEventListener('click', function () {
                    item.parentNode.parentNode.lastElementChild.style.display = "none";
                    item.style.visibility = "hidden";
                    item.parentNode.querySelector('.open').style.visibility = "visible";
                })
            })

            let btnCreate = document.querySelector('.btn-create');
            let formCreate = document.querySelector('.form-create');
            //Открытие формы добавления

            btnCreate.addEventListener('click', function () {
                btnCreate.style.display = "none";
                formCreate.style.display = "block";
            })

            let contents = document.querySelector('.contents');
            let contentsBlock = document.querySelector('.contents_block');
            let design = document.querySelector('.design');
            let designBlock = document.querySelector('.design_block');

            //Переключение на окно контента
            contents.addEventListener('click', function () {
                design.style.textDecoration = "none";
                designBlock.style.display = "none";
                contents.style.textDecoration = "underline";
                contentsBlock.style.display = "block";
            })

            //Переключение на окно дизайна
            design.addEventListener('click', function () {
                contents.style.textDecoration = "none";
                contentsBlock.style.display = "none";
                design.style.textDecoration = "underline";
                designBlock.style.display = "flex";
            })

            //Добавление отступа сверху
            let top_inputs = document.querySelectorAll('input[name="top_options"]');
            let top_indent = document.querySelectorAll('.title');
            for (let i = 0; i < top_inputs.length; i++) {
                top_inputs[i].addEventListener('change', function () {
                    top_indent.forEach(function (item, key) {
                        item.style.marginTop = `${10 * (i + 1)}px`
                    })
                })
            }

            //Добавление отступа снизу
            let bottom_inputs = document.querySelectorAll('input[name="bottom_options"]');
            let bottom_indent = document.querySelectorAll('.title');
            for (let i = 0; i < bottom_inputs.length; i++) {
                bottom_inputs[i].addEventListener('change', function () {
                    bottom_indent.forEach(function (item, key) {
                        item.style.marginTop = `${10 * (i + 1)}px`
                    })
                })
            }

            //Открытие формы для редактирования
            let btnsEdit = document.querySelectorAll('.edit');
            btnsEdit.forEach(function (item, key) {
                item.addEventListener('click', function () {
                    let index = item.dataset.index;
                    let formEdit = document.getElementById(`form-edit${index}`);
                    let contentItem = document.getElementById(`content-item${index}`);

                    formEdit.style.display = 'block';
                    contentItem.style.display = 'none';
                    console.log(index)
                    console.log(formEdit)
                    console.log(contentItem)
                })
            })


            //Удаление вопроса из БД
            let items = document.querySelectorAll(".delete")
            items.forEach(function (item, key) {
                item.addEventListener('click', function () {
                    const id = this.getAttribute('rel');
                    if (confirm(`Подтвердить удаление источника с #ID = ${id}`)) {
                        send(`/main/${id}`).then(() => {
                            location.reload();
                        });
                    } else {
                        alert("Отменено");
                    }
                })
            })
        })

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush

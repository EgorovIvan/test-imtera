<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@section('title')
            :: Main
        @show</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <meta name="theme-color" content="#712cf9">

    <style>

        .container {
            min-width: 375px;
        }

        .admin {
            display: flex;
            margin: 0 15px 0 auto;
        }

        .modal {
            width: 50%;
            left: 50%;
            --bs-modal-width: 600px;
        }
        .modal-body {
            height: 100%;
        }
        .modal-dialog {
            min-width: 375px;
            min-height: 90vh;
        }

        .list {
            margin: 15px;
            padding: 15px;
            background-color: #cbd5e0;
            border-radius: 5px;
        }

        .title {
            position: relative;
            display: inline-block;
            width: auto;
            margin: 10px 80px 10px 15px;
        }

        .answer {
            display: none;
        }

        .open {
            position: absolute;
            top: 10px;
            right: -30px;
            visibility: visible;
        }

        .close {
            position: absolute;
            top: 10px;
            right: -30px;
            visibility: hidden;
        }

        .menu {
            display: flex;
        }

        .admin_list {
            position: relative;
            height: 90vh;
            margin: 20px 0;
        }

        .contents {
            margin: 0 20px;
            text-decoration: underline;
        }

        .design {
            margin: 0 20px;
            text-decoration: none;
        }

        .contents_block {
            position: absolute;
            display: block;
            width: 100%;
        }

        .form-create {
            display: none;
        }

        .design_block {
            position: absolute;
            display: none;
            align-items: center;
            justify-content: space-between;
        }

        .admin_item {
            display: none;
        }

        .edit {
            position: absolute;
            top: 5px;
            right: -70px;
        }

        .form-edit {
            display: none;
        }

        .delete {
            position: absolute;
            top: 5px;
            right: -100px;
        }

        .btn_top-indent {
            width: 40px;
            height: 4px;
            padding: 1px;
        }

        .text_indent {
            margin: 20px auto 0 auto;
        }

        .btn_top-indent:checked {
            color: #0d6efd;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-secondary {
            --bs-btn-hover-bg: #0d6efd;
            --bs-btn-hover-border-color: #0d6efd;
            --bs-btn-focus-shadow-rgb: 130, 138, 145;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #0d6efd;
            --bs-btn-active-border-color: #0d6efd;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        }
    </style>

</head>
<body>

<x-main.main></x-main.main>


<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
@stack('js')

</body>
</html>

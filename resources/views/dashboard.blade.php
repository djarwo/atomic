@extends('layouts.master')
@section('content')
<div class="page-wrapper">
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<div class="page-content" style="overflow-y: auto">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Induk</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Beranda</span>
            </li>
        </ul>
    </div>
    <h1 class="page-title"> Beranda Admin
        <small>statistik, grafik, laporan dan acara belakangan ini</small>
    </h1>

</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler">
<i class="icon-login"></i>
</a>

<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2018 &copy; Powered By Twiscode
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
</div>

@endsection

@section('close_html')
    <script src="{{asset('assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
@endsection
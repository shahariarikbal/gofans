@extends('client.layout')

@section('title')
    Billing | Fund Request
@endsection

@section('page_title')
    Fund Request
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Fund Request</li>
@endsection

@section('content')
    <div class="page-content container-fluid" id='fund-request'>
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Fund Request</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('client.dashboard') }}">
                            <button class="btn btn-circle btn-info text-white">
                                <i class="ti-arrow-left"></i>
                            </button>
                            <span class="ml-2 font-normal text-dark">Back</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form action="{{route('client.sendFundRequest')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 col-lg-7">
                    <div class="card">
                        <div class="card-header bg-gradient-success text-white">
                            <h4 class="card-title"><i class="fa fa-money-bill-alt"></i> Make a fund request</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="my-input">Amount <span class="text-danger">*</span></label>
                                        <input id="my-input" class="form-control" type="number" name="fund-amount" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Remarks</label>
                                        <textarea name="remarks" class="form-control" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Send Request <i class="far fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="card">
                        <div class="card-header bg-gradient-info text-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="card-title"><i class="fa fa-life-ring"></i> Attachments</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group file-area">
                                <input id="form-file" class="form-control input-file" type="file"
                                name="fund-attachment[]"
                                multiple="multiple">
                                <div class="file-dummy">
                                    <p class="success">Attachments added</p>
                                    <p class="default">Click to select files</p>
                                </div>
                                <small><strong>Note: (pdf/docs/csv/image/jpeg types are supported)</strong> </small>
                            </div>
                            <div class="file_previews">
                                <ul>
                                    <li v-for="f in previewFiles" class="d-flex justify-content-between">
                                        <div class="icon-holder">
                                            <i class="fas fa-file-pdf" style="font-size:100px" v-if="f.type === 'application/pdf'"></i>
                                            <i class="fas fa-file-word" style="font-size:100px" v-if="f.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'"></i>
                                            <i class="far fa-file-excel" style="font-size:100px" v-if="f.type === 'application/vnd.ms-excel'"></i>
                                            <img :src="f.file" v-if="f.type === 'image/jpeg'" alt="f.name">
                                        </div>
                                        <div class="content-holder">
                                            <a href="f.file">@{{f.name}}</a>
                                        </div>
                                        <div class="content-holder">
                                            <button class="btn btn-sm btn-danger">X</button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('page_css')
    <style>
        .file-area
        {
            width: 100%;
            position: relative;
        }
        .input-file{
            width: 100%;
            height: 100%;
            position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0;
            cursor: pointer;
        }
        .file-dummy{
            width: 100%;
            padding: 30px;
            background: rgba(185, 175, 175, 0.2);
            border: 2px dashed rgb(47, 28, 28);
            text-align: center;
            transition: background 0.3s ease-in-out;
        }
        .file-dummy .success{
            display: none;
        }
         .file-dummy:hover {
            background: rgba(255,255,255,0.1);
        }
        .input-file:focus + .file-dummy {
            outline: 2px solid blue;
            outline: -webkit-focus-ring-color auto 5px;
        }
        .input-file:valid + .file-dummy {
        border-color: rgba(0,255,0,0.4);
        background-color: rgba(0,255,0,0.3);
        }
        .input-file:valid + .file-dummy .success{
            display: inline-block;
        }
        .input-file:valid + .file-dummy .default{
            display: none;
        }
        .file_previews{
            padding: 20px;
            background: rgb(255, 255, 255);
        }
        .file_previews ul li{
            padding: 20px;
            border:2px dashed rgba(185, 175, 175, 0.2);
        }
        .file_previews .icon-holder{
            width: 100px;
            height: 100px;
        }
        .file_previews .icon-holder img{
             width: 100%;
        }
        .file_previews .content-holder{
             padding: 50px 0px;
        }

    </style>
@endsection

@section('page_js')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        let app = new Vue({
                el: '#fund-request',
                data:{
                    previewFiles:[],
                    storedFile:[],
                }
        });
        let attachment = document.getElementById('form-file');
        let image_preview = document.getElementById('previews');
        attachment.addEventListener('change',evt=>{
           Array.from(evt.target.files).forEach(f => {
                app.storedFile.push(f);
            });
            populateFIles();
        });
        function populateFIles()
        {
            app.storedFile.forEach(fl =>{
                let reader = new FileReader();
                let type = fl.type;
                let name = fl.name;
                reader.addEventListener('load',e=>{
                    app.previewFiles.push({
                        name: name,
                        type: type,
                        file: e.target.result,
                    })
                });
                reader.readAsDataURL(fl);
            });
        }
    </script>
@endsection
